<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

$brandId = $_POST['brandId'];

if($brandId){
    $valid['success'] = true;
    $valid['messages'] = "Successfully Removed";
}

echo json_encode($valid);