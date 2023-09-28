@extends('layouts.app-dashboard')

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
      <button class="btn btn-primary" data-toggle="modal" data-target="#add">Tambah item</button>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card shadow">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <th>No</th>
                <th>Satuan Produk</th>
                <th>Action</th>
              </thead>
              <tbody>
                @foreach ($productUnit as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td class="d-flex flex-wrap">
                    <button style="border:none;" class="badge badge-warning m-1" data-toggle="modal" data-target="#update_{{ $item->id }}"><i class="far fa-edit p-1"></i></button>
                    <form action="{{ route('delete.product.unit', $item->id) }}" method="post">
                      @method('delete')
                      @csrf
                      <button style="border:none;" type="submit" class="badge badge-danger m-1"><i class="far fa-trash-alt p-1"></i></button>
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

    <!-- Modal | Add Product Type -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="{{ route('store.product.unit') }}" method="post">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="addLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Satuan Produk</label>
                <input type="text" class="form-control" name="name" placeholder="Ex: Pcs">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn text-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  
    <!-- Modal | Update Product Type -->
    @foreach ($productUnit as $item)
      <div class="modal fade" id="update_{{ $item->id }}" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <form action="{{ route('update.product.unit', $item->id) }}" method="post">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="">Satuan Produk</label>
                  <input type="text" class="form-control" name="name" value="{{ $item->name }}">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn text-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endforeach
@endsection