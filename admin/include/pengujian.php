<?php 
  include "../../include/pengujian.php";
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
    <tr>
      <th>No</th>
      <th>Bulan/Tahun</th>
      <th>Aktual</th>
      <th>Predik</th>
      <th>Mape</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach ($data as $key => $value) : ?>
    <tr class="odd gradeX">
      <td><center><?php echo $key+1 ?></center></td>
      <td><?php echo $date[$key] ?></td>
      <td>Rp. <?php echo $value ?></td>
      <td class="center">Rp. <?php echo $peramalan[$key] ?></td>
      <td class="center"><?php echo round($nilaiPE[$key]) ?> %</td>
    </tr>
  <?php endforeach ?>   
  </tbody>
</table>

<div class="text-left">
  <h3>Total Mape% : <span><?php echo round($Mape['JumlahPe']) ?> %</span></h3>
</div>
<div class="text-left">
  <h3>Mape% : <span><?php echo round($Mape['JumlahMape']) ?> %</span></h3>
</div>
 