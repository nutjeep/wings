@extends('layouts.app-dashboard')

@section('content')
  <div class="row mb-3">
    <div class="col-12">
      <a href="{{ route('reports') }}" class="btn btn-sm btn-outline-dark font-italic">Kembali</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header">
          <h6 class="m-0 font-weight-bold text-primary">Nama Produk</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Transaksi</th>
                  <th>Tanggal</th>
                  <th>User</th>
                  <th>Produk</th>
                  <th>Quantity</th>
                  <th>Total Harga</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>TRX - 001</td>
                  <td>12-10-2020</td>
                  <td>John Smith</td>
                  <td>Lee Mineral</td>
                  <td>10</td>
                  <td>Rp50000</td>
                  <td>
                    <a href="" class="badge badge-success m-1"><i class="fas fa-print p-1"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection