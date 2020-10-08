<!DOCTYPE html>
<html lang="en">
  <?php include "../include/head.php" ?>
  <body>
  <?php 
  session_start();
  // $id_login = $_SESSION['id_login'];
  // $cek = $cek = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM daftar_login WHERE id_login='$id_login'"));
  // if($cek < 1){
  //     header('location:../Login/');
  // }


  if(isset($_SESSION['login'])){
    include "../include/nav_login.php";
  }else{
    include "../include/nav.php";
  }
  ?>

  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 item" style="background-image: url('../assets/images/sabilillah.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-7">
              <h2 class="heading">Hartamu adalah sebagian harta dari mereka, berbagi itu indah.</h2>
            </div>
          </div>
        </div>
      </div>    
    </div>
  </div>

  <div class="featured-donate overlay-color" style="background-image: url('images/bantuan.jpg');">
    
    <div class="container">
      <div class="row">
        <div class="col-lg-8 order-lg-2 mb-3 mb-lg-0">
          <img src="../assets/images/bantuan.jpg" alt="Image placeholder" class="img-fluid">
        </div>
        <div class="col-lg-4 pr-lg-5">
          <span class="featured-text mb-3 d-block">Infaq Sekarang</span>
          <h2>Bantu saudara kita</h2>
          <p class="mb-3">Mari kita bersama-sama membantu saudara kita yang membutuhkan diluar sana dengan infaq sekarang dengan cara :</p>
          <p class="mb-3">Transfer ke rekening petugas infaq</p>
          <p class="mb-3"> BRI : 6547652426188</p>
          <p class="mb-3"> BCA : 6131323243412</p>
          <p class="mb-3">Atau silahkan infaq dengan menyertakan nama anda dengan klik tombol dibawah ini</p>
          <p><a href="infaq.php" class="btn btn-primary btn-hover-white py-3 px-5">Infaq</a></p>
        </div>
        
      </div>
    </div>
  
  <!-- <div class="site-section fund-raisers">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12 text-center">
          <h2>Latest Donations</h2>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center bg-light pt-4">
            <img src="../assets/images/person_1.jpg" alt="Image placeholder" class="img-fluid">
            <div class="donate-info">
              <h2>Jean Smith</h2>
              <span class="time d-block mb-3">Donated 3 hours ago</span>

              <div class="donate-amount d-flex">
                <div class="label">Donated</div>
                <div class="amount">$1,150</div>
              </div>
            </div>
          </div>    
        </div>

        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center bg-light pt-4">
            <img src="../assets/images/person_2.jpg" alt="Image placeholder" class="img-fluid">
            <div class="donate-info">
              <h2>Christine Charles</h2>
              <span class="time d-block mb-3">Donated 3 hours ago</span>

              <div class="donate-amount d-flex">
                <div class="label">Donated</div>
                <div class="amount">$150</div>
              </div>
            </div>
          </div>    
        </div>

        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center bg-light pt-4">
            <img src="../assets/images/person_3.jpg" alt="Image placeholder" class="img-fluid">
            <div class="donate-info">
              <h2>Albert Sluyter</h2>
              <span class="time d-block mb-3">Donated 3 hours ago</span>

              <div class="donate-amount d-flex">
                <div class="label">Donated</div>
                <div class="amount">$534</div>
              </div>
            </div>
          </div>    
        </div>

        <div class="col-md-6 col-lg-3 mb-5">
          <div class="person-donate text-center bg-light pt-4">
            <img src="../assets/images/person_4.jpg" alt="Image placeholder" class="img-fluid">
            <div class="donate-info">
              <h2>Andrew Holloway</h2>
              <span class="time d-block mb-3">Donated 3 hours ago</span>

              <div class="donate-amount d-flex">
                <div class="label">Donated</div>
                <div class="amount">$2,500</div>
              </div>
            </div>
          </div>    
        </div>
      </div>
    </div>
  </div> .section -->
  
  
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