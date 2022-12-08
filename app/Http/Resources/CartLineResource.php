<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\CartResource;
use App\Models\Cart;

class CartLineResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'uuid' => $this->uuid,
            'active' => $this->active,
            'cart_id' =>  new CartResource(Cart::findorfail($this->cart_id)),
            'units' => $this->units,
            'total_price' => $this->total_price,
            'total_price_per_unit' => $this->total_price_per_unit,
        ];
    }
}
