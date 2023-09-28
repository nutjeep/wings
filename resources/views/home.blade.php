@extends('layouts.app')

@section('content')
{{-- @dd(count(Auth::user()->checkout)) --}}
<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4 fw-bold text-primary">Abdi Shop</span>
      </a>

      @include('components.navbar')
    </div>

    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
      <h1 class="display-4 fw-normal">Produk Kami</h1>
      <h4 class="text-center">Kategori Produk</h4>
      <div class="d-flex justify-content-center">
        @foreach ($productType as $item)
          <a href="{{ route('categories', $item->id) }}" class="mx-3 text-secondary">{{ $item->name }}</a>
        @endforeach
      </div>
    </div>
  </header>

  <div class="container">
    <div class="col-12">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    </div>
  </div>
</div>

<main>
  <div class="album py-5 bg-light">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($products as $item)
          <div class="col">
            <div class="card shadow-sm" style="height: 430px;">
              <img src="{{ 'storage/'.$item->image }}" class="card-img-top" alt="Poto {{ $item->product_name }}">
              <div class="card-body">
                <h5 class="card-title fw-semibold">{{ $item->product_name }}</h5>
                <p class="fst-italic">{{ $item->productType->name }}</p>

                @if ($item->discount)
                  <small class="text-decoration-line-through text-danger">{{ $item->currency }} {{ $item->price }}</small>
                  <p class="fw-bold text-primary">{{ $item->currency }} {{ $item->discount_price }}</p>
                @else
                  <p class="fw-bold text-primary">{{ $item->currency }} {{ $item->price }}</p>
                @endif

                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="{{ route('detail.product', $item->id) }}" class="btn btn-sm btn-primary"><i class="far fa-eye"></i> Detail</a>
                    <form action="{{ route('checkout', $item->id) }}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-sm btn-outline-secondary"><i class="fas fa-shopping-cart"></i> Checkout</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </div>
</main>
@endsection