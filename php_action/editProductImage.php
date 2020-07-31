<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST){
    $productId = $_POST['productId'];

    // for prodduct image
    $type = explode('.',$_FILES['editProductImage']['name']);
    $type = strtolower($type[count($type) - 1]);
    $url = '../assets/images/stock/'.uniqid(rand()).'.'.$type;
 
    if(in_array($type, array('gif', 'jpg', 'png', 'jpeg'))){
        if(is_uploaded_file($_FILES['editProductImage']['tmp_name'])){
            if(move_uploaded_file($_FILES['editProductImage']['tmp_name'], $url)){
 
             // Insert into the database
            $sql = "UPDATE products SET product_image = '$url' WHERE product_id = $productId";
 
                if($conn->query($sql) === TRUE){
                     $valid['success'] = true;
                     $valid['messages'] = 'Successfully Added';
                } else{
                     $valid['success'] = false;
                     $valid['messages'] = 'Error while adding the product';
                }     
            } else {
                return false;
            } // else
         } // if_uploaded_file
     } // if in_array()

    $conn->close();

    echo json_encode($valid);

} // / if $_POST
