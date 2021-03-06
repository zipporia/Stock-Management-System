var manageCategoriesTable;

$(document).ready(function(){
    // active top navbar categories
    $("#navCategories").addClass('active');

    manageCategoriesTable = $('#manageCategoriesTable').DataTable({
        'ajax' : 'php_action/fetchCategories.php',
        'order' : []
    }); // manage categories datatable

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

            if(categoriesName && categoriesStatus){
                var form = $(this);

                $.ajax({
                    url: form.attr("action"),
                    type: form.attr("method"),
                    data: form.serialize(),
                    dataType: 'json',
                    success: function(response){
                        if(response.success == true){
                            
                            // reload the manage member data table
                            manageCategoriesTable.ajax.reload(null, false);
                            
                            // reset the form text
                            $("#submitCategoriesForm")[0].reset();
                            // remove the error text
                            $(".text-danger").remove();
                            // remove the form error
                            $(".form-group").removeClass('has-error').removeClass('has-success');
                            
                            $("#add-categories-messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                    '<strong> <i class="glyphicon glyphicon-ok-sign"></i> </strong>' + response.messages +
                            '</div>');

                            // remove the messages after 10 sec
                            $('.alert-success').delay(500).show(10, function(){
                                $(this).delay(3000).hide(10, function(){
                                    $(this).remove();
                                });
                            });
                        } // if response
                    } // success
                }); // ajax
            } // if 

            return false;
        }); // submit categories form function
    }); // on click on submit categories form modal
}); // document

// update categories function
function editCategories(categoriesId = null){
    if(categoriesId){

        // remove the categoreis id
        $("#editCategoriesId").remove();
        // reset the form text
        $("#editCategoriesForm")[0].reset();
        // remove the error text
        $(".text-danger").remove();
        // remove the form error 
        $(".form-group").removeClass("has-error").removeClass("has-success");

        // edit categories messages remove
        $("#edit-categories-messages").html("");

        $.ajax({
            url: 'php_action/fetchSelectedCategories.php',
            type: 'post',
            data: {categoriesId: categoriesId},
            dataType: 'json',
            success: function(response){
                $("#editCategoriesName").val(response.category_name);
                $("#editCategoriesStatus").val(response.category_active);

                $(".editCategoriesFooter").after('<input type="hidden" name="editCategoriesId" id="editCategoriesId" value="'+response.category_id+'">');
                
                // submit of edit categories form
                $("#editCategoriesForm").unbind('submit').bind('submit', function(){

                    //remove the error text
                    $(".text-danger").remove();
                    // remove the form errror
                    $(".form-group").removeClass('has-error').removeClass('has-success');
        
                    var editCategoriesName = $("#editCategoriesName").val();
                    var editCategoriesStatus = $("#editCategoriesStatus").val();
        
                    if(editCategoriesName == ""){
                        $("#editCategoriesName").after('<p class="text-danger">Categories Name Field is required</p>');
                        $("#editCategoriesName").closest('.form-group').addClass('has-error');
                    } else{
                        // remove error text field
                        $("#editCategoriesName").find('.text-danger').remove();
                        // success  out of form
                        $('#editCategoriesName').closest('.form-group').addClass('has-success')
                    }
        
                    if(editCategoriesStatus == ""){
                        $("#editCategoriesStatus").after('<p class="text-danger">Categories Status Field is required</p>');
                        $("#editCategoriesStatus").closest('.form-group').addClass('has-error');
                    } else{
                        // remove error text field
                        $("#editCategoriesStatus").find('.text-danger').remove();
                        // success  out of form
                        $('#editCategoriesStatus').closest('.form-group').addClass('has-success')
                    }
        
                    if(editCategoriesName && editCategoriesStatus){
                        var form = $(this);
        
                        $.ajax({
                            url: form.attr("action"),
                            type: form.attr("method"),
                            data: form.serialize(),
                            dataType: 'json',
                            success: function(response){
                                if(response.success == true){
                                    
                                    // reload the manage member data table
                                    manageCategoriesTable.ajax.reload(null, false);
                                    
                                    // reset the form text
                                    $("#editCategoriesForm")[0].reset();
                                    // remove the error text
                                    $(".text-danger").remove();
                                    // remove the form error
                                    $(".form-group").removeClass('has-error').removeClass('has-success');
                                    
                                    $("#edit-categories-messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                            '<strong> <i class="glyphicon glyphicon-ok-sign"></i> </strong>' + response.messages +
                                    '</div>');
        
                                    // remove the messages after 10 sec
                                    $('.alert-success').delay(500).show(10, function(){
                                        $(this).delay(3000).hide(10, function(){
                                            $(this).remove();
                                        });
                                    });
                                } // if response
                            } // success
                        }); // ajax
                    } // if 
        
                    return false;
                }); // submit categories form function


            } // success
        }); // ajax function to fetch selected categories
    } // if
} // update categories function

function removeCategories(categoriesId = null){
    if(categoriesId){
        $("#removeCategoriesBtn").unbind('click').bind("click", function(){
            $.ajax({
                url: 'php_action/removeCategories.php',
                type: 'POST',
                data:   {categoriesId: categoriesId},
                dataType: 'json',
                success:function(response){
                    if(response.success == true){
                        // close the modal
                        $("#removeCategoriesModal").modal('hide');
                        // update the manage categories table
                        manageCategoriesTable.ajax.reload(null, false);
                        // show the message
                        $("#remove-messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<strong> <i class="glyphicon glyphicon-ok-sign"></i></strong>' + response.messages +
                        '</div>');
                    }else{
                        // close the modal
                        $("#removeCategoriesModal").modal('hide');
                        // show the message
                        $("#remove-messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<strong> <i class="glyphicon glyphicon-exclamation-sign"></i></strong>' + response.messages +
                        '</div>');

                    }
                }
            });
        });
    } // if categories id
} // remove categories function
