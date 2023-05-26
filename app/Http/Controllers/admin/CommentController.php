<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::with('replies', 'user')
            ->where('request_delete', true)
            ->get();
//dd($comments);

        return view('comment.admin', compact('comments'));
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
