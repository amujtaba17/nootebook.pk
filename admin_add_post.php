<?php
require("require/admin_header.php");
?>




<?php
require("require/admin_nav.php");
?>


<div class="container-fluid px-0">
<!-- -------------------------------------- -->
	<div class="row container-fluid px-0">
<!-- Admin Side Bar ------------------------------------------------------------->
	<div class="col-sm-3" style="width: 250px;">
			<?php
           require("require/admin_sidebar.php");
      ?>
	</div>
  <!-- ------------------------------------------------------------------ -->

<div class="col-sm-9 container">
<!--  -->


<?php if(isset($_REQUEST['msg'])){
  ?>
  <div class="alert <?= $_REQUEST['color']??"" ?> text-center fw-bold" role="alert"
                    style="width: 400px; margin-left: 400px; margin-top: 40px;">
                    <?= $_REQUEST['msg']??""?>
                </div>

<?php  
}
?>           

<?php
if(isset($_REQUEST['post_id'])){
  extract($_REQUEST);
$query="
SELECT * FROM post p
INNER JOIN blog b
ON p.`blog_id` = b.`blog_id`
INNER JOIN post_category pc
ON pc.`post_id` = p.`post_id`
INNER JOIN category c
ON pc.`category_id` = c.`category_id`
where p.post_id='".$post_id."'";
$result=$connection->query($query);
$row=$result->fetch_assoc();
extract($row);
}
?>


<div class="row 1 my-2">
  <div class="col-sm-12  text-center text-light bg-info">
    <h1 class="display-4 fs-2"><?=isset($_REQUEST['post_id'])?"Update Post":"Add Post"?></h1>
  </div>
</div>




<div class="row 2 my-1 text-start">
  <form action="<?=isset($_REQUEST['post_id'])?"admin_updatepost_process.php":"admin_post_process.php"?>" method="POST" enctype="multipart/form-data" onsubmit="return post_validation()">
  <select class="form-select form-select-sm" name="blog_id" id="blg_id" aria-label="Small select example">
  <option selected value="<?=$blog_id??""?>" <?=isset($blog_id)?"Selected":""?>>
    <?=$blog_title??"Select Blog"?>
  </option>
  <?php
  $query="SELECT
   blog_id,
   blog_title from 
   blog WHERE 
   user_id='".$_SESSION['user']['user_id']."'
   and blog_status='Active'";
   $result=mysqli_query($connection,$query);
   while($blogs=$result->fetch_assoc()){
    extract($blogs);
  ?>
         <option value="<?=$blog_id?>"><?=$blog_title?></option>
<?php
   } 
   ?> 
</select>
<span class="text-danger" id="blog_id_msg"></span>
<!-- ----------------------------------------------------- -->
<select class="form-select form-select-sm my-2" name="category_id" id="catgory_id" aria-label="Small select example">
  <option selected value="<?=$category_id??""?>" <?=isset($category_id)?"Selected":""?>><?=$category_title??"Select Category"?></option>
  <?php
  $query="SELECT
  category_id,
  category_title from 
  category WHERE category_status='Active'";
  $result=mysqli_query($connection,$query);
  while($category=$result->fetch_assoc()){
    extract($category);
  ?>
         <option value="<?=$category_id?>"><?=$category_title?></option>
<?php
   }
   ?> 
</select>
<div>
<span class="text-danger" id="cat_id_msg"></span>
</div>
<!-- ----------------------------------------------------- -->

<label for="exampleFormControlInput1" class="form-label my-2 fw-bold">Post Title</label>
<input type="text" name="post_titl" id="title" value="<?=$post_title??""?>" class="form-control" id="exampleFormControlInput1" placeholder="Post Title">   
<div>
<span class="text-danger" id="post_title_msg"></span>
</div>
<!-- ------------------------------------------------------------- -->
<label for="exampleFormControlInput1" class="form-label my-2 fw-bold">Post Summary</label>
<input type="text" name="post_summary" id="summary" value="<?=$post_summary??""?>" class="form-control" id="exampleFormControlInput1" placeholder="Post Summary">
<div>
<span class="text-danger" id="post_summary_msg"></span>
</div>
<!-- --------------------------------------------------- -->
<label for="exampleFormControlTextarea1" class="form-label my-2 fw-bold">Post Description</label>
  <textarea class="form-control" id="description" name="post_description"  id="exampleFormControlTextarea1" rows="3"><?=$post_description??""?></textarea>
<div>
<span class="text-danger" id="post_desc_msg"></span>
</div>

<!-- ----------------------------------------------------- -->
<label for="formFileSm" class="form-label my-2 fw-bold">Post Image</label>
  <input class="form-control form-control-sm" id="formFileSm" type="file"
  name="post_image" <?=isset($_REQUEST['post_id'])?"":"required"?>>
  <?php
  if(isset($_REQUEST['post_id'])){
    ?>
    <input type="hidden" name="old_featured_image" value="<?=$featured_image?>">
    <input type="hidden" name="post_id" value="<?=$post_id?>">
  <div class="my-1"><img src="<?=$featured_image?>" alt="" height="70" width="70"></div>
    <?php
  }
  ?>

<!-- ------------------------------------------------------- -->
<label for="formFileSm" class="form-label my-2 fw-bold">Post Status</label>
<select class="form-select form-select-sm " name="post_status" aria-label="Small select example" id="status">
  <option selected value="<?=$post_status??""?>" <?=isset($blog_id)?"Selected":""?>><?=$post_status??"Choose Status"?></option>
  <option value="Active">Active</option>
  <option value="InActive">InActive</option>
</select>
<span class="text-danger" id="post_status_msg"></span>
<!-- ------------------------------------------------------------ -->
<div><label for="formFileSm" class="form-label my-2 fw-bold">Commenting</label></div>
<select class="form-select form-select-sm " id="comments" name="comment_allow" aria-label="Small select example">
  <option selected value="<?=$is_comment_allowed??""?>" <?=isset($is_comment_allowed)?"Selected":""?>><?=isset($is_comment_allowed)&&$is_comment_allowed=='1'?"Yes":"No"??"Comment Allowed"?></option>
  <option value="1">Yes</option>
  <option value="0">No</option>
</select>
<div>
<span class="text-danger mb-1" id="comment_allow_msg"></span>
</div>
<!-- --------------------------------------------------------------------- -->
<label for="exampleFormControlInput1" class="form-label fw-bold">Attachment Title</label>
<input type="text" name="atachment_title" class="form-control" id="exampleFormControlInput1" placeholder="Attachment Title">
<!-- --------------------------------------------------------------- -->
<label for="formFileSm" class="form-label my-2 fw-bold">Post Attachment</label>
  <input class="form-control form-control-sm" id="formFileSm" type="file"
  name="post_atachement">
<!-- --------------------------------------------------------------- -->
<button type="submit" name="<?=isset($_REQUEST['post_id'])?"update_post":"add_post"?>" class="btn btn-outline-info my-2"><?=isset($_REQUEST['post_id'])?"Update Post":"Add Post"?></button>
  </form>
</div>
<!--  -->
</div>

<!-- ----------------------------------------------------- -->
</div>
</div>
<?php
require("require/footer.php");
?>
