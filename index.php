<?php
require ("require/header.php");
?>

<?php
require ("require/navbar.php");
?>
<!-- Index Page Search -->
<div class="container-fluid search">
    <div class="row">
        <div class="col-sm-12 my-3 d-flex justify-content-end">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>
<!-- Index Page Search -->
<!-- Index Hero Header -->
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="Assets/heroimage2.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">NOTEBOOK.PK &#128221</h1>
            <p class="display-5 fs-5 fw-bold  lh-1 mb-3">By - AHMED MUJTABA JAWAD</p>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum debitis eligendi recusandae
                quam itaque aliquid ea. Magnam corporis tempore quaerat exercitationem ducimus consectetur eligendi ex
                maiores deserunt, nesciunt quasi recusandae?</p>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            </div>
        </div>
    </div>
</div>
<!-- Index hero Header -->



<!-- --------------------------------------Section Blogs-------------------------------- -->

<div class="container sectin3 my-2">

    <!-- S3-Row Blogs Heading -->

    <div class="row categoryHead">
        <div class="col-sm-12 text-center">
            <h2 class="display-4 fs-2">Recent Blogs &#128220</h2>
        </div>
    </div>
    <!-- S3-Row blogs Heading -->



    <!-- S3-Row view more-->

    <div class="row categoryvm">
        <div class="col-sm-12 text-end">
            <h2 class=" fs-6 text-decoration-underline"><a href="all_blogs.php">View More</a></h2>
        </div>
    </div>
    <!-- S3-Row Category view more -->




    <!-- S3-Row Category Cards -->
    <div class="row cards my-1 text-center gy-2">
        <?php 
          
$query="SELECT blog_id,user_id,blog_title,blog_background_image,first_name,last_name FROM BLOG JOIN USER USING(user_id) where blog_status='Active' order by blog_id desc limit 0,4 ";
$result=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($result)){
  extract($row);
            ?>

        <div class="col-sm-3">
            <div class="card">
                <img src="<?=$blog_background_image?>" class="card-img-top" alt="..." height=300 width="200">
                <div class="card-body">
                    <h5 class="card-title"><?=$blog_title?></h5>
                    <hr>
                    <p class="card-text">Created by - <?= isset($_SESSION['user']['user_id'])&&$_SESSION['user']['user_id']==$user_id?"You":$first_name." ".$last_name  ?></p>
                    <?php
                    if(isset($_SESSION['user']['user_id'])&&$_SESSION['user']['user_id']==$user_id){
                      ?>
                    <a href="admin_view_blogs.php" 
                        class="btn btn-outline-info">Go to Settings</a>
                        <?php
                    }elseif(!isset($_SESSION['user'])){
                      ?>
                       <a href="user_login.php?msg=You need to Log in first to Follow any Blog&color=alert-warning"
                          class="btn btn-outline-primary">Follow</a>
                           <?php
                    }elseif(isset($_SESSION['user'])){
                        $follower="SELECT * FROM following_blog where follower_id='".$_SESSION['user']['user_id']."' and
                         blog_following_id='".$blog_id."'";
                        $follow=$connection->query($follower);
                         if($follow->num_rows>0){
                            $row=$follow->fetch_assoc();
                            extract($row);
                            if($_SESSION['user']['user_id']==$follower_id && $status=='Followed'){
                                ?>
                             <a href="admin_blog_process.php?blog_id=<?=$blog_id?>&action=unfollow_blog"
                             class="btn btn-outline-danger">Unfollow</a>
                                <?php
                            }elseif($_SESSION['user']['user_id']==$follower_id && $status=='Unfollowed'){
                                ?>       
                            <a href="admin_blog_process.php?blog_id=<?=$blog_id?>&action=follow_blog"
                            class="btn btn-outline-primary">Follow</a>
                                <?php
                            }elseif($_SESSION['user']['user_id']!==$follower_id){
                                ?>
                                <a href="admin_blog_process.php?blog_id=<?=$blog_id?>&action=add_follower"
                                class="btn btn-outline-primary">Follow</a>
                                <?php
                            }
                         }else{
                            ?>
                            <a href="admin_blog_process.php?blog_id=<?=$blog_id?>&action=add_follower"
                            class="btn btn-outline-primary">Follow</a>
                            <?php
                         }
                        ?>
                        <?php
                      }
                      ?>
                      <a href="view_blog.php?blog_id=<?=$blog_id?>"
                          class="btn btn-outline-secondary">View</a>

                </div>
            </div>
        </div>


        <?php
          }
          ?>
    </div>
    <!-- S3-Row blog Cards -->

</div>

<!-- Section - 3 BLogs -->



<!-- Section 4 category`` -->

<div class="container sectin3 my-5" id="category">

    <!-- S3-Row Category Heading -->

    <div class="row categoryHead">
        <div class="col-sm-12 text-center">
            <h2 class="display-4 fs-3 ">Categories &#128196</h2>
        </div>
    </div>
    <!-- S3-Row Category Heading -->



    <!-- S3-Row view more-->

    <div class="row categoryvm">
        <div class="col-sm-12 text-end">
            <h2 class=" fs-6 text-decoration-underline"><a href="all_category.php">View More</a></h2>
        </div>
    </div>
    <!-- S3-Row Category view more -->




    <!-- S3-Row Category Cards -->
    <div class="row cards my-1 text-center gy-2">
        <?php
        $query="SELECT category_id,category_title,category_description FROM category where category_status='Active' ORDER BY (category_id) DESC LIMIT 0,4";
        $result=$connection->query($query);

         while($row=$result->fetch_assoc()){
            extract($row);
         ?>

        <div class="col-sm-3">
            <div class="card">
                <!-- <img src="Assets/sports.jpg" class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title"><?=$category_title?></h5>
                    <p class="card-text"><?=$category_description?></p>
                    <a href="view_category.php?category_id=<?=$category_id?>" class="btn btn-primary">Explore</a>
                </div>
            </div>
        </div>


        <?php
       }
       ?>
    </div>
    <!-- S3-Row Category Cards -->

</div>

<!-- Section - 4 -->

<div class="container section4 my-3" id="posts">
    <!-- Section 4 - Row Heading -->
    <div class="row s4head">
        <div class="col-sm-12 text-center">
            <h2 class="display-4 fs-2 ">Recent Posts &#128204</h2>
        </div>
    </div>
    <!-- Section 4 - Row Heading -->


    <!-- S4-Row view more-->

    <div class="row categoryHead">
        <div class="col-sm-12 text-end">
            <h2 class=" fs-6 text-decoration-underline"><a href="all_posts.php">View More</a></h2>
        </div>
    </div>
    <!-- S4-Row Category view more -->

    <!-- Section 4 Row Post cards -->

    <div class="row postcards">

        <?php
        $query="    SELECT * FROM post p
                    INNER JOIN blog b
                    ON p.blog_id = b.blog_id
                    INNER JOIN post_category pc
                    ON pc.post_id = p.post_id
                    INNER JOIN category c
                    ON pc.category_id = c.category_id 
                    inner join user u on u.user_id=b.user_id
                    -- LEFT JOIN post_atachment pa ON pa.post_id=p.post_id   
                    where p.`post_status`='Active'
                    and b.blog_status='Active'         
                    order by p.post_id desc limit 0,4";
            $result=$connection->query($query);
            while($row=$result->fetch_assoc()){
                extract($row);
            ?>

        <div class="col-sm-12 cardinside">
            <div class="card mb-3 fit">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?=$featured_image?>" class="img-fluid rounded-start" alt="..." height="100" width="500">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?=$post_title?></h5>
                            <p class="card-title fw-bold">Blog : <?=$blog_title?></p>
                            <p class="card-title fw-bold">Category : <?=$category_title?></p>
                            <h6 class="card-title">Author : <?=$first_name." ".$last_name?></h6>
                            <p class="card-text">Summary: <?=$post_summary?></p>
                            <p class="card-text"><?=substr($post_description,0,199)?></p>
                            <p class="card-text">
                            <a href="view_post.php?post_id=<?=$post_id?>" class="btn btn-outline-success">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            }
            ?>
    </div>
</div>

<!-- Section 4 Row post cards -->






<?php
require ("require/footer.php");
?>