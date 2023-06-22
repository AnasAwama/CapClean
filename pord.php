<!DOCTYPE html>
<html lang="en">

<?php include_once ('head.php');?>
<?php include_once('config.php');?>
<style>
  .pad {
    border: 1px solid;
  }
  
  .mar {
    margin-bottom: 20px;
    margin-right: 10px;
    padding-right: 82px;
  }
  
  .mar1 {
    margin-top: 30px;
    margin-left: 10px;
    margin-bottom: 20px;
  }
  
  .butn {
    margin-left: 16px;
    margin-bottom: 13px;
  }
  
  .margi {
    margin-top: 30px;
    margin-right: 20px;
  }
  
  .margin {
    margin-right: auto;
    margin-left: auto;
  }
</style>
<body>

    <!--header section start -->
  <div class="header_section background_bg">
    <div class="container-fluid">
      <div class="row">
        <?php include_once('container.php'); ?>
      </div>
    </div>
  </div>
  <!-- header section end -->

    <!-- Page Content -->
    <div class="container">
   

        <hr>
        
        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
            <?php include_once('service.php'); ?>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
        <?php 
        $res;
        if(isset($_GET['id'])){
          $res = getServiesbycat($_GET['id']);}
          else{
          $res = getItem();
          }
        
                
                while($row=mysqli_fetch_array($res)){ 
                  echo'
        <div class="margi col-sm-4 col-lg-4 col-md-4 ">
    <div class="thumbnail pad margin">
        <img src="http://placehold.it/320x150" alt="">
        <div class="caption ">
            <h4 class="pull-right mar">$'.$row["item_price"].'</h4>
                <h4 class="mar1"><a href="items.php?id='.$row["item_id"].'">'.$row["item_name"].'</a>
                    </h4>
                    <p class="margin">'.$row["item_short_desc"].'</p>
        </div>
        <a class="btn btn-primary" style=" margin-bottom: 13px; margin-left: 16px;" href="cart.php?id='.$row["item_id"].'">Add to cart</a>
    </div>
</div>
';
                }
                ?>
        </div>
        <!-- Page Features -->
        <div class="row text-center">

           
        </div>
        <!-- /.row -->

        <hr>
  <!-- copyright section start -->
  <?php include_once('copyright.php'); ?>
  <!-- copyright section end -->
  </div>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
