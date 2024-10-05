<?php
require("require/admin_header.php");
?>




<?php
require("require/admin_nav.php");
?>


<div class="container-fluid">
	<div class="row mainrow">

<!-- Admin Side Bar ------------------------------------------------------------->
	<div class="col-sm-3 px-0" style="width: 250px;">
			<?php
require("require/admin_sidebar.php");
             ?>
	</div>
<!-- Admin Side Bar ------------------------------------------------------------->


<!--------------- Content Manager coloumn -->
<?php
if(isset($_REQUEST['user_id'])){
    extract($_REQUEST);
    $query="SELECT * FROM USER JOIN role USING(role_id) WHERE user_id='".$user_id."'";
    $result=mysqli_query($connection,$query);
    $data=mysqli_fetch_assoc($result);
    extract($data);
}
?>
<div class="col-sm-9 mx-5 my-2 px-0">
<!-- Content  -->
<div class="row contentrow text-start">
<div class="col-sm-12  text-center border bg-info mx-1 my-1 ">
            <h2 class="display-4 fs-2 text-light"><?=isset($_REQUEST['user_id'])?"Update User":"Add New User"?></h2>
        </div>

        
        <div class="col-sm-12 text-center mt-3">
<?php
if(isset($_REQUEST['user_id'])){
    ?>
    <img src="<?=$user_image?>" alt="" height="150" width="150">
    <?php
}
?>
        </div>

 <?php if(isset($_REQUEST['msg'])){
  ?>
                <div class="alert <?= $_REQUEST['color']??"" ?> text-center fw-bold" role="alert"
                    style="width: 400px; margin-left: 400px; margin-top: 40px;">
                    <?= $_REQUEST['msg']??""?>
                </div>

                <?php  
}
?>

<?php

?>

        <form action="admin_user_processes.php" method="POST" class="mx-2 my-3" onsubmit="return admin_user_form_validation()" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">First Name</span>
            </div>
            <input type="text" name="firstname" value="<?=$first_name??""?>" id="firstname" class="form-control" placeholder="Enter your First Name" aria-label="Username"
                aria-describedby="basic-addon1">
                <div class="input-group mx-2 my-1 valmsg">
                <span class="text-danger" id="firstname_msg"></span>
            </div>
        </div>
<!-- -------------------------------------------------------------------------------------------------------------------------- -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Last Name</span>
            </div>
            <input type="text" name="lastname" value="<?=$last_name??""?>" id="lastname" class="form-control" placeholder="Enter your Last Name" aria-label="Username"
                aria-describedby="basic-addon1">
                <div class="input-group mx-2 my-1 valmsg">
                <span class="text-danger" id="lastname_msg"></span>
            </div>
        </div>
<!--  --------------------------------------------------------------------------------------------------------- -->
  <!-- -------------------------------------------------------------------------------------------------------------------------- -->
  <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Email</span>
            </div>
            <input type="text" name="email" value="<?=$email??""?>" id="email" class="form-control" placeholder="Enter your Email" aria-label="Username"
                aria-describedby="basic-addon1" <?=isset($_REQUEST['user_id'])?"readonly":""?>>
                <div class="input-group mx-2 my-1 valmsg">
                <span class="text-danger" id="email_msg"></span>
            </div>
        </div>
<!--  --------------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------------------------------- -->
<div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Password</span>
            </div>
            <input type="password" value="<?=$password??""?>" name="password" id="password" class="form-control" placeholder="Enter your Password" aria-label="Username" aria-describedby="basic-addon1" <?=isset($_REQUEST['user_id'])?"readonly":""?>>
            <input type="checkbox" onchange="showpas()" class="mx-1" id="show"><span class="my-2 fw-bold">Show</span>
                <div class="input-group mx-2 my-1 valmsg">
                <span class="text-danger" id="password_msg"></span>
            </div>
        </div>
<!--  --------------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------------------------------- -->
<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0 fw-bold">Gender:</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" <?=isset($gender)&&$gender=="Male"?"Checked":""?>>
        <label class="form-check-label" for="gridRadios1">
          Male
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female" <?=isset($gender)&&$gender=="Female"?"Checked":""?>>
        <label class="form-check-label" for="gridRadios2">
          Female
        </label>
        <div class="input-group mx-2 my-1 valmsg">
                <span class="text-danger" id="gender_msg"></span>
            </div>
      </div>
    </div>
  </fieldset><!--  --------------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------------------------------- -->
<div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Birth Date</span>
            </div>
            <input type="date" value="<?=$date_of_birth??""?>" name="date_of_birth" id="dob" class="form-control" placeholder="" aria-label="Username"
                aria-describedby="basic-addon1">
                <div class="input-group mx-2 my-1 valmsg">
                <span class="text-danger" id="birth_message"></span>
            </div>
        </div>
<!--  --------------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------------------------------- -->
<div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Profile</span>
            </div>
            <input type="file" name="imagefile" id="profilepic" class="form-control" placeholder="" aria-label="Username"
                aria-describedby="basic-addon1"<?=isset($_REQUEST['user_id'])?" ":"required"?> >
                <input type="hidden" value="<?=$user_image??""?>" name="old_image">
                <div class="input-group mx-2 my-1 valmsg">
                <span class="text-danger" id="profile_msg"></span>
            </div>
        </div>
<!--  ----------------------------------------------------------------------------------------------------------->
<div class="mb-3">
  <select class="form-select" id="role" name="user_role" aria-label="Default select example">
  <option value="<?=$role_id??""?>" <?=isset($role_id)&&($role_id==1||$role_id==2)?"Selected":""?>><?=$role_type??"Select Role"?></option>
    <?php $query="SELECT * From role";
    $result=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($result)){
        extract($row);
        ?>
     <option value="<?=$role_id?>"><?=$role_type?></option>
     <?php      
    }
?>
  
  </select>
  <div class="input-group mx-3 my-1 valmsg">
                <span class="text-danger" id="role_msg"></span>
            </div>
  </div>
<!-- ---------------------------------------------
------------------------------------------------------------------ -->
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Address</span>
            </div>
            <input type="text" value="<?=$address??""?>" name="address" id="addressline" class="form-control" placeholder="Address Line 1" aria-label="Username"
                aria-describedby="basic-addon1">
                <div class="input-group mx-2 my-1 valmsg">
                <span class="text-danger" id="addressmsg"></span>
            </div>
        </div>
        <?php
        if(isset($_REQUEST['user_id'])){
            ?>
            <input type="hidden" name="user_id" value="<?=$user_id??""?>">
            <?php
        }
        ?>
        <button type="submit" class="btn btn-outline-info shadow-lg" name="<?=isset($_REQUEST['user_id'])?"admin_update":"admin_register"?>"><?=isset($_REQUEST['user_id'])?"Update User":"Add User"?></button>
    </form>




    </div>
</div>

<!-- Content -->
	
</div>
<!--------------- Content Manager Column  --------------------------------------------------->




</div>

<?php
require("require/footer.php");
?>
