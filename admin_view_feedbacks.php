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
            
        <div class="col-sm-12 text-center">
                <h2 class="display-4 fs-2">  Feedback Panel </h2>
            </div>
            
            <table id="example" class="table table-bordered display mx-3" style="width:100%">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>By User</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Feedback</th>
                        <th>Recieved Date/Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count=1;
                    $query="Select * from user_feedback order by (feedback_id) desc";
                    $result=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($result)){
                        extract($row);
                        ?>  
                    <tr>
                        <td><?=$count++?></td>
                        <td class="<?= isset($user_id)?"text-success":"text-danger"?> fw-semibold text-center"><?= isset($user_id)?"Registered":"Annonymous"?></td>
                        <td><?=$user_name?></td>
                        <td><?=$user_email?></td>
                        <td><?=$feedback?></td>
                        <td><?=$created_at?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
              
            </table>

            <!-- Content  -->
        </div>
        <!--------------- Content Manager Column  --------------------------------------------------->

    </div>
</div>

<?php
require("require/footer.php");
?>