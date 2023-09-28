<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $title = "Laporan Penjualan";

        return view('admin.report.index', compact('title'));
    }

    public function detail()
    {
        $title = "Detail Transaksi";

        return view('admin.report.detail', compact('title'));
    }
}
