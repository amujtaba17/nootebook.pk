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
        <div class="col-sm-9 mx-3 my-3">

            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="display-4 fs-2"> Rejected Users</h2>
                </div>

                
<?php if(isset($_REQUEST['msg'])){
  ?>
  <div class="alert <?= $_REQUEST['color']??"" ?> text-center fw-bold" role="alert"
                    style="width: 400px; margin-left: 400px; margin-top: 40px;">
                    <?= $_REQUEST['msg']??""?>
                </div>

<?php  
}
?>     

                <div class="col-sm-12 px-0 mx-2">
                    <table class="table table-bordered" id="example">
                        <thead>
                            <tr>
                                <th scope="col">S.no</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Status</th>
                                <th scope="col">Profile</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count=1;
                            $query="SELECT * FROM user where is_approved='Rejected' order by user_id desc";
                            $result=mysqli_query($connection,$query);
                            if($result->num_rows>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    extract($row);
                                    ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $user_id ?></td>
                                <td><?= $first_name." ".$last_name ?></td>
                                <td><?=$email?></td>
                                <td><?=$gender?></td>
                                <td><?=$is_approved?></td>
                                <td><img src="<?=$user_image?>" alt="" style="width:100px; height:100px;"></td>
                                <td>
                                    <a href="admin_user_processes.php?user_id=<?=$user_id?>&action=approve" class="btn btn-outline-success my-1">Re Approve</a>
                                    <!-- <a href="admin_user_processes.php?user_id=<?=$user_id?>&action=reject" class="btn btn-outline-danger my-1">Reject</a> -->
                                </td>
                            </tr>
                            <?php
                                }
                            }else{

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