<!DOCTYPE html>
<html lang="en">
<?php include_once('head.php'); ?>
<?php include_once('config.php'); ?>
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
  <!-- about section start -->
  <div class="about_section layout_padding">
    <?php include('aboutSection.php'); ?>
  </div>
  <!-- about section end -->
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