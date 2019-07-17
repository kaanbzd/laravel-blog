<?php

namespace App\Http\Controllers;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $comment = new Comment();
        $comment->content = $request->input('comment');
        $comment->article_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect('/');
    }
}
