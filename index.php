<!DOCTYPE html>
<html lang="en">

<?php include_once('head.php'); ?>
<?php include_once('config.php'); ?>

<?php
if(isset($_GET['paid'])){
  
  foreach($_SESSION as $key => $value){
    $prodID = substr($key,4);//substr(helloo,4)==oo
    $q = "select item_quant from item where item_id ={$prodID}";
    $result = query($q);
    $row= mysqli_fetch_array($result);
    $stock = $row['item_quant'];
    $difference = $stock-$value;
    $q = "update item set item_quant = {$difference} where item_id={$prodID}";
    $result=query($q);
    if(mysqli_affected_rows($conn)== 0 )
      echo'<h2 class="text-center bg-warning">Failed to update $key</h2>';
  }
  
  session_destroy();
}
?>

<body>
  <!--header section start -->
  <div class="header_section">
    <div class="container-fluid">
      <div class="row">
      <?php include_once('container.php'); ?>
      </div>
    </div>
    <!-- banner section start -->
    <div class="banner_section layout_padding">
      <div class="container">
        <div class="row">
          <div class="col-sm-5">
            <h1 class="banner_taital">Best YOUR</h1>
            <h1 class="banner_taital_1">house CLEAN</h1>
            <p class="banner_text">Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim</p>
            <div class="contact_bt"><a href="contact.php">CONTACT US<span class="contact_padding"><img
                    src="images/contact-icon.png"></span></a></div>
          </div>
          <div class="col-sm-2">
            <div class="play_icon"><a href="#"><img src="images/play-icon.png"></a></div>
          </div>
          <div class="col-sm-5">
            <div><img src="images/img-1.png" class="image_1"></div>
          </div>
        </div>
      </div>
    </div>
    <!-- banner section end -->
  </div>
  <!-- header section end -->
  <!-- services section start -->
  <div class="services_section layout_padding">
    <?php include('service.php'); ?>
  </div>
  <!-- services section start -->
  <!-- about section start -->
  <div class="about_section layout_padding">
    <?php include('aboutSection.php'); ?>
  </div>
  <!-- about section end -->
  <!-- choose section start -->
  <div class="choose_section layout_padding">
    <?php include('chooseSec.php'); ?>
  </div>
  <!-- choose section end -->
  <!-- team section start -->
  <?php include('teamSection.php');?>
  <!-- newsletter section end -->
  <!-- footer section start -->
  <div class="footer_section layout_padding">
    <?php include('footerSection.php'); ?>
  </div>
  <!-- footer section end -->
  <!-- copyright section start -->
  <?php include_once('copyright.php'); ?>
  <!-- copyright section end -->
  <!-- Javascript files-->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <script src="js/plugin.js"></script>
  <!-- sidebar -->
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="js/custom.js"></script>
  <!-- javascript -->
  <script src="js/owl.carousel.js"></script>
  <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
  <script>
    $(document).ready(function () {
      $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
      });

      $(".zoom").hover(function () {

        $(this).addClass('transition');
      }, function () {

        $(this).removeClass('transition');
      });
    });
  </script>
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