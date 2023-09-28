@extends('layouts.app-auth')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
          </div>
          <form action="{{ route('auth') }}" method="post" class="user">
            @csrf
            <div class="form-group">
              <input type="email" class="form-control form-control-user" placeholder="Enter Email Address..." name="email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-user" placeholder="Password" id="password" name="password">
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox small">
                <input type="checkbox" class="custom-control-input" id="showPassword">
                <label class="custom-control-label" for="showPassword">Show Password</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user">Login</button>
            <hr>
          </form>
          <div class="text-center">
            <a class="small" href="{{ route('register') }}">Create an Account!</a>
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