<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Http\Resources\CartResource;
use App\Http\Resources\RestaurantResource;
use App\Models\AddressUser;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'food_id' => 'required',
            'count' => ['required'],

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $placeholder=[
            'food_id'=>$request->food_id,
            'count'=>$request->count,
            'user_id'=>auth()->id(),
            'status'=>Cart::PENDING
        ];

            $food = Cart::create($placeholder);

            return response()->json(['cart created successfully.', new CartResource($food)]);
    }

    public function index()
    {

        $carts = Cart::all();


        return response()->json(CartResource::collection($carts));
    }

    public function update(Cart $cart,Request $request)
    {
        $validator = Validator::make($request->all(), [
            'food_id' => ['nullable'],
            'count' => ['nullable'],


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $placeholder=[
            'food_id'=>$request->food_id,
            'count'=>$request->count,
            'user_id'=>auth()->id(),
            'status'=>Cart::PENDING

        ];


        $cart->update($placeholder);
//        return response()->noContent();
        return response()->json(['msg'=>'current cart updated successfully']);
    }
    public function show(Cart $cart)
    {
        return response()->json(['cart:', new CartResource($cart)]);

    }
}
