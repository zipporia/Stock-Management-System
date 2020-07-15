var manageBrandTAble;

$(document).ready(function(){
    $("#navBrand").addClass('active');

    // manage brand table
    manageBrandTable = $("#manageBrandTable").DataTable({
        'ajax' : 'php_action/fetchBrand.php',
        'order' : []
    });

    // submit brand form function
    $("#submitBrandForm").unbind('submit').on('submit', function(){

        // remove the error text
        $(".text-danger").remove();
        // remove the form error
        $(".form-group").removeClass("has-error").removeClass('has-success');
        
        var brandName = $('#brandName').val();
        var brandStatus =$('#brandStatus').val();

        if(brandName == ""){
            $("#brandName").after('<p class="text-danger">Brand Name field is required</p>');
            $("#brandName").closest('.form-group').addClass('has-error');
        }else{
            // remove error text field
            $('#brandName').find('.text-danger').remove();
            $('#brandName').closest('.form-group').addClass('has-success');
        }

        if(brandStatus == ""){
            $("#brandStatus").after('<p class="text-danger">Brand Status field is required</p>');
            $("#brandStatus").closest('.form-group').addClass('has-error');
        }else{
            // remove error text field
            $('#brandStatus').find('.text-danger').remove();
            $('#brandStatus').closest('.form-group').addClass('has-success');
        }

        if(brandName && brandStatus){
            var form = $(this);

            // button loading
            $('#createBrandBtn').button('loading');

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                dataType: 'json',
                success: function(response){
                    // button loading
                    $("#createBrandBtn").button('reset');

                    if(response.success == true){
                        // reload the manage member table
                        manageBrandTable.ajax.reload(null, false);
                        //reset the form text
                        $("#submitBrandForm")[0].reset();
                        //remove the error text
                        $(".text-danger").remove();
                        // remove the form error
                        $(".form-group").removeClass('has-error').removeClass('has-success');

                        $("#add-brand-messages").html('<div class="alert alert-success">'+  
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                            '<strong> <i class="glyphicon glyphicon-ok-sign"></i> </strong> '+ response.messages +
                        '</div>');

                        $(".alert-success").delay(500).show(10, function(){
                            $(this).delay(3000).hide(10, function(){
                                $(this).remove();
                            });
                        });// /.alert
                    } // 
                }
            });
        }
        return false;
    }); // submit brand form function
}); 

function editBrands(brandId = null){
    if(brandId){
        // remove brandId
        $("#brandId").remove();
        // refresh the form
        $("#editBrandForm")[0].reset();

        $(".editBrandFooter").after('<input type="hidden" name="brandId" id="brandId" value="'+brandId+'" >');
    
        $.ajax({
            url: 'php_action/fetchSelectedBrand.php',
            type: 'post',
            data: {brandId : brandId},
            dataType: 'json',
            success: function(response){
                $("#editBrandName").val(response.brand_name);
                $("#editBrandStatus").val(response.brand_active);

                 // submit brand form function
                $("#editBrandForm").unbind('submit').on('submit', function(){

                    // remove the error text
                    $(".text-danger").remove();
                    // remove the form error
                    $(".form-group").removeClass("has-error").removeClass('has-success');
                    
                    var brandName = $('#editBrandName').val();
                    var brandStatus =$('#editBrandStatus').val();

                    if(brandName == ""){
                        $("#editBrandName").after('<p class="text-danger">Brand Name field is required</p>');
                        $("#editBrandName").closest('.form-group').addClass('has-error');
                    }else{
                        // remove error text field
                        $('#editBrandName').find('.text-danger').remove();
                        $('#editBrandName').closest('.form-group').addClass('has-success');
                    }

                    if(brandStatus == ""){
                        $("#editBrandStatus").after('<p class="text-danger">Brand Status field is required</p>');
                        $("#editBrandStatus").closest('.form-group').addClass('has-error');
                    }else{
                        // remove error text field
                        $('#editBrandStatus').find('.text-danger').remove();
                        $('#editBrandStatus').closest('.form-group').addClass('has-success');
                    }

                    if(brandName && brandStatus){
                        var form = $(this);

                        // button loading
                        // $('#createBrandBtn').button('loading');

                        $.ajax({
                            url: form.attr('action'),
                            type: form.attr('method'),
                            data: form.serialize(),
                            dataType: 'json',
                            success: function(response){
                                // button loading
                                // $("#createBrandBtn").button('reset');

                                if(response.success == true){
                                    // reload the manage member table
                                    manageBrandTable.ajax.reload(null, false);
                                    //reset the form text
                                    $("#editBrandForm")[0].reset();
                                    //remove the error text
                                    $(".text-danger").remove();
                                    // remove the form error
                                    $(".form-group").removeClass('has-error').removeClass('has-success');

                                    $(".edit-brand-messages").html('<div class="alert alert-success">'+  
                                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                        '<strong> <i class="glyphicon glyphicon-ok-sign"></i> </strong> '+ response.messages +
                                    '</div>');

                                    $(".alert-success").delay(500).show(10, function(){
                                        $(this).delay(3000).hide(10, function(){
                                            $(this).remove();
                                        });
                                    });// /.alert
                                } // 
                            }
                        });
                    }
                    return false;
                }); // submit brand form function

            } // success
        }); // ajax
    }
}

function removeBrands(brandId = null){
        if(brandId){
            $("#removeBrandBtn").unbind('click').bind('click', function(){
                $.ajax({
                    url: 'php_action/removeBrand.php',
                    type: 'post',
                    data: {brandId : brandId},
                    dataType: 'json',
                    success: function(response){
                        if(response.success == true){

                            // hide the modal
                            $("#removeBrandModal").modal('hide');

                            // reload the brand table
                            manageBrandTable.ajax.reload(null, false);

                            $(".remove-messages").html('<div class="alert alert-success">'+  
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+
                                '<strong> <i class="glyphicon glyphicon-ok-sign"></i> </strong> '+ response.messages +
                            '</div>');

                            $(".alert-success").delay(500).show(10, function(){
                                $(this).delay(3000).hide(10, function(){
                                    $(this).remove();
                                });
                            });// /.alert
                        }
                    }
                })
            });
        }
    }