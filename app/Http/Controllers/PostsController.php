<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\FilesService;

class PostsController extends Controller
{

    public function index()
    {
        return Post::orderBy('created_at', 'DESC')->paginate(2);
    }


    public function show(Post $post)
    {
        return view('website.post.show', compact('post'));
    }

    public function store(PostRequest $request)
    {
        $post = $request->user()->posts()->create($request->validated());
        $thumbnailPath = FilesService::upload('thumbnail', 'thumbnails');
        $post->thumbnail = $thumbnailPath;
        $post->save();

        broadcast(new \App\Events\NewPostAdded($request->user(), $post))->toOthers();

        abort_unless($post, 500, __('translate.Something went wrong!'));
        $post->comments_count = $post->likes_count = 0;
        return $post;
    }
}
