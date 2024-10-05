<?php

$hostname='localhost';
$username='root';
$password='';
$database='21690_ahmed_mujtaba_blog_app';

mysqli_report(0);

$connection=mysqli_connect($hostname,$username,$password,$database);

if(mysqli_connect_errno()){

	echo "Connection error no:".mysqli_connect_errno();
	echo "Connection error message:".mysqli_connect_error();
	die();

}

?>