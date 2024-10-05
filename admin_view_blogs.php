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
        <div class="col-sm-9 mx-5 my-3">

            <div class="col-sm-12 text-center">
                <h2 class="display-4 fs-2"> All Blogs </h2>
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

            <table id="example" class="table table-bordered display mx-3 text-center" style="width:100%">
                <thead>
                    <tr>

                        <th>S.no</th>
                        <th>Blog Title</th>
                        <th>Post/Page</th>
                        <th>Blog Status</th>
                        <th>Created at</th>
                        <th>Blog Action</th>
                        <th>Blog Settings</th>
                        <th>Updated at</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                    $query="SELECT * FROM blog where user_id='".$_SESSION['user']['user_id']."' order by (blog_id) DESC" ;
                    $result=mysqli_query($connection,$query);
                    while($blogs=mysqli_fetch_assoc($result)){
                        extract($blogs);
                        ?>
                    <tr>

                        <td><?= $count++ ?></td>
                        <td><?=$blog_title?></td>
                        <td><?=$post_per_page?></td>
                        <td class="fw-bold <?=$blog_status=='Active'?"text-success":"text-danger"?>"><?=$blog_status?></td>
                        <td><?=$created_at?></td>
                        <td>
                            <?php
                            if($blog_status=='Active'){
                                ?>
                                
                            <a href="admin_blog_process.php?blog_id=<?=$blog_id?>&blog=deactive"
                                class="btn btn-outline-warning my-1">InActive</a>
                                <?php
                            }else{
                                ?>
                            <a href="admin_blog_process.php?blog_id=<?=$blog_id
                        ?>&blog=active"
                                class="btn btn-outline-success my-1">Active</a>
                         <?php
                            }
                            ?>
                        </td>
                        <td>
                            <a href="admin_add_blog.php?blog_id=<?=$blog_id?>"
                                class="btn btn-outline-info my-1">Update</a>
                                
                            <a href="view_blog.php?blog_id=<?=$blog_id?>"
                                class="btn btn-outline-danger my-1">View</a>
                        </td>

                        <td><?=$updated_at?></td>
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