@extends('layouts.app')

@section('content')
  <div class="container py-3">
    <header>
      <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
          <span class="fs-4 fw-bold text-primary">Abdi Shop</span>
        </a>
  
        @include('components.navbar')
      </div>
    </header>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-8 offset-2">
        <a class="btn btn-outline-secondary mb-3" href="{{ route('homepage') }}"><i class="far fa-arrow-alt-circle-left"></i> Kembali</a>
        <div class="card shadow p-3">
          <div class="card-header">
            <h5 class="card-title text-center fw-bold text-primary text-uppercase">Detail Produk</h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-6 p-1">
                <img style="height: 100%;" src="{{ '../storage/'.$product->image }}" alt="Poto {{ $product->product_name }}"> 
              </div>
              <div class="col-6">
                <h5 class="fw-semibold">{{ $product->product_name }}</h5>
                @if ($product->discount)
                  <small class="text-decoration-line-through text-danger">{{ $product->currency }} {{ $product->price }}</small>
                  <p class="fw-bold text-primary">{{ $product->currency }} {{ $product->discount_price }}</p>
                @else
                  <p class="fw-bold text-primary">{{ $product->currency }} {{ $product->price }}</p>
                @endif
                <p>Dimensi : {{ $product->dimension }}</p>
                <p>Price Unit : {{ $product->productUnit->name }}</p>
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fas fa-shopping-cart"></i> Checkout</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection