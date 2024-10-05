<?php
session_start();
require('require/database_connection.php');
?>
<?php
if(isset($_POST['add_category'])){
    extract($_POST);
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $category_title=htmlspecialchars($category_title);
    $category_description=htmlspecialchars($category_description);
    $querry="INSERT INTO category(category_id,category_title,category_description,category_status) VALUES(NULL,'".$category_title."','".$category_description."','".$category_status."')";
    $result=$connection->query($querry);

    if($result){
    header('location:admin_add_category.php?msg=Category added successfully&color=alert-success');
    }else{
    echo mysqli_error($connection);
    $connection->close();


}
}
if(isset($_REQUEST['action'])&&$_REQUEST['action']=='active'){
    extract($_REQUEST);

    $query="UPDATE category set category_status='Active' WHERE category_id='".$category_id."'";
    $result=mysqli_query($connection,$query);
    if($result){
        header('location:admin_view_category.php?msg=Category Active&color=alert-success');
    }
  
  }elseif(isset($_REQUEST['action'])&&$_REQUEST['action']=='deactive'){
    extract($_REQUEST);

    $query="UPDATE category set category_status='InActive' WHERE category_id='".$category_id."'";
    $result=mysqli_query($connection,$query);
    if($result){
        header('location:admin_view_category.php?msg=Category InActiveted &color=alert-warning');
    }


  }

  if(isset($_POST['update_category'])){
    //  print_r($_POST);
    extract($_POST);
    $querry="UPDATE category SET category_title='".$category_title."',category_description='".$category_description."', category_status='".$category_status."' WHERE 
    category_id='".$category_id."' ";
$result=$connection->query($querry);
if($result){
    header('location:admin_view_category.php?msg=Category Updated&color=alert-success');
}
}
?>