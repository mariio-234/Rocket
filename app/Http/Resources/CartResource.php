<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\CartLine;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uuid' => $this->uuid,
            'active' => $this->active,
            'order_id' => $this-> order_id,
            'user_id' => $this->user_id,
            'coupon' => $this->coupon,
            'cart_lines' => CartLineResource::collection($this->cart_lines)

        ];
    }

}
