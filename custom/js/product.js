var manageProductTable;

$(document).ready(function(){

    $("#navProduct").addClass('active');
    // manage product datatable
    manageProductTable = $('#manageProductTable').DataTable();
    // add product modal btn clicked
    $("#addProductModalBtn").unbind('click').bind('click', function(){
        // product form reset
        $("#submitProductForm")[0].reset();
        
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
    }); // add product modal btn clicked
});