<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


class BannerController extends Controller
{
    public function create()
    {
        return view('banner.create');
    }

    public function store(BannerRequest $request)
    {

        $storage = Storage::disk('snap-food');

        $path = date('Y/m/d');
        $imageName = time().'-'.'bannerImg'.'.'.$request->image->extension();

        $path_image=$storage->putFileAs("banners/$path",$request->image,$imageName);


        Banner::create($request->validated());
//        return redirect()->route('seller.food.index');
        Session::put('message','set is banner');
//        return back();


    }
}
