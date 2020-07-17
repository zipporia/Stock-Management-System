<?php require_once 'includes/header.php'; ?>

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="dashboard.php">Home</a></li>
            <li class="active">Category</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Categories</div>
            <div class="panel-body">

                <div class="remove-messages"></div>

                <div class="div-action pull pull-right" style="padding-bottom:20px";>
                    <button Class="btn btn-default" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Categories </button>
                </div>

                <table class="table" id="manageCategoriesTable">
                    <thead>
                        <tr>
                            <th>Categories Name</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                </table>

            </div>
        </div>

    </div>
</div>



<?php require_once 'includes/footer.php'; ?>
