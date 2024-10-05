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
        <div class="col-sm-9 mx-5 my-3 border-danger">
            <div class="col-sm-12 text-center">
                <h2 class="display-4 fs-2"> All Categories </h2>
            </div>
           
<?php if(isset($_REQUEST['msg'])){
  ?>
  <div class="alert <?= $_REQUEST['color']??"" ?> text-center fw-bold" role="alert"
                    style="width: 400px; margin-left: 400px; margin-top: 40px;">
                    <?= $_REQUEST['msg']??""?>
                </div>

<?php  
}
?>                 <table id="example" class=" table table-bordered text-center display mx-3" style="width:100%">
                <thead>
                    <tr>
                        <th>S no.</th>
                        <th>Category Title</th>
                        <th>Category Description</th>
                        <th>Category Status</th>
                        <th>Category Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                    $query="SELECT * FROM category";
                    $result=$connection->query($query);
                    while($row=$result->fetch_assoc()){
                        extract($row);
                        ?>
                    <tr>
                        <td><?=$count++?></td>
                        <td><?=$category_title?></td>
                        <td><?=$category_description?></td>
                        <td class="fw-bold <?=$category_status=='Active'?"text-success":"text-danger"?>"><?=$category_status?></td>
                        <td>
                            <?php
                            if($category_status=='Active'){
                                ?>

                            <a href="admin_category_process.php?category_id=<?=$category_id?>&action=deactive"
                                class="btn btn-outline-warning my-1">InActive</a>
                            <?php
                            }else{
                                ?>
                            <a href="admin_category_process.php?category_id=<?=$category_id?>&action=active"
                                class="btn btn-outline-success my-1">Active</a>
                            <?php
                            }
                            ?>
                            <a href="admin_add_category.php?category_id=<?=$category_id?>"
                                class="btn btn-outline-info my-1">Update</a>


                        </td>



                    </tr>
                    <?php
                    }
                    ?>

                </tbody>

            </table>

            <!-- Content  -->
        </div>
        <!--------------- Content Manager Column  --------------------------------------------------->

    </div>
</div>

<?php
require("require/footer.php");
?>