<?php

namespace App\Http\Controllers;

use App\Events\NewPost;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\FilesService;

class PostsController extends Controller
{
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

        // event(new NewPost($request->user(), $post));
        broadcast(new NewPost($request->user(), $post));

        abort_unless($post, 500, __('translate.Something went wrong!'));
        $post->comments_count = $post->likes_count = 0;
        return $post;
    }
}
