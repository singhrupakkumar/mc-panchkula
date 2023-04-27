
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-body d-flex justify-content-between">
                        <h4 class="card-title">Product</h4>
                        <a href="<?php echo e(route('admin.product.add')); ?>" class="btn btn-primary">Add Product</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table product_datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category Name</th>
                                    <th>Unique Code</th>
                                    <th>Unit</th>
									<th>Stock Qty</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/nursery/resources/views/admin/product/index.blade.php ENDPATH**/ ?>