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
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:' . User::class],
            'mobile_number' => ['nullable', 'regex:/^(09\d{9})$/', 'size:11', 'unique:users,mobile_number']

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

//dd($validator->validated());
//        $user->name = $request->name;
//        $user->email = $request->email;
//        $user->mobile_number=$request->mobile_number;
        $user->update($validator->validated());

        return response()->noContent();
    }
}
