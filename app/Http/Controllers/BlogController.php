<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(15);
        return view('portal.blog.index', compact('blogs'));
    }

    public function newPost()
    {
        $isEdit = false;
        return view('portal.blog.new', compact('isEdit'));
    }

    public function savePost(Request $request)
    {
        $request->validate([
            'title' =>  'required',
            'body' => 'required',
            'image_url' => 'image|mimes:jpeg,png,jpg,svg,gif,webp|max:2048',
        ]);
        $isExist = Blog::find(request('id'));
        $blog =  $isExist ? $isExist : new Blog();

        if ($request->has('image_url')) {
            $origImageName = $request->image_url->getClientOriginalName();
            $imageUrl = env('APP_NAME') .'_'. time() .'_'. $origImageName;
            $destinationPath = public_path('/blog/images');
            $request->image_url->move($destinationPath, $imageUrl);
            $blog->image_url = $imageUrl;
            $blog->orig_image_name = $origImageName;
        }
        $blog->admin_id = auth()->user()->id;
        $blog->title = $request->title;
        $blog->body = $request->body;

        if($blog->save()){
            return redirect(route('admin.blogs'))->with(['success' => 'Post was successfully created.']);
        }else{
            return redirect(route('admin.blogs'))->with(['error`' => 'Failed to create new post']);
        }
    }

    public function viewPost($id)
    {
        $blog = Blog::find($id);
        return view('portal.blog.view', compact('blog'));
    }

    public function editPost($id)
    {
        $blog = Blog::find($id);
        $isEdit = true;
        return view('portal.blog.new', compact('isEdit', 'blog'));
    }
}
