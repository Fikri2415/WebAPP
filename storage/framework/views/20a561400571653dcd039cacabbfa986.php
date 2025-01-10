

<?php $__env->startSection('header'); ?>
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Kategori</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item" active>Kategori</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('succsess')): ?>
        <script>
            Swal.fire({
            title: "Berhasil!",
            text: "<?php echo e(session('succsess')); ?>",
            icon: "succsess"
            });
        </script>
    <?php endif; ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="/categories/create" class="btn btn-sm btn-primary">
                        Tambah Kategori
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Slug</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(($categories->currentPage() - 1) * $categories->perPage() + $loop->index + 1); ?></td>
                                    <td><?php echo e($category->name); ?></td>
                                    <td><?php echo e($category->slug ?? '-'); ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/categories/edit/<?php echo e($category->id); ?>" class="btn btn-sm btn-warning mr-2">
                                                Ubah
                                            </a>
                                            <form action="/categories/<?php echo e($category->id); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <?php echo e($categories->links('pagination::bootstrap-5')); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PraktikumUAS\resources\views/pages/categories/index.blade.php ENDPATH**/ ?>