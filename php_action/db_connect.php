<?php

    $Servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "stocks";

    $conn = new mysqli($Servername, $dbUsername, $dbPassword, $dbName);

    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }else{
        echo "Successfully connected";
    }