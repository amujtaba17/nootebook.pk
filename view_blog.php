<?php
include('require/header.php');
include('require/navbar.php');
?>

<?php
if(isset($_REQUEST['blog_id'])){
    extract($_REQUEST);
$querry="SELECT * FROM BLOG  JOIN user using(user_id) WHERE blog_id='".$blog_id."'";
$result=$connection->query($querry);
$row=$result->fetch_assoc();
extract($row);
}
?>



<!-- Index Hero Header -->


<div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="<?=$blog_background_image?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                width="700" height="700" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?=$blog_title?></h1>
            <p class="display-5 fs-5 fw-bold  lh-1 mb-3">Created by Admin - <?=$first_name." ".$last_name?></p>
            <p class="display-5 fs-6 fw-bold  lh-1 mb-3">Date created: <?=substr($created_at,0,11)?></p>
            <!-- 
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum debitis eligendi recusandae
                quam itaque aliquid ea. Magnam corporis tempore quaerat exercitationem ducimus consectetur eligendi ex
                maiores deserunt, nesciunt quasi recusandae?</p> -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            </div>
        </div>
    </div>
</div>
<!-- Index hero Header -->

<!-- <div class="container sectin3 my-2">
    
    <div class="row categoryHead">
        <div class="col-sm-12 text-center my-2">
            <h2 class="display-4 fs-2 fw-bold">Blog Posts</h2>
        </div>
    </div>
</div> -->


<div class="container section4  " id="posts">
    <!-- Section 4 - Row Heading -->

    <?php
$per_page = $post_per_page;
              
 /*------------Total Pages--------------------*/
          
              $query ="SELECT COUNT(post_id) AS 'total_posts' FROM post where
              blog_id='".$blog_id."'"; 
              $result = mysqli_query($connection,$query);

              if ($result->num_rows > 0) {
                   
                   $data = mysqli_fetch_assoc($result);

                   $total_pages = ceil($data['total_posts']/$per_page);

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
              <a href="view_blog.php?blog_id=<?=$blog_id?>&page=<?php echo $_GET['page']-1;?>">Previous</a>
            <?php
          }


          for ($i=1; $i <=$total_pages; $i++) { 

            if (isset($_GET['page']) && $_GET['page'] == $i-1) {
            ?>
             <a style="color:red;font-size :24px; padding:5px; text-decoration:none;" href="view_blog.php?blog_id=<?=$blog_id?>&page=<?php echo $i-1; ?>"><?php echo $i;?></a>
            <?php
            }else{
                ?>
                 <a style="font-size :24px; padding:5px; text-decoration:none;" href="view_blog.php?blog_id=<?=$blog_id?>&page=<?php echo $i-1; ?>"><?php echo $i;?></a>
                <?php
            }
          }

          if ($_GET['page'] < $total_pages-1) {
            ?>
              <a href="view_blog.php?blog_id=<?=$blog_id?>&page=<?php echo $_GET['page']+1;?>">Next</a>
            <?php
          }


?>



    <div class="row postcards text-start">
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
                    where b.blog_id='".$blog_id."' and post_status='Active'         
                    order by p.post_id desc limit $start,$per_page";
            $result=$connection->query($query);
            ?>
            
        <div class="col-sm-12 text-center my-2">
            <h2 class="display-4 fs-2 fw-bold"><?=$result->num_rows>0?"Blog Posts":"Blog hasn't published any posts..."?></h2>
        </div>
            <?php
            while($row=$result->fetch_assoc()){
                extract($row);
            ?>

        <div class="col-sm-12 cardinside">
            <div class="card mb-3 fit">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?=$featured_image?>" class="img-fluid rounded-start" alt="..." height="100"
                            width="500">
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
                                <a href="view_post.php?post_id=<?=$post_id?>" class="btn btn-outline-success">Read
                                    More</a>
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









<?php
include('require/footer.php')
?>