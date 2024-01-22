<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           'name' => $this->name,
           'totalPrice'=>round((1-($this->discount/100))* $this->price,2),
           'rating' => $this->reviews->count() > 0 ?round($this->reviews->sum('star')/$this->reviews->count(),2): "No rating yet",

           'herf' => [
            'link'=> route('products.show', $this->id)
           ]
        ];
    }
}
