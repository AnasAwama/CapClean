<!DOCTYPE html>
<html lang="en">

<?php require_once('config.php'); ?>
<?php include('head.php'); ?>
<?php require_once('cart.php'); ?>
<?php

if(isset($_GET['amt'])){
    $amount = $_GET['amt'];
    $currency = $_GET['cc'];
    $status = $_GET['st'];
    $trans = $_GET['tx'];
    $itemValues="{";
      foreach($_SESSION as $key => $value){
        if($key == "username" || $key == "email")
          continue;
        $itemValues = $itemValues . $key . ":" . $value . ";" ;
      }
      $itemValues = $itemValues . "}";
      
    $qDate = "SELECT CURDATE() AS currentDate";
    $resDate = query($qDate);
    $rowDate = mysqli_fetch_assoc($resDate);
    $orderDate = $rowDate['currentDate'];

    $q = "INSERT INTO transactions(amount,currency,TransactionID,Statu,item,orderDate) values($amount,'$currency','$status','$trans','$itemValues','$orderDate')";
    
    $res = query($q);

    if(mysqli_affected_rows($conn)>0){
        echo"<h2>Your payment for the following items was successful</h2>";
    }
    else{
        echo"<h2><font style ='color:red'>Failed to save transaction</font></h2>";
    }
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

<?php 
if(isset($_GET['print'])){
    print_r($_SESSION);
}
?> 
<!-- /.row --> 

<div class="row">
<div class="container">

    <h1 class="text-center ">Thank You !!</h1>
    

<form action="" method="" style="margin-top: 43px;"> 
		
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Sub-total</th>
            </tr>
        </thead>
        <tbody>
            <?php printSessions2();?>
        </tbody>
    </table>
</form>
<a class="btn btn-primary" href="index.php?paid=1">Return to Homepage</a>
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
