<?php

require_once 'core.php';

$sql = "SELECT category_id, category_name, category_active, category_status FROM categories WHERE category_status = 1";
$result = $conn->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) {
    $activeCategories = "";

    while($row = $result->fetch_array()){
        $categoriesId = $row[0];
        // active
        if($row[2] == 1){
            // active categories
            $activeCategories = "<label class='label label-success'> Available </label>";
        }else{
            // not available categories
            $activeCategories = "<label class='label label-danger'> Not Available </label>";
        }

        $button = '<!-- Single button -->
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a type="button"> <i class="glyphicon glyphicon-edit"></i> Edit </a></li>
                    <li><a type="button" data-toggle="modal" data-target="#removeCategoriesModal" id="removeCategoriesModalBtn" onclick="removeCategories('.$categoriesId.')"> <i class="glyphicon glyphicon-trash"></i> Remove </a></li>
                </ul>
            </div>';

        $output['data'][] = array(
            $row[1],
            $activeCategories,
            $button
        );
    }  // while
} // if num_rows

// colse database connetion
$conn->close();

echo json_encode($output);