   

   <script type="text/javascript">
       $(function() {
           // User Datatable
           var userdatatable = $('.user_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.users.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       orderable: false,
                   },
                   {
                       data: 'name',
                       name: 'name',
                       orderable: false,
                   },
                   {
                       data: 'email',
                       name: 'email',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });

            // Category Datatable
           var userdatatable = $('.category_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.category.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       orderable: false,
                   },
                   {
                       data: 'name',
                       name: 'name',
                       orderable: false,
                   },
                   {
                       data: 'description',
                       name: 'description',
                       orderable: false,
                   },
                   {
                       data: 'created_at',
                       name: 'created_at',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });

           // Category Datatable
           var userdatatable = $('.product_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.product.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       orderable: false,
                   },
                   {
                       data: 'name',
                       name: 'name',
                       orderable: false,
                   },
                   {
                       data: 'cat_name',
                       name: 'cat_name',
                       orderable: false,
                   },
                   {
                       data: 'unique_code',
                       name: 'unique_code',
                       orderable: false,
                   },
                   {
                       data: 'product_unit',
                       name: 'product_unit',
                       orderable: false,
                   },
                   {
                       data: 'description',
                       name: 'description',
                       orderable: false,
                   },
                   
                   {
                       data: 'created_at',
                       name: 'created_at',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });

           // Recipts Datatable
           var userdatatable = $('.recipts_datatable').DataTable({
               processing: true,
               serverSide: true,
               ajax: "<?php echo e(route('admin.orders.index')); ?>",
               columns: [{
                       data: 'id',
                       name: 'id',
                       orderable: false,
                   },
                   {
                       data: 'product_name',
                       name: 'product_name',
                       orderable: false,
                   },
                   {
                       data: 'unique_code',
                       name: 'unique_code',
                       orderable: false,
                       visible: false
                   },
                   {
                       data: 'product_price',
                       name: 'product_price',
                       orderable: false,
                   },
                   {
                       data: 'product_stock_qty',
                       name: 'product_stock_qty',
                       orderable: false,
                   },
                   {
                       data: 'user_name',
                       name: 'user_name',
                       orderable: false,
                   },
                   {
                       data: 'user_email',
                       name: 'user_email',
                       orderable: false,
                   },
                   {
                       data: 'user_phone',
                       name: 'user_phone',
                       orderable: false,
                   },
                   {
                       data: 'order_type',
                       name: 'order_type',
                       orderable: false,
                   },
                   {
                       data: 'address',
                       name: 'address',
                       orderable: false,
                   },
                   {
                       data: 'created_at',
                       name: 'created_at',
                       orderable: false,
                   },
                   {
                       data: 'action',
                       name: 'action',
                       orderable: false,
                       searchable: false
                   },
               ],
               "fnRowCallback": function(nRow, aData, iDisplayIndex) {
                   $("td:first", nRow).html(iDisplayIndex + 1);
                   return nRow;
               },
           });

           
       });
   </script>
<?php /**PATH /var/www/html/nursery/resources/views/admin/datatable/datatable-script.blade.php ENDPATH**/ ?>