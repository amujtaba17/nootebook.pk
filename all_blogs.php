<?php
require('require/header.php');
?>

<?php
require('require/navbar.php');
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

<!-- 
<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="Assets/blog.jpg" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Blogs &#128220</h1>
            
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing, elit. Quos impedit, mollitia laborum vero eum non reiciendis molestiae voluptates eveniet, magni id, numquam ipsa officia voluptatum esse assumenda consectetur! Impedit, itaque!</p>
            </div>
        </div>
    </div> -->

<!-- Index hero Header -->


<div class="container sectin3 my-2">

    <!-- S3-Row Blogs Heading -->

    <div class="row categoryHead">
        <div class="col-sm-12 text-center my-2">
            <h2 class="display-4 fs-2 fw-bold">All Blogs</h2>
        </div>
    </div>
    <!-- S3-Row blogs Heading -->



    <!-- Blog Pagination -->
         <?php

              $per_page =8;
              
 /*------------Total Pages--------------------*/
          
              $query ="SELECT COUNT(blog_id) AS 'total_records' FROM blog"; 
              $result = mysqli_query($connection,$query);

              if ($result->num_rows > 0) {
                   
                   $data = mysqli_fetch_assoc($result);

                   $total_pages = ceil($data['total_records']/$per_page);

                   // echo $total_pages;
              }
              // ================================
              ?>
<?php
              if (isset($_GET['page'])) {
                  
                  $start = $_GET['page'] * $per_page;
              }else{

                   $start = 0;
                   $_GET['page'] = 0;
              }

          if ($_GET['page'] > 0) {
            ?>
              <a href="all_blogs.php?page=<?php echo $_GET['page']-1;?>">Previous</a>
            <?php
          }


          for ($i=1; $i <=$total_pages; $i++) { 

            if (isset($_GET['page']) && $_GET['page'] == $i-1) {
            ?>
             <a style="color:red;font-size :24px; padding:5px; text-decoration:none;" href="all_blogs.php?page=<?php echo $i-1; ?>"><?php echo $i;?></a>
            <?php
            }else{
                ?>
                 <a style="font-size :24px; padding:5px; text-decoration:none;" href="all_blogs.php?page=<?php echo $i-1; ?>"><?php echo $i;?></a>
                <?php
            }
          }

          if ($_GET['page'] < $total_pages-1) {
            ?>
              <a href="all_blogs.php?page=<?php echo $_GET['page']+1;?>">Next</a>
            <?php
          }

    ?>
    <!-- Blog Pagination -->




    <!-- S3-Row Category Cards -->
    <div class="row cards my-1 text-center gy-2">
        <?php 
          
$query="SELECT * FROM BLOG
 JOIN USER USING(user_id) 
 WHERE blog_status='Active'
 order by blog_id desc 
 LIMIT $start,$per_page ";
$result=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($result)){
  extract($row);
            ?>

        <div class="col-sm-3">
            <div class="card">
                <img src="<?=$blog_background_image?>" class="card-img-top" alt="..." height=300 width="200">
                <div class="card-body">
                    <h5 class="card-title fw-bold"><?=$blog_title?></h5>
                    <hr>
                    <p class="card-text">Created by - <?= isset($_SESSION['user']['user_id'])&&$_SESSION['user']['user_id']==$user_id?"You":$first_name." ".$last_name  ?></p>
                    <?php
                    if(isset($_SESSION['user']['user_id'])&&$_SESSION['user']['user_id']==$user_id){
                      ?>
                    <a href="admin_view_blogs.php" 
                        class="btn btn-outline-info">Go to Settings</a>
                        <!-- <a href=""class="btn btn-outline-secondary">View</a> -->
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
<?php
require('require/footer.php');
?>
