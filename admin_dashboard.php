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
<!-- Content  -->
<div class="row contentrow px-0 my-1">

<div class="col-sm-12 text-center my-2">
            <h2 class="display-4 fs-2">Dashboard Statistics &#128202</h2>
        </div>




	<div class="col-sm-3 text-center my-2">
		<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">My Total Blogs &#128196</h5>
    <?php
    $query="SELECT COUNT(blog_id) as 'total_blogs' from blog where user_id='".$_SESSION['user']['user_id']."' AND blog_status='Active'";
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    extract($row);
    ?>
    <hr>
    <h5 class="card-title"><?=$total_blogs?></h5>
    <p class="card-text"></p>
    <a href="admin_view_blogs.php" class="btn btn-primary">View Blogs</a>
  </div>
</div>
	</div>


<div class="col-sm-3 text-center my-2">
		<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">My Total Posts &#128204	</h5>
    <?php
    $query=" SELECT count(post_id) as 'total_posts' FROM post p
             INNER JOIN blog b
             ON p.`blog_id` = b.`blog_id`
             WHERE user_id='".$_SESSION['user']['user_id']."'
             and post_status='Active'";
    $result=mysqli_query($connection,$query);
    $row=mysqli_fetch_assoc($result);
    extract($row);
    ?>
    <hr>
    <h5 class="card-title"><?=$total_posts?></h5>
    <p class="card-text"></p>
    <a href="admin_view_post.php" class="btn btn-primary">View Posts</a>
  </div>
</div>
	</div>



<div class="col-sm-3 text-center my-2">
		<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Total Users &#128101</h5>
    <hr>
    
    <?php $query="select count(user_id) as total_users from user where is_approved='Approved' and (role_id=2 and is_active='Active')";
            $result=mysqli_query($connection,$query);
            $pending=mysqli_fetch_assoc($result);
            extract($pending);
            ?>
    <h5 class="card-title"><?=$total_users?></h5>
    <p class="card-text"></p>
    <a href="admin_view_all_users.php" class="btn btn-primary">View Users</a>
  </div>
</div>
	</div>



<div class="col-sm-3 text-center my-2">
    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Total Admins &#128100</h5>
    <hr>
    
    <?php $query="select count(user_id) as total_users from user where is_approved='Approved' and (role_id=1 and is_active='Active')";
            $result=mysqli_query($connection,$query);
            $pending=mysqli_fetch_assoc($result);
            extract($pending);
            ?>
    <h5 class="card-title"><?=$total_users?></h5>
    <p class="card-text"></p>
    <a href="admin_view_admins.php" class="btn btn-primary">View Admins</a>
  </div>
</div>
  </div>












<div class="col-sm-3 text-center my-2">
		<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Pending Users &#8987	</h5>
    <hr>
    <?php $query="select count(*) as pending_users from user where is_approved='Pending'";
            $result=mysqli_query($connection,$query);
            $pending=mysqli_fetch_assoc($result);
            extract($pending);
            ?>
    <h5 class="card-title"><?=$pending_users?></h5>
    <p class="card-text"></p>
    <a href="admin_user_requests.php" class="btn btn-primary">View Pending Users</a>
  </div>
</div>
	</div>


<div class="col-sm-3 text-center my-2">
		<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Total Comments &#128173	</h5>
    <hr>
    <h5 class="card-title">0</h5>
    <p class="card-text"></p>
    <a href="#" class="btn btn-primary">View Comments</a>
  </div>
</div>
	</div>




<div class="col-sm-3 text-center my-2">
		<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Total Feedbacks &#128079</h5>
    
    <?php $query="select count(feedback_id) as total_feedbacks from user_feedback";
            $result=mysqli_query($connection,$query);
            $total_feedback=mysqli_fetch_assoc($result);
            extract($total_feedback);
            ?>
    <hr>
    <h5 class="card-title"><?=$total_feedbacks?></h5>
    <p class="card-text"></p>
    <a href="admin_view_feedbacks.php" class="btn btn-primary">View Feedbacks</a>
  </div>
</div>
	</div>

</div>
</div>
</div>
<!-- Content -->
	
	
</div>
<!--------------- Content Manager Column  --------------------------------------------------->





<?php
require("require/footer.php");
?>
