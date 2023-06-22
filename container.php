
<div class="col-md-3">
    <div class="logo"><a href="index.php"><img src="images/logo.png"></a></div>
</div>
<div class="col-md-9">
    <div class="menu_text">
        <ul>
            <?php
            
            if(!isset($_SESSION['username'])){
            $log = <<<DELIMITER
            <div class="togle_3">
                <div class="menu_main"style="margin-left:-18px; ">
                <div class="padding_left0"><a href="register.php">Register</a>
                    <span class="padding_left0"><a href="login.php">Login</a></span>
                </div>
            </div>           
            DELIMITER;
        }
        else {
            $username = $_SESSION['username'];
            $log = <<<DELIMITER
            <div class="togle_3">
                <div class="menu_main"style="margin-left:-18px; ">
                <div class="padding_left0"><span>$username</span>
                    <span class="padding_left0"><a href="admin/logout.php">Logout</a></span>
                </div>
            </div>   
        DELIMITER;
        }
            echo $log;

            ?>
            <div class="shoping_bag menu_main">
            <a class="glyphicon glyphicon-shopping-cart"href="checkout.php"></a>
                <img style ="margin-left: 12px" src="images/search-icon.png">
            </div>
            </div>
            <div id="myNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                <a href="index.php">Home</a>
                <a href="services.php">Services</a>
                <a href="about.php">About</a>
                <a href="choose.php">Choose</a>
                <a href="team.php">Team</a>
                <a href="contact.php">Contact Us</a>
                <?php
                
            
                if (isset($_SESSION['access'])){
                   echo'<a href="admin">admin</a>';
                }
                
                ?>
                
               
            </div>
            </div>
            <span class="navbar-toggler-icon"></span>
            <span onclick="openNav()"><img src="images/toggle-icon.png" class="toggle_menu"></span>
        </ul>
    </div>
</div>
