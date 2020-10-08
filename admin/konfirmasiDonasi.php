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
                            Konfirmasi Donasi<small></small>
                        </h1>
                    </div>
                </div> 
                 <!-- /. ROW  -->       
            <div class="row">
                <div class="col-md-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Konfirmasi Donasi
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                         <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Donatur</th>
                                            <th>Jumlah Donasi</th>
                                            <th>Pesan</th>
                                            <th>Bukti</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../include/koneksi.php";
                                    $query = mysqli_query($connection, "SELECT donasi.*, donasi.id as idDonasi, user.* FROM donasi inner join user on donasi.fk_donatur = user.id WHERE status = 'menunggu'");  
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td class="success"><?php echo $row['id'] ?></td>
                                            <td class="info"><?php echo $row['tgl'] ?></td>
                                            <td class="warning"><?php echo $row['nama'] ?></td>
                                            <td class="center danger"><?php echo $row['jumlah'] ?></td>
                                            <td class="center success"><?php echo $row['pesan'] ?></td>
                                            <td class="center success"><img style="width:50px;height:50px" src='../assets/images/bukti/<?php echo $row['bukti']?>'/></td>
                                            <td class="center">
                                                <?php echo "<a href='../auth/infaq.php?konfirmasi=".$row['idDonasi']."'> 
                                                    <button class='btn btn-primary' style='width:130px'>Konfirmasi</button>
                                                    </a>" ?>
                                            </td>
                                        </tr>
                                     <?php } ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--  end  Context Classes  -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
        </div>
               <footer><p>All right reserved. Template by: <a href="http://webthemez.com">WebThemez</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
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
