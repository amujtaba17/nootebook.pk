<?php
session_start();
require('require/database_connection.php');
date_default_timezone_set('Asia/Karachi');
if(isset($_POST['update'])){
    
    $updated_at = date('Y-d-m H:i:s',time());
// echo $updated_at;
//     die();
    extract($_POST);
 

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
		$query="UPDATE user set first_name='".$firstname."',last_name='".$lastname."',email='".$email."',password='".$password."',gender='".$gender."',updated_at='".$updated_at."',
        date_of_birth='".$date_of_birth."',user_image='".$file_path."',address='".$address."' WHERE user_id='".$_SESSION['user']['user_id']."'";
			$result=mysqli_query($connection,$query);
			if($result){
			header('location:update.php?msg=User Successfully Updated&color=alert-success');
			}else{
			header('location:update.php?msg=User can not be updated&color=alert-danger');

            }

		}



}else{

		$query="UPDATE user set first_name='".$firstname."',last_name='".$lastname."',email='".$email."',password='".$password."',gender='".$gender."',
        date_of_birth='".$date_of_birth."',user_image='".$old_user_image."',address='".$address."',updated_at='".$updated_at."'  WHERE user_id='".$_SESSION['user']['user_id']."'";
			$result=mysqli_query($connection,$query);
			if($result){
			header('location:update.php?msg=User Successfully Updated&color=alert-success');
			}else{
			header('location:update.php?msg=User can not be updated&color=alert-danger');

            }


}







	}

?>