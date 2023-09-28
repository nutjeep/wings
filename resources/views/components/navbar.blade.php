<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">

  @if (Auth::user())
    <a class="btn btn-primary position-relative mx-1" href="{{ route('checkout.list') }}">
      <i class="fas fa-shopping-cart"></i>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        @if (Auth::user()->checkout)
          {{ count(Auth::user()->checkout) }}
        @endif
      </span>
    </a>
    <form action="{{ route('logout') }}" method="post" class="mx-3">
      @csrf
      <button type="submit" title="Logout" class="btn btn-outline-secondary p-1"><i class="fas fa-power-off"></i></button>
    </form>
  @else
    <a class="btn btn-sm btn-primary me-3 py-2 text-decoration-none" href="{{ route('login') }}">Login</a>
    <a class="btn btn-sm btn-outline-primary me-3 py-2 text-decoration-none" href="{{ route('register') }}">Register</a>
  @endif

</nav>