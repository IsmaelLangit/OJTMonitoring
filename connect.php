<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ojtmonitoring";

$connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'Error Connecting to Database: '.mysqli_connect_error();
}
?>
