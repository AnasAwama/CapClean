<!DOCTYPE html>
<html lang="en">

<?php include('admin_header.php');
include('..\config.php'); ?>
<body>

    <div id="wrapper">

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		            <?php include('nav_header.php'); ?>

            <?php include('nav_side_admin.php'); ?>
        </nav>
            



        <div id="page-wrapper">

            <div class="container-fluid">



                    <div class="col-lg-12">
                      

                        <h1 class="page-header">
                            Users
                         
                        </h1>
                          <p class="bg-success">
                            
                        </p>

                        <!--<a href="add_user.php" class="btn btn-primary">Add User</a>--->
                        <form action="" method="post">
                        <?php
                            if(isset($_POST['UserAc'])){
                            
                            ChangeAcces($_POST['User_acc'],$_POST['User_id']);
                            }
                            
                            ?>
                        <div class="col-md-12">

                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Password</th>
                                        <th>Email</th>
                                        <th>Access </th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
	
	$q = "select * from users";
	$result = query($q);
    while($row = mysqli_fetch_array($result)){
        $userId = $row[0];
        $accessLevel = $row['access'];
		echo'
		<tr>
			<td>'.$userId.'</td>
			<td>'.$row[1].'</td>
			<td>'.$row[2].'</td>
			<td>'.$row[4].'</td>
			<td ><select name="User_acc" id="" class="form-control">
            <option value="">Select Access</option>
                <option value="admin" '.($accessLevel == "admin" ? "selected" : "").'>Admin</option>
                <option value="user" '.($accessLevel == "user" ? "selected" : "").'>User</option>
            </select>
            <input type="hidden" name="User_id" value="'.$userId.'">
            </td>
		</tr>
		';
    }
	
	?>


                                    
                                    
                                </tbody>
                            </table> <!--End of Table-->
                        
                            <div class="form-group">
                                <input type="submit" name="UserAc" class="btn btn-warning btn-lg" value="Accessability">
                            </div>
                        </div>
                        </form>









                        
                    </div>
    












            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
