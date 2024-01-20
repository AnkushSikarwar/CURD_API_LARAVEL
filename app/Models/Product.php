<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
class Product extends Model
{
    use HasFactory;
    protected $fillablle =[
        'name','description','price','discount'
    ];
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
