<?php

namespace App\Models;

use App\Models\Product;
use App\Models\TransactionHeader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product(){
        return $this->hasOne(Product::class);
    }
}
