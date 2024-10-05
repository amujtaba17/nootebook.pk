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
        <?php
if(isset($_REQUEST['blog_id'])){
  extract($_REQUEST);
  $query="SELECT * FROM BLOG WHERE blog_id='".$blog_id."'";
  $result=mysqli_query($connection,$query);
  $row=mysqli_fetch_assoc($result);
  extract($row);
}
?>

        <!--------------- Content Manager coloumn -->
        <div class="col-sm-9 mx-5 my-3 px-0">
            <!-- Content  -->
            <div class="row contentrow text-start border border-info">
                <div class="col-sm-12 text-center border bg-info">
                    <h2 class="display-4 fs-2 text-light">
                        <?=isset($_REQUEST['blog_id'])?"Update Blog":"Add New Blog"?></h2>
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

                <form action="admin_blog_process.php" method="POST" enctype="multipart/form-data"
                    onsubmit="return blog_validation()">
                    <div class="mb-3 py-2">
                        <label for="exampleInputEmail1" class="form-label display-5 fs-2">Blog Title</label>
                        <input type="text" class="form-control" id="blogtitle" name="blog_title"
                            aria-describedby="emailHelp" value="<?=$blog_title??""?>">
                        <div class="input-group mx-2 my-1 valmsg">
                            <span class="text-danger" id="blogtitle_msg"></span>
                        </div>
                    </div>
                    <div class="mb-3 my-4">
                        <label class="form-label display-5 fs-3">Post per page</label>
                        <input type="number" class="form-control" name="post_per_page" id="postpg"
                            value="<?=$post_per_page??""?>">
                        <div class="input-group mx-2 my-1 valmsg">
                            <span class="text-danger" id="postpg_msg"></span>
                        </div>
                    </div>

                    <div class="mb-3 my-4">
                        <label for="exampleInputEmail1" class="form-label display-5 fs-3">Blog Background</label>
                        <input type="file" class="form-control" name="blog_image" id="postbg"
                            <?=isset($_REQUEST['blog_id'])?" ":"required"?>>
                        <div class="input-group mx-2 my-1 valmsg">
                            <span class="text-danger" id="blogbg_msg"></span>
                        </div>
                    </div>
                    <div class="mb-3 my-4">
                        <label for="exampleInputEmail1" class="form-label display-5 fs-3">Blog Status</label>
                        <select class="form-select" name="blog_status" id="blogstatus"
                            aria-label="Default select example">
                            <option value="">Choose Status</option>
                            <option value="Active" <?=isset($blog_status)&&$blog_status=="Active"?"Selected":""?>>Active
                            </option>
                            <option value="InActive" <?=isset($blog_status)&&$blog_status=="InActive"?"Selected":""?>>
                                Inactive</option>
                        </select>
                        <div class="input-group mx-2 my-1 valmsg">
                            <span class="text-danger" id="blogstatus_msg"></span>
                        </div>
                    </div>
                    <?php
  if(isset($_REQUEST['blog_id'])){
    ?>
                    <input type="hidden" name="blog_id" value="<?=$blog_id?>">
                    <input type="hidden" name="old_bg" value="<?=$blog_background_image?>">
                    <?php
  }

  ?>
                    <button type="submit" name="<?=isset($_REQUEST['blog_id'])?"update_blog":"create_blog"?>"
                        class="btn btn-primary mb-3"><?=isset($_REQUEST['blog_id'])?"Update Blog":"Add Blog"?></button>
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