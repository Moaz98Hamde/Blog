<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeRequest;
use App\Models\Like;

class LikesController extends Controller
{
    public function store(LikeRequest $request)
    {
        if (isset($request->liked)) {
            $like = Like::create([
                'user_id' => $request->user()->id,
                'post_id' => $request->post,
            ]);
            $postLikesCount = $like->post->likes_count;
        } else {
            $like = Like::where([
                ['user_id', $request->user()->id],
                ['post_id', $request->post],
            ])->first();
            
            $postLikesCount = $like->post->likes_count;
            $like->delete();
            $postLikesCount = $postLikesCount - 1;
            $like = !$like;
        }


        abort_unless(isset($like), 500, __('translate.Something went wrong!'));
        return ['like' => $like, 'postLikesCount' => $postLikesCount];
    }
}
