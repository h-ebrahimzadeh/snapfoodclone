<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return response()->json(['Restaurants:', RestaurantResource::collection($restaurants)]);

    }

    public function show(Restaurant $restaurant)
    {
        return response()->json(['restaurant:', new RestaurantResource($restaurant)]);

    }
}
