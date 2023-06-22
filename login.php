<!DOCTYPE html>
<html lang="en">

<?php include ('head.php');?>
<?php require_once ('config.php');?>

<body>

<div class="header_section">
    <div class="container-fluid">
      <div class="row">
      <?php include_once('container.php'); ?>
      </div>
    </div>

    <!-- Page Content -->
    <div class="containers">

      <header>
            <h1 class="text-center">Login</h1>
           
            <?php 
            if(isset($_POST['submit'])){
                userLogin();

                
                echo'<h2 class="text-center bg-warning">';
                if(isset($_SESSION['message'])) {
                showMessage();
                }
                echo' </h2>';

            }
            ?>
        <div class="col-sms-4 col-sm-offsets-5 ">         
            <form class="center" action="" method="post" enctype="multipart/form-data">
                <div class="form-groups"><label for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div>
                <div class="form-groups"><label for="password">
                    Password<input type="text" name="password" class="form-control"></label>
                </div>

                <div class="form-groups">
                  <input type="submit" name="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>  


    </header>


        </div>

    </div>
    <!-- /.container -->



       
         <!-- copyright section start -->
 <?php include_once('copyright.php'); ?>
  <!-- copyright section end -->
          

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
