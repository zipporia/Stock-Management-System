var manageBrandTAble;

$(document).ready(function(){
    $("#navBrand").addClass('active');

    // manage brand table
    manageBrandTable = $("#manageBrandTable").DataTable();

    // submit brand form function
    $("#submitBrandForm").unbind('submit').on('submit', function(){
        
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

                    if(response.success = true){
                        // reload the manage member table
                        manageBrandTAble.ajax.reload(null, false);
                    }
                }
            });
        }

        return false;
    });

});