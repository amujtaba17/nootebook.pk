<?php
session_start();
require('require/database_connection.php');
?>
<?php
if(isset($_POST['add_comment'])){
    extract($_POST);
    $query="INSERT INTO post_comment(post_id,user_id,comment,is_active) VALUES
     ('".$post_id."','".$_SESSION['user']['user_id']."','".$comment_detail."','Active')";
     $result=$connection->query($query);
     if($result){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
     }
}




if(isset($_REQUEST['comment'])&& $_REQUEST['comment']=='deactive'){
   // print_r($_REQUEST);
   extract($_REQUEST);
   $comment_deactive="UPDATE post_comment set is_active='InActive' where post_comment_id = '".$pc_id."' ";
   $result=$connection->query($comment_deactive);
   if($result){
      header('location:admin_view_comments.php?msg=Comment will be hidden from post&color=alert-danger');
   }else{
      echo mysqli_error($connection);
   }


}elseif(isset($_REQUEST['comment'])&& $_REQUEST['comment']=='active'){
extract($_REQUEST);
   $comment_active="UPDATE post_comment set is_active='Active' where post_comment_id='".$pc_id."'";
   $result=$connection->query($comment_active);
   if($result){
      header('location:admin_view_comments.php?msg=Comment will be shown in post&color=alert-success');
   }
}
?>