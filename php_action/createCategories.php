<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){
    $categoriesName = $_POST['categoriesName'];
    $categoriesStatus = $_POST['categoriesStatus'];

    $sql = "INSERT INTO categories (category_name, category_active, category_status) VALUES('$categoriesName', '$categoriesStatus', 1)";

    if($conn->query($sql) === TRUE){
        $valid['success'] = true;
        $valid['messages'] = 'Successfully Added';
    }else{
        $valid['success'] = false;
        $valid['messages'] = 'Error while Adding the categories';
    }

    $conn->close();

    echo json_encode($valid);
}