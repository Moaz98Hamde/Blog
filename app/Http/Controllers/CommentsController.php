<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function store(CommentRequest $request){
        $comment = Comment::create([
            'user_id' => $request->user()->id,
            'post_id' => $request->post,
            'content' => $request->content
        ]);

        abort_unless($comment, 500, __('translate.Something went wrong!'));
        $comment->username = $comment->user->name;
        $comment->time = $comment->created_at->diffForHumans();
        $postCommentsCount = $comment->post->comments_count;
        return ['comment' => $comment, 'postCommentsCount' => $postCommentsCount];
    }
}
