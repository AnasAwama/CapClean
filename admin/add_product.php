<!DOCTYPE html>
<html lang="en">

<?php include('admin_header.php');
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

<div class="col-md-12">

<div class="row">
<h1 class="page-header">
   Add Product

</h1>
</div>

<form action="" method="post">
<?php
	if(isset($_POST['publish'])){
    
		addproduct($_POST['product_title'],$_POST['product_description'],$_POST['product_price'],$_POST['product_category'],$_POST['quant']);
	}
	
	?>

<div class="col-md-8">

<div class="form-group">
    <label for="product-title">Service Title </label>
        <input type="text" name="product_title" class="form-control">       
    </div>


    <div class="form-group">
          <label for="product-title">Service Description</label>
      <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Service Price</label>
        <input type="number" name="product_price" class="form-control" size="60">
      </div>
    </div>
    <div class="col-xs-3">
        <label for="product-price">Service Quantity</label>
        <input type="number" name="quant" class="form-control" size="60">
      </div>
    </div>

<!--Main Content-->


<!-- SIDEBAR-->


<aside id="admin_sidebar" class="col-md-4">

<!-- Product Categories-->

    <div class="form-group">
        <label for="product-title">Service Category</label>
          <hr>
          <?php
          $res = getcategories();
          $options = "";
          while($row=mysqli_fetch_array($res)){
            $itemID = $row['cat_id'];
            $itemName = $row['cat_name'];
            $options .= "<option value='$itemID'>$itemName</option>";
          }
            echo'
        <select name="product_category" id="" class="form-control">
            <option value="">Select Category</option>
            '.$options.'
        </select>
          ';
?>

</div>

</aside><!--SIDEBAR-->

<div class="form-group">
        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
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
