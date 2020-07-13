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

        return false;
    });

});