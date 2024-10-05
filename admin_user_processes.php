<?php
session_start();
date_default_timezone_set('Asia/karachi');

require_once('require/database_connection.php');
?>


<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

$email_user=new PHPMailer();
$email_user->isSMTP();
$email_user->Host="smtp.gmail.com";
$email_user->Port=587;
$email_user->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
$email_user->SMTPAuth=true;
$email_user->Username='di733871@gmail.com';
$email_user->Password="twuwlmprtxouwxca";
?>



<?php

// echo "<pre>";
// print_r($_FILES);
// print_r($_POST);
// echo "</pre>";
// die();
if(isset($_POST['admin_register'])){

	// print_r($_POST);
    extract($_POST);
	$folder = "user_images";
	if(!is_dir($folder)){

		if(!mkdir($folder)){
			echo "Could Not Create Directory".$folder;
		}
	}

	$selectemail="SELECT email from user where email = '".$email."' ";
	$email_check=mysqli_query($connection,$selectemail);
	if($email_check->num_rows>0){
				header('location:admin_add_user.php?msg=Email already exists with another user&color=alert-danger');
	}else{


        	$filename=$_FILES['imagefile']['name'];
	        $filetemp=$_FILES['imagefile']['tmp_name'];
	        $file_path = $folder."/".$email."_".$filename;


        if(move_uploaded_file($filetemp,$file_path)){		
		$query="INSERT INTO user (user_id,role_id,first_name,last_name,email,password,gender,date_of_birth,user_image,address) VALUES
		(Null,$user_role,'".$firstname."','".$lastname."','".$email."','".$password."','".$gender."','".$date_of_birth."','".$file_path."','".$address."')";
			$result=mysqli_query($connection,$query);
			if($result){
			header('location:admin_add_user.php?msg=User Successfully Register&color=alert-success');
			}

		}

	}

}

if(isset($_REQUEST['action']) && $_REQUEST['action']=='approve'){
extract($_REQUEST);
$query="UPDATE USER set is_approved='Approved' where user_id='".$user_id."'";
$result=mysqli_query($connection,$query);
if($result){
//Sending mail for account approval
	$selectusermail="SELECT email from user where user_id =  '".$user_id."' ";
	$result=mysqli_query($connection,$selectusermail);
	var_dump($result);
	$approve_email=mysqli_fetch_assoc($result);
	extract($approve_email);

	            $email_user->setFrom("di733971@gmail.com","Notebook.pk");
                $email_user->addAddress($email,"User");
                $email_user->Subject=" GREETINGS !!  Your Account is Approved @ Nootbook";
                $email_user->isHTML(true);
                $email_user->Body="Dear $email Thankyou for registering @ Nootbook.pk, We are pleased to inform you that you account was APPROVED, You can now LOG IN to your NOTEBOOK Account";
                
              if($email_user->send()){
              header('location:admin_user_requests.php?msg=User Approved and Informed Successfully&color=alert-success');
                  }


}

}elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='reject'){
extract($_REQUEST);
$query="UPDATE USER set is_approved='Rejected' where user_id='".$user_id."'";
$result=mysqli_query($connection,$query);
if($result){

	$selectusermail="SELECT email from user where user_id =  '".$user_id."' ";
	$result=mysqli_query($connection,$selectusermail);
	// var_dump($result);
	$approve_email=mysqli_fetch_assoc($result);
	extract($approve_email);

	            $email_user->setFrom("di733971@gmail.com","Notebook.pk");
                $email_user->addAddress($email,"User");
                $email_user->Subject=" We Are Sorry !!  Your Account is Not Approved @ Nootbook";
                $email_user->isHTML(true);
                $email_user->Body="Dear $email Thankyou for registering @ Nootbook.pk, We are sorry 
				to inform you that your account wasn't APPROVED, You can re Request for registeration using DIFFERENT Email";
                
              if($email_user->send()){
              header('location:admin_user_requests.php?msg=User Request has been Rejected&color=alert-danger');
                  }

}

}


if(isset($_REQUEST['action']) && $_REQUEST['action']=='active'){
extract($_REQUEST);

$query="UPDATE USER set is_active='Active' where user_id='".$user_id."'";
$result=mysqli_query($connection,$query);
if($result){
	
	$selectusermail="SELECT email from user where user_id =  '".$user_id."' ";
	$result=mysqli_query($connection,$selectusermail);
	// var_dump($result);
	$approve_email=mysqli_fetch_assoc($result);
	extract($approve_email);

	            $email_user->setFrom("di733971@gmail.com","Notebook.pk");
                $email_user->addAddress($email,"User");
                $email_user->Subject=" Your Account was Activated ";
                $email_user->isHTML(true);
                $email_user->Body="Dear $email , Your Account status is changed to ACTIVE please 
				Login and enjoy endless experience Thanks - Team Notebook.pk";
                
              if($email_user->send()){
              header('location:admin_view_all_users.php?msg=User has been activated&color=alert-success');
                  }

}

}elseif(isset($_REQUEST['action']) && $_REQUEST['action']=='deactive'){
extract($_REQUEST);
$query="UPDATE USER set is_active='InActive' where user_id='".$user_id."'";
$result=mysqli_query($connection,$query);
if($result){
	$selectusermail="SELECT email from user where user_id =  '".$user_id."' ";
	$result=mysqli_query($connection,$selectusermail);
	// var_dump($result);
	$approve_email=mysqli_fetch_assoc($result);
	extract($approve_email);

	            $email_user->setFrom("di733971@gmail.com","Notebook.pk");
                $email_user->addAddress($email,"User");
                $email_user->Subject=" We Are Sorry !!  Your Account Status is changed to INACTIVE  @ Nootbook";
                $email_user->isHTML(true);
                $email_user->Body="Dear $email Its - Team Notebook.pk, We are sorry to inform you that your Account Status is Changed to INACTIVE due to
				various reasons of your inactivity Please write an oppology and issue in feedback to let us know and further process your account Status.";
                
              if($email_user->send()){
              header('location:admin_view_all_users.php?msg=User has been Deactivated&color=alert-danger');
                  }

}
}


if(isset($_REQUEST['admin']) && $_REQUEST['admin']=='active'){
extract($_REQUEST);

$query="UPDATE USER set is_active='Active' where user_id='".$user_id."'";
$result=mysqli_query($connection,$query);
if($result){
header('location:admin_view_admins.php');
}

}elseif(isset($_REQUEST['admin']) && $_REQUEST['admin']=='deactive'){
extract($_REQUEST);
$query="UPDATE USER set is_active='InActive' where user_id='".$user_id."'";
$result=mysqli_query($connection,$query);
if($result){
header('location:admin_view_admins.php');
}

}

if(isset($_POST['admin_update'])){
	// print_r($_FILES);
	// print_r($_POST);
	// die();
	extract($_POST);
	$updated_at = date('Y-d-m H:i:s',time());


	if(isset($_FILES['imagefile'])&&$_FILES['imagefile']['size']>0){
	$folder = "user_images";
	   if(!is_dir($folder)){

		   if(!mkdir($folder)){
			 echo "Could Not Create Directory".$folder;
		   }
	      }

		    $filename=$_FILES['imagefile']['name'];
	        $filetemp=$_FILES['imagefile']['tmp_name'];
	        $file_path = $folder."/".$email."_".$filename;


        if(move_uploaded_file($filetemp,$file_path)){		
			$query="UPDATE user set first_name='".$firstname."',last_name='".$lastname."',email='".$email."',password='".$password."',gender='".$gender."',
			date_of_birth='".$date_of_birth."',user_image='".$file_path."',address='".$address."',updated_at='".$updated_at."' WHERE user_id='".$user_id."'";
			$result=mysqli_query($connection,$query);
			if($result){
			header('location:admin_view_all_users.php?msg=User Successfully Updated&color=alert-success');
			}
            
}
}else{
	        $query="UPDATE user set role_id='".$user_role."',first_name='".$firstname."',last_name='".$lastname."',email='".$email."',password='".$password."',gender='".$gender."',
			date_of_birth='".$date_of_birth."',user_image='".$old_image."',address='".$address."',updated_at='".$updated_at."' WHERE user_id='".$user_id."'";
			$result=mysqli_query($connection,$query);
			if($result){
			header('location:admin_view_all_users.php?msg=User Successfully Updated&color=alert-success');
			}else{
				echo mysqli_error($connection);
			}

}

}


?>