<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-info ">
  <div class="container-fluid px-0 mx-3">
    <a class="navbar-brand display-5 text-light fs-4 fw-medium" href="admin_dashboard.php" style="font-style:oblique;"> NOTEBOOK.PK
    	<img src="Assets/logo.png" class="img-fluid" alt="..."
      style="height: 50px; width:50px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">View as User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about_us.php">About Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="all_posts.php">Posts</a></li>
            <li><a class="dropdown-item" href="feedback.php">Feedback</a></li>
            <!-- <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Request for Blog</a></li> -->
          </ul>
        </li>
      </ul>
      <?php if(isset($_SESSION['user']) && $_SESSION['user']['role_id']==1){
        ?>

        <a href="logout.php"><button class="btn btn-outline-danger  mx-2 p-2" type="submit">Log out (Admin) <?= $_SESSION['user']['first_name']?></button></a>
<?php
      }
?>
        <a href="admin_add_post.php"><button class="btn btn-outline-warning  mx-2 p-2" type="submit">Write Something</button></a>
    </div>
  </div>
</nav>
<!-- Navbar -->
