<?php

namespace App\Http\Resources\Product;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'prices' => $this->price,
            'discount' => $this->discount,
            'totalPrice'=>round((1-($this->discount/100))* $this->price,2),
            'rating' => $this->reviews->count() > 0 ?round($this->reviews->sum('star')/$this->reviews->count(),2): "No rating yet",

            // 'herf' => [
            //     'link' => route('reviews.index', $this->id)
            // ]

        ];
    }
}
