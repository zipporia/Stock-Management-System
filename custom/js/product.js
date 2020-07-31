var manageProductTable;

$(document).ready(function(){

    $("#navProduct").addClass('active');
    // manage product datatable
    manageProductTable = $('#manageProductTable').DataTable({
        'ajax': 'php_action/fetchProduct.php',
        'order' : []
    });

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

                            $("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);

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
}); // document

// edit product
function editProduct(productId = null){
    if(productId){

		// remove error text
		$('.text-danger').remove();
		// remove error red color and success green color
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// remove product Id
		 $("#productId").remove();

        $.ajax({
            url: 'php_action/fetchSelectedProduct.php',
            type: 'post',
            data: {productId: productId},
            dataType: 'json',
            success: function(response){

                $("#getProductImage").attr('src', 'stock/'+response.product_image);

                $("#editProductImage").fileinput({
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

                $("#editProductName").val(response.product_name);
                $("#editQuantity").val(response.product_quantity);
                $("#editRate").val(response.product_rate);
                $("#editBrandName").val(response.pbrand_id);
                $("#editCategoryName").val(response.pcategory_id);
				$("#editProductStatus").val(response.product_active);
				
				// update the product data function
				$(".editProductFooter").append('<input type="hidden" name="productId" id="productId" value="'+response.product_id+'"/>');
				// update the product data function
				$("#editProductForm").unbind('submit').bind('submit', function(){
					// remove error text
					$('.text-danger').remove();
					// remove error red color and success green color
					$('.form-group').removeClass('has-error').removeClass('has-success');

					// form validation
					// variables
					var productName = $("#editProductName").val();
					var quantity = $("#editQuantity").val();
					var rate = $("#editRate").val();
					var brandName = $("#editBrandName").val();
					var categoryName = $("#editCategoryName").val();
					var productStatus = $("#editProductStatus").val();
		
					if(productName == ""){
						$("#editProductName").after('<p class="text-danger">The Product Name field is required</p>');
						$("#editProductName").closest('.form-group').addClass('has-error');
					} else{
						$("#editProductName").find('.text-danger').remove();
						$("#editProductName").closest('.form-group').addClass('has-success');
					}
		
					if(quantity == ""){
						$("#editQuantity").after('<p class="text-danger">The Quantity field is required</p>');
						$("#editQuantity").closest('.form-group').addClass('has-error');
					} else{
						$("#editQuantity").find('.text-danger').remove();
						$("#editQuantity").closest('.form-group').addClass('has-success');
					}
		
					if(rate == ""){
						$("#editRate").after('<p class="text-danger">The Rate field is required</p>');
						$("#editRate").closest('.form-group').addClass('has-error');
					} else{
						$("#editRate").find('.text-danger').remove();
						$("#editRate").closest('.form-group').addClass('has-success');
					}
		
					if(brandName == ""){
						$("#editBrandName").after('<p class="text-danger">The Brand Name field is required</p>');
						$("#editBrandName").closest('.form-group').addClass('has-error');
					} else{
						$("#editBrandName").find('.text-danger').remove();
						$("#editBrandName").closest('.form-group').addClass('has-success');
					}
		
					if(categoryName == ""){
						$("#editCategoryName").after('<p class="text-danger">The Category field is required</p>');
						$("#editCategoryName").closest('.form-group').addClass('has-error');
					} else{
						$("#editCategoryName").find('.text-danger').remove();
						$("#editCategoryName").closest('.form-group').addClass('has-success');
					}
		
					if(productStatus == ""){
						$("#editProductStatus").after('<p class="text-danger">The Status field is required</p>');
						$("#editProductStatus").closest('.form-group').addClass('has-error');
					} else{
						$("#editProductStatus").find('.text-danger').remove();
						$("#editProductStatus").closest('.form-group').addClass('has-success');
					}

					if(productName && quantity && rate && brandName && categoryName && productStatus){
                        var form = $(this);

                        $.ajax({
                            url: form.attr('action'),
                            type: form.attr('method'),
                            data: form.serialize(),
                            dataType: 'json',
                            success: function(response){
                                if(response.success == true){
                                    $("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
                                
                                    $("#edit-product-message").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                        '<strong> <i class="glyphicon glyphicon-ok-sign"></i> </strong>' + response.messages +
                                    '</div>');

                                    // reload the manage product table
                                    manageProductTable.ajax.reload(null, true);

                                    // remove error text
                                    $('.text-danger').remove();
                                    // remove error red color and success green color
                                    $('.form-group').removeClass('has-error').removeClass('has-success');
                                }
                            }
                        });
					} // if
					
					return false;
				}); // update the product data function
			} // success
        });// ajax fetch product
    }
} // edit product

function removeProduct(productId = null){
    if(productId){
        // remove product button clicked
        $("#removeProductBtn").unbind('click').bind('click', function(){
           $.ajax({
               url: 'php_action/removeProduct.php',
               type: 'post',
               data: {productId: productId},
               dataType: 'json',
               success: function(response){

                    // close the product modal
                    $("#removeProductModal").modal('hide');

                    if(response.success == true){

                        // update the product table
                        manageProductTable.ajax.reload(null, false);

                        // remove success message
                        $(".remove-messages").html('<div class="alert alert-success alert-dismissible" role="alert"> '+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> ' +
                        '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong>' + response.messages +
                      '</div>');
                    } else{
                        // remove success message
                        $(".remove-messages").html('<div class="alert alert-warning alert-dismissible" role="alert"> '+
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> ' +
                        '<strong> <i class="glyphicon glyphicon-exclamation-sign"></i></strong>' + response.messages +
                      '</div>');
                    }
               } // success
           }); // $.ajax
        }); // remove product button clicked
    }
} // remove product