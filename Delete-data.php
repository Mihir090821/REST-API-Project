<?php
header("Content-Type:Application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Methods:DELETE");
header("Access-Control-Allow-Headers:Access-Control-Allow-Headers,Access-Control-Allow-Methods,Access-Control-Allow-Origin,Content-Type");

$get_data = file_get_contents("PHP://input");
$data = json_decode($get_data, true);

$id = $data['sid'];

// sql codes
include "config.php";
$sql = "DELETE FROM `student` WHERE `Sid`=$id";
$result = mysqli_query($con, $sql);

if ($result) {
    $output = json_encode(array(
        "msg" => "Data Deleted Succesfully",
        "status" => true
    ));
    echo $output;
} else {
    $output = json_encode(
        array(
            "msg" => "Data Not Deleted Succesfully",
            "status" => false
        )
    );
    echo $output;
}
