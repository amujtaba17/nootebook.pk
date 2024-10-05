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
        <div class="col-sm-9 mx-5 my-3 px-0">
            <!-- Content  -->
            <?php
                if(isset($_REQUEST['category_id'])){
                  extract($_REQUEST);
                  $querry="SELECT * FROM category where category_id='".$category_id."'";
                  $result=$connection->query($querry);
                  $row=$result->fetch_assoc();
                  extract($row);
                }
                ?>
            <div class="row contentrow text-start">
                <div class="col-sm-12 text-center">
                    <h2 class="display-4 fs-2"><?=isset($_REQUEST['category_id'])?"Update Category":"Add New Category"?>
                    </h2>
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

                <form action="admin_category_process.php" method="post" onsubmit="return category_validation()">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label display-5 fs-2">Category Title</label>
                        <input type="text" class="form-control" value="<?=$category_title??""?>" id="ctgtitle"
                            name="category_title" aria-describedby="emailHelp">
                        <div class="input-group mx-2 my-1 valmsg">
                            <span class="text-danger" id="ctgtitle_msg"></span>
                        </div>
                    </div>
                    <div class="mb-3 my-4">
                        <label for="exampleInputEmail1" class="form-label display-5 fs-3">Category Description</label>
                        <textarea class="form-control" name="category_description"
                            value="<?=$category_description??""?>" id="ctgdesc"
                            style="height: 100px"><?=$category_description??""?></textarea>
                        <div class="input-group mx-2 my-1 valmsg">
                            <span class="text-danger" id="ctgdesc_msg"></span>
                        </div>
                    </div>

                    <div class="mb-3 my-4">
                        <label for="exampleInputEmail1" class="form-label display-5 fs-3">Category Status</label>
                        <select class="form-select" id="ctgstatus" name="category_status"
                            aria-label="Default select example">
                            <option value="">Choose Status</option>
                            <option value="Active"
                                <?=isset($category_status)&&$category_status=="Active"?"Selected":""?>>Active</option>
                            <option value="InActive"
                                <?=isset($category_status)&&$category_status=="InActive"?"Selected":""?>>Inactive
                            </option>
                        </select>
                        <div class="input-group mx-2 my-1 valmsg">
                            <span class="text-danger" id="ctgstatus_msg"></span>
                        </div>
                    </div>
                    <?php
                    if(isset($_REQUEST['category_id'])){
                      ?>
                    <input type="hidden" name="category_id" value="<?=$category_id?>">
                    <?php
                    }
                    ?>
                    <button type="submit" name="<?=isset($_REQUEST['category_id'])?"update_category":"add_category"?>"
                        class="btn btn-primary"><?=isset($_REQUEST['category_id'])?"Update Category":"Add Category"?></button>
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