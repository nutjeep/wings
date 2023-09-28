@extends('layouts.app-dashboard')

@push('app-dashboard-styles')
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
  <div class="row mb-1">
    <div class="col-12">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    </div>
  </div>
  <div class="row mb-3">
    <div class="col-12">
      <a href="{{ route('add.product') }}" class="btn btn-primary">Tambah Item</a>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
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
                  <th>Kode Produk</th>
                  <th>Produk</th>
                  <th>Jenis</th>
                  <th>Satuan</th>
                  <th>Dimensi</th>
                  <th>Diskon</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Kode Produk</th>
                  <th>Produk</th>
                  <th>Jenis</th>
                  <th>Satuan</th>
                  <th>Dimensi</th>
                  <th>Diskon</th>
                  <th>Harga</th>
                  <th>Action</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($products as $item)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->product_code }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->productType->name }}</td>
                    <td>{{ $item->productUnit->name }}</td>
                    <td>{{ $item->dimension }}</td>
                    <td>@if($item->discount == null) 0 @else {{ $item->discount }}% @endif</td>
                    <td>@if($item->discount_price) {{ $item->currency ." ". $item->discount_price }} @else {{ $item->currency ." ".  $item->price }} @endif</td>
                    <td class="d-flex flex-wrap">
                      <a href="{{ route('edit.product', $item->id) }}" class="badge badge-warning m-1"><i class="fas fa-edit p-1"></i></a>
                      <form action="{{ route('delete.product', $item->id) }}" method="post">
                        @method('delete')
                        @csrf
                        <button style="border: none;" type="submit" class="badge badge-danger m-1"><i class="fas fa-trash p-1"></i></button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@push('app-dashboard-scripts')
  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endpush