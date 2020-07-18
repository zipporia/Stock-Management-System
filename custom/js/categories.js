var manageCategoriesTable;

$(document).ready(function(){
    // active top navbar categories
    $("#navCategories").addClass('active');

    manageCategoriesTable = $('#manageCategoriesTable').DataTable(); // manage categories datatable

    // on click on submit categories form modal
    $("#addCategoriesModalBtn").unbind('click').bind('click', function(){

        // reset the form text
        $("#submitCategoriesForm")[0].reset();
        //remove the error text
        $(".text-danger").remove();
        // remove the form errror
        $(".form-group").removeClass('has-error').removeClass('has-success');

        $("#submitCategoriesForm").unbind('submit').bind('submit', function(){

            //remove the error text
            $(".text-danger").remove();
            // remove the form errror
            $(".form-group").removeClass('has-error').removeClass('has-success');

            var categoriesName = $("#categoriesName").val();
            var categoriesStatus = $("#categoriesStatus").val();

            if(categoriesName == ""){
                $("#categoriesName").after('<p class="text-danger">Categories Name Field is required</p>');
                $("#categoriesName").closest('.form-group').addClass('has-error');
            } else{
                // remove error text field
                $("#categoriesName").find('.text-danger').remove();
                // success  out of form
                $('#categoriesName').closest('.form-group').addClass('has-success')
            }

            if(categoriesStatus == ""){
                $("#categoriesStatus").after('<p class="text-danger">Categories Status Field is required</p>');
                $("#categoriesStatus").closest('.form-group').addClass('has-error');
            } else{
                // remove error text field
                $("#categoriesStatus").find('.text-danger').remove();
                // success  out of form
                $('#categoriesStatus').closest('.form-group').addClass('has-success')
            }

            return false;
        });
    });
});