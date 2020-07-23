<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){
    $productName = $_POST['productName'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $brandName = $_POST['brandName'];
    $categoryName = $_POST['categoryName'];
    $productStatus = $_POST['productStatus'];

    // for prodduct image
    $type = explode('.',$_FILES['productImage']['name']);
    $type = strtolower($type[count($type) - 1]);
    $url = '../assets/images/stock/'.uniqid(rand()).'.'.$type;

    if(in_array($type, array('gif', 'jpg', 'png', 'jpeg'))){
        if(is_uploaded_file($_FILES['productImage']['tmp_name'])){
           if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)){

            // Insert into the database
            $sql = "INSERT INTO products (product_name, product_image, pbrand_id, pcategory_id, product_quantity, product_rate, product_active, product_status) VALUES('$productName', '$url', '$brandName', '$categoryName', '$quantity', '$rate', '$productStatus', 1)";

                if($conn->query($sql) === TRUE){
                    $valid['success'] = true;
                    $valid['messages'] = 'Successfully Added';
                } else{
                    $valid['success'] = false;
                    $valid['messages'] = 'Error while adding the product';
                }     
           } else{
                return false;
           } 
        } // if_uploaded_file
    } // if in_array()
    
    // close database connection
    $conn->close();

    echo json_encode($valid);

} // if $_POST