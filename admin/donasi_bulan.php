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
                            Data Donasi/Bulan<small></small>
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
                                            <th>Donatur</th>
                                            <th>Jumlah Donasi</th>
                                            <th>Pesan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../include/koneksi.php";
                                    $query = mysqli_query($connection, "SELECT donasi.*, sum(jumlah) as jumlah1, MONTHNAME(tgl) as bulan, YEAR(tgl) as tahun, user.*  FROM donasi INNER JOIN user ON donasi.fk_donatur = user.id WHERE status = 'terkonfirmasi' GROUP BY MONTH(tgl), YEAR(tgl) ORDER BY YEAR(tgl), MONTH(tgl)");  
                                    foreach ($query as $key => $value) : ?>
                                        <tr class="odd gradeX">
                                            <td><center><?php echo $key+1 ?></center></td>
                                            <td><?php echo $value['bulan'] ?>/<?php echo $value['tahun'] ?> </td>
                                            <td><?php echo $value['nama'] ?></td>
                                            <td class="center">Rp. <?php echo $value['jumlah1'] ?></td>
                                            <td class="center"><?php echo $value['pesan'] ?></td>
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

                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
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
                    <div class="col-lg-11">
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Pemberi</label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="pemberi" class="form-control" placeholder="Pemberi Infaq">
                        </div>
                      </div>
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
    
   
</body>
</html>
