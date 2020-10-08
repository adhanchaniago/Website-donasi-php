<?php
session_start();
if(!isset($_SESSION['loginAdmin'])){
      header('location:../');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include "include/head.php" ?>
<body>
    <div id="wrapper">
        <?php include "include/nav.php" ?>
        <!--/. NAV TOP  -->
        <?php include "include/navigation.php" ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header" >
                            Data Semua Infaq<small></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->
        <div style="float:right; margin-bottom:20px">
            <a href="#tambahDonasi" data-toggle="modal"><button class="btn btn-primary">Tambah Infaq</button></a>
            <a href="#importData" data-toggle="modal"><button class="btn btn-success">Import Infaq</button></a> 
        </div>        
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan/Tahun</th>
                                            <th>Pemberi</th>
                                            <th>Jumlah Infaq</th>
                                            <th>Pesan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../include/koneksi.php";
                                    $query = mysqli_query($connection, "SELECT donasi.*, donasi.id as idDonasi, user.* FROM donasi INNER JOIN user ON donasi.fk_donatur = user.id WHERE status ='terkonfirmasi' ORDER BY donasi.id DESC");  
                                      foreach ($query as $key => $value) : ?>
                                        <tr class="odd gradeX">
                                            <td><center><?php echo $key+1 ?></center></td>
                                            <td><?php $date = date('d-m-Y', strtotime($value['tgl']));
                                            echo $date ?></td>
                                            <td><?php echo $value['nama'] ?></td>
                                            <td class="center">Rp. <?php echo $value['jumlah'] ?></td>
                                            <td class="center"><?php echo $value['pesan'] ?></td>
                                            <td>
                                                <a href="#editDonasi" data-toggle="modal" data-nama="<?php echo $value['nama']; ?>" data-tgl="<?php echo $value['tgl']; ?>" data-jumlah="<?php echo $value['jumlah']; ?>" data-pesan="<?php echo $value['pesan']; ?>" data-id="<?php echo $value['idDonasi']; ?>"
                                                class="btn btn-primary editDonasi">Edit</a>
                                                <?php echo "<a href='../auth/infaq.php?hapus=".$value['idDonasi']."'> 
                                                    <button class='btn btn-danger'>Hapus</button>
                                                    </a>" ?>
                                            </td>
                                        </tr>
                                     <?php endforeach ?>   
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
      </div>
    <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
    </div>
    </div>
    <div class="modal fade" id="importData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Import Data</h5 >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-primary">
              
          <form action="../auth/infaq.php" method="post" enctype="multipart/form-data" >
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-11">
                      <div class="form-group">
                        <label class="form-control-label" >File Excel</label>
                        <input type="file" id="file" name="file" class="form-control" >
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                     <button type="submit" name="import" class="btn btn-primary">Import</button>
                </div>
              </form>
            </div>
      </div>
      
    </div>
  </div>
  </div>
  <div class="modal fade" id="tambahDonasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Infaq</h5 >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-primary">
              
          <form action="../auth/infaq.php" method="post" enctype="multipart/form-data" >
                <div class="pl-lg-4">
                  <div class="row">
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Jumlah</label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Infaq">
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Pesan</label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="pesan" class="form-control" placeholder="Pesan">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                     <button type="submit" name="infaq_admin" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
      </div>
      
    </div>
  </div>
  </div>
  <div class="modal fade" id="editDonasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Donasi</h5 >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-primary">
              
          <form action="../auth/infaq.php" method="post" enctype="multipart/form-data" >
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-11">
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Pemberi</label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="hidden" name="id" id="id" class="form-control id" >
                          <input type="text" name="nama" readonly id="nama" class="form-control nama">
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Jumlah</label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="number" name="jumlah" id="jumlah" class="form-control jumlah">
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Pesan</label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="pesan" id="pesan" class="form-control pesan">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                     <button type="submit" name="editInfaq" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
      </div>
      
    </div>
  </div>
  </div>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <script type="text/javascript">
      $(document).on("click", ".editDonasi", function () {
      var tgl = $(this).data('tgl');
      var nama = $(this).data('nama');
      var jumlah = $(this).data('jumlah');
      var pesan = $(this).data('pesan');
      var id = $(this).data('id');
      
      $(".id").val(id);
      $(".nama").val(nama);
      $(".jumlah").val(jumlah);
      $(".pesan").val(pesan);
      $(".tgl").val(tgl);
      });
    </script>
   
</body>
</html>
