<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Food;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {

//        $restaurants_id = Restaurant::where('user_id', auth()->id())->get();

//        $foods = Food::with('cart')->with('foods')->get();
//        dd($foods);

//        $leagues = DB::table('leagues')
//            ->select('league_name')
//            ->join('countries', 'countries.country_id', '=', 'leagues.country_id')
//            ->where('countries.country_name', $country)
//            ->get();

        $foods = DB::table('carts')
            ->select('*', 'foods.name as foodName', 'users.name as username', 'food_parties.name as foodPartyName', 'restaurants.name as restaurantName', 'carts.id as idCart')
            ->join('users', 'users.id', '=', 'carts.user_id')
            ->join('foods', 'foods.id', '=', 'carts.food_id')
            ->join('restaurants', 'restaurants.id', '=', 'foods.restaurant_id')
            ->join('coupons', 'coupons.id', '=', 'foods.coupon_id')
            ->join('food_parties', 'food_parties.id', '=', 'foods.food_parties_id')
            ->whereNot('status', Cart::DELIVERED)
            ->get();
//        dd($foods);
//        foreach ($restaurants_id as $key => $restaurant_id) {
//
//            $FoodsTemp->where('restaurant_id', $restaurants_id[$key]['id']);
//        }
//        $foods = $FoodsTemp->get();
        $totalPrice = 0;
        foreach ($foods as $food) {

            $totalPrice += (int)$food->price;
        }
        return view('cart.index', compact('foods', 'totalPrice'));
    }

    public function edit(Cart $cart)
    {
        return view('cart.edit', compact('cart'));
    }

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
}
