<div class="flex-shrink-0 p-3 bg-info shadow-lg" style="width: 250px; height: 800px;">
    <a href="admin_dashboard.php" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
      <span class="display-3 fs-5"> &#128100 Admin	- <?= $_SESSION['user']['first_name']??"Random" ?> </span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Blog Manager
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="admin_add_blog.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Add Blog</a></li>
            <li><a href="admin_view_blogs.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">View Blogs</a></li><!-- 
            <li><a href="admin_manage_blogs.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Manage Blogs</a></li> -->
          </ul>
        </div>
      </li>

      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#posts" aria-expanded="false">
          Post Panel
        </button>
        <div class="collapse" id="posts">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="admin_add_post.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Add new Post</a></li>
            <li><a href="admin_view_post.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">View All Posts</a></li><!-- 
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Manage Posts</a></li> -->
          </ul>
        </div>
      </li>






      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#category" aria-expanded="false">
          Category Panel
        </button>
        <div class="collapse" id="category">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="admin_add_category.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Add new Category</a></li>
            <li><a href="admin_view_category.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">View All Categories</a></li>
            <!-- <li><a href="admin_manage_category.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Manage Category</a></li> -->
          </ul>
        </div>
      </li>

      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          User Panel
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="admin_user_requests.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">User Requests
            <?php $query="select count(*) as pending_users from user where is_approved='Pending'";
            $result=mysqli_query($connection,$query);
            $pending=mysqli_fetch_assoc($result);
            extract($pending);
            ?>  
            <span class="badge text-bg-danger mx-1"><?=$pending_users?></span></a>
          </li>
          <li><a href="admin_rejected_request.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Rejected Requests
            <?php $query="select count(*) as pending_users from user where is_approved='Rejected'";
            $result=mysqli_query($connection,$query);
            $pending=mysqli_fetch_assoc($result);
            extract($pending);
            ?>  
            <span class="badge text-bg-danger mx-1"><?=$pending_users?></span></a>
          </li>
            <li><a href="admin_add_user.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Add New User</a></li>
            <li><a href="admin_view_all_users.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">View All Users</a></li>
          <li><a href="admin_view_admins.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">View All Admins</a></li>
          </ul>
        </div>
      </li>

      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          Comments & Feedback
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="admin_view_comments.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">View Comments</a></li>
            <!-- <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Manage Comments</a></li> -->
            <li><a href="admin_view_feedbacks.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">View Feedbacks</a></li>
            <!-- <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li> -->
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Account
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="update.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Profile</a></li>
            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Theme Setting</a></li>
            <li><a href="logout.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Sign out</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div>


