<html>
    <?php include('head.php'); ?>
    <?php include('config.php'); ?>
<body>
    <!--header section start -->
  <div class="header_section background_bg">
    <div class="container-fluid">
      <div class="row">
        <?php include('container.php'); ?>
      </div>
    </div>
  </div>

 
  <div class="container">
    <div class="row">
    <?php 
                $result = getServies($_GET['id']);
                $row = mysqli_fetch_array($result);
                extract($row); 
                $item = <<<DELIMITER
        <div class="col-lg-12 "><h1 class="text-center head_text"></h1></div>
        <div class="col-lg-12 marr_bottom">
            <div class="row">
              <div class="col-lg-6"><img  class="img img-responsive" src="http://placehold.it/700x600" /></div>
              <div class="col-lg-6  padding">
                <div class="row">
                    <div class="col-lg-12"><h3 class="text-center head2">Details</h3></div>
                    <div class="col-lg-2 bolder marr">Price:</div>
                    <div class="col-lg-2 marr">$$row[item_price]</div>
                    <div class="col-lg-12 bolder marr">Description:</div>
                    <div class="col-lg-12"><p>$row[item_short_desc]</p></div>
                    <div class="col-lg-2 bolder marr">Rate:</div>
                    <div class="col-lg-2 marr">5</div>
                    <div class="col-lg-12 marr"><a class="btn btn-primary butn" href="cart.php?id='.$row[item_id].'">Add to cart</a></div>

                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
      
  DELIMITER;
  echo $item
?>
   


 <!-- copyright section start -->
 <?php include_once('copyright.php'); ?>
    <!-- copyright section end -->

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


