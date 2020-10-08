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
                            Dashboard <small>Infaq Masjid Sabilillah</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                <div style="margin-left:150px">
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-bar-chart-o fa-5x"></i>
                                <?php 
                                $date = date('Y');
                                include "../include/koneksi.php";
                                $db = mysqli_query($connection, "SELECT sum(jumlah) as jumlah1 FROM donasi WHERE YEAR(tgl) = '$date' AND status = 'terkonfirmasi' GROUP BY YEAR(tgl)");
                                foreach ($db as $key => $value) :?>
                                <h3>Rp. <?php echo $value['jumlah1']; ?></h3>
                                <?php endforeach ?>
                            </div>
                            <div class="panel-footer back-footer-green">
                                Infaq Tahun ini

                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-5 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-brown">
                            <div class="panel-body">
                                <i class="fa fa-users fa-5x"></i>
                                <?php 
                                $db= mysqli_query($connection, "SELECT count(*) as user FROM user");
                                foreach ($db as $key => $value) : ?>

                                <h3><?php echo $value['user'] ?> Pengguna</h3>
                                <?php endforeach ?>
                            </div>
                            <div class="panel-footer back-footer-brown">
                                Jumlah Pengguna

                            </div>
                        </div>
                    </div>
                </div>
                </div>
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