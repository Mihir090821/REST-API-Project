<?php
header("content-type:application/json");
header("access-control-allow-origin:*");

include "config.php";

$sql = "SELECT* FROM `student` ORDER BY `Sid` DESC";
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0) {

    $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $json = json_encode($array, JSON_PRETTY_PRINT);
} else {
    $array = array(
        "msg" => "NO Record Found",
        "status" => false
    );
    $json = json_encode($array, JSON_PRETTY_PRINT);
}
echo $json;
