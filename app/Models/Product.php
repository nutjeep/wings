<?php

namespace App\Models;

use App\Models\Checkout;
use App\Models\ProductType;
use App\Models\ProductUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function productUnit() {
        return $this->belongsTo(ProductUnit::class, 'product_unit_id', 'id');
    }

    public function productType(){
        return $this->belongsTo(ProductType::class);
    }

    public function transactionDetail(){
        return $this->hasMany(TransactionDetail::class, 'product_id', 'id');
    }
    
    public function checkout() {
        return $this->hasMany(Checkout::class, 'product_id', 'id');
    }
}
