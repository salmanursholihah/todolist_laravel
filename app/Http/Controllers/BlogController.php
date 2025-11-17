<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('blog.index', compact('posts'));
    }

 public function show($id)
{
    $view = 'blog.blog' . $id;

    if (!view()->exists($view)) {
        abort(404);
    }

    return view($view);
}


    
}
