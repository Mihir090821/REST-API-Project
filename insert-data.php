<?php
header("content-type:application/json");
header("Access-Control-allow-origin:*");
header("Access-Control-allow-method:POST");


$get_data = file_get_contents("PHP://input");
$data = json_decode($get_data, true);

$sname = $data["sname"];
$age = $data["age"];

include "config.php";
$sql = "INSERT INTO `student`(`Sname`,`Age`) VALUES('$sname',$age)";
$result = mysqli_query($con, $sql);

if ($result) {
    $arr = array(
        "msg" => "Data Saved Succesfully",
        "status" => true
    );
    $output = json_encode($arr, JSON_PRETTY_PRINT);
} else {
    $arr = array(
        "msg" => "Data Not Saved Succesfully",
        "status" => false
    );
    $output = json_encode($arr, JSON_PRETTY_PRINT);
}
echo $output;
