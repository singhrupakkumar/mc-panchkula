

<?php $__env->startSection('content'); ?>
    <div class="row">
<div class="col-md-12 grid-margin">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Stock Management</h4>
         <form action="<?php echo e(route('admin.product-items-store.storeProductItems')); ?>" id="settings_form" class="form-sample" method="post" enctype='multipart/form-data'>
            <?php echo csrf_field(); ?>
            <p class="card-description"></p>
            <div class="row">
               <div class="col-md-12 datainputs" id="req_input" >
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="name">Select Product</label>
                           <select class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              id="name" name="name[]">
                              <option value="">Select Product</option>
                              <?php $__currentLoopData = $productItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($val->id); ?>">
                                 <?php echo e($val->name); ?>

                              </option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="price">Price</label>
                           <input type="number" class="form-control <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              id="price" name="price[]" value="<?php echo e(old('price')); ?>">
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="product_unit">Stock Qty</label>
                           <input type="number" class="form-control <?php $__errorArgs = ['product_unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              id="product_unit" name="product_unit[]" value="<?php echo e(old('product_unit')); ?>">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <a href="#" id="addmore" class="add_input ">Add more</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="user_name">User Name</label>
                     <input type="text" class="form-control <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        id="user_name" name="user_name" value="<?php echo e(old('user_name')); ?>">
                     <?php $__errorArgs = ['user_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <span class="invalid-feedback" role="alert">
                     <strong><?php echo e($message); ?></strong>
                     </span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="user_email">Email</label>
                     <input type="text" class="form-control <?php $__errorArgs = ['user_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        id="user_email" name="user_email" value="<?php echo e(old('user_email')); ?>">
                     <?php $__errorArgs = ['user_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <span class="invalid-feedback" role="alert">
                     <strong><?php echo e($message); ?></strong>
                     </span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="price">Phone</label>
                     <input type="number" class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        id="phone_number" name="phone_number" step=".01" value="<?php echo e(old('phone_number')); ?>">
                     <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <span class="invalid-feedback" role="alert">
                     <strong><?php echo e($message); ?></strong>
                     </span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label for="price">Arrival Out Address</label>
                     <input type="hidden" name="arrival_address_type" value="sold_to">
                     <textarea name="address" class="form-control" rows="4"></textarea>
                     <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <span class="invalid-feedback" role="alert">
                     <strong><?php echo e($message); ?></strong>
                     </span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                  </div>
               </div>
               <div class="float-right">
                  <input type="hidden" id="getProductUrl" value="<?php echo e(route('admin.product-items.getProducts')); ?>">
                  <button type="submit" class="btn btn-primary mr-2">Submit</button>
               </div>
         </form>
         </div>
      </div>
   </div>
</div>
    <style>
.inputRemove{
  display: inline-block;
  color:#3d3d3d;
  text-align:center;
  text-decoration:none;
  width:auto;
  height:40px;
  line-height:40px;
  border:2px solid #3d3d3d;
  padding:0px 15px;
  border-radius: 5px;
}
.inputRemove{
cursor:pointer;
}
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/nursery/resources/views/admin/stockOut.blade.php ENDPATH**/ ?>