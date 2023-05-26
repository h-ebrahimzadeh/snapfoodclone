<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\AddressUser;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function nearRestaurant()
    {
        $address_user=AddressUser::where('user_id',auth()->id())->first();

        $radius_km = 5;
        $sql_distance = " ,(((acos(sin((".$address_user->latitude."*pi()/180)) * sin((`p`.`latitude`*pi()/180))+cos((".$address_user->latitude."*pi()/180)) * cos((`p`.`latitude`*pi()/180)) * cos(((".$address_user->longitude."-`p`.`longitude`)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance ";

        $having = " HAVING (distance <= $radius_km) ";
        $order_by = ' distance ASC ';
        $sql = "SELECT p.*".$sql_distance." FROM places p $having ORDER BY $order_by";

//        $restaurants = DB::table('restaurants','p')
//            ->select('p.*',"$sql_distance as distance")
//            ->having('distance' <= $radius_km)
//            ->orderByDesc('distance')
//            ->get();
$restaurants=Restaurant::all();
$trueRestaurants=[];
        foreach ($restaurants as $restaurant)
        {
            $distance= (((acos(sin(($address_user->latitude*pi()/180)) * sin(($restaurant->latitude*pi()/180))+cos(($address_user->latitude*pi()/180)) * cos(($restaurant->latitude*pi()/180)) * cos((($address_user->longitude-$restaurant->longitude)*pi()/180))))*180/pi())*60*1.1515*1.609344);

            if($distance<$radius_km)
            {
                 $trueRestaurants[]=$restaurant;
            }

        }

        return response()->json($trueRestaurants);




    }
}
