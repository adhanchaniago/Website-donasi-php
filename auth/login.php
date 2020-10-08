
<?php
include "../include/koneksi.php";


if (isset($_POST['login'])){
      $username=$_POST['username'];
      $password=md5($_POST['password']);

      $query=$con->prepare("SELECT * FROM user WHERE username=:username AND password=:password");
      $query->BindParam(":username",$username);
      $query->BindParam(":password",$password);
      $query->execute();
      $data=$query->fetch();
      if ($query->rowCount()>0){
            session_start();
            if($data['level']== 'admin'){
                  $_SESSION['loginAdmin'] = true;
                  $_SESSION['username']=$data['username'];
                  $_SESSION['level']=$data['level'];
                  $_SESSION['email']=$data['email'];
                  $_SESSION['nama'] = $data['nama'];
                  header('location:../admin');
            }else{
                  $id_login = uniqid();
                  $cek = mysqli_num_rows(mysqli_query($connection,"SELECT * FROM user WHERE username='$username'"));
                  if ($cek > 0) {
                      mysqli_query($connection, "DELETE FROM datar_login where username='$username' ");
                      $insert = mysqli_query($connection, "INSERT INTO daftar_login(id_login, nama) VALUES ('$id_login', '$username')");
                      if ($insert) {
                        $_SESSION['login'] = true;
                        $_SESSION['username']=$data['username'];
                        $_SESSION['level']=$data['level'];
                        $_SESSION['email']=$data['email'];
                        $_SESSION['nama'] = $data['nama'];
                        $_SESSION['id_login'] = $id_login;
                        $_SESSION['id'] = $data['id'];
                        header('location:../');
                      }else{
                        echo "gagal";
                      }
                      
                  }
                  else{
                      $insert = mysqli_query($connection, "INSERT INTO daftar_login(id_login, nama) VALUES ('$id_login', '$username')");
                      if ($insert) {
                        $_SESSION['login'] = true;
                      $_SESSION['username']=$data['username'];
                      $_SESSION['level']=$data['level'];
                      $_SESSION['email']=$data['email'];
                      $_SESSION['nama'] = $data['nama'];
                      $_SESSION['id_login'] = $id_login;
                      $_SESSION['id'] = $data['id'];
                      header('location:../');
                      }else{
                        echo "gagal";
                       
                  }
                      }
            }
      }
      else
      {
        echo "<script>window.alert('username atau password salah')
        window.location='../Login'</script>";
      }
    }
else if(isset($_POST['register'])){
      $nama = $_POST['nama'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = md5($_POST['password']);
      if(empty($nama)|| empty($email)|| empty($username) || empty($password))
      {
          echo "<script>window.alert('Mohon data harus diisi dengan lengkap!!')
          window.location='../Login/register.php'</script>";
      }else{
          mysqli_query($connection,"INSERT INTO user(id, nama, email, username, password, level)
          VALUES ('','$nama','$email','$username', '$password', 'user')");
          echo "<script>window.alert('DATA SUDAH DISIMPAN')
          window.location='../Login'</script>";
         }
      }


?>