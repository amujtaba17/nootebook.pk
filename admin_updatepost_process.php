<?php
include "require/database_connection.php";
date_default_timezone_set("Asia/karachi");
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";

if(isset($_POST['update_post'])){
$updated_at = date('Y-m-d H:i:s',time());
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
extract($_POST);
    $post_titl=htmlspecialchars($post_titl,true);
    $post_summary=htmlspecialchars($post_summary,true);
    $post_description=htmlspecialchars($post_description,true);


//     	$update_post="UPDATE post SET blog_id='".$blog_id."',
//         post_title='".$post_titl."',post_summary='".$post_summary."',
//         post_description='".$post_description."',
//         featured_image='".$old_featured_image."',
//         post_status='".$post_status."',
//         is_comment_allowed='".$comment_allow."',updated_at='".$updated_at."'
//         where post_id='".$post_id."'";
// echo $update_post;
// die();


if($_FILES['post_image']['size']>0){

$folder = "post_featured_images";
	if(!is_dir($folder)){

		if(!mkdir($folder)){
			echo "Could Not Create Directory".$folder;
	}
	}

	$postimage_name=$_FILES['post_image']['name'];
    $postimage_temp=$_FILES['post_image']['tmp_name'];
    $file_path = $folder."/".rand()."_".$postimage_name;

    if(move_uploaded_file($postimage_temp, $file_path)){
    	$update_post="UPDATE post SET blog_id='".$blog_id."',
        post_title='".$post_titl."',post_summary='".$post_summary."',
        post_description='".$post_description."',
        featured_image='".$file_path."',
        post_status='".$post_status."',
        is_comment_allowed='".$comment_allow."',updated_at='".$updated_at."'
        where post_id='".$post_id."'";
        $result=$connection->query($update_post); 	
    }


}else{

     	$update_post="UPDATE post SET blog_id='".$blog_id."',
         post_title='".$post_titl."',post_summary='".$post_summary."',
         post_description='".$post_description."',
         featured_image='".$old_featured_image."',
         post_status='".$post_status."',
         is_comment_allowed='".$comment_allow."',updated_at='".$updated_at."'
         where post_id='".$post_id."'";
         $result=$connection->query($update_post);

 }

 if($result){
 	$update_category="Update post_category set 
 	category_id='".$category_id."',updated_at='".$updated_at."'
 	where post_id='".$post_id."'";
 	$category=$connection->query($update_category);
 		 }
 
 if($category){
 	header('location:admin_view_post.php?msg=Post has been updated&color=alert-success');
 }else{
 	header('location:admin_view_post.php?msg=post not updated&color=alert-danger');
 	// echo mysqli_error($connection);
}		 



}


?>