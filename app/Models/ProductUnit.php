<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductUnit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product() {
        return $this->hasMany(Product::class, 'product_unit_id', 'id');
    }
}
