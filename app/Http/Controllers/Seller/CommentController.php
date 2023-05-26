<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Order $order)
    {
        $comments = Comment::with('replies', 'user')
            ->where('order_id', $order->id)
            ->where('request_delete', false)
            ->orderByDesc('created_at')
            ->get();
//dd($comments);

        return view('comment.index', compact('comments', 'order'));
    }

    public function destroyRequest(Comment $comment)
    {
//        dd($comment);
        $comment->update(['request_delete' => 1]);
        return back();
    }
}
