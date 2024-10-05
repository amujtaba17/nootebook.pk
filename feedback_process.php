<?php
session_start();
include("require/database_connection.php");
?>

<?php
if(isset($_POST['submit_feedback'])){
	extract($_POST);

if(isset($_SESSION['user'])){
	$with_session="INSERT INTO user_feedback values(NULL,'".$_SESSION['user']['user_id']."','".$fbname."','".$fb_email."','".$fbdescription."',NULL)";
	$result=mysqli_query($connection,$with_session);
	if($result){

		header('location:feedback.php?msg=Thank you for your feedback&color=alert-success');

	}

}else{

  $without_session="INSERT INTO user_feedback values(NULL,NULL,'".$fbname."','".$fb_email."','".$fbdescription."', NULL)";
	$result=mysqli_query($connection,$without_session);

if($result){

		header('location:feedback.php?msg=Thank you for your feedback&color=alert-success');

	}

}


// $email="SELECT * FROM user where email= '".$fb_email."'";
// $result=mysqli_query($connection,$email);
// // var_dump($result);


}
?>