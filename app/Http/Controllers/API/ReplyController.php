<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ReplyResource;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReplyController extends Controller
{
    public function store(Request $request,Comment $comment)
    {
        $validator = Validator::make($request->all(), [
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $placeholder = [
            'comment_id' => $comment->id,
            'user_id' => auth()->id(),
            'content' => $request->get('content'),
        ];
        $reply = Reply::create($placeholder);

        return response()->json(['Reply created successfully.', new ReplyResource($reply)]);
    }
}
