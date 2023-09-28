<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    public function index()
    {
        $title = 'Jenis Produk';
        $productType = ProductType::get();

        return view('admin.product.product-type', compact('title', 'productType'));
    }

    public function store(Request $request) 
    {
        $validation = $request->validate([
            'name'  => 'required',
        ]);

        ProductType::create($validation);
        return redirect()->route('product.type')->with('success', 'Item berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name'  => 'required',
        ]);

        $productType = ProductType::where('id', $id)->first();
        $productType->update($validation);

        return redirect()->route('product.type')->with('success', $productType->name.' berhasil diubah');
    }

    public function delete($id)
    {
        $productType = ProductType::where('id', $id)->first();
        $productType->delete();

        return redirect()->route('product.type')->with('success', $productType->name .' berhasil dihapus');
    }
}
