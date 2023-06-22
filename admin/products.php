<!DOCTYPE html>
<html lang="en">

<?php include('..\config.php'); include('admin_header.php'); ?>
<body>

    <div id="wrapper">

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		    <?php include('nav_header.php'); ?>
            <?php include('nav_side_admin.php'); ?>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

             <div class="row">

<h1 class="page-header">
   All Products

</h1>
<table class="table table-hover">


    <thead>

      <tr>
           <th>Id</th>
           <th>Title</th>
           <th>Quantity</th>
           <th>Price</th>
      </tr>
    </thead>
    <tbody>
    <?php
	
	$q = "select * from item";
	$result = query($q);
	while($row = mysqli_fetch_array($result)){
		
		$TableRow = <<<DELIMETER
		<tr>
			<td>$row[0]</td>
			<td>$row[1]</td>
			<td>$row[8]</td>
			<td>$row[5]</td>
			
		</tr>
		DELIMETER;
		echo $TableRow;
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
