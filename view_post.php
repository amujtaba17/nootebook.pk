<?php
// print_r($_REQUEST);
include("require/header.php");
?>
<?php
include("require/navbar.php")
?>
<?php
extract($_REQUEST);
$query="    SELECT * FROM post p
                    INNER JOIN blog b
                    ON p.blog_id = b.blog_id
                    INNER JOIN post_category pc
                    ON pc.post_id = p.post_id
                    INNER JOIN category c
                    ON pc.category_id = c.category_id 
                    inner join user u on u.user_id=b.user_id
                    -- LEFT JOIN post_atachment pa ON pa.post_id=p.post_id   
                    where p.post_id='".$post_id."'";
            $result=$connection->query($query);
            // var_dump($result);
            $post_data=$result->fetch_assoc();
            extract($post_data);
// echo"<pre>";
// var_dump($post_data);
?>

<div class="container-fluid my-3">
    <div class="row my-2">
        <div class="col-sm-12">
            <h1 class="display-1 text-center fs-2 fw-bold  border-bottom p-3" style="font-family:Gowun Batang">
                <?=$post_title?> </h1>
        </div>
    </div>




    <div class="row my-4">
        <div class="col-sm-4">
            <img src="<?=$featured_image?>" class="img-fluid shadow-sm" alt="...">
        </div>

        <div class="col-sm-8">
            <h1 class="text-danger" style="font-family:Gowun Batang"><?=$post_summary?></h1>
            <h6 style="font-family:Gowun Batang" class="fw-bold fs-5">Blog : <?=$blog_title?></h6>

            <p style="font-family:Gowun Batang" class="fw-bolder">Author : <img src="<?=$user_image?>" class="img-fluid"
                    alt="..." height="25" width="25" style="border-radius: 40px;"> <?=$first_name." ".$last_name?>

            </p>
            <p class="text-success">Category : <?=$category_title?> </p>
            <h4>Description:</h4>
            <p style="font-family:unlock display;"><?=$post_description?></p>
            <h4>Attachments</h4>
            <?php
            $attachment="SELECT * FROM post_atachment where post_id='".$post_id."'";
            $attachment_success=mysqli_query($connection,$attachment);
            if($attachment_success->num_rows>0){
                $contain_attachments=$attachment_success->fetch_assoc();
                extract($contain_attachments);
            ?>
            <?php if(!isset($_SESSION['user'])){
                ?>
               <button type="button" class="btn btn-danger" disabled>Contains Attachment but Login is Required</button>
               <?php
            }elseif(isset($_SESSION['user'])){   
             ?>
             <a href="<?=$post_attachment_path?>" class=" btn btn-outline-warning"><?=$post_attachment_path?></a>
         <?php
            }
            ?>
            <?php
        }else{
                    ?>
            <button type="button" class="btn btn-warning" disabled>No Attachments</button>
            <?php
                 }
                 ?>
        
            <div class="comment-section">
                <h2>Comments</h2>
                <!-- Comment input form -->
                <form action="comment_process.php" method="post" class="comment-form">
                    <?php
                    if(!isset($_SESSION['user'])){
                        ?>
                    <h5 class="text-danger">Please Login to access this section</h5>
                    <?php
                    }
                    elseif($is_comment_allowed==1){
                        ?>
                    <img src="<?=$_SESSION['user']['user_image']?>" alt="User avatar">
                    <textarea placeholder="Write a comment..." name="comment_detail" required></textarea>
                    <input type="hidden" name="post_id" value="<?=$post_id?>">
                    <button type="submit" name="add_comment" required>Post</button>
                    <?php
                    }else{
                        ?>
                    <!-- <textarea placeholder="Write a comment..." readonly></textarea> -->
                    <h6>Admin has turned off commenting</h6>

                    <?php
                    }
                    ?>
                    <!-- <textarea placeholder="Write a comment..."></textarea>
                    <button type="submit" name="add_comment" onclick="addComment()">Post</button> -->
                </form>

                <!-- Comment list -->
                <div class="comments-list" id="commentsList">
                    <!-- User comments will appear here -->
                    <?php
                     $comments=" SELECT * FROM post_comment pc
                    INNER JOIN post p ON
                    p.post_id=pc.post_id
                    INNER JOIN USER u ON u.user_id=pc.user_id
                    WHERE p.post_id='".$post_id."' and pc.is_active='Active'
                    order by post_comment_id desc";
                    $fetch=$connection->query($comments);
                    if($fetch->num_rows>0){
                    while($data=$fetch->fetch_assoc()){
                        extract($data);
                        ?>
                        <?php
                        if(isset($_SESSION['user'])){
                            ?>
                            <div class="comment-card">
                        <!-- Comment Header with user avatar and name -->
                        
                        <div class="comment-header">
                            <img src="<?=$user_image?>" alt="User avatar">
                            <div class="user-info">
                                <p class="user-name fw-bold"><?=$first_name." ".$last_name?></p>
                                <p class="comment-time fw-bold text-danger"><?=$comment_time?></p>
                            </div>
                        </div>

                        <!-- Comment Body -->
                        <div class="comment-body">
                            <p><?=$comment?></p>
                        </div>
                        <!-- Comment Footer (like, reply options) -->
                    </div>
                    <?php
                        }
                    }
                    }
                    ?>


                </div>
            </div>




        </div>

    </div>


</div>






<?php
include("require/footer.php")
?>