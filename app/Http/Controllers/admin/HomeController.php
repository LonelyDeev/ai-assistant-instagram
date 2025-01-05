<?php

namespace App\Http\Controllers\admin;

use App\Console\Commands\GenerateContentCommand;
use App\Http\Controllers\Controller;
use App\Jobs\GenerateContent;
use App\Jobs\GetImageGenerated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use OpenAI;
use App\Models\Tools;
use App\Models\Content;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Blogs;
use App\Models\PricingPlan;
use App\Models\Faq;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\helper\helper;
use Stichoza\GoogleTranslate\GoogleTranslate;
use PDF;

class HomeController extends Controller
{

    public function index(Request $request)
    {

        if (Auth::user()->type == 1) {

            if (empty($request->revenue_year)) {
                $request->revenue_year = date('Y');
            }
            if (empty($request->booking_year)) {
                $request->booking_year = date('Y');
            }

            $getrevenue_data = Transaction::select(DB::raw("SUM(amount) as count"), DB::raw("MONTHNAME(purchase_date) as month"))->groupBy(DB::raw("MONTHNAME(purchase_date)"))->where(DB::raw("YEAR(purchase_date)"), $request->revenue_year)->orderby('purchase_date')->get();
            $getpiechart_data = User::select(DB::raw("COUNT(id) as count"), DB::raw("MONTHNAME(created_at) as month"))->groupBy(DB::raw("MONTHNAME(created_at)"))->where('type', 2)->where(DB::raw("YEAR(created_at)"), $request->booking_year)->orderby('created_at')->get();
            $getyears = Transaction::select(DB::raw("YEAR(purchase_date) as year"))->groupBy(DB::raw("YEAR(purchase_date)"))->orderby('purchase_date')->get();

            $getuserYears = User::select(DB::raw("YEAR(created_at) as year"))->groupBy(DB::raw("YEAR(created_at)"))->whereNotIn('id', [1])->orderby('created_at')->get();
            $userchart_year = explode(',', $getuserYears->implode('year', ','));
            $totalrevenue = Transaction::select(DB::raw("SUM(amount) as total"))->where('status', 2)->first();

            if (env('Environment') == 'sendbox') {
                $revenue_lables = ['January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'];
                $revenue_data = [636, 1269, 2810, 2843, 3637, 467, 902, 1296, 402, 1173, 1509, 413];
                $piechart_lables = ['January', 'February', 'March', 'April', 'May', 'June', 'July ', 'August', 'September', 'October', 'November', 'December'];
                $piechart_data = [16, 14, 25, 28, 45, 31, 25, 35, 49, 21, 32, 31];
            } else {
                $revenue_lables = explode(',', $getrevenue_data->implode('month', ','));
                $revenue_data = explode(',', $getrevenue_data->implode('count', ','));

                $piechart_lables = explode(',', $getpiechart_data->implode('month', ','));
                $piechart_data = explode(',', $getpiechart_data->implode('count', ','));
            }

            $revenue_year_list = explode(',', $getyears->implode('year', ','));
            $totalusers = User::whereNotIn('id', [1])->where('is_available', 1)->count();
            $totalplans = PricingPlan::count();
            $currentplan = PricingPlan::select('name')->where('id', Auth::user()->plan_id)->first();
            $totaltransaction = Transaction::count();


            return view('admin.dashboard', compact('totalrevenue', 'totalusers', 'totalplans', 'currentplan', 'revenue_year_list', 'userchart_year', 'revenue_lables', 'revenue_data', 'piechart_lables', 'piechart_data', 'totaltransaction'));
        }
        if (Auth::user()->type == 2) {
            $totalgeneratedword = Content::select('count')->where('vendor_id', Auth::user()->id)->sum('count');
            $totalcontent = Content::where('vendor_id', Auth::user()->id)->get()->count();
            $tools = Tools::all();
            $plan = null;

            if (@helper::plandetail(Auth::user()->plan_id)) {
                if (@helper::plandetail(Auth::user()->plan_id)->id == 1) {
                    $plan = @helper::plandetail(Auth::user()->plan_id);
                } else {
                    $plan = @helper::getlimit(Auth::user()->id);
                }
            }
            return view('admin.index', compact('tools', 'totalgeneratedword', 'totalcontent', 'plan'));
        }
    }

    public function contentpage(Request $request)
    {
        $gettoolingo = Tools::where('slug', $request->slug)->first();
        $plan = [];
        if (@helper::plandetail(Auth::user()->plan_id)) {
            $plan = explode(',', @helper::plandetail(Auth::user()->plan_id)->tools_limit);
        }

        if (in_array($gettoolingo->id, $plan)) {
            return view('admin.content', compact('gettoolingo'));
        } else {
            return redirect('/index')->with('error', trans('messages.InactiveTools'));
        }

    }


    public function generate(Request $request)
    {

        $checkplan = helper::checkplan(Auth::user()->id);
        $v = json_decode(json_encode($checkplan));
        if (@$v->original->status == 2) {
            return response()->json(['status' => 0, 'message' => $v->original->message], 200);
        }
        $gettoolingo = Tools::where('slug', $request->slug)->first();
        $plan = [];
        if (@helper::plandetail(Auth::user()->plan_id)) {
            $plan = explode(',', @helper::plandetail(Auth::user()->plan_id)->tools_limit);
        }

        if (!in_array($gettoolingo->id, $plan)) {
            return response()->json(['status' => 0, 'message' => trans('messages.InactiveTools')], 200);
        }

        $tools = Tools::where('slug', $request->slug)->first();
        if (!$tools) {
            return response()->json(['status' => 0, 'message' => trans('messages.InactiveTools')], 200);
        }

        $content = new Content();
        $content->title = $request->prompt;
        $content->slug = helper::make_slug($request->prompt);
        $content->tools_id = $tools->id;
        $content->vendor_id = Auth::user()->id;
        $content->tools_slug = $tools->slug;
        $content->temperature = $request->temperature;
        $content->language = $request->language ?: 'persian';
        $content->count = 0;
        $content->generate_image = $request->createImage == 1 ? 'yes' : 'no';
        $content->save();

        GenerateContent::dispatch($content)->onQueue('generate_content');
       // GetImageGenerated::dispatch($content)->onQueue('get_image_generated');


        session()->put('success', trans('messages.success-create-content'));
        return response()->json(['status' => 'saveContent', 'message' => trans('messages.success-create-content')], 200);

    }

    private function instagramAssistant()
    {

    }

    public function generateAiArticle(Request $request)
    {

        $oldContent = Content::where(['slug' => $request->slug, 'tools_slug' => $request->prompt['tools_slug'], 'vendor_id' => Auth::user()->id])->first();

        if ($oldContent) {
            Http::post(env('API_LINK') . '/update-post', [
                'apiKey' => Auth::user()->apiKey,
                'token_key' => Auth::user()->token_key,
                'title' => $oldContent->title,
                'slug' => $oldContent->slug,
                'description' => $oldContent->description,
                'language' => $oldContent->language,
            ]);
            $oldContent->status = "waiting";
            $oldContent->content = null;
            $oldContent->save();
        } else {
            $content = new Content();
            $content->title = $request->title;
            $content->slug = $request->slug;
            $content->tools_id = $request->prompt['tool_id'];
            $content->vendor_id = Auth::user()->id;
            $content->tools_slug = $request->prompt['tools_slug'];
            $content->language = $request->prompt['language'];
            $content->description = $request->prompt['description'];
            $content->count = 0;
            $content->save();
            Http::post(env('API_LINK') . '/create-post', [
                'apiKey' => Auth::user()->apiKey,
                'token_key' => Auth::user()->token_key,
                'title' => $content->title,
                'slug' => $content->slug,
                'description' => $content->description,
                'language' => $content->language,
            ]);
        }


    }

    public function alltools()
    {
        $tools = Tools::all();
        $plan = null;
        if (@helper::plandetail(Auth::user()->plan_id)) {
            if (@helper::plandetail(Auth::user()->plan_id)->id == 1) {
                $plan = @helper::plandetail(Auth::user()->plan_id);
            } else {
                $plan = @helper::getlimit(Auth::user()->id);
            }
        }
        return view('admin.tools.alltools', compact('tools', 'plan'));
    }

    public function save_content(Request $request)
    {
        $content = new Content();
        $content->title = $request->title;
        $content->slug = helper::make_slug($request->title);
        $content->tools_id = $request->tool_id;
        $content->vendor_id = Auth::user()->id;
        $content->tools_slug = $request->slug;
        $content->variation = $request->variation;
        $content->content = $request->input('content');
        $content->count = Str::of($request->input('content'))->wordCount();
        $content->status = "end";
        $content->save();

        $user = User::find(Auth::user()->id);
        $user->totalwordcount = $user->totalwordcount + Str::of($request->input('content'))->wordCount();
        $user->save();
        return response()->json(['status' => 1, 'message' => trans('messages.success')], 200);
    }

    public function my_content(Request $request)
    {
        $allcontents = Content::with("tools_info")->where(["vendor_id" => Auth::user()->id])->where('tools_slug', '!=', 'artical-generator-pro')->orderBy('id', 'DESC')->get();
        $allAiContents = Content::with("tools_info")->where(["vendor_id" => Auth::user()->id, 'tools_slug' => 'artical-generator-pro'])->orderBy('id', 'DESC')->get();
        return view('admin.mycontent.mycontent', compact('allcontents', 'allAiContents'));
    }

    public function contentdetail(Request $request)
    {
        $content = Content::with("tools_info")->where("id", $request->id)->first();
        helper::GetContentImage($content->id);
        return view('admin.mycontent.contentdetail', compact('content'));
    }

    public function logout()
    {
        if (Auth::user()->type == 1) {
            $url = "/admin";
        } else {
            $url = "/login";
        }

        session()->flush();
        Auth::logout();
        return redirect($url);
    }


    public function generatepdf(Request $request)
    {
        $data = Content::where('vendor_id', $request->id)->orderByDesc('id')->first();
        $data = [
            'content' => $data->content,
        ];
        $pdf = PDF::loadView('testpdf', $data);
        return $pdf->download('aiwriter.pdf');
        return response()->json(['status' => 1, 'message' => trans('messages.success')], 200);

    }

    public function generateword(Request $request)
    {
        $data = Content::where('vendor_id', $request->id)->orderByDesc('id')->first();

        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $section = $phpWord->addSection(
            array('paperSize' => 'Legal', 'marginLeft' => 2834.645669291, 'marginRight' => 1417.322834646, 'marginTop' => 2834.645669291, 'marginBottom' => 1417.322834646)
        );
        $html = $data->content;

        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html, false, false);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');


        $temp_file_uri = tempnam('', 'xyz');
        $objWriter->save($temp_file_uri);
        //download code
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=aiwriter.docx');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Content-Length: ' . filesize($temp_file_uri));
        readfile($temp_file_uri);
        unlink($temp_file_uri); // deletes the temporary file

    }

    public function generateImage($ImagePrompt)
    {
        $apiKey = '8893fd16-9cce-4fc2-a8b6-f4b4ea063383:7876d2d588f030828c5e96152620669c';
        $url = 'https://queue.fal.run/fal-ai/flux-pro/v1.1-ultra';

        $body = [
            "prompt" => $ImagePrompt,
            "num_images" => 1,
            "enable_safety_checker" => true,
            "safety_tolerance" => "2",
            "output_format" => "jpeg",
            "aspect_ratio" => "16:9",
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->timeout(200)->post($url, $body);

            $this->generateImageGet($response->json());
            // بررسی وضعیت پاسخ و بازگرداندن نتیجه
            if ($response->successful()) {
                return response()->json([
                    'status' => 'success',
                    'data' => $response->json(),
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Request failed',
                'error' => $response->json(),
            ], $response->status());
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function generateImageGet($request)
    {
        $apiKey = '8893fd16-9cce-4fc2-a8b6-f4b4ea063383:7876d2d588f030828c5e96152620669c';
        $url = $request['response_url'];


        try {
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $apiKey,
                'Content-Type' => 'application/json',
            ])->timeout(200)->get($url);

            dd($url, $response->json());
            // بررسی وضعیت پاسخ و بازگرداندن نتیجه
            if ($response->successful()) {
                return response()->json([
                    'status' => 'success',
                    'data' => $response->json(),
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Request failed',
                'error' => $response->json(),
            ], $response->status());
        } catch (\Exception $e) {
            dd('error2', $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
