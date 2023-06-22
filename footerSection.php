<?include_once('config.php');?>
<div class="container">
      <div class="footer_main">
        <div class="footer_left">
          <h1 class="contact_taital"><span>Contact </span> <img src="images/icon-2.png"> <span>Us</span></h1>
          <!---<h3 class="text-center bg-warning">--->
					<?php
					if(isset($_POST['submit'])){
						$to      = 'nobody@example.com';
						$subject = $_POST['subject'];
						$message = $_POST['message'];
						
						$sent = sendMail($to, $subject, $message);
						echo $sent;
						if($sent){
							echo '<div class="alert alert-danger text-center">Your email was sent successfully</div>';
						}else{
							echo '<div class="alert alert-danger text-center">Failed to send!!!!</div>';
						}
					}
					?>
					<!---</h3>--->
        </div>
        <div class="footer_left">
          <div class="location_text"><a href="#"><img src="images/map-icon.png"><span
                class="padding_left_15">Locations</span></a></div>
        </div>
        <div class="footer_left">
          <div class="location_text"><a href="#"><img src="images/call-icon.png"><span class="padding_left_15">+71
                9876543210</span></a></div>
        </div>
        <div class="footer_left">
          <div class="location_text"><a href="#"><img src="images/map-icon.png"><span
                class="padding_left_15">demo@gmail.com</span></a></div>
        </div>
      </div>
      <div class="contact_section">
        <div class="row">
          <div class="col-md-6">
          <form name="sentMessage" id="contactForm" method="post" action="" >
            <div class="mail_section">
              <input type="" name = "name" class="email_text" placeholder="Name" name="Name">
              <input type="" name = "mail" class="email_text" placeholder="Email" name="Email">
              <input type="" name = "number" class="email_text" placeholder="Phone Number" name="Phone Number">
              <textarea name = "message" class="massage_text" placeholder="Message" rows="5" id="comment" name="Message"></textarea>
              <div class="send_bt"><a href="#">send</a></div>
            </div>
          </div>
          </form>
          <div class="col-md-6">
            <div class="map_main">
              <div class="map-responsive">
                <iframe
                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                  width="600" height="280" frameborder="0" style="border:0; width: 100%;" allowfullscreen></iframe>
              </div>
            </div>
            <div class="social_icon">
              <ul>
                <li><a href="#"><img src="images/fb-icon1.png"></a></li>
                <li><a href="#"><img src="images/twitter-icon1.png"></a></li>
                <li><a href="#"><img src="images/linkden-icon1.png"></a></li>
                <li><a href="#"><img src="images/instagram-icon1.png"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>