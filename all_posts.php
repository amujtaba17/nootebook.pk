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
            <h2 class="display-4 fs-2 fw-bold">All Posts</h2>
        </div>
    </div>
    <!-- S3-Row blogs Heading -->



    <!-- Blog Pagination -->
         <?php

              $per_page=4;
              
 /*------------Total Pages--------------------*/
          
              $query ="SELECT COUNT(post_id) AS 'total_records' FROM post"; 
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
              <a href="all_posts.php?page=<?php echo $_GET['page']-1;?>">Previous</a>
            <?php
          }


          for ($i=1; $i <=$total_pages; $i++) { 

            if (isset($_GET['page']) && $_GET['page'] == $i-1) {
            ?>
             <a style="color:red;font-size :24px; padding:5px; text-decoration:none;" href="all_posts.php?page=<?php echo $i-1; ?>"><?php echo $i;?></a>
            <?php
            }else{
                ?>
                 <a style="font-size :24px; padding:5px; text-decoration:none;" href="all_posts.php?page=<?php echo $i-1; ?>"><?php echo $i;?></a>
                <?php
            }
          }

          if ($_GET['page'] < $total_pages-1) {
            ?>
              <a href="all_posts.php?page=<?php echo $_GET['page']+1;?>">Next</a>
            <?php
          }

    ?>
    <!-- Blog Pagination -->

<div class="container section4 my-3" id="posts">
    <!-- Section 4 - Row Heading -->
    


    <!-- S3-Row Category Cards -->
    <div class="row cards my-1 text-start gy-2">

          <div class="row postcards">

        <?php
        $query="  SELECT * FROM post p
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
                    order by p.post_id desc limit $start,$per_page";
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
</div>
</div>


<!-- Section - 3 BLogs -->





<?php
require('require/footer.php');
?>
