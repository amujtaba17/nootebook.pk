<?php
session_start();


session_destroy();

	header('location:user_login.php?msg=Logged out Successfully&color=alert-success');


?>