<!DOCTYPE html>
<html lang="en">

<?php include_once('head.php'); ?>
<?php include_once('config.php'); ?>
<body>
  <!--header section start -->
  <div class="header_section">
    <div class="container-fluid">
      <div class="row">
      <?php include_once('container.php'); ?>
      </div>
    </div>
    
    
        
    <h1 class="text-center">Register</h1>
            
              <?php
              if(isset($_POST['submit'])){

                $name =$_POST['username'];
                $mail =$_POST['mail'];
                $pass =$_POST['password'];
                $repassword=$_POST['repassword'];
                if($pass==$repassword){
                $sql="insert into users(username, password, email) values(?,?,?)";
                $stmt= $conn->prepare($sql);
                $result = $stmt->execute([$name,$pass,$mail]);
                if($result){
                  echo '<div class="alert alert-success text-center">Registration Successful</div>';
                  header("Location:login.php");
                }else{
                  echo '<div class="alert alert-danger text-center">Registration Failed</div>';
                }
              }
              else{
                echo'<h2 class="text-center alert alert-danger">Password does not match</h2>';
              }


              }
              
              ?>
            
        <div class="col-sms-4 col-sm-offsets-5 ">         
            <form class="center2" action="" method="post" enctype="multipart/form-data">
                <table> 
                    <tr>
                        <td><div class="div form-groups"><label class="label" for="">
                    username<input type="text" name="username" class="form-control"></label>
                </div></td>
                <td><div class="div form-groups"><label class="label" for="">
                    E-mail<input type="text" name="mail" class="form-control"></label>
                </div></td>
                </tr>
                <tr><td><div class="pass div form-groups"><label class="label" for="password">
                    Password<input type="password" name="password" class="form-control"></label>
                </div></td>
                <td><div class="confPass div form-groups"><label class="label" for="password">
                Re-write your Password<input type="password" name="repassword" class="form-control"></label>
                </div></td> </tr>
                </table>
                <div class="form-groups">
                  <input type="submit" name="submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    
    
    </div>  
    <!-- footer section end -->
  <!-- copyright section start -->
  <?php include_once('copyright.php'); ?>
  <!-- copyright section end -->


</html>




<script>
    function openNav() {
      document.getElementById("myNav").style.width = "100%";
    }
    function closeNav() {
      document.getElementById("myNav").style.width = "0%";
    }
  </script>
  <!-- <script>
    document.querySelector('.btn').onclick = function(){
      var password = document.querySelector('.pass').value,
      confirmPassword = document.querySelector('.confPass').value;
      if(password!= confirmPassword){
        alert('Passwords do not match');
      }
    }
  </script> -->