<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        $restaurants_id = Restaurant::where('user_id', auth()->id())->get();

        $FoodsTemp = (new Cart())->foods;
        dd($FoodsTemp);

        foreach ($restaurants_id as $key => $restaurant_id) {

            $FoodsTemp->where('restaurant_id', $restaurants_id[$key]['id']);
        }
        $foods = $FoodsTemp->get();
        return view('dashboard', compact('foods'));
    }
}
