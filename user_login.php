<?php
require("require/header.php");
if(isset($_SESSION['user'])){
    header('location:index.php');
}
?>


<?php
require("require/navbar.php");
?>


<div class="container form" style="margin-top:50px; width:500px;">

    <div class="row categoryHead mb-3">
        <div class="col-sm-12 text-center">

            <img src="Assets/logo.png" class="img-fluid" alt="..." style="height: 80px; width:80px;">
            <h2 class="display-5 fw-lighter">Sign in</h2>

        </div>
    </div>

    <div class="alert <?= $_REQUEST['color']??""?> text-center fw-bold" role="alert">
  <?= $_REQUEST['msg']??""?>
</div>

    <form action="user_logreg_processfile.php" method="POST">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Email</span>
            </div>
            <input type="text" name="email" class="form-control" placeholder="Enter your Email" aria-label="Username"
                aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Password</span>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Enter your Password" id="password" 
                aria-label="Username" aria-describedby="basic-addon1" required>

            <input type="checkbox" onchange="showpas()" class="mx-1" id="show"><span class="my-2 fw-bold">Show</span>
        </div>
        <button type="submit" name="login" class="btn btn-outline-info">Login</button>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
            data-bs-target="#exampleModal">Forget
            Password</button>
    </form>
</div>


<!-- Forget Password Model -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Forget Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="user_logreg_processfile.php" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="forgetemail" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger" name="forgetpassword">Send Confirmation Email</button>
            </div>
            </form>
        </div>

    </div>
</div>
</div>
<!-- Forget Password Model -->




<?php
require("require/footer.php");

?>