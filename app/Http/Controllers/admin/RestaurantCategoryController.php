<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    public function index()
    {
        $restaurantCategories=RestaurantCategory::all();
        return view('restaurant_category.index',compact('restaurantCategories'));
    }
    public function create()
    {
        $this->authorize('create',RestaurantCategory::class);
        return view('restaurant_category.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create',RestaurantCategory::class);

        $request->validate([
            'name'=>['required','string','max:255']
        ]);

        RestaurantCategory::create($request->only('name'));
        return redirect()->route('admin.restaurant_categories.index');
    }

    public function edit(RestaurantCategory $restaurantCategory)
    {
        $this->authorize('update',RestaurantCategory::class);

        return view('restaurant_category.edit',compact('restaurantCategory'));
    }

    public function update(RestaurantCategory $restaurantCategory,Request $request)
    {
        $this->authorize('update',RestaurantCategory::class);
        $request->validate([
            'name'=>['required','string','max:255']
        ]);
        $restaurantCategory-> update($request->only('name'));
        return redirect()->route('admin.restaurant_categories.index');
    }

    public function destroy(RestaurantCategory $restaurantCategory)
    {
        $this->authorize('delete',RestaurantCategory::class);
        $restaurantCategory->delete();
        return redirect()->route('admin.restaurant_categories.index');

    }
}
