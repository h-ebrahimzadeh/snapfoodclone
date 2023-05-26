<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $validator = Validator::make($request->all(), [
            'score' => 'required',
            'content' => 'required',
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $placeholder = [
            'order_id' => $order->id,
            'score' => $request->score,
            'user_id' => auth()->id(),
            'content' => $request->get('content'),
            'title' => $request->title
        ];
        $comment = Comment::create($placeholder);

        return response()->json(['comment created successfully.', new CommentResource($comment)]);
    }
}
