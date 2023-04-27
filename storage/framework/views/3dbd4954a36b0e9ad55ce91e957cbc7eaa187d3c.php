
<?php $__env->startSection('content'); ?>
   <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Order Details</h4>
                        <section class="users-list-wrapper section">
                        <div class="users-list-table">
                        <div class="card">
                        <div class="card-content">
                        <div class="row">
                        <div class="col l12">
                        <div class="data-section">
                        <h4 class="card-title">Customer Info</h4>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Name :</label>
                        <span class="ml-2"><?php echo e($data[0]->user_name ? $data[0]->user_name : 'N/A'); ?>

                        </span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Email:</label>
                        <span class="ml-2"> <?php echo e($data[0]->email ? $data[0]->email : 'N/A'); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Phone :</label>
                        <span class="ml-2"> <?php echo e(($data[0]->phone) ? $data[0]->phone : ''); ?></span>
                        </div>
                        <div class="user-view  height-label-1 d-flex">
                        <label>Address :</label>
                        <span class="ml-2"> <?php echo e(($data[0]->address) ? $data[0]->address : ''); ?></span>
                        </div>
                        <h4 class="card-title">Stock Info</h4>
                        <?php if($data[0]->upload_recipt != null): ?>
                            <div class="user-view  height-label-1 d-flex">
                                <label>Download Receipt:</label>
                                <span class="ml-2">
                                    <a download="<?php echo e($data[0]->upload_recipt); ?>" href="<?php echo e(asset('storage/upload_image/'.$data[0]->upload_recipt)); ?>" title="<?php echo e($data[0]->upload_recipt); ?>">
                                        <img src="<?php echo e(asset('storage/upload_image/'.$data[0]->upload_recipt)); ?>" />
                                    </a>
                                </span>
                                <span class="ml-2">
                                    <a class="btn btn-primary mb-2" download="<?php echo e($data[0]->upload_recipt); ?>" href="<?php echo e(asset('storage/upload_image/'.$data[0]->upload_recipt)); ?>" title="<?php echo e($data[0]->upload_recipt); ?>">
                                        Download Receipt
                                    </a>
                                </span>
                            </div>
                        <?php else: ?>
                        <div class="user-view  height-label-1 d-flex">
                                <label>Receipt:</label>
                                <span class="ml-2">No Receipt</span>
                            </div>
                        
                        <?php endif; ?>
                        <section class="tables-page-section" >
                            <div class="container">
                             <div class="row">
                              <div class="col-md-12">
                               <div class="section_title text-center">
                                 <h2>Stock Info</h2>
                                  <div class="brand_border">
                                   <i class="fa fa-minus" aria-hidden="true"></i> 
                                   <i class="fas fa-handshake"></i>
                                   <i class="fa fa-minus" aria-hidden="true"></i>
                                  </div>
                                 
                               </div>
                              </div>
                            </div>
                           <div class="row">
                            <div class="col-sm-12">
                              <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                      <th>#</th>
                                      <th>Product Name</th>
                                      <th>Price (INR)</th>
                                      <th>Stock Qty</th>
                                    </thead>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <th>1</th>
                                      <td><?php echo e(($val->product_name) ? $val->product_name : ''); ?></td>
                                      <td><?php echo e(($val->product_price) ? $val->product_price : ''); ?></td>
                                      <td><?php echo e(($val->product_stock_qty) ? $val->product_stock_qty : ''); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                  </table>
                                </div>

                            </div>
                           </div>
                          </div>
                         </section>
                        
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
    <style>
        section {
            padding: 60px 0;
            min-height: auto;
        }
.section_title {
  margin-bottom: 40px;
}

.section_title h2 {
  color: #333333;
  font-size: 25px;
  font-weight: 700;
  letter-spacing: 1.8px;
  text-transform: uppercase;
}

.brand_border .fa.fa-minus {
    color: #fff;
    font-size: 8px;
    height: 2px;
        background: #F8C01B none repeat scroll 0 0;
    width: 100px;
}
.brand_border .fas.fa-handshake {
    font-size: 14px;
        color:#000000;
}


.section_title p {
  color: #333333;
  font-size: 14px;
  line-height: 25px;
  padding: 14px 0;
}


.tables-page-section .table {
  text-align: center;
  margin-bottom: 40px;
}
.tables-page-section .table th {
  border-bottom: 1px solid #ffffff;
  border-right: 1px solid #ffffff;
  font-family: 'Montserrat', sans-serif;
  font-size: 15px;
  font-weight: 700;
  padding: 10px 20px;
  text-align: center;
}
.tables-page-section .table td {
  border-bottom: 1px solid #ffffff;
  border-right: 1px solid #ffffff;
  background: #f1f1f1;
  font-family: 'Lato', sans-serif;
  font-size: 13px;
  color: #666666;
  padding: 10px 20px;
}
.tables-page-section .table thead th {
  padding: 15px 20px;
  text-align: center;
  background: #ffba00 !important;
}
.tables-page-section .table tr th {
  background: #f1f1f1;
}
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/nursery/resources/views/admin/orders/show.blade.php ENDPATH**/ ?>