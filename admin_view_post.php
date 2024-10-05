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
                <h2 class="display-4 fs-2"> View All Post </h2>
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
                        <th>Category</th>
                        <th>Post Title</th>
                        <th>Post Summary</th>
                        <th>Post Description</th>
                        <th>Post Image</th>
                        <th>Post Status</th>
                        <th>Comments</th>
                        <th>Post Setting</th>
                        <th>Post Action</th>
                        <th>Comments</th>
                        <th>Comments</th>

                    </tr>
                </thead>
                <tbody style="overflow: scroll;">
                    <?php 
                    $count=1;
                    $query="SELECT * FROM post p
                    INNER JOIN blog b
                    ON p.blog_id = b.blog_id
                    INNER JOIN post_category pc
                    ON pc.post_id = p.post_id
                    INNER JOIN category c
                    ON pc.category_id = c.category_id
                    where user_id='".$_SESSION['user']['user_id']."'   
                    order by p.post_id desc";
                  
                    $result=mysqli_query($connection,$query);
                    while($posts=mysqli_fetch_assoc($result)){
                        extract($posts);
                        ?>
                    <tr>

                        <td><?=$count++?></td>
                        <td class="fw-bold"><?=$blog_title?></td>
                        <td class="fw-bold text-danger"><?=$category_title?></td>
                        <td><?=$post_title?></td>
                        <td><?=$post_summary?></td>
                        <td><?=$post_description?"<a href='view_post.php?post_id=$post_id'>View on page</a>":""?></td>
                        <td><img src="<?=$featured_image?>" alt="" height="50" width="50"></td>
                        <td class="fw-bold <?=$post_status=='Active'?"text-success":"text-danger"?>"><?=$post_status?>
                        </td>
                        <td><?=$is_comment_allowed=='1'?"Allowed":"Not Allowed"?></td>
                        <td><?php
                            if($post_status=='Active'){
                                ?>

                            <a href="admin_post_process.php?post_id=<?=$post_id?>&post=deactive"
                                class="btn btn-outline-warning my-1">InActive</a>
                            <?php
                            }else{
                                ?>
                            <a href="admin_post_process.php?post_id=<?=$post_id
                        ?>&post=active" class="btn btn-outline-success my-1">Active</a>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <a href="admin_add_post.php?post_id=<?=$post_id?>" class="btn btn-outline-info">Edit</a>

                        </td>
                        <td>
                            <?php
                            if($is_comment_allowed=='1'){
                                ?>

                            <a href="admin_post_process.php?post_id=<?=$post_id?>&comments=off"
                                class="btn btn-outline-danger my-1">Turn off</a>
                            <?php
                            }else{
                                ?>
                            <a href="admin_post_process.php?post_id=<?=$post_id
                            ?>&comments=on" class="btn btn-outline-success my-1">Turn On</a>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            $attachment="Select * from post_atachment pa inner join post p on pa.post_id='".$post_id."'";
                            $post_atachments=$connection->query($attachment);
                            if($post_atachments->num_rows>0){
                                $data=$post_atachments->fetch_assoc();
                                extract($data);
                                ?>
                                <a href="<?=$post_attachment_path?>" class="btn btn-outline-warning">View Attachment</a>
                           <?php
                            }else{
                                ?>
                                <button type="button" class="btn btn-secondary" disabled>No Attachments</button>
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