<?php

$host = "localhost";
$uname = "root";
$pass = "";
$database = "api";

$con = mysqli_connect($host, $uname, $pass, $database) or die("connection error:  " . mysqli_connect_error());
// if ($con) {
//     echo 1;
// }
