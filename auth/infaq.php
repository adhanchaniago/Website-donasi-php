<?php
 include "../include/koneksi.php";
 require "../assets/libs/PHPExcel/Classes/PHPExcel.php";

    if(isset($_POST['simpan'])) {

        $tanggal=date("Y:m:d");
        $nama=$_POST['nama'];
        $jumlah = $_POST['jumlah'];
        $pesan = $_POST['pesan'];
        
        if(empty($jumlah))
        {
              echo "<script>window.alert('Mohon data harus diisi dengan lengkap!!')
              window.location='../views/infaq.php'</script>";
        }else{
            mysqli_query($connection,"INSERT INTO donasi(id, tgl, fk_donatur, jumlah, pesan, bukti, status)
            VALUES ('','$tanggal','$nama','$jumlah', '$pesan', 'bukti.png', 'menunggu')");
            echo "<script>window.alert('DATA SUDAH DISIMPAN')
            window.location='../views/histori.php#histori'</script>";
            }
    }
    elseif (isset($_POST['infaq_admin'])) {
        $tanggal=date("Y:m:d");
        $jumlah = $_POST['jumlah'];
        $pesan = $_POST['pesan'];
        
        if(empty($jumlah))
        {
              echo "<script>window.alert('Mohon data harus diisi dengan lengkap!!')
              window.location='../admin/donasi.php'</script>";
        }else{
            mysqli_query($connection,"INSERT INTO donasi(id, tgl, fk_donatur, jumlah, pesan, bukti, status)
            VALUES ('','$tanggal','5','$jumlah', '$pesan', 'bukti.png', 'terkonfirmasi')");
            echo "<script>window.alert('DATA SUDAH DISIMPAN')
            window.location='../admin/donasi.php'</script>";
        }
    }
    elseif (isset($_POST['editInfaq'])) {
        $id = $_POST['id'];
        $jumlah = $_POST['jumlah'];
        $pesan = $_POST['pesan'];

        $query = "UPDATE donasi SET jumlah='".$jumlah."', pesan='".$pesan."' WHERE id='".$id."'";
        $sql = mysqli_query($connection, $query); 
        if($sql){ 
            header("location: ../admin/donasi.php"); 
        }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='../admin/donasi.php'>Kembali Ke Form</a>";
        }
    }
    else if(isset($_POST['import'])){
        $file =$_FILES['file']['name'];
        $ekstensi =explode(".", $file);
        $file_name = "file-".round(microtime(true)).".".end($ekstensi);
        $sumber =$_FILES['file']['tmp_name'];
        $target_dir = "../file/";
        $target_file = $target_dir.$file_name;
        $upload = move_uploaded_file($sumber , $target_file); 
       
    
        $obj = PHPExcel_IOFactory::load($target_file);
        $all_data = $obj->getActiveSheet()->toArray(true,true,true,true);
        $sql = "INSERT INTO donasi(id, tgl, fk_donatur, jumlah, pesan, bukti, status) Values";
        for($i=2; $i <= count($all_data); $i++){
            $id = '';
            $tgl = $all_data[$i]['A'];;
            $jumlah = $all_data[$i]['B'];
            $fk_donatur = 99;
            $pesan = 'ikhlas';
            $bukti = 'donasi.jpg';
            $status = 'terkonfirmasi';
            $sql .= "('$id', '$tgl', '$fk_donatur', '$jumlah', '$pesan', '$bukti', '$status'),";
        }
        $sql = substr($sql, 0, -1);

        mysqli_query($connection, $sql) or die (mysqli_error($connection));
        unlink($target_file);   
        echo "<script>window.alert('DATA SUDAH DISIMPAN')
        window.location='../admin/donasi.php'</script>";    
    }
    else if(isset($_GET['konfirmasi'])){
        $id = $_GET['konfirmasi'];
        mysqli_query($connection,"UPDATE donasi set status = 'terkonfirmasi' where id = '$id'");
        echo "<script>window.alert('Donasi Terkonfirmasi')
        window.location='../admin/konfirmasiDonasi.php'</script>";
    }
    else if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];
        mysqli_query($connection,"DELETE FROM donasi where id = '$id'");
        echo "<script>window.alert('Infaq Terhapus')
        window.location='../admin/Donasi.php'</script>";
    }
    else if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $jumlah = $_POST['jumlah'];
        $pesan = $_POST['pesan'];
        
        if(isset($_POST['ubah_foto'])){ 
        
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
      
        $path = "../assets/images/bukti/".$foto;
      
        if(move_uploaded_file($tmp, $path)){ 
      
        $query = "SELECT * FROM donasi WHERE id='".$id."'";
        $sql = mysqli_query($connection, $query);
        $data = mysqli_fetch_array($sql); 
        if(is_file("../assets/img/user/".$data['bukti']))
          unlink("../assets/img/user/".$data['bukti']); 
        
        $query = "UPDATE donasi SET jumlah='".$jumlah."', pesan='".$pesan."', bukti='".$foto."' WHERE id='".$id."'";
        $sql = mysqli_query($connection, $query); 
        if($sql){ 
          header("location: ../views/histori.php"); 
        }else{
          echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
          echo "<br><a href='location: ../views/histori.php'>Kembali Ke Form</a>";
            }
        }
        }else{
            $query = "UPDATE donasi SET jumlah='".$jumlah."', pesan='".$pesan."' WHERE id='".$id."'";
            $sql = mysqli_query($connection, $query); 
            if($sql){ 
            header("location: ../views/histori.php"); 
            }else{
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                echo "<br><a href='../views/histori.php'>Kembali Ke Form</a>";
                }
            }
    }
    elseif (isset($_POST['upload'])) {
        $id = $_POST['id'];
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $path = "../assets/images/bukti/".$foto;
      
        if(move_uploaded_file($tmp, $path)){ 
      
        $query = "SELECT * FROM donasi WHERE id='".$id."'";
        $sql = mysqli_query($connection, $query);
        $data = mysqli_fetch_array($sql); 
        if(is_file("../assets/img/user/".$data['bukti']))
          unlink("../assets/img/user/".$data['bukti']); 
        
        $query = "UPDATE donasi SET bukti='".$foto."' WHERE id='".$id."'";
        $sql = mysqli_query($connection, $query); 
        if($sql){ 
          header("location: ../views/histori.php"); 
        }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='location: ../views/histori.php'>Kembali Ke Form</a>";
            }
        }
    }
    elseif (isset($_GET['hapushistori'])) {
        $id = $_GET['hapushistori'];
        $query = "DELETE FROM donasi WHERE id='".$id."'";
        $sql = mysqli_query($connection, $query); 
        if($sql){ 
          header("location: ../views/histori.php"); 
        }else{
            echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
            echo "<br><a href='location: ../views/histori.php'>Kembali Ke Form</a>";
        }
    }
?>