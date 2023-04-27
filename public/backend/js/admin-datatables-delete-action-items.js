function callDeleteAjaxFunction(id,url,reloadId,message) {
    $.ajaxSetup({
    headers: {
        'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
   Swal.fire({
      title: 'Are you sure?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          "url": url,
          "type": "POST",
          "data": {
            id: id,
            _token: csrf_token
          },
            success: function(result) {
                toastr.success(message);
                if(reloadId != ''){
                    $(reloadId).DataTable().ajax.reload(null, false); 
                }else{
                    location.reload();
                }
            }, 
            error: function (xhr, status, error) {
                Swal.fire(
                'Error!',
                'Failed to delete the item.',
                'error'
                );
            }
        });
      }
    });
}

function deleteProductItems(e) {
    var id = e.getAttribute('data-id');
    var url = e.getAttribute('data-url');
    var reloadId = ".product_datatable";
    var message = "Product deleted successfully.";
    console.log(url, id, "....");
    callDeleteAjaxFunction(id,url,reloadId,message);
}
function deleteCattems(e) {
    var id = e.getAttribute('data-id');
    var url = e.getAttribute('data-url');
    var reloadId = ".category_datatable";
    var message = "Category deleted successfully.";
    callDeleteAjaxFunction(id,url,reloadId,message);
}





