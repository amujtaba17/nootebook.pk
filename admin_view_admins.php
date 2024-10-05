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
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="display-4 fs-2"> All Admins </h2>
                </div>


                <div class="col-sm-12 px-0 mx-2">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th scope="col">S.no</th>
                                <th scope="col">User ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Birth Date</th>
                                <th scope="col">Profile Pic</th>
                                <th scope="col">Role</th>
                                <th scope="col">Address</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $count=1;
                            $query="SELECT * FROM USER where is_approved='Approved' AND  (role_id=1 and user_id!='".$_SESSION['user']['user_id']."')";
                            $result=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($result)){
                                extract($row);
                                ?>
                            <tr>
                                <td><?=$count++?></td>
                                <td><?=$user_id?></td>
                                <td><?=$first_name?></td>
                                <td><?=$last_name?></td>
                                <td><?=$email?></td>
                                <td><?=$gender?></td>
                                <td><?=$date_of_birth?></td>
                                <td><img src="<?=$user_image?>" alt="" height="100" width="100"></td>
                                <td><?= $role_id=='1'?"Admin":'User'?></td>
                                <td><?=$address?></td>
                                <td><?=$is_active?></td>
                                <td>
                                    <?php if($is_active==='InActive'){
                                        ?>
                                    <a href="admin_user_processes.php?user_id=<?=$user_id?>&admin=active" class="btn btn-outline-success my-1">Active</a>
                                    
                                <?php
                                    }elseif($is_active==='Active'){
                                        ?>
                                    <a href="admin_user_processes.php?user_id=<?=$user_id?>&admin=deactive" class="btn btn-outline-warning my-1">InActive</a>
                                    <?php
                                    }
                                    ?>
                                    <a href="admin_add_user.php?user_id=<?=$user_id?>" class="text-decoration-none btn btn-outline-danger">Update</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>



            </div>


            <!-- Content  -->
        </div>
        <!--------------- Content Manager Column  --------------------------------------------------->

    </div>
</div>

<?php
require("require/footer.php");
?>