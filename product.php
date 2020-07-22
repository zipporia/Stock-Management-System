<?php require_once 'includes/header.php'; ?>

<div class="row">
    <div class="col-mid-12">
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">Product</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading"><i class="glyphicon glyphicon-edit"></i> Manage Product </div>
            <div class="panel-body">
                <div class="remove-messages"></div>

                <div class="div-action pull pull-right" style="padding-bottom: 20px;">
                    <button class="btn - btn-default" data-toggle="modal" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Product</button>
                </div>

                <table class="table" id="manageProductTable">
                    <thead>
                        <tr>
                            <th style="width:10%;">Photos</th>
                            <th>Product Name</th>
                            <th>Rate</th>
                            <th>Quantity</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th style="width:15%;">Option</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>

    </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
      <div class="modal-header"> <!-- modal Header-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> <i class="fa fa-plus"></i> Add Product </h4>
      </div>
        
    <form class="form-horizontal"><!-- Modal Form-->
        
        <div class="modal-body"><!-- modal Body-->
        
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Product Image : </label>
                <div class="col-sm-9">
                    <div id="kv-avatar-errors-1" class="center-block" style="display:none"></div>
                    <div class="kv-avatar center-block">
                        <input id="productImage" name="productImage" type="file" class="file-loading"">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Product name : </label>
                <div class="col-sm-9">
                <input type="password" class="form-control" id="" name="" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Quality : </label>
                <div class="col-sm-9">
                <input type="password" class="form-control" id="" name="" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Rate : </label>
                <div class="col-sm-9">
                <input type="password" class="form-control" id="" name="" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Brand Name : </label>
                <div class="col-sm-9">
                <input type="password" class="form-control" id="" name="" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Category name : </label>
                <div class="col-sm-9">
                <input type="password" class="form-control" id="" name="" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Status : </label>
                <div class="col-sm-9">
                <input type="password" class="form-control" id="" name="" placeholder="">
                </div>
            </div>
        </div>
            
        <div class="modal-footer"><!-- modal Footer-->
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

    </form>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Edit Product Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="editProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Remove Product Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="custom/js/product.js"></script>

<?php require_once 'includes/footer.php'; ?>