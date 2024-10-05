<?php
session_start();
if(isset($_SESSION['user'])){
    if(isset($_SESSION['user'])&&$_SESSION['user']['role_id']==2){
        header('location:index.php');
    }
}else{
    header('location:user_login.php?msg=Error: Permissions restricted to ADMIN only&color=alert-danger');
}
?>
<?php
require('require/database_connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="Files/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="Files/dataTables.dataTables.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/heroes.css">
    <link rel="stylesheet" href="bootstrap/sidebars.css">
    <title>21690_Ahmed_Blog</title>
</head>

<body></body>