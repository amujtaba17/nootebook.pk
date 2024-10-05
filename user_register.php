<?php
require ('require/header.php');
if(isset($_SESSION['user'])){
    header('location:index.php');
}

?>

<?php
require ('require/navbar.php');
?>

<div class="container form" style="margin-top:50px; width:500px;">

    <div class="row categoryHead mb-3">
        <div class="col-sm-12 text-center">
            <h2 class="display-5 fs-2 fw-lighter">User Registration</h2>
        </div>
    </div>
    
    <div class="alert <?= $_REQUEST['color']??"" ?> text-center fw-bold" role="alert">
  <?= $_REQUEST['msg']??""?>
</div>

    <form action="user_logreg_processfile.php" method="POST" onsubmit="return user_form_validation()"
    enctype="multipart/form-data">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">First Name</span>
            </div>
            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter your First Name" aria-label="Username"
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
            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter your Last Name" aria-label="Username"
                aria-describedby="basic-addon1">
                <div class="input-group mx-2 my-1">
                <span class="text-danger" id="lastname_msg"></span>
            </div>
        </div>
<!--  --------------------------------------------------------------------------------------------------------- -->
  <!-- -------------------------------------------------------------------------------------------------------------------------- -->
  <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Email</span>
            </div>
            <input type="text" name="email" id="email" class="form-control" placeholder="Enter your Email" aria-label="Username"
                aria-describedby="basic-addon1">
                <div class="input-group mx-2 my-1">
                <span class="text-danger" id="email_msg"></span>
            </div>
        </div>
<!--  --------------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------------------------------- -->
<div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Password</span>
            </div>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" aria-label="Username"aria-describedby="basic-addon1">
            <input type="checkbox" onchange="showpas()" class="mx-1" id="show"><span class="my-2 fw-bold">Show</span>
                <div class="input-group mx-2 my-1">
                <span class="text-danger" id="password_msg"></span>
            </div>
        </div>
<!--  --------------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------------------------------- -->
<fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0 fw-bold">Gender:</legend>
    <div class="col-sm-10">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male">
        <label class="form-check-label" for="gridRadios1">
          Male
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
        <label class="form-check-label" for="gridRadios2">
          Female
        </label>
      </div>
      <div class="input-group mx-2 my-1">
                <span class="text-danger" id="gender_msg"></span>
            </div>
    </div>
  </fieldset><!--  --------------------------------------------------------------------------------------------------------- -->
<!-- -------------------------------------------------------------------------------------------------------------------------- -->
<div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Birth Date</span>
            </div>
            <input type="date" name="date_of_birth" id="dob" class="form-control" placeholder="" aria-label="Username"
                aria-describedby="basic-addon1">

      <div class="input-group mx-2 my-1">
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
                aria-describedby="basic-addon1" required>
                <div class="input-group mx-2 my-1">
                <span class="text-danger" id="profile_msg"></span>
            </div>
        </div>  
<!--  --------------------------------------------------------------------------------------------------------- -->

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Address</span>
            </div>
            <input type="text" name="address" id="addressline" class="form-control" placeholder="Address Line 1" aria-label="Username"
                aria-describedby="basic-addon1">
                <div class="input-group mx-2 my-1">
                <span class="text-danger" id="addressmsg"></span>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success shadow-lg" name="register" style="width: 480px;">Register</button>
    </form>
</div>
<?php
require ('require/footer.php');
?>