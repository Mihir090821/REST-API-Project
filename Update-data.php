<?php
header("Content-Type:Application/json");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Method:PUT");

$get_data = file_get_contents("Php://input");
$data = json_decode($get_data, true);

$id = $data['sid'];
$sname = $data['sname'];
$age = $data['age'];

// sql queries
include "config.php";
$sql = "UPDATE `student` SET `Sname`='$sname',`Age`=$age WHERE `Sid`=$id " or die("Query Failed");
$result = mysqli_query($con, $sql);

if ($result) {
    $output = json_encode(array(
        "msg" => "Data Updated Successfully",
        "status" => "true"
    ));
    echo $output;
} else {
    $output = json_encode(array(
        "msg" => "Data Not Updated succesfully",
        "status" => "false"
    ));
    echo $output;
}
