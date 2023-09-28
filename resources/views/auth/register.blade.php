@extends('layouts.app-auth')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="row">
    <div class="col-12">
      @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>Success!</strong> {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    </div>
  </div>

  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Daftar Akun Baru</h1>
          </div>
          <form class="user" action="{{ route('registration') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control form-control-user" placeholder="Your name..." name="name">
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control form-control-user" placeholder="Your Email Address..." name="email">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" id="password" class="form-control form-control-user" placeholder="Password" name="password">
            </div>
            <div class="form-group">
              <input type="checkbox" id="showPassword">
              <label for="" class="small">Show Password</label>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
            <hr>
          </form>
          <div class="text-center">
            <a class="small" href="{{ route('login') }}">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('app-auth-scripts')
  <script>
    document.getElementById('showPassword').addEventListener('change', function() {
      var passwordInput = document.getElementById('password');
      if (this.checked) {
        passwordInput.type = 'text';
      } else {
        passwordInput.type = 'password';
      }
    });
  </script>
@endpush