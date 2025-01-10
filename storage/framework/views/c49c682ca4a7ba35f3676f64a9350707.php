<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <form action="/logout" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        <button type="submit" class="btn btn-outline-danger btn-sm">
            Log Out
        </button>
      </form>
    </ul>
  </nav><?php /**PATH C:\laragon\www\PraktikumUAS\resources\views/layouts/components/navbar.blade.php ENDPATH**/ ?>