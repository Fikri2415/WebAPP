<?php
    $menus = [
        (object) [
            "title" => "Dashboard",
            "path" => "/",
            "icon" => "fas fa-th",
        ],
        (object) [
            "title" => "Kategori",
            "path" => "categories",
            "icon" => "fas fa-th",
        ],
        (object) [
            "title" => "Produk/Barang",
            "path" => "product",
            "icon" => "fas fa-th",
        ],
    ]
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="https://img.icons8.com/?size=100&id=4NUeu__UwtXf&format=png&color=ffffff" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventaris</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo e(auth()->user()->name); ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
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

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <li class="nav-item">
                    <a href="<?php echo e($menu->path[0] !== '/' ? '/' . $menu->path : $menu->path); ?>" class="nav-link <?php echo e(request()->path() === $menu->path ? 'active' : ''); ?>">
                        <i class="nav-icon <?php echo e($menu->icon); ?>"></i>
                        <p>
                            <?php echo e($menu->title); ?>

                            
                        </p>
                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH C:\laragon\www\PraktikumUAS\resources\views/layouts/components/sidebar.blade.php ENDPATH**/ ?>