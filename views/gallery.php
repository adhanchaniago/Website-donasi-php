<!DOCTYPE html>
<html lang="en">
  <?php include "../include/head.php" ?>
  <body>
  <?php 
  session_start();
  if(isset($_SESSION['login'])){
    include "../include/nav_login.php";
  }else{
    include "../include/nav.php";
  }
  ?>

   <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('../assets/images/masjid.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="heading">Galeri</h2>
              <p><a href="#galeri" class="btn btn-primary btn-hover-white py-3 px-5">Lihat Galeri</a></p>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  
  <div class="site-section" id="galeri">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-4">
          <a style="width:380px;height:300px" href="../assets/images/1.jpg" class="image-popup img-hover">
            <span class="icon icon-search"></span>
            <img style="width:380px;height:300px" src="../assets/images/1.jpg" alt="Image placeholder" class="img-fluid">
          </a>
        </div>
        <div class="col-md-4">
          <a style="width:380px;height:300px" href="../assets/images/2.jpg" class="image-popup img-hover">
            <span class="icon icon-search"></span>
            <img style="width:380px;height:300px" src="../assets/images/2.jpg" alt="Image placeholder" class="img-fluid">
          </a>
        </div>
        <div class="col-md-4">
          <a style="width:380px;height:300px" href="../assets/images/3.jpg" class="image-popup img-hover">
            <span class="icon icon-search"></span>
            <img style="width:380px;height:300px" src="../assets/images/3.jpg" alt="Image placeholder" class="img-fluid">
          </a>
        </div>
        <div class="col-md-4">
          <a style="width:380px;height:300px" href="../assets/images/4.jpg" class="image-popup img-hover">
            <span class="icon icon-search"></span>
            <img style="width:380px;height:300px" src="../assets/images/4.jpg" alt="Image placeholder" class="img-fluid">
          </a>
        </div>

        <div class="col-md-4">
          <a style="width:380px;height:300px" href="../assets/images/5.jpg" class="image-popup img-hover">
            <span class="icon icon-search"></span>
            <img style="width:380px;height:300px" src="../assets/images/5.jpg" alt="Image placeholder" class="img-fluid">
          </a>
        </div>
        <div class="col-md-4">
          <a style="width:380px;height:300px" href="../assets/images/6.jpg" class="image-popup img-hover">
            <span class="icon icon-search"></span>
            <img style="width:380px;height:300px" src="../assets/images/6.jpg" alt="Image placeholder" class="img-fluid">
          </a>
        </div>

         <div class="col-md-4">
          <a style="width:380px;height:300px" href="../assets/images/7.jpg" class="image-popup img-hover">
            <span class="icon icon-search"></span>
            <img style="width:380px;height:300px" src="../assets/images/7.jpg" alt="Image placeholder" class="img-fluid">
          </a>
        </div>
        <div class="col-md-4">
          <a style="width:380px;height:300px" href="../assets/images/2.jpg" class="image-popup img-hover">
            <span class="icon icon-search"></span>
            <img style="width:380px;height:300px" src="../assets/images/2.jpg" alt="Image placeholder" class="img-fluid">
          </a>
        </div>
        <div class="col-md-4">
          <a style="width:380px;height:300px" href="../assets/images/5.jpg" class="image-popup img-hover">
            <span class="icon icon-search"></span>
            <img style="width:380px;height:300px" src="../assets/images/5.jpg" alt="Image placeholder" class="img-fluid">
          </a>
        </div>
      </div>
    </div>
  </div>

  <?php include "../include/footer.php" ?>


  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/jquery.easing.1.3.js"></script>
  <script src="../assets/js/jquery.waypoints.min.js"></script>
  <script src="../assets/js/jquery.stellar.min.js"></script>
  <script src="../assets/js/owl.carousel.min.js"></script>
  <script src="../assets/js/jquery.magnific-popup.min.js"></script>
  <script src="../assets/js/bootstrap-datepicker.js"></script>
  
  <script src="../assets/js/aos.js"></script>
  <script src="../assets/js/jquery.animateNumber.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../assets/js/google-map.js"></script>
  <script src="../assets/js/main.js"></script>
    
  </body>
</html>