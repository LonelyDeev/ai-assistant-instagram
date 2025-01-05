<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\helper\helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use OpenAI;
use Intervention\Image\Facades\Image;
class UserController extends Controller
{
    public function view_users()
    {
        $users = User::where('type', "2")->orderBydesc('id')->get();
        return view('admin.user.user', compact('users'));
    }

    public function edit(Request $request)
    {
        $user = User::where('slug', $request->slug)->first();
        return view('admin.user.edit_user', compact('user'));
    }
    public function edit_vendorprofile(Request $request)
    {
       if(Auth::user()->type == 1)
       {
          $request->id = 1;
       }

        if(Auth::user()->type == 2){
            $request->validate([
                'name' => 'required',
                'apiKey' => 'required',
                'email' => 'required|email|unique:users,email,' . $request->id,
                'mobile' => 'required|numeric|unique:users,mobile,' . $request->id,
                'profile.*' => 'mimes:jpeg,png,jpg',
            ], [
                'name.required' => trans('messages.name_required'),
                'email.required' => trans('messages.email_required'),
                'mobile.required' => trans('messages.mobile_required'),
                'email.email' =>  trans('messages.invalid_email'),
                'email.unique' => trans('messages.unique_email'),
                'mobile.unique' => trans('messages.unique_mobile'),
            ]);


            try {
                $client = OpenAi::client($request->apiKey);
                $client->completions()->create( [
                    "model" => 'gpt-3.5-turbo-instruct',
                ]);

            }catch (\Throwable $ex){
                if ($ex->getMessage()=="Incorrect API key provided: ".$request->apiKey.". You can find your API key at https://platform.openai.com/account/api-keys."){
                    return back()->withErrors(["apiKey" =>trans('messages.invalid_api')])->withInput();
                }
                elseif ($ex->getMessage()=="You exceeded your current quota, please check your plan and billing details."){
                    return back()->withErrors(["apiKey" =>trans('messages.invalid_api_maximum')])->withInput();
                }else{
                    return back()->withErrors(["apiKey" =>$ex->getMessage()])->withInput();
                }
            }
        }else{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $request->id,
                'mobile' => 'required|numeric|unique:users,mobile,' . $request->id,
                'profile.*' => 'mimes:jpeg,png,jpg',
            ], [
                'name.required' => trans('messages.name_required'),
                'email.required' => trans('messages.email_required'),
                'mobile.required' => trans('messages.mobile_required'),
                'email.email' =>  trans('messages.invalid_email'),
                'email.unique' => trans('messages.unique_email'),
                'mobile.unique' => trans('messages.unique_mobile'),
            ]);
        }

        $check_slug = User::where('slug', Str::slug($request->name, '-'))->first();
        if (!empty($check_slug)) {
            $last_id = User::select('id')->orderByDesc('id')->first();
            $slug = Str::slug($request->name . ' ' . $last_id->id, '-');
        } else {
            $slug = Str::slug($request->name, '-');
        }
        $edituser = User::where('id', $request->id)->first();
        $edituser->slug = $slug;
        $edituser->name = $request->name;
        $edituser->email = $request->email;
        $edituser->mobile = $request->mobile;
        if(Auth::user()->type == 2){
            $edituser->apiKey = $request->apiKey;
        }
        $file = $request->file('profile');
        if($file){
            $name = rand(1,99999).time().'_'.$file->getClientOriginalName();
            $image = Image::make($file);
            $image->resize(210, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            if(!is_dir('admin-assets/images/profile/' . Auth::id())){
                mkdir("admin-assets/images/profile/". Auth::id());
            }
            $image->save('admin-assets/images/profile/' . Auth::id() .'/'. $name);

            ///////////// save image in table /////////////
            $edituser->image = Auth::id().'/'.$name;
            ///////////// save image in table /////////////
        }
        $edituser->update();
        if(Auth::user()->type == 1)
        {
           return redirect()->back()->with('success', trans('messages.success'));

        }
        else
        {
            return redirect('/index')->with('success', trans('messages.success'));
        }
    }
    public function change_status($slug, $status)
    {
        User::where('slug', $slug)->update(['is_available' => $status]);
        return redirect('/admin/users')->with('success', trans('messages.success'));
    }
    public function change_password()
    {
        return view('admin.user.change_password');
    }
    public function edit_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ], [
            'current_password.required' => trans('messages.cuurent_password_required'),
            'new_password.required' => trans('messages.new_password_required'),
            'confirm_password.required' =>  trans('messages.confirm_password_required'),
        ]);
        if (Hash::check($request->current_password, Auth::user()->password)) {
            if ($request->current_password == $request->new_password) {
                return redirect()->back()->with('error', trans('messages.new_old_password_diffrent'));
            } else {
                if ($request->new_password == $request->confirm_password) {
                    $changepassword = User::where('id', Auth::user()->id)->first();
                    $changepassword->password = Hash::make($request->new_password);
                    $changepassword->update();
                    if(Auth::user()->type == 1)
                    {
                        return redirect('/admin/settings')->with('success',  trans('messages.success'));
                    }
                    else{
                        return redirect('/index')->with('success',  trans('messages.success'));
                    }
                } else {
                    return redirect()->back()->with('error', trans('messages.new_confirm_password_inccorect'));
                }
            }
        } else {
            return redirect()->back()->with('error', trans('messages.old_password_incorect'));
        }
    }
    public function aboutus(Request $request)
    {

        $getaboutus = helper::appdata('')->about_content;
        return view('admin.other.aboutus',compact('getaboutus'));
    }
    public function termscondition(Request $request)
    {
        $gettermscondition = helper::appdata('')->terms_content;
        return view('admin.other.termscondition',compact('gettermscondition'));
    }
    public function privacypolicy(Request $request)
    {
        $getprivacypolicy = helper::appdata('')->privacy_content;
        return view('admin.other.privacypolicy',compact('getprivacypolicy'));
    }
}
