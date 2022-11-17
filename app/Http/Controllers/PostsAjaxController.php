<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsAjaxController extends Controller
{
    public function __invoke()
    {
        return Post::orderBy('created_at', 'DESC')->paginate(2);
    }
}
