<?php

require_once 'core.php';

$categoriesId = $_POST['categoriesId'];

$sql = "SELECT * FROM categories WHERE category_id = $categoriesId";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_array();
} // if num_rows

$conn->close();

echo json_encode($row);