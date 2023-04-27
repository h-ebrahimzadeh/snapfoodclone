<?php

use App\Http\Controllers\admin\RestaurantCategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['middleware'=>'auth'], function (){
    Route::group([
       'prefix'=>'admin',
       'middleware' => 'is_admin',
       'as' => 'admin.',
       ], function (){

            //Restaurant Category routes

            Route::get('/restaurant_categories/create',[RestaurantCategoryController::class,'create'])
                ->name('restaurant_categories.create');
            Route::post('/restaurant_categories/store',[RestaurantCategoryController::class,'store'])
                ->name('restaurant_categories.store');
            Route::get('/restaurant_categories/index',[RestaurantCategoryController::class,'index'])
                ->name('restaurant_categories.index');

            Route::get('/restaurant_categories/edit/{restaurantCategory}',[RestaurantCategoryController::class,'edit'])
                ->name('restaurant_categories.edit');
            Route::put('/restaurant_categories/update/{restaurantCategory}',[RestaurantCategoryController::class,'update'])
                ->name('restaurant_categories.update');

            Route::delete('/restaurant_categories/destroy/{restaurantCategory}',[RestaurantCategoryController::class,'destroy'])
            ->name('restaurant_categories.destroy');

            //Food Category routes

            Route::get('/food_categories/create',[FoodCategoryController::class,'create'])
                ->name('food_categories.create');
            Route::post('/food_categories/store',[FoodCategoryController::class,'store'])
                ->name('food_categories.store');
            Route::get('/food_categories/index',[FoodCategoryController::class,'index'])
                ->name('food_categories.index');

            Route::get('/food_categories/edit/{foodCategory}',[FoodCategoryController::class,'edit'])
                ->name('food_categories.edit');
            Route::put('/food_categories/update/{foodCategory}',[FoodCategoryController::class,'update'])
                ->name('food_categories.update');

            Route::delete('/food_categories/destroy/{foodCategory}',[FoodCategoryController::class,'destroy'])
            ->name('food_categories.destroy');
    });
});
