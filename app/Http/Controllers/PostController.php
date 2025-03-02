<?php

namespace App\Http\Controllers;

use Inertia\Inertia; 
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        // $test = $post->orderBy('updated_at', 'DESC')->limit(2)->toSql(); //確認用に追加
        // dd($test); //確認用に追加
        return Inertia::render("Post/Index",["posts" => $post->get()]);
    }
    public function show(Post $post)
    {
        return Inertia::render("Post/Show", ["post" => $post]);
    }
}
