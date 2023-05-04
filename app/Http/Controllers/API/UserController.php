<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json(['users:', $users]);

    }

    public function show(User $user)
    {
        return response()->json(['user:', $user]);

    }

    public function update(User $user, Request $request)
    {
        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email'

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json(['User updated successfully.', new UserResource($user)]);
    }
}
