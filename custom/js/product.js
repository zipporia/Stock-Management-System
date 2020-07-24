var manageProductTable;

$(document).ready(function(){

    $("#navProduct").addClass('active');
    // manage product datatable
    manageProductTable = $('#manageProductTable').DataTable();
    // add product modal btn clicked
    $("#addProductModalBtn").unbind('click').bind('click', function(){
        // product form reset
        $("#submitProductForm")[0].reset();
        // remove error text
        $('.text-danger').remove();
        // remove error red color and success green color
        $('.form-group').removeClass('has-error').removeClass('has-success');
        
        $("#productImage").fileinput({
            overwriteInitial: true,
            maxFileSize: 1500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="assets/images/product_default.jpg" alt="Your Avatar" style="height:250px;">',
            layoutTemplates: {main2: '{preview} {remove} {browse}'},
            allowedFileExtensions: ["jpg", "png", "gif"]
        });

        // submit product form
        $("#submitProductForm").unbind('submit').bind('submit', function(){

            // remove error text
            $('.text-danger').remove();
            // remove error red color and success green color
            $('.form-group').removeClass('has-error').removeClass('has-success');

            // variables
            var productImage = $("#productImage").val();
            var productName = $("#productName").val();
            var quantity = $("#quantity").val();
            var rate = $("#rate").val();
            var brandName = $("#brandName").val();
            var categoryName = $("#categoryName").val();
            var productStatus = $("#productStatus").val();

            if(productImage == ""){
                $("#productImage").closest('.center-block').after('<p class="text-danger">The Product Image field is required</p>');
                $("#productImage").closest('.form-group').addClass('has-error');
            } else{
                $("#productImage").find('.text-danger').remove();
                $("#productImage").closest('.form-group').addClass('has-success');
            }

            if(productName == ""){
                $("#productName").after('<p class="text-danger">The Product Name field is required</p>');
                $("#productName").closest('.form-group').addClass('has-error');
            } else{
                $("#productName").find('.text-danger').remove();
                $("#productName").closest('.form-group').addClass('has-success');
            }

            if(quantity == ""){
                $("#quantity").after('<p class="text-danger">The Quantity field is required</p>');
                $("#quantity").closest('.form-group').addClass('has-error');
            } else{
                $("#quantity").find('.text-danger').remove();
                $("#quantity").closest('.form-group').addClass('has-success');
            }

            if(rate == ""){
                $("#rate").after('<p class="text-danger">The Rate field is required</p>');
                $("#rate").closest('.form-group').addClass('has-error');
            } else{
                $("#rate").find('.text-danger').remove();
                $("#rate").closest('.form-group').addClass('has-success');
            }

            if(brandName == ""){
                $("#brandName").after('<p class="text-danger">The Brand Name field is required</p>');
                $("#brandName").closest('.form-group').addClass('has-error');
            } else{
                $("#brandName").find('.text-danger').remove();
                $("#brandName").closest('.form-group').addClass('has-success');
            }

            if(categoryName == ""){
                $("#categoryName").after('<p class="text-danger">The Category field is required</p>');
                $("#categoryName").closest('.form-group').addClass('has-error');
            } else{
                $("#categoryName").find('.text-danger').remove();
                $("#categoryName").closest('.form-group').addClass('has-success');
            }

            if(productStatus == ""){
                $("#productStatus").after('<p class="text-danger">The Status field is required</p>');
                $("#productStatus").closest('.form-group').addClass('has-error');
            } else{
                $("#productStatus").find('.text-danger').remove();
                $("#productStatus").closest('.form-group').addClass('has-success');
            }

            if(productImage && productName && quantity && rate && brandName && categoryName && productStatus){
                
                var form = $(this);
                var formData = new FormData(this);

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        if(response.success == true){
                            // reset the form
                            $("#submitProductForm")[0].reset();

                            $("#add-product-messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '<strong> <i class="glyphicon glyphicon-ok-sign"></i> </strong>' + response.messages +
                            '</div>');

                            // reload the manage product table
                            manageProductTable.ajax.reload(null, false);
                            //remove the error text
                            $(".text-danger").remove();
                            // remove the form error
                            $(".form-group").removeClass('has-error').removeClass('has-success');
                        }
                        
                    }
                });
            }
            

            return false;
        }); // submit product form
    }); // add product modal btn clicked
});