<?php

require 'core.php';

$valid['success'] = array('success') => false, 'message' => array());

$categoriesId = $_POST['categoriesId'];

if($categoriesId){
    $sql = "UPDATE categories SET category_status = 2 WHERE category_id = {$categoriesId}";

    if($conn->query($sql) === TRUE){
        $valid['success'] = true;
        $valid['messages'] = "Successfully Removed";
    }else{
        $valid['success'] = false;
        $valid['messages'] = "Error while removing the categories";
    }

    $conn->close();

    echo json_encode($valid);
}