<?php
session_start();
require('require/database_connection.php');
date_default_timezone_set('Asia/Karachi');
date_default_timezone_get();
?>

<?php
if(isset($_POST['create_blog'])){

    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);
    // echo "</pre>";
// die();
    extract($_POST);
 
	$folder = "Blog_Backgrounds";
	if(!is_dir($folder)){

		if(!mkdir($folder)){
			echo "Could Not Create Directory".$folder;
		}
	}
    $blog_title=htmlspecialchars($blog_title);

    $bgname=$_FILES['blog_image']['name'];
    $bg_temp=$_FILES['blog_image']['tmp_name'];
    $file_path = $folder."/"."_".$bgname;
    
    if(move_uploaded_file($bg_temp,$file_path)){
    $add_blog="INSERT INTO blog(user_id,blog_title,post_per_page,blog_background_image,blog_status) 
    VALUES ('".$_SESSION['user']['user_id']."','".$blog_title."','".$post_per_page."','".$file_path."','".$blog_status."')";
    $result=mysqli_query($connection,$add_blog);
    if($result){
        header('location:admin_add_blog.php?msg=Blog created Successfully&color=alert-success');
    }else{
        mysqli_error($connection);
    }
}

}


if(isset($_REQUEST['blog']) && $_REQUEST['blog']=='active'){
extract($_REQUEST);
// echo $blog_id;
$query="UPDATE blog set blog_status='Active' where blog_id= '".$blog_id."' ";
$result=mysqli_query($connection,$query);
   if($result){
    header('location:admin_view_blogs.php?msg=Blog is Active now&color=alert-success');
      }

}elseif(isset($_REQUEST['blog']) && $_REQUEST['blog']=='deactive'){
  extract($_REQUEST);
  // echo $blog_id;
  $query="UPDATE blog set blog_status='InActive' where blog_id= '".$blog_id."' ";
  $result=mysqli_query($connection,$query);
   if($result){
           header('location:admin_view_blogs.php?msg=Blog has been Offlined&color=alert-danger');
      }

}



if(isset($_POST['update_blog'])){
    extract($_POST);
    
    $updated_at = date('Y-m-d H:i:s',time());
    $blog_title=htmlspecialchars($blog_title);

    if(isset($_FILES['blog_image'])&&$_FILES['blog_image']['size']>0){
     $folder = "Blog_Backgrounds";
    // ..................
    if(!is_dir($folder)){

        if(!mkdir($folder)){
            echo "Could Not Create Directory".$folder;
        }
    }
// .......................
    $bgname=$_FILES['blog_image']['name'];
    $bg_temp=$_FILES['blog_image']['tmp_name'];
    $file_path = $folder."/"."_".$bgname;

    if(move_uploaded_file($bg_temp,$file_path)){
     $query="Update blog 
        set blog_title= '".$blog_title."',post_per_page= '".$post_per_page."', 
        blog_status='".$blog_status."', blog_background_image='".$file_path."',
        updated_at='".$updated_at."'
        WHERE blog_id='".$blog_id."'";
       $result=mysqli_query($connection,$query);
       if($result){
        header('location:admin_view_blogs.php?msg=Blog has been Updated Successfully&color=alert-success');
       }
    }
     
}else{

        $query="Update blog
        set blog_title= '".$blog_title."',post_per_page= '".$post_per_page."', 
        blog_status='".$blog_status."', 
        blog_background_image='".$old_bg."',
        updated_at='".$updated_at."'
        WHERE blog_id='".$blog_id."'";
        $result=mysqli_query($connection,$query);
        if($result){
         header('location:admin_view_blogs.php?msg=Blog has been Updated Successfully&color=alert-success');
        }

    }

}

if(isset($_REQUEST['action'])&&$_REQUEST['action']=='add_follower'){
    extract($_REQUEST);
    // print_r($_REQUEST);

    $add_follower="INSERT INTO following_blog(follower_id,blog_following_id,status) 
    VALUES('".$_SESSION['user']['user_id']."','".$blog_id."','Followed')";
    $result=$connection->query($add_follower);
    if($result){
        header('location:'.$_SERVER['HTTP_REFERER']);
    }else{
        echo $connection->error;
    }

}

if(isset($_REQUEST['action'])&&$_REQUEST['action']=='unfollow_blog'){
    extract($_REQUEST);
    $unfollow="UPDATE following_blog set status = 'Unfollowed' WHERE blog_following_id='".$blog_id."' AND follower_id='".$_SESSION['user']['user_id']."'";
    $result=$connection->query($unfollow);
    if($result){
        header('location:'.$_SERVER['HTTP_REFERER']);
    }else{
        echo $connection->error;
    }

}

if(isset($_REQUEST['action'])&&$_REQUEST['action']=='follow_blog'){
    extract($_REQUEST);
    $follow="UPDATE following_blog set status = 'Followed' WHERE blog_following_id='".$blog_id."' AND follower_id='".$_SESSION['user']['user_id']."'";
    $result=$connection->query($follow);
    if($result){
        header('location:'.$_SERVER['HTTP_REFERER']);
    }else{
        echo $connection->error;
    }

}






?>