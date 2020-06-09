<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class UserBlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(14);
        return view('blog.index', compact('blogs'));
    }

    public function showPost($id = null)
    {
        $blog = Blog::find($id);
        if (!$blog) {
            return redirect(route('blog'))->with(['error' => 'Page Not Found']);
        }
        return view('blog.show', compact('blog'));
    }
}
