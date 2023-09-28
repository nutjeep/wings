<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        $products   = Product::with('productType')->get();
        $productType = ProductType::get();

        return view('home', compact('products', 'productType'));
    }

    public function categories($id)
    {
        $products = Product::with('productType')->where('product_type_id', $id)->get();
        $productType = ProductType::get();

        return view('categories', compact('products', 'productType'));
    }

    public function detailProduct($id)
    {
        $product = Product::with('productType', 'productUnit')->where('id', $id)->first();

        return view('detail-product', compact('product'));
    }
}
