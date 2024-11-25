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

        <!-- Sidebar Search Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

<<<<<<< HEAD
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('admin.admin') }}" class="nav-link active">
              <i class="nav-icon fa-solid fa-house"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
              <!-- Add Product Link -->
              
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.product.index') }}" class="nav-link active">
              <i class="nav-icon fa-solid fa-shirt"></i>
              <p>Produk</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fa-solid fa-user"></i>
              <p>User</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Widgets</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
=======
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Produk -->
                <li class="nav-item">
                    <a href="{{ route('admin.product.index') }}" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Produk</p>
                    </a>
                </li>

                <!-- Kategori -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.category.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
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
                                  <a href="{{ route('admin.category.show', $cat->id_kategori) }}" class="nav-link">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>{{ $cat->nama_kategori }}</p>
                                  </a>
                              </li>
                          @endif
                        @endforeach
                    </ul>
                </li>


                <!-- Dashboard v3 -->
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Dashboard v3</p>
                    </a>
                </li>
            </ul>
        </nav>
>>>>>>> 3d3c0001e2e715523039d72b0331024b99201c4c
    </div>
</aside>
