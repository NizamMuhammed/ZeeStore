<?php

$localhost = "localhost";
$username = "root";
$password = "root";
$dbname = "inventory";

$connect = mysqli_connect("localhost", "root", "", "inventory");

if ($connect->connect_error) {
	die("Connection Failed : " . $connect->connect_error);
} else {
}
