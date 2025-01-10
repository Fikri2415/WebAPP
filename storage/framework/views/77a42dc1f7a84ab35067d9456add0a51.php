

<?php $__env->startSection('header'); ?>
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Produk</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item" active>Produk</li>
            </ol>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="/product/create" class="btn btn-sm btn-primary">
                        Tambah Produk
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Produk</th>
                                <th>Deskripsi</th>
                                <th>Kode</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $products): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($products->name); ?></td>
                                    <td><?php echo e($products->description ?? '-'); ?></td>
                                    <td><?php echo e($products->sku); ?></td>
                                    <td><?php echo e($products->price); ?></td>
                                    <td><?php echo e($products->stock); ?></td>
                                    <td><?php echo e($products->category->name); ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/products/edit/<?php echo e($products->id); ?>" class="btn btn-sm btn-warning mr-2">
                                                Ubah
                                            </a>
                                            <form action="/products/<?php echo e($products->id); ?>" method="POST">
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
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\PraktikumUAS\resources\views/pages/products/index.blade.php ENDPATH**/ ?>