<?php
include ("require/header.php");
?>

<?php
include ("require/navbar.php");
?>

<div class="container sectin3 my-2">

    <!-- S3-Row Blogs Heading -->

    <div class="row categoryHead">
    <div class="alert <?= $_REQUEST['color']??""?> text-center fw-bold" role="alert">
  <?= $_REQUEST['msg']??""?>
</div>
        <div class="col-sm-12 text-center my-5">
            <h2 class="display-4 fs-2 fw-bold">An honest feedback will be appreciated....	</h2>
            <p class="">Regards - Team NOOTBOOK.PK</p>
        </div>
    </div>


    


    <div class="row">
    <div class="col-sm-12 mx-5 my-3 px-0">
<!-- Content  -->
<form action="feedback_process.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label display-5 fs-2">Email</label>
    <input type="email" value="<?=isset($_SESSION['user'])?$_SESSION['user']['email']:""?>" class="form-control" id="exampleInputEmail1" name="fb_email" aria-describedby="emailHelp" <?=isset($_SESSION['user'])?"readonly":""?> required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label display-5 fs-2">Name</label>
    <input type="text" value="<?=isset($_SESSION['user'])?$_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']:""?>" class="form-control" id="exampleInputEmail1" name="fbname" aria-describedby="emailHelp" <?=isset($_SESSION['user'])?"readonly":""?> required>
  </div>
  <div class="mb-3 my-4">
    <label for="exampleInputEmail1" class="form-label display-5 fs-3">Your Feedback</label>
    <textarea class="form-control" name="fbdescription" id="floatingTextarea2" style="height: 100px" required></textarea>
  </div>
  <button type="submit" name="submit_feedback" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
<!-- Content -->

    </div>
    <!-- S3-Row Category Heading -->


<?php
include("require/footer.php");
?>