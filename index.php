<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location: auth/login.php");
    exit;
}

require_once "config.php";

$title = "Dashboard - Sistem Evaluasi Polres";
require_once "tamplate/header.php";
require_once "tamplate/navbar.php";
require_once "tamplate/sidebar.php";

$queryPolres = mysqli_query($koneksi, "SELECT * FROM polres");
$totalPolres = mysqli_num_rows($queryPolres);

$queryKegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan");
$totalKegiatan = mysqli_num_rows($queryKegiatan);

$queryLaporan = mysqli_query($koneksi, "SELECT * FROM laporan");
$totalLaporan = mysqli_num_rows($queryLaporan);


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Home</li>
            </ol>
            <!-- <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Total Polres</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="polres/polres.php">
                                <?= $totalPolres . ' Polres' ?>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Polres</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="kegiatan/kegiatan.php">
                                <?= $totalKegiatan . ' Kegiatan' ?>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Polres</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="laporan/laporan.php">
                                <?= $totalLaporan . ' Laporan' ?>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Danger Card</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">View Details</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="" style="width: 22%; flex:0 0 auto;">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>Polda</div><div>3</div>
                        </div>
                        <div class="card-body border-top border-dark d-flex align-items-center justify-content-between" style="--bs-border-opacity: .5;">
                            <div>Polres</div><div>3</div>
                           
                        </div>
                    </div>
                </div>
                <div class="" style="width: 22%; flex:0 0 auto;">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>Polda</div><div>3</div>
                        </div>
                        <div class="card-body border-top border-dark d-flex align-items-center justify-content-between" style="--bs-border-opacity: .5;">
                            <div>Polres</div><div>3</div>
                           
                        </div>
                    </div>
                </div>
                <div class="" style="width: 22%; flex:0 0 auto;">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>Polda</div><div>3</div>
                        </div>
                        <div class="card-body border-top border-dark d-flex align-items-center justify-content-between" style="--bs-border-opacity: .5;">
                            <div>Polres</div><div>3</div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>Persentase</div><div>20%</div>
                        </div>
                        <div class="card-body border-top border-dark d-flex align-items-center justify-content-between" style="--bs-border-opacity: .5;">
                            <div>Persentase</div><div>70%</div>
                           
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-4">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>Total</div><div>34</div>
                        </div>
                        <div class="card-body border-top border-dark d-flex align-items-center justify-content-between" style="--bs-border-opacity: .5;">
                            <div>Total</div><div>42</div>
                           
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <div class="d-inline-flex align-items-center">
                                <i class="fas fa-chart-bar me-1"></i>
                                Capaian Polres
                            </div>
                            <div class="d-inline-flex align-items-center">
                                <select class="form-select" name="triwulan" id="triwulan">
                                    <option value="1">Triwulan 1</option>
                                    <option value="2">Triwulan 2</option>
                                    <option value="3">Triwulan 3</option>
                                    <option value="4">Triwulan 4</option>
                                </select>
                            </div>
                        </div>

                        <head>
                            <script type="text/javascript" src="chartjs/Chart.js"></script>
                        </head>

                        <body>
                            <style type="text/css">
                                body {
                                    font-family: "Roboto";
                                }

                                table {
                                    margin: 0px auto;
                                }
                            </style>


                            <center>
                                <h2>Grafik Persentase Polres<br />- keseluruhan -</h2>
                            </center>

                            <div style="width: 800px;margin: 0px auto;">
                                <canvas id="myChart"></canvas>
                            </div>

                            <br />
                            <br />
                            <script>
                                var ctx = document.getElementById("myChart").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ["simeulue", "pidie", "pidie jaya", "bireuen"],
                                        datasets: [{
                                            label: '',
                                            data: [
                                                <?php
                                                $jumlah_simelue = mysqli_query($koneksi, "select * from persentase where Persentase");
                                                echo mysqli_num_rows($jumlah_simelue);
                                                ?>,
                                                <?php
                                                $jumlah_pidie = mysqli_query($koneksi, "select * from persentase where persentase");
                                                echo mysqli_num_rows($jumlah_pidie);
                                                ?>,
                                                <?php
                                                $jumlah_pidie_jaya = mysqli_query($koneksi, "select * from persentase where persentase");
                                                echo mysqli_num_rows($jumlah_pidie_jaya);
                                                ?>,
                                                <?php
                                                $jumlah_bireuen = mysqli_query($koneksi, "select * from persentase where persentase");
                                                echo mysqli_num_rows($jumlah_bireuen);
                                                ?>
                                            ],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </body>
                        <div class="card-body"><canvas id="myBarChart" height="85"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php

    require_once "tamplate/footer.php";

    ?>