<?php

namespace App\Http\Controllers;

use Inertia\Inertia; 
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use App\Models\Category;


class PostController extends Controller
{
    public function index(Post $post)
    {
        // $test = $post->orderBy('updated_at', 'DESC')->limit(2)->toSql(); //確認用に追加
        // dd($test); //確認用に追加
        return Inertia::render("Post/Index",["posts" => Post::with("category")->get()]);
    }

    public function create(Category $category)
    {
        return Inertia::render("Post/Create", ["categories" => $category->get()]);
    }

    public function store(PostRequest $request, Post $post)
    {
        $input = $request->all();
        $post->fill($input)->save();
        return redirect("/posts/" . $post->id);
    }

    public function show(Post $post)
    {
        return Inertia::render("Post/Show", ["post" => $post->load(("category"))]);
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

    public function delete(Post $post){
        $post->delete();
        return redirect("/posts");
    }
}
