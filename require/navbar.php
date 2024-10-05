<!-- Navbar -->
<nav class="navbar px-0 navbar-expand-lg bg-info shadow-lg sticky-sm-top">
    <div class="container-fluid px-0 mx-3">
        <a class="navbar-brand display-5 text-light fs-4 fw-medium" href="index.php" style="font-style:oblique;">
            NOTEBOOK.PK
            <img src="Assets/logo.png" class="img-fluid" alt="..." style="height: 50px; width:50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <?php if(isset($_SESSION['user']) && $_SESSION['user']['role_id']==1){
            ?>
                    <a class="nav-link active" aria-current="page" href="admin_dashboard.php">Go to Dashboard</a>
                    <?php
          }else{
            ?>
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    <?php
          }
?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all_category.php">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="all_blogs.php">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        More
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="all_posts.php">Posts</a></li>
                        <li><a class="dropdown-item" href="feedback.php">Feedback</a></li>
<!--                         <li>
                            <hr class="dropdown-divider">
                        </li> -->
                        <!-- <li><a class="dropdown-item" href="#">Request for Blog</a></li> -->
                    </ul>
                </li>
            </ul>
            <?php 
      if(isset($_SESSION['user']) && ($_SESSION['user']['role_id']==1 || $_SESSION['user']['role_id']==2)){
        ?>
            <div class="dropdown me-5">
            <img src="<?=$_SESSION['user']['user_image']?>" height="60" width="60" class="img-fluid" alt="..." style="border-radius:30px;">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <?=$_SESSION['user']['first_name']." ".$_SESSION['user']['last_name'];
                    ?>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="update.php">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </div>
            <?php
    }else{
    ?>
            <a href="user_register.php"><button class="btn btn-outline-success  mx-2 p-2"
                    type="submit">Register</button></a>
            <a href="user_login.php"><button class=" btn btn-outline-success p-2" type="submit">Login</button></a>

            <?php
 }
 ?>
        </div>
    </div>
</nav>
<!-- Navbar -->