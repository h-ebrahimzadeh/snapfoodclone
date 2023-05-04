<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'address' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
        dd(app('geocoder')->geocode('Los Angeles, CA')->get());

//        $address = $request->address;
//        $result = app('geocoder')->geocode($address)->get();
//        $coordinates = $result[0]->getCoordinates();
//        $lat = $coordinates->getLatitude();
//        $long = $coordinates->getLongitude();



        $address = Address::create([
            'title' => $request->title,
            'address' => $request->address,
            'latitude'=>$lat,
            'longitude'=>$long,
            'user_id'=>auth()->id()
        ]);

        return response()->json(['address created successfully.', new AddressResource($address)]);
    }
}
