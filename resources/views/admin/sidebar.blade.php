<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/baju2.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Preloved Admin</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.admin') }}"
              class="nav-link {{ Request::routeIs('admin.admin') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-house"></i>
              <p>Beranda</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.category.index') }}"
              class="nav-link {{ Request::routeIs('admin.category.index') ? 'active' : '' }}">
                <i class="nav-icon fa-solid fa-list"></i>
                <p>
                    Kategori
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <!-- Sub-menu Kategori -->
            <ul class="nav nav-treeview">
                @foreach($category as $cat)
                  @if($cat) <!-- Cek apakah $cat bukan null atau false -->
                      <li class="nav-item">
                          <a href="{{ route('admin.category.show', $cat->id_kategori) }}"
                              class="nav-link {{ Request::is('admin/category/' . $cat->id_kategori) ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>{{ $cat->nama_kategori }}</p>
                          </a>
                      </li>
                  @endif
                @endforeach
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.product.index') }}"
              class="nav-link {{ Request::routeIs('admin.product.index') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-shirt"></i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.user.index') }}"
            class="nav-link {{ Request::routeIs('admin.user.index') ? 'active' : '' }}">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.transaction.index') }}" class="nav-link">
              <i class="nav-icon fa-solid fa-file"></i>
              <p>Data Order</p>
            </a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST" class="nav-link" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-link" style="background: none; border: none; padding: 0;">
                    <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                    <p>Logout</p>
                </button>
            </form>
        </li>

        </ul>
      </nav>
    </div>
</aside>
