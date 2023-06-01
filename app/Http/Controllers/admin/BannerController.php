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
    public function store(BannerRequest $request)
    {
        $request->validated();
        $storage = Storage::disk('snap-food');


        $imageName = time() . '-' . 'bannerImg' . '.' . $request->image->extension();

        $path_image = $storage->putFileAs("banners", $request->image, $imageName);

        $banner = [
            'image' => $path_image
        ];

        Banner::create($banner);
        Session::flash('message', 'set is banner');
        return back();


    }

    public function create()
    {
        return view('banner.create');
    }

    public function index()
    {
        $banners=Banner::paginate(1);

        return view('banner.index',compact('banners'));
    }

    public function update(Request $request,Banner $banner)
    {
        $banners=Banner::all();

        foreach ($banners as $bannerItem)
        {
            $bannerItem->update(['selected'=>0]);
        }

        $banner->update(['selected'=> 1]);
    }
}
