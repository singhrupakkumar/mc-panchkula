
<?php $__env->startSection('content'); ?>
   <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category Detail</h4>
                        <section class="users-list-wrapper section">
                        <div class="users-list-table">
                        <div class="card">
                        <div class="card-content">
                        <div class="row">
                        <div class="col l12">
                        <div class="data-section">
                        <div class="user-view  height-label-1 d-flex">
                        <label>Category Name:</label>
                        <span class="ml-2"><?php echo e($categoryDetail->name ? $categoryDetail->name : 'N/A'); ?>

                        </span>
                        </div>
                       
                        <div class="user-view  height-label-1 d-flex">
                        <label>image:</label>
                        <?php 
                        
                        if($categoryDetail->cat_image != null){
                            $image = $categoryDetail->cat_image;
                        }else{
                            $image = 'deals-bg.jpg';
                        }
                        ?>
                        <span class="ml-2"><img src="<?php echo e(asset('storage/upload_image/'.$image)); ?>" /></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Description:</label>
                        <span class="ml-2"> <?php echo e(($categoryDetail->description) ? $categoryDetail->description : ''); ?></span>
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

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/nursery/resources/views/admin/category/show.blade.php ENDPATH**/ ?>