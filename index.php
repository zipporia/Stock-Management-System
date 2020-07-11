<?php
    require_once 'php_action/db_connect.php';

    session_start();

    $errors = array();

    if($_POST){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($username) || empty($password)){
            if($username == ""){
                $errors[] = "Username is required";
            }

            if($password == ""){
                $errors[] = "Password is required";
            }
        }else{
            $sql = "SELECT * FROM users WHERE user_name = '$username'";
            $result = $conn->query($sql);

            if($result->num_rows == 1){
                $password = md5($password);
                //exists
                $mainSql = "SELECT * FROM users WHERE user_name = '$username' AND user_pwd = '$password'";
                $mainResult = $conn->query($mainSql);

                if($mainResult->num_rows == 1){
                    $value = $mainResult->fetch_assoc();
                    $user_id = $value['user_id'];

                    //set session
                    $_SESSION['userId'] = $user_id;

                    header('Location: dashboard.php');
                }else{
                    $errors[] = "Incorrect username/password combination";
                }
            }else{
                $errors[] = "Username does not exists";
            }
        }
    }
?>

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
    <!-- jquery -->
    <script src="assets/jquery/jquery.min.js"></script>
    <!-- jqueryui -->
    <script src="assets/jqueryui/jqueryui.js"></script>
    <!-- bootstrap js-->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</head>
<body>
    
    <div class="container">
        <div class="row vertical">
            <div class="col-md-5 col-md-offset-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">

                        <div class="messages">
                            <?php
                                if($errors){
                                    foreach($errors as $key => $value){
                                        echo '<div class="alert alert-warning alert-dismissible" role="alert">
                                                <i class="glyphicon glyphicon-exclamation-sign"></i>'.$value.'</div>';
                                    }
                                }
                            ?>
                        </div>

                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default"> <i class="glyphicon glyphicon-log-in"></i> Sign in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>
</html>