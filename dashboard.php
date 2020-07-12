<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Stock Management System</title>

    <!--bootstrap-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!--bootstrap theme-->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
    <!--font awesome-->
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome.min.css">
    <!-- custom css-->
    <link rel="stylesheet" href="custom/css/custom.css">
    <!-- dataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables/datatables.min.css">
    <!-- file input -->
    <link rel="stylesheet" href="assets/plugins/fileinput/css/fileinput.min.css">
    <!-- jquery -->
    <script src="assets/jquery/jquery.min.js"></script>
    <!-- jqueryui -->
    <script src="assets/jqueryui/jqueryui.js"></script>
    <!-- bootstrap js-->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
    <!-- file input -->
    <script src="assets/plugins/fileinput/js/plugins/canvas/canvas-to-blob.min.js"></script>
    <script src="assets/plugins/fileinput/js/plugins/sortable.min.js"></script>
    <script src="assets/plugins/fileinput/js/plugins/purify.min.js"></script>
    <script src="assets/plugins/fileinput/js/fileinput.min.js"></script>
    <!-- datatables js -->
    <script src="assets/plugins/datatables/datatables.min.js"></script>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li id="navDashboard"><a href="index.php"> <i class="glyphicon glyphicon-list-alt"></i> Dashboard </a></li>
                    <li id="navBrand"><a href="brand.php"> <i class="glyphicon glyphicon-btc"></i> Brand </a></li>
                    <li id="navCategories"><a href="categories.php"> <i class="glyphicon glyphicon-th-list"></i> Category </a></li>
                    
                    <li class="dropdown" id="navOrder">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Orders <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Orders</a></li>
                        <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</a></li>                        
                    </ul>
                    </li>

                    <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"></i> Report </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" id="navSetting">
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li id="topNavSetting"><a href="setting.php"> <i class="glyphicon glyphicon-wrench"></i> Setting</a></li>
                        <li id="topNavLogout"><a href="logout"> <i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                    </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</body>
</html>