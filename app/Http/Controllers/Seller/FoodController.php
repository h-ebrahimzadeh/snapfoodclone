<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\FoodParty;
use App\Models\Restaurant;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FoodController extends Controller
{
    public function index()
    {
        $foods=Food::paginate(1);
        return view('food.index',compact('foods'));
    }
    public function create()
    {
        $this->authorize('create',Food::class);

        $food_categories=FoodCategory::all();
        $coupons=Coupon::all();
        $food_parties=FoodParty::all();
        $restaurants=Restaurant::where('user_id',auth()->id())->get();




        return view('food.create',compact('restaurants','food_categories','coupons','food_parties'));
    }

    public function store(Request $request)
    {



        $this->authorize('create',Food::class);

        $request->validate([
            'name'=>['required','string','max:255'],
            'food_category'=>['required'],
            'materials'=>['string'],
            'image'=>'mimes:jpg,jpeg,png',
            'price'=>'required',
            'restaurant'=>'required',

        ]);
        if (!empty($request->image))
        {
            $storage = Storage::disk('snap-food');

            $path = date('Y/m/d');
            $imageName = time().'-'.'foodImg'.'.'.$request->image->extension();

            $path_image=$storage->putFileAs("images/$path",$request->image,$imageName);
        }


        $food=[
            'name'=>$request->name,
            'food_categories_id'=>$request->food_category,
            'materials'=>$request->materials ?? '',
            'image'=>$path_image ?? '',
            'price'=>$request->price,
            'coupon_id'=>$request->coupon,
            'food_parties_id'=>$request->food_party ,
            'restaurant_id'=>$request->restaurant,

        ];
        Food::create($food);
        return redirect()->route('seller.food.index');
    }

    public function edit(Food $food)
    {
        $this->authorize('update',Food::class);
        $food_categories=FoodCategory::all();
        $coupons=Coupon::all();
        $food_parties=FoodParty::all();
        $restaurants=Restaurant::where('user_id',auth()->id())->get();
        return view('food.edit',compact('restaurants','food_categories','coupons','food_parties','food'));
    }

    public function update(Food $food,Request $request)
    {
        $this->authorize('update',Food::class);
        $request->validate([
            'name'=>['required','string','max:255'],
            'food_category'=>['required'],
            'materials'=>['string'],
            'image'=>'mimes:jpg,jpeg,png',
            'price'=>'required',
            'restaurant'=>'required',

        ]);
        $storage = Storage::disk('snap-food');

        $path = date('Y/m/d');
        $imageName = time().'-'.'foodImg'.'.'.$request->image->extension();

        $path_image=$storage->putFileAs("images/$path",$request->image,$imageName);

        $placeholder=[
            'name'=>$request->name,
            'food_categories_id'=>$request->food_category,
            'materials'=>$request->materials ?? '',
            'image'=>$path_image ?? '',
            'price'=>$request->price,
            'coupon_id'=>$request->coupon,
            'food_parties_id'=>$request->food_party ,
            'restaurant_id'=>$request->restaurant,

        ];
        $food-> update($placeholder);
        return redirect()->route('seller.food.index');
    }

    public function destroy(Food $food)
    {
        $this->authorize('delete',Food::class);
        $food->delete();
        $storage = Storage::disk('snap-food');
        $storage->delete($food->image);
        return redirect()->route('seller.food.index');

    }
}
