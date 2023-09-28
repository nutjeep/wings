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
      <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
          <h1 class="text-center">Checkout</h1>
      </div>
    </header>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-8 offset-2">
        {{-- <a class="btn btn-outline-secondary mb-3" href="{{ route('homepage') }}"><i class="far fa-arrow-alt-circle-left"></i> Kembali</a> --}}

        <div class="card shadow p-3">
          <div class="card-body">
            @foreach ($products as $item)
              <div class="row product">
                <div class="col-5 p-1">
                  <img class="card-img-top" style="height: 100%;" src="{{ 'storage/'.$item->product->image }}" alt="Poto"> 
                </div>
                <div class="col-7">
                  <h5 class="fw-semibold">{{ $item->product->product_name }}</h5>

                  @if ($item->product->discount)
                    <div class="form-group mb-3">
                      <label for="">Harga : </label>
                      <small class="text-decoration-line-through text-danger">{{ $item->product->currency }} {{ $item->product->price }}</small>
                      <p class="fw-bold text-primary">{{ $item->product->currency }} <span id="spanprice">{{ $item->product->discount_price }}</span></p>
                      {{-- <input type="text" class="form-control" id="price" value="{{ $item->product->discount_price }}" readonly> --}}
                    </div>
                  @else
                    <label for="">Harga : </label>
                    <p class="fw-bold text-primary">{{ $item->product->currency }} <span id="spanprice">{{ $item->product->price }}</span></p>
                    {{-- <div class="form-group mb-3">
                      <label for="">Harga</label>
                      <input type="text" class="form-control" id="price" value="{{ $item->product->price }}">
                    </div> --}}
                  @endif

                  <div class="form-group mb-3">
                    <label for="">Quantity : </label>
                    <input class="form-control" type="number" name="quantity" id="quantity" value="0">
                  </div>
                  <div class="form-group">
                    {{-- <input type="text" class="form-control" id="subtotal" readonly> --}}
                    <h5>Subtotal : <span id="subtotal">0</span></h5>
                  </div>
                </div>
              </div>
              <hr>
            @endforeach
            <form action="{{ route('buy') }}" method="post">
              @csrf
              <div class="text-center">
                <h4 class="fw-bold d-flex">
                  Total Harga
                  <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="addon-wrapping">Rp</span>
                    <input type="text" class="form-control" id="totalHarga">
                  </div>
                </h4>
                {{-- <h3 class="fw-bold">Total Harga : <span id="totalHarga">0</span></h3> --}}
                <button type="submit" class="btn btn-primary" style="display: block; width:100%;">BUY</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('app-scripts')
  <script>

    // Menghitung subtotal
    function updateSubtotal() {
      const products = document.querySelectorAll('.product');

      let totalHarga = 0;

      products.forEach((product, index) => {
        const kuantitas = parseFloat(product.querySelector('#quantity').value) || 0;
        /* const harga = parseFloat(product.querySelector('#price').value) || 0; */
        const harga = product.querySelector('#spanprice').textContent;
        const subtotal = kuantitas * harga;

        product.querySelector('#subtotal').textContent = "Rp " + subtotal;

        // Menghitung total harga
        totalHarga += subtotal;
      });

      // Menampilkan total harga
      /* document.getElementById("totalHarga").textContent = "Rp " + totalHarga; */
      document.getElementById("totalHarga").value = totalHarga;
    }

    // Menambahkan event listener ke setiap input
    const inputs = document.querySelectorAll('#quantity, #spanprice');
    inputs.forEach(input => {
      input.addEventListener("input", updateSubtotal);
    });
  </script>          
@endpush