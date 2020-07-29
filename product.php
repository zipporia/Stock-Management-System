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
                    <button class="btn - btn-default" data-toggle="modal" data-target="#addProductModal" id="addProductModalBtn"> <i class="glyphicon glyphicon-plus-sign"></i> Add Product</button>
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
        
    <form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php" method="post" enctype="multipart/form-data"><!-- Modal Form-->
        
        <div class="modal-body" style="max-height:450px;overflow:auto;"><!-- modal Body-->

            <div id="add-product-messages"></div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Product Image : </label>
                <div class="col-sm-9">

                    <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
                    <div class="kv-avatar center-block">
                        <input id="productImage" name="productImage" type="file" class="file-loading">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="productName" class="col-sm-3 control-label">Product name : </label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Product name">
                </div>
            </div>
            <div class="form-group">
                <label for="quantity" class="col-sm-3 control-label">Quantity : </label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                </div>
            </div>
            <div class="form-group">
                <label for="rate" class="col-sm-3 control-label">Rate : </label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="rate" name="rate" placeholder="Rate">
                </div>
            </div>
            <div class="form-group">
                <label for="brandName" class="col-sm-3 control-label">Brand Name : </label>
                <div class="col-sm-9">
                    <select class="form-control" name="brandName" id="brandName">
                        <option value="">SELECT BRAND</option>
                        <?php
                            $sql = "SELECT brand_id, brand_name FROM brands WHERE brand_status = 1 AND brand_active = 1";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_array()){
                                echo "<option value='".$row[0]."'>".$row[1]."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="categoryName" class="col-sm-3 control-label">Category name : </label>
                <div class="col-sm-9">
                    <select class="form-control" name="categoryName" id="categoryName">
                        <option value="">SELECT CATEGORY</option>
                        <?php
                            $sql = "SELECT category_id, category_name FROM categories WHERE category_status = 1 AND category_active = 1";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_array()){
                                echo "<option value='".$row[0]."'>".$row[1]."</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="productStatus" class="col-sm-3 control-label">Status : </label>
                <div class="col-sm-9">
                    <select class="form-control" name="productStatus" id="productStatus">
                        <option value="">SELECT STATUS</option>
                        <option value="1">Available</option>
                        <option value="2">Not Available</option>
                    </select>
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
        <h4 class="modal-title"> <i class="fa fa-edit"></i> Edit Product</h4>
      </div>
      <div class="modal-body" style="height:450px;overflow:auto;">
        
        <div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab" data-toggle="tab">Photo</a></li>
                <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab">Product Info</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="photo">
                
                </div>
                <!-- photo -->
                <div role="tabpanel" class="tab-pane " id="productInfo">
                    <br>
                    <!-- Edit Product Form -->
                    <form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php" method="POST">
                        <div class="form-group">
                            <label for="editProductName" class="col-sm-3 control-label">Product Name : </label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="editProductName" name="editProductName" placeholder="Product Name">
                         </div>
                            </div>
                        <div class="form-group">
                            <label for="editQuantity" class="col-sm-3 control-label">Quantity : </label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="editQuantity" name="editQuantity" placeholder="Quantity">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editRate" class="col-sm-3 control-label">Rate : </label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="editRate" name="editRate" placeholder="Rate">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editBrandName" class="col-sm-3 control-label">Brand Name : </label>
                            <div class="col-sm-9">
                                <select class="form-control" id="editBrandName" name="editBrandName">
                                    <option value=""> SELECT BRAND </option>
                                    <?php
                                        $sql = "SELECT brand_id, brand_name FROM brands WHERE brand_status = 1 AND brand_active = 1";
                                        $result = $conn->query($sql);

                                        while($row = $result->fetch_array()){
                                            echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editCategoryName" class="col-sm-3 control-label">Category Name : </label>
                            <div class="col-sm-9">
                                <select class="form-control" id="editCategoryName" name="editCategoryName">
                                    <option value=""> SELECT CATEGORY </option>
                                    <?php
                                        $sql = "SELECT category_id, category_name FROM categories WHERE category_active = 1 AND category_status = 1";
                                        $result = $conn->query($sql);

                                        while($row = $result->fetch_array()){
                                            echo "<option value='".$row[0]."'>".$row[1]."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editProductStatus" class="col-sm-3 control-label">Status : </label>
                            <div class="col-sm-9">
                            <select class="form-control" id="editProductStatus" name="editProductStatus">
                                <option value=""> SELECT STATUS</option>
                                <option value="1">Available</option>
                                <option value="2">Not Available</option>
                            </select>
                            </div>
                        </div>
                    
                    <div class="modal-footer editProductFooter">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>

                    </form>
                                        
                </div>
                <!-- product info -->
            </div>
        </div>

      </div>
      <div class="modal-footer">
        
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
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Product </h4>
      </div>
      <div class="modal-body">
        <p>Do you really want to remove?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="custom/js/product.js"></script>

<?php require_once 'includes/footer.php'; ?>