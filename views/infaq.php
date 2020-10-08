<?php
session_start();
if(!isset($_SESSION['login'])){
      header('location:../Login/');
}
$id = $_SESSION['id'];
$nama = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../include/head.php" ?> 
  <body>
    
  <?php include"../include/nav_login.php" ?>  
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('../assets/images/infaq.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="heading">Infaq</h2>
              <p class="lead">Hartamu adalah sebagian harta dari mereka, berbagi itu indah.</p>
              <p><a href="#infaq" class="btn btn-primary btn-hover-white py-3 px-5">Infaq Sekarang</a></p>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  

  

  <div class="site-section fund-raisers" id="infaq">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12 text-center">
          <h2>Infaq</h2>
        </div>
      </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6" style="margin-left:270px">
        <form action="../auth/infaq.php" method="post">
            <div class="form-group">
              <input type="hidden" name="tanggal" class="form-control px-3 py-3" value="<?php echo date(); ?>">
            </div>
            <div class="form-group">
              <input type="text"  class="form-control px-3 py-3" value="<?php echo $nama ?>" readonly>
              <input type="hidden" name="nama" value="<?php echo $id; ?>">
            </div>
            <div class="form-group">
              <input type="number" name="jumlah" class="form-control px-3 py-3" placeholder="Jumlah donasi">
            </div>
            <div class="form-group">
              <textarea type="text" name="pesan" class="form-control px-3 py-3" placeholder="pesan"></textarea>
            </div>
            <div class="form-group">
              <center><button type="submit" name="simpan" class="btn btn-primary py-3 px-5">Simpan</button></center>
            </div>
        </form>
        </div>

      </div>
    </div>
  
           
      </div>
    </div>
  </div> <!-- .section -->

  <div class="featured-section overlay-color-2" style="background-image: url('../assets/images/bg_3.jpg');">
    
    <div class="container">
      <div class="row">

        <div class="col-md-6">
          <img src="../assets/images/bg_3.jpg" alt="Image placeholder" class="img-fluid">
        </div>

        <div class="col-md-6 pl-md-5">
          <span class="featured-text d-block mb-3">Terima Kasih</span>
          <h2>Karena bantuan anda saudara kita yang masih membutuhkan akan terbantu</h2>
          
          <p><a href="gallery.php" class="btn btn-success btn-hover-white py-3 px-5">Lihat Galeri</a></p>
        </div>
        
      </div>
    </div>

  </div> <!-- .featured-donate -->
  
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