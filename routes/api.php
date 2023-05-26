<?php

use App\Http\Controllers\API\AddressUserController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\Api\FoodController;
use App\Http\Controllers\API\ReplyController;
use App\Http\Controllers\API\RestaurantController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Seller\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/addresses', [AddressUserController::class,'index']);
    Route::post('/address/store', [AddressUserController::class,'store']);
    Route::put('/address/update/{id}', [AddressUserController::class,'update']);

    Route::put('/users/update/{user}',[UserController::class,'update']);

    Route::get('/restaurants',[RestaurantController::class,'index']);
    Route::get('/restaurant/{restaurant}',[RestaurantController::class,'show']);

    //foods
    Route::get('/foods',[FoodController::class,'index']);
    Route::get('/restaurants/{restaurant}/foods',[FoodController::class,'show']);
    Route::get('/foods/{food}',[FoodController::class,'show']);
    Route::get('/restaurants/{restaurant}/foods',[FoodController::class,'showRestaurantFoods']);


    //carts
    Route::post('/cart_items/add', [CartController::class,'store']);
    Route::get('/cart_items',[CartController::class,'index']);
    Route::put('/cart_items/update/{id}', [CartController::class,'update']);
//    Route::get('/carts/{cart}',[CartController::class,'show']);
    Route::delete('/cart_items/destroy/{id}',[CartController::class,'destroy']);
    Route::get('/carts/confirm_cart',[CartController::class,'confirmCart']);
    Route::delete('/carts/destroy_cart/{cart_number}',[CartController::class,'destroyCart']);
    Route::get('/carts',[CartController::class,'cartIndex']);

    //orders
    Route::get('/orders/payment_order/{cart_number}/{restaurant_id}', [OrderController::class,'paymentOrder']);




    //comment
    Route::post('/comments/add/{order}', [CommentController::class,'store']);

    //reply
    Route::post('/replies/add/{comment}', [ReplyController::class,'store']);

    //near Restaurants
    Route::get('/near_restaurants',[RestaurantController::class,'nearRestaurant']);


    //logout
    Route::post('/logout',[AuthController::class,'logout']);


});

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);


