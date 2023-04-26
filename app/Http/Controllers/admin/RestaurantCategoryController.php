<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantCategory;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    public function create()
    {
        $this->authorize('create',RestaurantCategory::class);
        return view('restaurant_category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','max:255']
        ]);


    }
}
