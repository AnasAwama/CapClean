<!DOCTYPE html>
<html lang="en">
<?php
include('..\config.php');

if(!isset($_SESSION['username'])){
	//print_r($_SESSION);
	header("Location:..\index.php");
}
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

                <!-- Page Heading -->
                <?php include('title.php'); 
				
				echo $_SERVER['REQUEST_URI'];
				
				?>
                <!-- /.row -->

                 <!-- FIRST ROW WITH PANELS -->
<?php 
    $sql_order = "SELECT count(*) AS order_count FROM transactions";
    $result_order = mysqli_query($conn, $sql_order);
    $row_order = mysqli_fetch_assoc($result_order);
    $orderCount = $row_order['order_count'];

    $sql_item = "SELECT count(*) AS item_count FROM item";
    $result_item = mysqli_query($conn, $sql_item);
    $row_item = mysqli_fetch_assoc($result_item);
    $itemCount = $row_item['item_count'];

    $sql_cat = "SELECT count(*) AS cat_count FROM categories";
    $result_cat = mysqli_query($conn, $sql_cat);
    $row_cat = mysqli_fetch_assoc($result_cat);
    $catCount = $row_cat['cat_count'];
?>
                <!-- /.row -->
                <div class="row">

                            <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $orderCount; ?></div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="orders.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $itemCount; ?></div>
                                        <div>Products!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="add_product.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
          
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $catCount; ?></div>
                                        <div>Categories!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
            
              
                </div>
        
                <!-- /.row -->


                <!-- SECOND ROW WITH TABLES-->

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Order Date</th>
                                                <th>Order Status</th>
                                                <th>Order Currency</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $weekAgo = date('Y-m-d', strtotime('-1 week'));
                                        $q = "select * from transactions WHERE orderDate >= '$weekAgo'";
                                        $result = query($q);
                                        while($row = mysqli_fetch_array($result)){
                                            $orderDate = date('m/d/Y', strtotime($row['orderDate']));
                                            $TableRow = <<<DELIMETER
                                            <tr>
                                                <td>$row[4]</td>
                                                <td>$orderDate</td>
                                                <td>$row[3]</td>
                                                <td>$row[1]</td>
                                                <td>$$row[0]</td>
                                            </tr>
                                            DELIMETER;
                                            echo $TableRow;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="orders.php">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>







                     <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Service #</th>
                                                <th>Service Name</th>
                                                <th>Service Price</th>
                                                <th>Service Quantity</th>
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
                                                <td>$row[5]</td>
                                                <td>$row[7]</td>
                                            </tr>
                                            DELIMETER;
                                            echo $TableRow;
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="add_product.php">Add Service <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


















                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<?php include('../copyright.php'); ?>

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
