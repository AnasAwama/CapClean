<!DOCTYPE html>
<html lang="en">

<?php require_once('config.php'); ?>
<?php include('head.php'); ?>
<?php require_once('cart.php'); ?>
<?php
if(isset($_GET['minimize'])){
	$item = $_GET['iid'];
	$_SESSION[$item]--;
	
  if($_SESSION[$_GET[$item]]==0){
    unset($_SESSION[$item]);
    header("Location:checkout.php");
  }
}elseif(isset($_GET['increase'])){
	$item = $_GET['iid'];
  $productID=substr($item,4);
  $q = "select * from item where item_id = $productID";
  $result = query($q);
  $row = mysqli_fetch_array($result);
  $stockCount = $row['item_quant'];
  if($_SESSION[$_GET['iid']]<$stockCount)
    $_SESSION[$item]++;
}elseif(isset($_GET['delete'])){
	$item = $_GET['iid'];
	unset($_SESSION[$item]);
	
}

?>
<body>

      <!-- Navigation -->
      <div class="header_section background_bg">
    <div class="container-fluid">
      <div class="row">
        <?php include('container.php'); ?>
      </div>
    </div>
  </div>

    <!-- Page Content -->
    <div class="container">

<!-- /.row --> 

<div class="row">

<div class="container">

    <h1>Checkout</h1>

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" style="margin-top: 70px"> 
	<input type="hidden" name="cmd" value="_cart"> 
	<input type="hidden" name="business" value="sb-lnxtj14705310@business.example.com"> 
	<input type="hidden" name="currency_code" value="USD">
	<input type="hidden" name="upload" value="1">
	
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub-total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php printSessions();?>
        </tbody>
    </table>
    <input type="image" name="submit" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_100x26.png" alt="PayPal - The safer, easier way to pay online">
      
</form>



<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right" style="padding-left: 187px">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount"><?php echo $itemCount;?></span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">$<?php echo $itemSum;?></span></strong> </td>
</tr>


</tbody>

</table>

</div><!-- CART TOTALS-->

</div>
 </div><!--Main Content-->

        <!-- Footer -->
        <?php include_once('copyright.php'); ?>
    <!-- /.container -->

 <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }
    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
</body>

</html>
