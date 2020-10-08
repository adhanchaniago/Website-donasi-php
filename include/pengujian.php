<?php 
include "koneksi.php";
$tahun = $_POST['tahun']; 
if($tahun != ""){
  $db = mysqli_query($connection, "SELECT donasi.*, sum(jumlah) as jumlah1, MONTH(tgl) as bulan, YEAR(tgl) as tahun,monthname(tgl) as Sbulan, user.*  FROM donasi INNER JOIN user ON donasi.fk_donatur = user.id WHERE YEAR(tgl) = '$tahun' GROUP BY MONTH(tgl), YEAR(tgl) ORDER by YEAR(tgl), month(tgl)");
  }else{
    $db = mysqli_query($connection, "SELECT donasi.*, sum(jumlah) as jumlah1, MONTH(tgl) as bulan, YEAR(tgl) as tahun,monthname(tgl) as Sbulan, user.*  FROM donasi INNER JOIN user ON donasi.fk_donatur = user.id GROUP BY MONTH(tgl), YEAR(tgl) ORDER by YEAR(tgl), month(tgl)");
  }
//Tahap 1
foreach ($db as $key => $value) {
  $keterangan_data[$key] = $value;
  $data[] = (int)$value['jumlah1'];
  $date[] = $value['Sbulan']."/".$value['tahun'];
}
//Tahap 2
$smoothing = [];
$smoothing_awal = (0.1*$data[0])+(1-0.1)*$data[0];
array_push($smoothing, $smoothing_awal);
$n = 0;
foreach ($data as $key => $value) {
  if ($key == 0) continue;
  $t = (0.1*$data[$key])+(1-0.1)*$smoothing[$key = $n];
  array_push($smoothing, $t);
  $n++;
}
//Tahap 3
$smoothing2 = [];
$smoothing2_awal = (0.1*$smoothing[0])+(1-0.1)*$smoothing[0]; 
array_push($smoothing2, $smoothing2_awal);
$n = 0;
foreach ($smoothing as $key => $value) {
  if ($key == 0) continue;
  $t = (0.1*$smoothing[$key])+(1-0.1)*$smoothing2[$key = $n];
  array_push($smoothing2, $t);
  $n++;
}
//Tahap 4
foreach ($data as $key => $value) {
  $pemulusan[] = 2*$smoothing[$key] - $smoothing2[$key];
}
//Tahap 5
foreach ($data as $key => $value) {
  $trend[] = 0.1/(1-0.1)*($smoothing[$key] - $smoothing2[$key]);
}
//Tahap 6 Nilai Peramalan
$peramalan = [];
$n = 0;
for ($i=0; $i <count($data) ; $i++) { 
  $ft = $pemulusan[$key = $n] + $trend[$key = $n];
  array_push($peramalan, $ft);
  $n++;
}
//Tahap 7
$n = 0; $a =1;
for ($i=0; $i <count($data) - 1 ; $i++) { 
  $nilaiError1[] = $data[$key = $a] - $peramalan [$key = $n]; 
  $n++; $a++;
 } 
//Tahap 8
foreach ($nilaiError1 as $key => $value) {
  $nilaiError2[] = pow($value, 2);
}
//Tahap 9
foreach ($nilaiError1 as $key => $value) {
  $absolut[] = ABS($value);
}
foreach ($absolut as $key => $value) {
  $nilaiPE[] = $absolut[$key]/$data[$key + 1]*100;
}
$keys = count($peramalan) -1;
$peramalan_bulan_depan = $peramalan[$keys];
array_unshift($peramalan, 0);
array_unshift($nilaiError1, 0);
array_unshift($nilaiError2, 0);
array_unshift($nilaiPE, 0);
array_pop($peramalan);

$Mape = [
  'JumlahPe' => array_sum($nilaiPE),
  'JumlahMape' => array_sum($nilaiPE)/count($nilaiPE)
];

?>