<?php
header("Content-Type:Application/json");
header("Access-Control-Allow-Origin:*");

// get data without json
$serch_term = isset($_GET['serch_term']) ? $_GET['serch_term'] : die();

// sql queries
include "config.php";
$sql = "SELECT * FROM `student` WHERE `Sid` LIKE '%{$serch_term}%' OR `Sname` LIKE '%{$serch_term}%' OR `Age` LIKE '%{$serch_term}%'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    $serch_data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $output = json_encode($serch_data);
    echo $output;
} else {
    $output = json_encode(array(
        "msg" => "Data Not Found",
        "status" => false
    ));
    echo $output;
}
