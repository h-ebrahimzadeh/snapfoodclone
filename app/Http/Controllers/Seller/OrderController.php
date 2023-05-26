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
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status_order' => 'required'
        ]);
        $order->update($validated);

        $user = User::find($order->user_id);

        (new CustomerNotificationController())->sendCustomerNotification($user, $order);
        return redirect()->route('seller.order.index');


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
//        $restaurant=Restaurant::where('user_id',auth()->id())->first();
//        $foods = Food::where('restaurant_id',$restaurant->restaurant_id)->get();

        $orders = Order::with('carts','restaurant','user')
                ->whereNot('status_order', 'delivered')
                ->get();
        $totalPrice=0;
        foreach ($orders as $order)
        {
            $totalPrice += $order->total_price;
        }
//        $carts= Cart::with('foods')->where('cart_number',$orders->cart_number->first());

//dd($orders);

//        dd(collect($carts));
//        $foods = DB::table('orders')
//            ->select('*', 'foods.name as foodName', 'users.name as username', 'food_parties.name as foodPartyName', 'restaurants.name as restaurantName', 'carts.id as idCart')
//            ->join('users', 'users.id', '=', 'orders.user_id')
//            ->join('carts', 'carts.cart_number', '=', 'orders.cart_number')
//            ->join('foods', 'foods.id', '=', 'carts.food_id')
//            ->join('restaurants', 'restaurants.id', '=', 'orders.restaurant_id')
//            ->join('coupons', 'coupons.id', '=', 'foods.coupon_id')
//            ->join('food_parties', 'food_parties.id', '=', 'foods.food_parties_id')
//            ->whereNot('status_order', Cart::DELIVERED)
//            ->get();

//        $totalPrice = 0;
//
//        foreach ($foods as $food) {
//
//            $totalPrice += $food->total_price;
//        }
        return view('order.index', compact('orders','totalPrice'));
    }

    public function edit(Order $order)
    {
        return view('order.edit', compact('order'));
    }
}
