<?php

namespace App\Http\Resources;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
//    private Food $food;


//    public function __construct($resource,Food $food)
//    {
//        parent::__construct($resource);
//
//        $this->food=$food;
//    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd(Food::where('id',$this->food_id)->restaurant()->restaurant);
        return [
            'carts:'=>[
                'id'=>$this->id,
                'restaurant'=>RestaurantResource::collection($this->foods),
                'foods'=>FoodResource::collection($this->foods),
                'count'=>$this->count
            ]
        ];
    }
}
