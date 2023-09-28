@extends('layouts.app-dashboard')

@push('app-dashboard-styles')
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
  <div class="row">
    <div class="col-12">
      <!-- DataTables Example -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Transaksi</th>
                  <th>Produk</th>
                  <th>Quantity</th>
                  <th>Total Harga</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>TRX-001</td>
                  <td>Lee Mineral</td>
                  <td>10</td>
                  <td>Rp50000</td>
                  <td class="d-flex flex-wrap">
                    <a href="{{ route('transaction.detail') }}" class="badge badge-primary m-1"><i class="far fa-eye p-1"></i></a>
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

@push('app-dashboard-scripts')
  <!-- Page level plugins -->
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endpush