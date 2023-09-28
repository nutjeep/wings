<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Abdi Shop</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ Route::is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Master Produk
  </div>

  <!-- Nav Item - Unit Produk -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('product.type') }}">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Jenis Produk</span>
    </a>
  </li>

  <!-- Nav Item - Satuan Produk -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('product.unit') }}">
      <i class="fas fa-box"></i>
      <span>Satuan Produk</span>
    </a>
  </li>

  <!-- Nav Item - Produk -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('products') }}">
      <i class="fas fa-fw fa-folder"></i>
      <span>Produk</span>
    </a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Transaksi
  </div>

  <!-- Nav Item - Laporan Penjualan -->
  <li class="nav-item {{ Route::is('laporan/laporan-penjualan') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('reports') }}">
      <i class="far fa-file-alt"></i>
      <span>Laporan Penjualan</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Nav Item - Go to Shop -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('homepage') }}" target="_blank">
      <i class="fas fa-warehouse"></i>
      <span>Go to Shop</span>
    </a>
  </li>

  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>