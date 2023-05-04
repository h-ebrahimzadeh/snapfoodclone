<?php

namespace App\Http\Resources;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'phone_number'=>$this->phone_number,
            'address'=>[
               'address'=> $this->addresses()->address,
                'latitude'=>$this->addresses->address
            ]
        ];
    }
}
