<?php
$server = "localhost";
$uname = "root";
$psw = "";
$dbname = "ravs";

$conn = mysqli_connect($server, $uname, $psw, $dbname);

if(mysqli_connect_errno()){
    echo "connection failed";
} else{
    
}