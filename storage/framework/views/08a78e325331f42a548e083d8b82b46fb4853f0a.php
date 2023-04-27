
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-body d-flex justify-content-between">
                        <h4 class="card-title">Recipts List</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table recipts_datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Unique Code</th>
                                    <th>Price (INR)</th>
                                    <th>Stock Qty</th>
                                    <th>Name </th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Order Type</th>
                                    <th>Address</th>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/nursery/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>