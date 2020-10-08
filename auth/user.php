<?php 
include "../include/koneksi.php";

if (isset($_POST['tambahPengguna'])) {
	$nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    if(empty($nama)|| empty($email)|| empty($username) || empty($password))
    {
        echo "<script>window.alert('Mohon data harus diisi dengan lengkap!!')
        window.location='../admin/pengguna.php'</script>";
    }else{
        mysqli_query($connection,"INSERT INTO user(id, nama, email, username, password, level)
        VALUES ('','$nama','$email','$username', '$password', '$level')");
        echo "<script>window.alert('DATA SUDAH DISIMPAN')
        window.location='../admin/pengguna.php'</script>";
    }
}
elseif (isset($_GET['hapus'])) {
	$id = $_GET['hapus'];
	mysqli_query($connection,"DELETE FROM user where id = '$id'");
	echo "<script>window.alert('User Berhasil Terhapus')
    window.location='../admin/pengguna.php'</script>";
}
?>