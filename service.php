<?php include_once('config.php');?>

<div class="container">
      <h1 class="services_taital"><span>Our</span> <img src="images/icon-1.png"> <span
          style="color: #1f1f1f">Services</span></h1>
      <p class="services_text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
        aliqua</p>
      <div id="main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

          
            

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                  
                <?php 
                $res = getcategories();
                while($row=mysqli_fetch_array($res)){ 

                  echo'
                  <div class="swiper-slide">
                  <div class="box_section active">
                    <a href="pord.php?id='.$row["cat_id"].'">
                      <div class="tiles_img" style= "background-image: url(images/'.$row["cat_image"].'");"></div>
                      <h3 class="tile_text active">'.$row["cat_name"].'</h3>
                      <p class="lorem_text active">'.$row["cat_desc"].'</p>                    
                    </a>
                  </div>
                  </div>
                ';
                }
                ?>
                 
                  
                </div>
                <div class="swiper-pagination"></div>
              </div>

          
        </div>
        
      </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 2,
    spaceBetween: 30,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    // autoplay: {
    // delay:3000,
    // },
  });
</script>