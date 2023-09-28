<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index ()
    {
        $title  = "Dashboard";
        $products = Product::get();

        return view('admin.dashboard', compact('title', 'products'));
    }
}
