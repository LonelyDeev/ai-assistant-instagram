<?php

namespace App\Http\Controllers\addon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;
use Illuminate\Support\Str;
class BlogController extends Controller
{
    public function index()
    {
        $blogs= Blogs::orderByDesc('id')->get();
        return view('admin.blog.index',compact('blogs'));
    }
    public function add()
    {
        return view('admin.blog.add');
    }
    public function save(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description' => 'required',
            'image' => 'required',
        ], [
            'title.required' => trans('messages.title_required'),
            'description.required' => trans('messages.description_required'),
            'image.required' => trans('messages.image_required'),
        ]);
        $check_slug = Blogs::where('slug', Str::slug($request->title, '-'))->first();
        if (!empty($check_slug)) {
            $last_id = Blogs::select('id')->orderByDesc('id')->first();
            $slug = Str::slug($request->title . ' ' . $last_id->id, '-');
        } else {
            $slug = Str::slug($request->title, '-');
        }
        $blog= new Blogs();
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->description = $request->description;
        if ($request->has('image')) {
            $blogimage = 'blog-' . uniqid() . "." .$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(storage_path('app/public/admin-assets/images/blog/'), $blogimage);
            $blog->image = $blogimage;
        }
        $blog->save();
        return redirect('admin/blogs')->with('success', trans('messages.success'));
    }
    public function edit($slug)
    {
        $getblog = Blogs::where('slug',$slug)->first();
        if(!empty($getblog))
        {
            return view('admin.blog.edit',compact('getblog'));
        }
        return redirect('admin/blogs');
    }
    public function update(Request $request,$slug)
    {
        $request->validate([
            'title'=>'required',
            'description' => 'required',
            'image' => 'image',
        ], [
            'title.required' => trans('messages.title_required'),
            'description.required' => trans('messages.description_required'),
        ]);
        $blog= Blogs::where('slug',$slug)->first();
        
        $blog->title = $request->title;
        $blog->description = $request->description;
        if ($request->has('image')) {
            if (file_exists(storage_path('app/public/admin-assets/images/blog/' .$blog->image))) {
                unlink(storage_path('app/public/admin-assets/images/blog/' . $blog->image));
            }
            $blogimage = 'blog-' . uniqid() . "." .$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(storage_path('app/public/admin-assets/images/blog/'), $blogimage);
            $blog->image = $blogimage;
        }
        $blog->update();
        return redirect('admin/blogs')->with('success', trans('messages.success'));
    }
    public function delete($slug)
    {
        $blog = Blogs::where('slug', $slug)->first();
        if (file_exists(storage_path('app/public/admin-assets/images/blog/' .$blog->image))) {
            unlink(storage_path('app/public/admin-assets/images/blog/' . $blog->image));
        }
        $blog->delete();
        return redirect()->back()->with('success',trans('messages.success'));
    }
    public function blog_listing()
    {
        $blogs = Blogs::orderByDesc('id')->paginate(6);
        return view('front.blogs.blogslist',compact('blogs'));
    }
    public function blog_detail(Request $request)
    {
        $blogs = Blogs::whereNotIn('slug',[$request->slug])->orderByDesc('id')->get();
        $blogdetail = Blogs::where('slug',$request->slug)->first();
        return view('front.blogs.blog_detail',compact('blogdetail','blogs'));
    }
}
