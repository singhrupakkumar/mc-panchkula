
<?php $__env->startSection('content'); ?>
   <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product Detail</h4>
                        <section class="users-list-wrapper section">
                        <div class="users-list-table">
                        <div class="card">
                        <div class="card-content">
                        <div class="row">
                        <div class="col l12">
                        <div class="data-section">
                        <div class="user-view  height-label-1 d-flex">
                        <label>Product Name:</label>
                        <span class="ml-2"><?php echo e($productDetail->name ? $productDetail->name : 'N/A'); ?>

                        </span>
                        </div>

                        <div class="user-view  height-label-1 d-flex">
                        <label>Product Code:</label>
                        <span class="ml-2"><?php echo e($productDetail->unique_code ? $productDetail->unique_code : 'N/A'); ?>

                        </span>
                        </div>

                        <div class="user-view  height-label-1 d-flex">
                        <label>Product Unit:</label>
                        <span class="ml-2"><?php echo e($productDetail->product_unit ? $productDetail->product_unit : 'N/A'); ?>

                        </span>
                        </div>

                        <div class="user-view  height-label-1 d-flex">
                        <label>Category Name:</label>
                        <span class="ml-2"><?php echo e($productDetail->cat_name ? $productDetail->cat_name : 'N/A'); ?>

                        </span>
                        </div>

                        <div class="user-view  height-label-1 d-flex">
                        <label>Price (INR)</label>
                        <span class="ml-2"><?php echo e($productDetail->price ? $productDetail->price : 'N/A'); ?>

                        </span>
                        </div>

                       
                       
                        <div class="user-view  height-label-1 d-flex">
                        <label>image:</label>
                        <?php 
                        
                        if($productDetail->product_img != null){
                            $image = $productDetail->product_img;
                        }else{
                            $image = 'deals-bg.jpg';
                        }
                        ?>
                        <span class="ml-2"><img src="<?php echo e(asset('storage/upload_image/'.$image)); ?>" /></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Description:</label>
                        <span class="ml-2"> <?php echo e(($productDetail->description) ? $productDetail->description : ''); ?></span>
                        </div>
                        
                        </div>
                        </div> 
                        </div>
                        </div>
                        </div>
                        </div>
                        </section>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/nursery/resources/views/admin/product/show.blade.php ENDPATH**/ ?>