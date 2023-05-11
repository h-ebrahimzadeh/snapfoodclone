<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index()
    {
        $foods=Food:: all();

        return response()->json(FoodResource::collection($foods));
    }

    public function show(Food $food)
    {
        return response()->json(new FoodResource($food));
    }

    public function showRestaurantFoods(Restaurant $restaurant)
    {
        $foods=Food::where('restaurant_id',$restaurant->id)->get();

        return response()->json(FoodResource::collection($foods));
    }
}
