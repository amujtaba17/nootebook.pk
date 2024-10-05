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
        <div class="col-sm-9 mx-4 my-3">

            <div class="col-sm-12 text-center">
                <h2 class="display-4 fs-2"> Comments </h2>
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

            <table id="example" class="table table-bordered display text-center" style="width:100%">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Blog Title</th>
                        <th>Post Title</th>
                        <th>Comment</th>
                        <th>By User</th>
                        <th>Time Recieved</th>
                        <th>Status</th>
                        <th>Action</th>
                        <!-- <th>Post Status</th>
                        <th>Comments</th>
                        <th>Post Setting</th>
                        <th>Post Action</th>
                        <th>Comments</th>
                        <th>Comments</th>
 -->
                    </tr>
                </thead>
                <tbody style="overflow-x: scroll;">
                    <?php 
                    $count=1;
                    // $query="SELECT post_comment.*,blog.`blog_title`,post.* FROM post_comment JOIN post ON post.`post_id`=post_comment.`post_id` JOIN blog ON blog.`blog_id`=post.blog_id
                    //     WHERE blog.`user_id`='".$_SESSION['user']['user_id']."'";
                    $query="SELECT post_comment.*,blog.`blog_title`,post.*,user.`first_name`,`last_name` FROM post_comment JOIN post ON post.`post_id`=post_comment.`post_id` JOIN blog ON blog.`blog_id`=post.blog_id
                         JOIN USER ON 
                         user.`user_id`=post_comment.`user_id` 
                        WHERE blog.`user_id`='".$_SESSION['user']['user_id']."' order by post_comment_id DESC";
                  
                    $result=mysqli_query($connection,$query);
                    while($comments=mysqli_fetch_assoc($result)){
                        extract($comments);
                        ?>
                    <tr>

                        <td><?=$count++?></td>
                        <td class="fw-bold"><?=$blog_title?></td>
                        <td class="fw-bold text-danger"><?=$post_title?></td>
                        <td><?=$comment?></td>
                        <td><?=$first_name." ".$last_name?></td>
                        <td><?=$comment_time?></td>
                        
                        <td class="fw-bold <?=$is_active=='Active'?"text-success":"text-danger"?>"><?=$is_active?>
                        </td>
                        <td><?php
                            if($is_active=='Active'){
                                ?>

                            <a href="comment_process.php?pc_id=<?=$post_comment_id?>&comment=deactive"
                                class="btn btn-outline-warning my-1">InActive</a>
                            <?php
                            }else{
                                ?>
                             <a href="comment_process.php?pc_id=<?=$post_comment_id?>&comment=active"
                                class="btn btn-outline-success my-1">Active</a>
                            <?php
                            }
                            ?>
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