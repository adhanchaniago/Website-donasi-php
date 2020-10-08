<?php
session_start();
if(!isset($_SESSION['loginAdmin'])){
      header('location:../');
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include'include/head.php' ?>

<body>
    <div id="wrapper">
        <?php include"include/nav.php" ?>
        <!--/. NAV TOP  -->
        <?php include "include/navigation.php" ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Peramalan<small> Infaq</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div style="margin-left:300px;margin-right:300px">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2 ">Tahun</label>
                        <div class="col-md-8 col-sm-8 ">
                          <select name="tahun" class="form-control" name="kerusakan">
                            <?php 
                            include "../include/koneksi.php";
                            $sql = mysqli_query($connection, "SELECT year(tgl) as tanggal FROM donasi group by year(tgl)");
                            while ($row = mysqli_fetch_array($sql)) {
                              echo "<option value='".$row['tanggal']."'>".$row['tanggal']."</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                </div>
                <div style="margin-left:470px;margin-bottom:20px">
                        <button class="btn btn-primary" onclick="get_peramalan()">Pilih</button>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div id="chart-peramalan"></div>
                    </div>
                </div>
                <div class="text-left">
                    <h3>Peramalan Bulan Selanjutnya : Rp.<span id="hasil"></span></h3>
                </div>
                <!-- /. ROW  -->

                <!-- /. ROW  -->
				<footer><p>Skripsi Polinema</p></footer>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>
    <script src="assets/js/highcharts.js"></script>
    <script src="assets/js/exporting.js"></script>
    <script src="assets/js/export-data.js"></script>
    <script src="assets/js/accessibility.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {

    });

    var ctx;
    var peramalanchart;
    var dataPeramalan;

    var get_peramalan = () => {
        var tahun = $('[name="tahun"]').val();
        $.ajax({
            url: '../include/metode.php',
            type: "POST",
            data: {
                tahun: tahun
            },
            dataType: "JSON",
            success: (data) => {
                if (data.error == 0) {
                    if(peramalanchart != null){
                        peramalanchart.destroy();
                    }
                    dataPeramalan = data.bulan_depan;
                    document.getElementById("hasil").innerHTML = dataPeramalan;
                    ctx = document.getElementById("chart-peramalan");
                    Highcharts.chart(ctx, {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Grafik Peramalan Infaq Masjid Sabilillah Malang'
                    },
                    xAxis: {
                        categories: data.bulan,
                        tickmarkPlacement: 'on',
                        title: {
                        enabled: false
                        }
                    },
                    yAxis: {
                        title: {
                        text: 'Jumlah Infaq'
                        },
                        labels: {
                        formatter: function () {
                            return this.value;
                            }
                        }
                    },
                    tooltip: {
                        split: true,
                        valueSuffix: ' millions'
                    },
                    plotOptions: {
                        area: {
                        stacking: 'normal',
                        lineColor: '#666666',
                        lineWidth: 1,
                        marker: {
                            lineWidth: 1,
                            lineColor: '#666666'
                            }
                        }
                    },
                    series: [{
                    name: 'Data Aktual',
                        data: data.chart.aktual
                    }, {
                    name: 'Data Peramalan',
                        data: data.chart.predik
                    }]
                });
                } else {
                    alert(data.message);
                }
            }
        })
    }
    </script>
</body>

</html>