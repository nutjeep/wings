<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Product;
use App\Models\ProductType;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $title = 'Semua Produk';
        $products = Product::with('productType', 'productUnit')->get();

        return view('admin.product.index', compact('title', 'products'));
    }

    public function create()
    {
        $title = 'Tambah Produk';
        $productType = ProductType::get();
        $productUnit = ProductUnit::get();

        return view('admin.product.create', compact('title', 'productUnit', 'productType'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'product_code'      => 'required',
            'product_name'      => 'required',
            'image'             => '',
            'currency'          => 'required',
            'price'             => 'required',
            'discount'          => '',
            'discount_price'    => '',
            'dimension'         => 'required',
            'product_unit_id'   => 'required',
            'product_type_id'   => 'required',
        ]);

        if($request->hasFile('image')) {
            $validation['image'] = $request->file('image')->store('product-images');
        }

        if($request->discount) {
            $discountPrice = $request->price * ($request->discount / 100);
            $lastPrice = $request->price - $discountPrice;

            $validation['discount_price'] = $lastPrice;
        }

        Product::create($validation);

        return redirect()->route('products')->with('success', 'Produk berhasil ditambah');
    }

    public function edit ($id)
    {
        $title = 'Edit Produk';
        $product = Product::where('id', $id)->first();
        $productType = ProductType::get();
        $productUnit = ProductUnit::get();

        return view('admin.product.edit', compact('title', 'product', 'productUnit', 'productType'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();

        $validation = $request->validate([
            'product_code'      => 'required',
            'product_name'      => 'required',
            'image'             => '',
            'currency'          => 'required',
            'price'             => 'required',
            'discount'          => '',
            'discount_price'    => '',
            'dimension'         => 'required',
            'product_unit_id'   => 'required',
            'product_type_id'   => 'required',
        ]);

        if($request->hasFile('image')) {
            unlink('storage/' . $product->image);
            $validation['image'] = $request->file('image')->store('product-images');
        } else {
            $validation['image'] = $product->image;   
        }

        if($request->discount) {
            $discountPrice = $request->price * ($request->discount / 100);
            $lastPrice = $request->price - $discountPrice;
            $validation['discount_price'] = $lastPrice;
        } else {
            $validation['discount_price'] = $product->discount_price;
        }

        $product->update($validation);
        return redirect()->route('products')->with('success', 'Produk '. $product->product_name .' berhasil diubah');
    }

    public function delete($id)
    {
        $product = Product::firstwhere('id', $id);
        unlink('storage/' . $product->image);
        $product->delete();

        return redirect()->route('products')->with('success', 'Produk berhasil dihapus');
        
    }
}
