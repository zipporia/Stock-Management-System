<?php

    require_once 'core.php';

    $valid['success'] = array('success' => false, 'messages' => array());

    if($_POST){
        $categoriesName = $_POST['editCategoriesName'];
        $categoriesStatus = $_POST['editCategoriesStatus'];
        $categoriesId = $_POST['editCategoriesId'];
    
        $sql = "UPDATE categories SET category_name = '$categoriesName', category_active = '$categoriesStatus' WHERE category_id = '$categoriesId'";
    
        if($conn->query($sql) === TRUE){
            $valid['success'] = true;
            $valid['messages'] = 'Successfully Updated';
        }else{
            $valid['success'] = false;
            $valid['messages'] = 'Error while Updating the categories';
        }
    
        $conn->close();
    
        echo json_encode($valid);
    }