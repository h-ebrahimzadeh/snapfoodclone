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
use Illuminate\Support\Facades\Cache;
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


        $cartItemTemp = [
            'food_id' => $request->food_id,
            'count' => $request->count,
            'user_id' => auth()->id()
        ];

        if (!Cache::has('cartItem')) {
            Cache::put('cartItem', $cartItemTemp);
            return response()->json(['cart created successfully.']);
        }
        $cartItemTemp = Cache::get('cartItem');
        $cartItemTemp[] = [
            'food_id' => $request->food_id,
            'count' => $request->count,
            'user_id' => auth()->id()
        ];
        Cache::put('cartItem', $cartItemTemp);


//        dd(json_encode(Cache::get('cartItem'),JSON_PRETTY_PRINT) );


//

//        $placeholder=[
//            'food_id'=>$request->food_id,
//            'count'=>$request->count,
//            'user_id'=>auth()->id(),
//            'status'=>Cart::PENDING
//        ];
//
//            $food = Cart::create($placeholder);

        return response()->json(['cart created successfully.']);
    }

    public function index()
    {

        $cart = Cache::get('cartItem');


        return response()->json($cart);
    }

    public function update(Cart $cart, Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'food_id' => ['nullable'],
            'count' => ['nullable'],


        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $cartItems = json_decode(json_encode(Cache::get('cartItem')), true);

        $cartItems[$id] = [
            'food_id' => $request->food_id,
            'count' => $request->count,
            'user_id' => auth()->id()
        ];

        Cache::put('cartItem', $cartItems);


//        $placeholder = [
//            'food_id' => $request->food_id,
//            'count' => $request->count,
//            'user_id' => auth()->id(),
//            'status' => Cart::PENDING
//
//        ];
//
//
//        $cart->update($placeholder);
//        return response()->noContent();
        return response()->json(['msg' => 'current cart updated successfully']);
    }


//    public function show(Cart $cart)
//    {
//        return response()->json(['cart:', new CartResource($cart)]);
//
//    }

    public function destroy($id)
    {
        $cartItems = json_decode(json_encode(Cache::get('cartItem')), true);
//        dd(count($cartItems));
        if (count($cartItems) <= $id) {
            return response()->json(['msg' => 'id cart is incorrect']);
        }
        unset($cartItems[$id]);
        $cartItems = array_values($cartItems);
        Cache::put('cartItem', $cartItems);

        return response()->json(['msg' => 'Delete id cart is successfully']);
    }
}
