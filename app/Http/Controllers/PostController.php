<?php

namespace App\Http\Controllers;

use Inertia\Inertia; 
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;


class PostController extends Controller
{
    public function index(Post $post)
    {
        // $test = $post->orderBy('updated_at', 'DESC')->limit(2)->toSql(); //確認用に追加
        // dd($test); //確認用に追加
        return Inertia::render("Post/Index",["posts" => $post->get()]);
    }

    public function create()
    {
        return Inertia::render("Post/Create");
    }

    public function store(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        return redirect("/posts/" . $post->id);
    }

    public function show(Post $post)
    {
        return Inertia::render("Post/Show", ["post" => $post]);
    }

    public function edit(Post $post)
    {
        return Inertia::render("Post/Edit", ["post" => $post]);
    }
        
    public function update(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        return redirect("/posts/" . $post->id);
    }
}
