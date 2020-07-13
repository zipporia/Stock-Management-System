<?php
require_once 'core.php';

$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1";
$result = $conn->query($sql);

$ouput = array('data' => array());

if($result->num_rows > 0){
    while($row = $result->fetch_array()){
        $brandId = $row[0];

        //active
        if($row[2] == 1){
            // active brands
            $activeBrands = "<label class='label label-success'>Available</label>";
        }else{
            // deactivate brand
            $activeBrands = "<label class='label label-danger'>Not Available</label>";
        }

        $button = '<!-- Single button -->
                    <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a type="button" data-toggle="modal" data-target="#editBrandModal" onclick="editBrands('.$brandId.')"> <i class="glyphicon glyphicon-edit"></i> Edit</a></li>
                        <li><a type="button" data-toggle="modal" data-target="#removeBrandModal" onclick="removeBrands('.$brandId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>
                    </ul>
                    </div>';
        $output['data'][] = array(
            $row[1],
            $activeBrands,
            $button
        );
    } // /while
} // /if  num_rows

$conn->close();

echo json_encode($output);