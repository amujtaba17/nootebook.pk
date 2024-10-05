<?php
session_start();
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
// For Register Process
if(isset($_POST['register'])){
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
				header('location:user_register.php?msg=Email already exists with another user&color=alert-danger');
	}else{


        	$filename=$_FILES['imagefile']['name'];
	        $filetemp=$_FILES['imagefile']['tmp_name'];
	        $file_path = $folder."/".$email."_".$filename;


        if(move_uploaded_file($filetemp,$file_path)){		
		$query="INSERT INTO user (user_id,role_id,first_name,last_name,email,password,gender,date_of_birth,user_image,address) VALUES
		(Null,2,'".$firstname."','".$lastname."','".$email."','".$password."','".$gender."','".$date_of_birth."','".$file_path."','".$address."')";
			$result=mysqli_query($connection,$query);
			if($result){

                //To User-------------------------------------------------------------
                $email_user->setFrom("di733971@gmail.com","Notebook.pk");
                $email_user->addAddress($email,"User");
                $email_user->Subject="Your Registration @ Nootbook.pk";
                $email_user->isHTML(true);
                $email_user->Body="Thankyou, Your registration on NOTEBOOK.PK has been recieved & Your Accont is in PENDING state you can wait while one of our admin views up your profile 
    	        Your Login Credentials are: 
    	        Email: $email ----- Password: $password ";
                //------------------------------------------------------------------

               //for attachements-------------------------------------------------------------
                if(isset($_FILES['attachfile'])){
                $att_name=$_FILES['attachfile']['name'];
                $att_tmp=$_FILES['attachfile']['tmp_name'];
                $email_user->addAttachment($att_tmp,$att_name);
                }
	
	            $email_user->send(); //mail send to user
   	
				//To Admins-----------------------------------------------------------------------------
    
				$query="SELECT email FROM USER WHERE role_id=1";
	            $result=mysqli_query($connection,$query);

	if($result->num_rows>0){
		 while($admin_mail=mysqli_fetch_assoc($result)){
			$email_user->Subject="New User has been registerd to the NOOTBOOK";
			$email_user->msgHTML("<h1>New User has Arrived and waiting for your approval</h1>");
			$email_user->Body="Hello dear Admin,
			A new user $email on the NOTEBOOK is waiting for you approval
			";
			$email_user->addAddress($admin_mail['email'],"Admin");
			$email_user->send(); //Mail send to admin

		 }
	}


    if (!$email_user->send()) {

        echo 'Mailer Error: ' . $email_user->ErrorInfo;
    
    } else {
    
        header('location:user_register.php?msg=Successfully Registered check confirmation Email..&color=alert-success');
    }

			}

		}

	}

}elseif(isset($_POST['login'])){
	extract($_POST);

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

$query="SELECT * FROM user where email= '".$email."' AND password ='".$password."'
";

$result=mysqli_query($connection,$query);
// var_dump($result);

if($result->num_rows>0){

$user=mysqli_fetch_assoc($result);
// var_dump($user);

// ye admin ka main login ha...
if($user['role_id']==1 && $user['is_approved']=="Approved" && $user['is_active']=='Active'){
	$_SESSION['user']=$user;
	header('location:admin_dashboard.php');
}elseif($user['role_id']==2 && $user['is_approved']=="Pending"){

	header('location:user_login.php?msg=Your Account is Pending for approval&color=alert-warning');

}elseif($user['role_id']==2 && $user['is_approved']=="Rejected"){

	header('location:user_login.php?msg=Your Account has been Rejected by the Admin&color=alert-danger');

}elseif($user['role_id']==2 && $user['is_approved']=="Approved" && $user['is_active']=="InActive"){

header('location:user_login.php?msg=Your Account is InActive please contact Admin&color=alert-danger');

}elseif($user['role_id']==1 && $user['is_approved']=="Approved" && $user['is_active']=="InActive"){

header('location:user_login.php?msg=Your Account is InActive please contact Admin&color=alert-danger');

}elseif($user['role_id']==2 && $user['is_approved']=="Approved" && $user['is_active']=="Active"){
 $_SESSION['user']=$user;
 header('location:index.php'); 
}

}else{
	header('location:user_login.php?msg=Invalid Email or Password&color=alert-danger');
}




}elseif(isset($_POST['forgetpassword'])){
	extract($_POST);

	$query="Select email,password from user where email='".$forgetemail."'";
	$result=mysqli_query($connection,$query);
	// var_dump($result);
	if($result->num_rows>0){
		$user_email=mysqli_fetch_assoc($result);
		// var_dump($user_email);
		extract($user_email);

		$email_user->setFrom("di733971@gmail.com","Notebook.pk");
                $email_user->addAddress($email,"User");
                $email_user->Subject="Forgot Password - Nootbook.pk";
                $email_user->isHTML(true);
                $email_user->Body="We have recieved your request of forget password, and here are your details Email: $email \n Password: $password \n
				 , Please Login with these credebtials \n Thank You,\n regards - Team Nootbook.pk  ";
                //------------------------------------------------------------------
               //for attachements-------------------------------------------------------------
                if(isset($_FILES['attachfile'])){
                $att_name=$_FILES['attachfile']['name'];
                $att_tmp=$_FILES['attachfile']['tmp_name'];
                $email_user->addAttachment($att_tmp,$att_name);
                }

	            if($email_user->send()){
		             
					header('location:user_login.php?msg=Login details are sent to your email&color=alert-success');
    
				}
		
	}else{
		header('location:user_login.php?msg=Your Email is not Registered&color=alert-danger');
	}
}


?>