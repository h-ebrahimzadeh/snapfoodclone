<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons=Coupon::all();
        return view('coupon.index',compact('coupons'));
    }
    public function create()
    {
        $this->authorize('create',Coupon::class);
        return view('coupon.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create',Coupon::class);

//        $request->validate([
//            'name'=>['required','string','max:255']
//        ]);

        Coupon::create($request->only('code','ends_at','discount'));
        return redirect()->route('seller.coupon.index');
    }

    public function edit(Coupon $coupon)
    {
        $this->authorize('update',Coupon::class);

        return view('coupon.edit',compact('coupon'));
    }

    public function update(Coupon $coupon,Request $request)
    {
        $this->authorize('update',Coupon::class);
//        $request->validate([
//            'name'=>['required','string','max:255']
//        ]);
        $coupon-> update($request->only('code','ends_at','discount'));
        return redirect()->route('seller.coupon.index');
    }

    public function destroy(Coupon $coupon)
    {
        $this->authorize('delete',Coupon::class);
        $coupon->delete();
        return redirect()->route('seller.coupon.index');

    }
}
