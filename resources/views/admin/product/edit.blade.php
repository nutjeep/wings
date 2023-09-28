@extends('layouts.app-dashboard')

@section('content')
<div class="row mb-2">
  <div class="col-12">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>
</div>

<form action="{{ route('update.product', $product->id) }}" method="post" enctype="multipart/form-data">
  <div class="row">
    @csrf
    <div class="col-6">
      <div class="form-group">
        <label for="">Kode Produk</label>
        <input type="text" class="form-control" name="product_code" value="{{ old('product_code', $product->product_code) }}">
      </div>
      <div class="form-group">
        <label for="">Nama Produk</label>
        <input type="text" class="form-control" name="product_name" value="{{ old('product_name', $product->product_name) }}">
      </div>
      <div class="form-group">
        <label for="">Sampul Produk</label>
        <input type="file" class="form-control" name="image">
      </div>
      <div class="form-group">
        <label for="">Satuan Produk</label>
        <select name="product_unit_id" class="form-control">
          @foreach ($productUnit as $item)
            @if (old('product_unit_id', $product->product_unit_id) == $item->id)
              <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
            @else
              <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endif
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="">Jenis Produk</label>
        <select name="product_type_id" class="form-control">
          @foreach ($productType as $item)
            @if (old('product_type_id', $product->product_type_id) == $item->id)
              <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
            @else
              <option value="{{ $item->id }}" >{{ $item->name }}</option>
            @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="">Dimensi Produk</label>
        <input type="text" class="form-control" name="dimension" value="{{ old('dimension', $product->dimension) }}">
      </div>
      <div class="form-group">
        <label>Currency</label>
        <input type="text" class="form-control" id="price" name="currency" value="{{ old('currency', $product->currency) }}">
      </div>
      <div class="form-group">
        <label>Harga Produk</label>
        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
      </div>
      <div class="form-group">
        <label for="inlineFormInputGroup">Discount</label>
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <div class="input-group-text">%</div>
          </div>
          <input type="text" name="discount" class="form-control" id="inlineFormInputGroup" value="{{ old('discount', $product->discount) }}">
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12 d-flex justify-content-end">
      <a href="{{ route('products') }}" class="btn text-danger">Kembali</a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection