<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\AddressResource;
use App\Models\AddressUser;
use App\Models\User;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AddressUserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'address' => ['required', 'unique:addresses_user,address'],
            'latitude'=>'required',
            'longitude'=>'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
//
        $response = Http::withHeaders([
            'Api-Key' => 'service.209e9fb8939a4c30aaf0eb9f13562418',
            'Content-Type' => 'application/json'
        ])->get('https://api.neshan.org/v4/geocoding', [
            'address' => $request->address
        ]);
        $location = json_decode($response);

        if ($request->latitude!=$location->location->x && $request->longitude!=$location->location->y)
        {

            return response()->json(['error-address created unsuccessfully.']);

        }
        $address = AddressUser::create([
            'title' => $request->title,
            'address' => $request->address,
            'latitude' => $location->location->x,
            'longitude' => $location->location->y,
            'user_id' => auth()->id()
        ]);

        return response()->json(['address created successfully.', new AddressResource($address)]);


    }

    public function index()
    {
        $addresses = AddressUser::where('user_id', auth()->id())->get();
        return response()->json(['user Addresses:', $addresses]);
    }

    public function update(Request $request, $id)
    {

        $addressUser=AddressUser::find($id);
        $validator = Validator::make($request->all(), [
            'title' => 'nullable',
            'address' => ['nullable', Rule::unique('addresses_user', 'address')->ignoreModel($addressUser)]

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $addressUser->update($validator->validated());

        return response()->json(['msg'=>'current address updated successfully']);
    }

}
