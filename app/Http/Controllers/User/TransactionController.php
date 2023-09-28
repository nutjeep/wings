<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\VersionUpdater\Checker;

class TransactionController extends Controller
{
    public function checkout($id)
    {
        $checkout = new Checkout();
        $checkout->user_id = Auth::user()->id;
        $checkout->product_id = $id;
        $checkout->save();

        return redirect('/')->with('success', 'Produk Berhasil ditambah ke keranjang');
    }

    public function checkoutList()
    {
        $products = Checkout::with('user', 'product')
            ->where('user_id', Auth::user()->id)
            ->get();

        // dd($checkout);

        return view('user.checkout', compact('products'));
    }

    public function buy($id)
    {

    }
}
