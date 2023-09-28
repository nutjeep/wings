<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductUnit;
use Illuminate\Http\Request;

class ProductUnitController extends Controller
{
    public function index()
    {
        $title = 'Satuan Produk';
        $productUnit = ProductUnit::get();

        return view('admin.product.product-unit', compact('title', 'productUnit'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'  => 'required',
        ]);

        ProductUnit::create($validation);
        return redirect()->route('product.unit')->with('success', 'Item berhasil ditambah');
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name'  => 'required',
        ]);

        $productUnit = ProductUnit::where('id', $id)->first();
        $productUnit->update($validation);

        return redirect()->route('product.unit')->with('success', $productUnit->name.' berhasil diubah');
    }

    public function delete($id)
    {
        $productUnit = ProductUnit::where('id', $id)->first();
        $productUnit->delete();

        return redirect()->route('product.unit')->with('success', $productUnit->name .' berhasil dihapus');
    }
}
