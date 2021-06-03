<?php
header("content-type:application/json");
header("access-control-allow-origin:*");

// get data in json formate
$get_data = file_get_contents("php://input");
$data = json_decode($get_data, true);
$id = $data["sid"];

// get data from database
include "config.php";
$sql = "SELECT *FROM   `student` WHERE `Sid`=$id";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($row, JSON_PRETTY_PRINT);
} else {
    $msg = array(
        "msg" => "NO DATA FOUND",
        "status" => false
    );

    echo json_encode($msg, JSON_PRETTY_PRINT);
}
