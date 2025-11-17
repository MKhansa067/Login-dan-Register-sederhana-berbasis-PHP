<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "bukutamu_db";

$db = mysqli_connect($hostname, $username, $password, $database);

if($db->connect_error){
    echo "koneksi database error";
    die("error");
}
?>