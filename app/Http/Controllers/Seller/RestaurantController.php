<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\AddressRestaurant;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants=Restaurant::where('user_id',auth()->id())->get();
        return view('restaurant.index',compact('restaurants'));
    }
    public function create()
    {
        $this->authorize('create',Restaurant::class);

        $restaurant_categories=RestaurantCategory::all();
        return view('restaurant.create',compact('restaurant_categories'));
    }

    public function store(Request $request)
    {

        $this->authorize('create',Restaurant::class);

        $request->validate([
            'name'=>['required','string','max:255'],
            'restaurant_category'=>['required'],
            'phone_number'=>['required','regex:/^0\d{2,3}-\d{8}$/'],
            'address'=>'required',

            'account_number'=>'required|size:16',
//            'lat'=>'required',
//            'lng'=>'required'

        ]);

        $restaurant=[
            'name'=> $request->name,
            'restaurant_categories_id'=>$request->restaurant_category,
            'phone_number'=>$request->phone_number,
            'account_number'=>$request->account_number,
            'user_id'=>auth()->id(),
            'address'=>$request->address,
            'latitude'=>$request->lng,
            'longitude'=>$request->lat
        ];

        $address=[
            'address'=>$request->address,
            'title'=>$request->address_title
        ];
        Restaurant::create($restaurant);


        return redirect()->route('seller.restaurant.index');
    }

    public function edit(Restaurant $restaurant)
    {
        $this->authorize('update',Restaurant::class);
        $restaurant_categories=RestaurantCategory::all();
        return view('restaurant.edit',compact('restaurant','restaurant_categories'));
    }

    public function update(Restaurant $restaurant,Request $request)
    {
        $this->authorize('update',Restaurant::class);
        $request->validate([
            'name'=>['required','string','max:255'],
            'restaurant_category'=>['required'],
            'phone_number'=>['required','regex:/^0\d{2,3}-\d{8}$/'],
            'address'=>'required',
            'account_number'=>'required|size:16'
        ]);

        $placeholder=[
            'name'=> $request->name,
            'restaurant_categories_id'=>$request->restaurant_category,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address,
            'account_number'=>$request->account_number,
            'user_id'=>auth()->id()
        ];
        $restaurant-> update($placeholder);
        return redirect()->route('seller.restaurant.index');
    }

    public function destroy(Restaurant $restaurant)
    {
        $this->authorize('delete',Restaurant::class);
        $restaurant->delete();
        return redirect()->route('seller.restaurant.index');

    }
}
