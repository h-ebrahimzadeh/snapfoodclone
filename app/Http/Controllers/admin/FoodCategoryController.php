<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index()
    {
        $foodCategories=FoodCategory::all();
        return view('food_category.index',compact('foodCategories'));
    }
    public function create()
    {
        $this->authorize('create',FoodCategory::class);
        return view('food_category.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create',FoodCategory::class);

        $request->validate([
            'name'=>['required','string','max:255']
        ]);

        FoodCategory::create($request->only('name'));
        return redirect()->route('admin.food_categories.index');
    }

    public function edit(FoodCategory $foodCategory)
    {
        $this->authorize('update',FoodCategory::class);

        return view('food_category.edit',compact('foodCategory'));
    }

    public function update(FoodCategory $foodCategory,Request $request)
    {
        $this->authorize('update',FoodCategory::class);
        $request->validate([
            'name'=>['required','string','max:255']
        ]);
        $foodCategory-> update($request->only('name'));
        return redirect()->route('admin.food_categories.index');
    }

    public function destroy(FoodCategory $foodCategory)
    {
        $this->authorize('delete',FoodCategory::class);
        $foodCategory->delete();
        return redirect()->route('admin.food_categories.index');

    }
}
