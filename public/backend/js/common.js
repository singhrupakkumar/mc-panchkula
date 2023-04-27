$(document).ready(function() {
    var GetProductItems
  $("#addmore").click(function() {
    var url = $('#getProductUrl').val();
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            "url":  url,
            "type": "GET",
            "data": {
                _token: csrf_token,
            },
            success: function (result) {
                console.log(result.output);
               var GetProductItems = result.output;
               $("#req_input").append('<div class="required_inp"><div class="row"><div class="col-md-3"><div class="form-group"><label for="name">Select Product</label><select class="form-control" id="name" name="name[]"><option value="">Select Product</option>'+result.output+'</select></div></div><div class="col-md-3"><div class="form-group"><label for="price">Price</label><input type="number" class="form-control" id="price" name="price[]" value=""></div></div><div class="col-md-3"><div class="form-group"><label for="product_unit">Stock Qty</label><input type="number" class="form-control" id="product_unit" name="product_unit[]" value=""></div></div><div class="col-md-3"><input type="button" class="inputRemove" value="Remove"></div></div></div>');
            },
        });
});
  $('body').on('click','.inputRemove',function() {
    $(this).parent().parent().remove()
  });
});




