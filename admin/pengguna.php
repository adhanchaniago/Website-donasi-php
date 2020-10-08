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
                            Pengguna<small></small>
                        </h1>
                    </div>
                </div> 

            <div style="float:right; margin-bottom:20px">
            <a href="#tambahPengguna" data-toggle="modal"><button class="btn btn-primary">Tambah Pengguna</button></a> 
            </div>
                 <!-- /. ROW  -->       
            <div class="row">
                <div class="col-md-12">
                     <!--    Context Classes  -->
                    <div class="panel panel-default">
                       
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                         <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include "../include/koneksi.php";
                                    $query = mysqli_query($connection, "SELECT * FROM user");  
                                    foreach ($query as $key => $value) : ?>
                                        <tr class="odd gradeX">
                                            <td class="success"><?php echo $key + 1  ?></td>
                                            <td class="info"><?php echo $value['nama'] ?></td>
                                            <td class="warning"><?php echo $value['email'] ?></td>
                                            <td class="center danger"><?php echo $value['username'] ?></td>
                                            <?php if ($value['level'] == 'admin') : ?>
                                            <td class="center">
                                                <button class="btn btn-danger" disabled>Hapus</button>
                                            </td>
                                            <?php endif ?>
                                            <?php if ($value['level'] == 'user') : ?>
                                            <td class="center">
                                                <a href="../auth/user.php?hapus=<?php echo $value['id'];?>"><button class="btn btn-danger">Hapus</button></a>
                                            </td>
                                            <?php endif ?>
                                        </tr>
                                     <?php endforeach ?>   
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
    </div>
             <!-- /. PAGE INNER  -->
    </div>
    <div class="modal fade" id="tambahPengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengguna</h5 >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-primary">
              
          <form action="../auth/user.php" method="post" enctype="multipart/form-data" >
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-11">
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Nama</label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="nama"  class="form-control" placeholder="nama">
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Email</label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="email" name="email" class="form-control" placeholder="etc@gmail.com">
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Username</label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="text" name="username" class="form-control" placeholder="username">
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Password</label>
                        <div class="col-md-8 col-sm-8 ">
                          <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                      </div>
                      <div class="form-group row ">
                        <label class="control-label col-md-4 col-sm-4 ">Level</label>
                        <div class="col-md-8 col-sm-8 ">
                          <select name="level" class="form-control">
                              <option value="user">User</option>
                              <option value="admin">Admin</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                     <button type="submit" name="tambahPengguna" class="btn btn-primary">Simpan</button>
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
