<?php
session_start();
  $id_login = $_SESSION['id_login'];
  $cek = $cek = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM daftar_login WHERE id_login='$id_login'"));
  if($cek < 1){
      header('location:../Login/');
  }

$id = $_SESSION['id'];
$nama = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html lang="en">
  <?php include "../include/head.php" ?>
  <?php include "../admin/include/head.php" ?> 
  <body>
    
  <?php include"../include/nav_login.php" ?>  
  <div class="block-31" style="position: relative;">
    <div class="owl-carousel loop-block-31 ">
      <div class="block-30 block-30-sm item" style="background-image: url('../assets/images/histori.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center">
              <h2 class="heading">Histori Donasi</h2>
              <p class="lead">Terima kasih banyak atas bantuannya</p>
              <p><a href="#histori" class="btn btn-primary btn-hover-white py-3 px-5">Lihat Histori</a></p>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  

  <div class="site-section fund-raisers" id="histori">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12 text-center">
          <h2>Histori</h2>
        </div>
      </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
          
            </div> 
            <div class="panel-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jumlah</th>
                      <th>Pesan</th>
                      <th>Status</th>
                      <th>Bukti</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    include "../include/koneksi.php";
                    $db = mysqli_query($connection, "SELECT * FROM donasi where fk_donatur = '$id' order by id desc");
                    foreach ($db as $key => $value) :?>
                    <tr>
                      <td><?php echo $key + 1 ?></td>
                      <td><?php $date = date('d-m-Y', strtotime($value['tgl'])); 
                      echo $date ?></td>
                      <td>Rp. <?php echo $value['jumlah']; ?></td>
                      <td><?php echo $value['pesan']; ?></td>
                      <td><?php echo $value['status'] ?></td>
                      <td><img style="width:60px;height:60px" src='../assets/images/bukti/<?php echo $value['bukti']?>'/></td>
                      <?php if($value['status'] == 'menunggu' AND $value['bukti'] != 'bukti.png') : ?>
                      <td>
                        <a href="#edit" data-toggle="modal" 
                        data-id="<?php echo $value['id']; ?>"
                        data-jumlah="<?php echo $value['jumlah']; ?>"
                        data-pesan="<?php echo $value['pesan']; ?>" class="editInfaq"
                        ><button class="btn btn-primary">Edit</button></a>
                        <a href="#upload" data-toggle="modal"><button class="btn btn-danger">Hapus</button></a>
                      </td>
                      <?php endif ?>
                      <?php if($value['status'] == 'menunggu' AND $value['bukti'] == 'bukti.png') : ?>
                      <td>
                        <a href="#edit" data-toggle="modal" 
                        data-id="<?php echo $value['id']; ?>"
                        data-jumlah="<?php echo $value['jumlah']; ?>"
                        data-pesan="<?php echo $value['pesan']; ?>" class="editInfaq"
                        ><button class="btn btn-primary">Edit</button></a>
                        <a href="#upload" data-toggle="modal" class="uploadBukti" data-id="<?php echo $value['id']; ?>"><button class="btn btn-success">Upload Bukti</button></a>
                        <a href="../auth/infaq.php?hapushistori=<?php echo $value['id'] ?>"><button class="btn btn-danger">Hapus</button></a>
                      </td>
                      <?php endif ?>
                      <?php if($value['status'] != 'menunggu') : ?>
                      <td>
                        <button class="btn btn-warning" disabled>Disetujui</button>
                      </td>
                      <?php endif ?>
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>         
    </div>
  </div>
  </div>

  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Infaq</h5 >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
        <div class="card card-primary">
              
          <form action="../auth/infaq.php" method="post" enctype="multipart/form-data">
                <div class="pl-lg-4">                  
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Jumlah</label>
                        <input type="text" name="jumlah" class="form-control jumlah" id="jumlah">
                        <input type="hidden" name="id" class="form-control id" id="id">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Pesan</label>
                        <textarea type="text" name="pesan" class="form-control pesan" id="pesan"> </textarea>
                      </div>
                    </div>
                   <div class="col-lg-12">
                   <td>
                   <input type="checkbox" name="ubah_foto" value="true"> Ceklist jika ingin merubah foto
                   <br>
                        <input type="file" name="foto">
                    </td>
                  </div>
                </div>
                <br>
                <div class="modal-footer">
                     <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Infaq</h5 >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
        <div class="card card-primary">
              
          <form action="../auth/infaq.php" method="post" enctype="multipart/form-data">
                <div class="pl-lg-4">                  
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Upload Bukti</label>
                        <input type="hidden" name="id" class="form-control idku" id="idku">
                        <input type="file" name="foto">
                      </div>
                    </div>
                </div>
                <br>
                <div class="modal-footer">
                     <button type="submit" name="upload" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

 
  
 <?php include "../include/footer.php" ?>
 <?php include "../admin/include/script.php" ?> 

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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2ssensor=false"></script>
  <script src="../assets/js/google-map.js"></script>
  <script src="../assets/js/main.js"></script>
  <script type="text/javascript">
    $(document).on("click", ".editInfaq", function () {
    var id = $(this).data('id');
    var jumlah = $(this).data('jumlah');
    var pesan = $(this).data('pesan');
    
    $(".id").val(id);
    $(".jumlah").val(jumlah);
    $(".pesan").val(pesan);
    });
  </script>
  <script type="text/javascript">
    $(document).on("click", ".uploadBukti", function () {
    var id = $(this).data('id');
    
    $(".idku").val(id);
    });
  </script>
    
  </body>
</html>