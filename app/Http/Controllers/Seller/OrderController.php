<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\StatusOrder;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function update(Request $request, Cart $cart)
    {
        $validated = $request->validate([
            'status' => 'required'
        ]);

        $cart->update($validated);

        $user = User::find($cart->user_id);

        (new CustomerNotificationController())->sendCustomerNotification($user, $validated);
        return redirect()->route('seller.cart.index');


    }

    public function paymentOrder($cart_number,$restaurant_id)
    {
        $cartItems = Cart::where('cart_number', $cart_number)->get();
        $total_price = 0;
        foreach ($cartItems as $cartItem) {
            $total_price += $cartItem->price;
        }

        $placeholder = [
            'status_order' => StatusOrder::find(1)->status,
            'status_payment' => 1,
            'total_price' => $total_price,
            'user_id' => auth()->id(),
            'cart_number' => $cart_number,
            'restaurant_id' => $restaurant_id
        ];

        Order::create($placeholder);
        return response()->json(['add order successfully.']);
    }

    public function index()
    {
        $carts = Order::with('carts','restaurant')->get();
//        $restaurant=Restaurant::where('user_id',auth()->id())->first();
//        $foods = Food::where('restaurant_id',$restaurant->restaurant_id)->get();


        dd(collect($carts));
    }
}
