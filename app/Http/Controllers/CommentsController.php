<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $post->addComments(request('comment'));
        
//        Comment::create([
//            'comment' => request('comments'),
//            'post_id'=> $post->id
//        ]);
        
//        return back();
        return Redirect::to(URL::previous() . "#comments");
    }
}
