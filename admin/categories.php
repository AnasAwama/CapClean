<!DOCTYPE html>
<html lang="en">
<?php 
include('admin_header.php'); 
include('..\config.php');
?>
<body>

    <div id="wrapper">

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		            <?php include('nav_header.php'); ?>

            <?php include('nav_side_admin.php'); ?>
        </nav>
            



        <div id="page-wrapper">

            <div class="container-fluid">

            

            

<h1 class="page-header">
  Product Categories

</h1>


<div class="col-md-4">
    
    <form action="" method="post">
    <?php
	if(isset($_POST['submit'])){
		addcategories($_POST['catName'],$_POST['catDesc'],$_POST['catImage']);
	}
	
	?>
        <div class="form-group">
            <label for="category-title">Title</label>
            <input type="text" name="catName" class="form-control">
            <input type="text" name="catDesc" class="form-control">
            <input type="file" name="catImage" class="form-control">
        </div>

        <div class="form-group">
            
            <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
        </div>      

        </div>
    </form>

    <div class="col-md-8">

<table class="table">
        <thead>

    <tr>
        <th>id</th>
        <th>Title</th>
        <th>Description</th>
    </tr>
        </thead>
        <tbody>
<?php
if(isset($_POST['remove'])){
    deleteCategories($_POST['item_id']);
}
        $result=getcategories();
        while($row=mysqli_fetch_array($result)){ 
        extract($row);
        $item = <<<DELIMITER
        <tr>
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
            <td>
                <form method="POST" action="">
                <div class="form-group">
                    <input type="hidden" name="item_id" value="$row[0]">
                    <input type="submit" name="remove" class="btn btn-warning btn-lg" value="Remove">
                </div>
                </form>
            </td>
        </tr>
        DELIMITER;
        
        echo $item;
    }
?>
</tbody>
    </table>





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
