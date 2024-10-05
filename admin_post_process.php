<?php
include('require/database_connection.php');
?>
<?php
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";

if(isset($_POST['add_post'])){

// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// die();
    extract($_POST);
 
	$folder = "post_featured_images";
	if(!is_dir($folder)){

		if(!mkdir($folder)){
			echo "Could Not Create Directory".$folder;
		}
	}
    $post_titl=htmlspecialchars($post_titl,true);
    $post_summary=htmlspecialchars($post_summary,true);
    $post_description=htmlspecialchars($post_description,true);

    $postimage_name=$_FILES['post_image']['name'];
    $postimage_temp=$_FILES['post_image']['tmp_name'];
    $file_path = $folder."/".rand()."_".$postimage_name;

    if(move_uploaded_file($postimage_temp,$file_path)){
    $add_post="INSERT INTO post
    (blog_id,post_title,post_summary,post_description,featured_image,post_status,is_comment_allowed)
    VALUES('".$blog_id."','".$post_titl."','".$post_summary."','".$post_description."','".$file_path."', '".$post_status."' ,'".$comment_allow."')";
    $result=$connection->query($add_post);
    if($result){
        $post_id=$connection->insert_id;
        $add_category="INSERT INTO post_category(post_id,category_id) Values ('".$post_id."','".$category_id."')";
        $result=$connection->query($add_category);
        // header('location:admin_add_post.php?msg=Post Successfully published&color=alert-success');
    }
      
}
 
 if($_FILES['post_atachement']['size']>0){

    $folder = "post_atchments";
    if(!is_dir($folder)){

        if(!mkdir($folder)){
            echo "Could Not Create Directory".$folder;
        }
    }
     $post_id=$connection->insert_id;
    $atchment_name=$_FILES['post_atachement']['name'];
    $attch_temp=$_FILES['post_atachement']['tmp_name'];
    $file_path = $folder."/".rand()."_".$atchment_name;
    if(move_uploaded_file($attch_temp, $file_path)){
        $query="INSERT INTO post_atachment(post_id,post_attachment_title,post_attachment_path,is_active) VALUES('".$post_id."','".$atachment_title."','".$file_path."','Active')";
            $result=$connection->query($query);
    }

}


if($result){
    header('location:admin_add_post.php?msg=Post has been published&color=alert-success');
}else{
    echo mysqli_error($connection);
}


}

if(isset($_REQUEST['post'])&&$_REQUEST['post']=="active"){
extract($_REQUEST);

$query="UPDATE post SET post_status = 'Active' where post_id='".$post_id."'";
$result=$connection->query($query);
if($result){
    header('location:admin_view_post.php?msg=Post is now Live&color=alert-success');
}



}elseif(isset($_REQUEST['post'])&&$_REQUEST['post']=="deactive"){
    extract($_REQUEST);

$query="UPDATE post SET post_status = 'InActive' where post_id='".$post_id."'";
$result=$connection->query($query);

if($result){
    header('location:admin_view_post.php?msg=Post has been offlined&color=alert-danger');
}

}





 if(isset($_REQUEST['comments'])&&$_REQUEST['comments']=="off"){
    extract($_REQUEST);
    
    $query="UPDATE post SET is_comment_allowed = '0' where post_id='".$post_id."'";
    $result=$connection->query($query);
    if($result){
        header('location:admin_view_post.php?msg=Commenting has been turned off for this post&color=alert-danger');
    }
    
    
    
    }elseif(isset($_REQUEST['comments'])&&$_REQUEST['comments']=="on"){
        extract($_REQUEST);
    $query="UPDATE post SET is_comment_allowed = '1' where post_id='".$post_id."'";
    $result=$connection->query($query);
    
    if($result){
        header('location:admin_view_post.php?msg=Commenting has been turned on for this post&color=alert-success');
    }   
    
    }
    



// if(isset($_POST['update_post'])){
// extract($_POST);
// // echo "<pre>";
// // print_r($_POST);
// // print_r($_FILES);
// // echo "</pre>";
// if($_FILES['post_image']['size']>0){

//     $folder = "post_featured_images";
//     if(!is_dir($folder)){

//         if(!mkdir($folder)){
//             echo "Could Not Create Directory".$folder;
//         }
//     }
//     $post_titl=htmlspecialchars($post_titl,true);
//     $post_summary=htmlspecialchars($post_summary,true);
//     $post_description=htmlspecialchars($post_description,true);
//     $postimage_name=$_FILES['post_image']['name'];
//     $postimage_temp=$_FILES['post_image']['tmp_name'];
//     $file_path = $folder."/".rand()."_".$postimage_name;

//     $query="UPDATE post SET blog_id='".$blog_id."'
//     ,post_title

// }





?>