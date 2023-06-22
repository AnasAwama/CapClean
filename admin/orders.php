<!DOCTYPE html>
<html lang="en">
<?php
require_once("..\config.php");

//echo $_SERVER['REQUEST_URI'];
/*
if($_SERVER['REQUEST_URI'] != "/eBusiness/Section1/eBusinessTemplateOriginal/admin/" || $_SERVER['REQUEST_URI'] != "/eBusiness/Section1/eBusinessTemplateOriginal/admin/orders.php")
	
header("Location:..\index.php");
*/
?>


<?php include('admin_header.php'); ?>
<body>

    <div id="wrapper">

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		            <?php include('nav_header.php'); ?>

            <?php include('nav_side_admin.php'); ?>
        </nav>
      


        <div id="page-wrapper">

            <div class="container-fluid">


                


        <div class="col-md-12">
<div class="row">
<h1 class="page-header">
   All Orders

</h1>
</div>

<div class="row">
<table class="table table-hover">
    <thead>

      <tr>
           <th>ID</th>
           <th>Amount</th>
           <th>Status</th>
           <th>PayPal ID</th>
           <th>Currency</th>
           <th>Items</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	
	$q = "select * from transactions";
	$result = query($q);
	while($row = mysqli_fetch_array($result)){
		// $row[7] = {prod1:3;prod4:2;prod5:4;}
		$itemsArray = substr($row[5],1);
		$items = explode(";", $itemsArray);
		// Array ( 0 => prod1:3 1 => prod4:2 2=> prod5:4 3=> } )
		$itemLinks = "";
		foreach($items as $k => $v){
			if($k == count($items)-1)
				continue;
			$item = $v;
			$itemArr = explode(":",$item);
			// Array (0 => prod1  1=> 3)
			$itemID = substr($itemArr[0],4); // 1
			$itemLinks = $itemLinks . "<a href=\"..\items.php?id=$itemID\">$itemArr[0]</a> : $k <br/>";
		}
		$TableRow = <<<DELIMETER
		<tr>
			<td>$row[4]</td>
			<td>$row[0]</td>
			<td>$row[2]</td>
			<td>$row[3]</td>
			<td>$row[1]</td>
			<td>$itemLinks</td>
			
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
