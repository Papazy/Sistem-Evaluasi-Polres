<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location: auth/login.php");
    exit;
}

require "config.php";
require_once "utils.php";


$title = "Dashboard - Sistem Evaluasi Polres";
require_once "tamplate/header.php";
require_once "tamplate/navbar.php";
require_once "tamplate/sidebar.php";

$queryPolres = mysqli_query($koneksi, "SELECT * FROM polres");
$totalPolres = mysqli_num_rows($queryPolres);

$queryKegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan");
$totalKegiatan = mysqli_num_rows($queryKegiatan);

$queryLaporan = mysqli_query($koneksi, "SELECT * FROM laporan_polres");
$totalLaporan = mysqli_num_rows($queryLaporan);

$polres_merah = cariJumlahPolresMerah();
$polres_kuning = cariJumlahPolresKuning();
$polres_hijau = cariJumlahPolresHijau();

$persentase = $polres_hijau / ($polres_kuning + $polres_merah) * 100;

$queryPG = mysqli_query($koneksi, "SELECT DISTINCT Polres FROM persentase_polres");
$POLRES_ALL =  array();
$i = 0;
while($polres = mysqli_fetch_array($queryPG)){
    $POLRES_ALL[$i] = $polres['Polres'];
    $i++;
}
$NILAI_POLRES_ALL = array();

foreach($POLRES_ALL as $satuan){
    $queryNilai = mysqli_query($koneksi, "SELECT * FROM persentase_polres WHERE Polres = '$satuan'");
    $nilai = 0;
    $jumlah = 0;
    while($data = mysqli_fetch_array($queryNilai)){
        $nilai += (float) $data['Persentase'];
        $jumlah++;
    }
    $NILAI_POLRES_ALL[] = $nilai / $jumlah;

}

$Min = 0;
$Max = 0;
$queryMinMax = mysqli_query($koneksi, "SELECT Min, Max FROM laporan_polres");
while($data = mysqli_fetch_array($queryMinMax)){
    $Min = $data['Min'];
    $Max = $data['Max'];
    break;
}
                                     
$backgroundColorArray = array();
foreach ($NILAI_POLRES_ALL as $nilai) {
    if ($nilai <= $Min) {
        $backgroundColorArray[] = 'rgba(255, 0, 0, 0.5)'; // Merah
    } elseif ($nilai > $Min && $nilai < $Max) {
        $backgroundColorArray[] = 'rgba(255, 255, 0, 0.5)'; // Kuning
    } else {
        $backgroundColorArray[] = 'rgba(0, 255, 0, 0.5)'; // Hijau
    }
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Home</li>
            </ol>

            <div class="row">
                <div class="" style="width: 22%; flex:0 0 auto;">
                    <a href="<?= $main_url ?>tabel/success.php" style="text-decoration:none; color:white;">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>Polda</div>
                                <div>3</div>
                            </div>
                            <div class="card-body border-top border-dark d-flex align-items-center justify-content-between"
                                style="--bs-border-opacity: .5;">
                                <div>Polres</div>
                                <div><?= $polres_hijau ?></div>

                            </div>
                    </a>
                </div>
            </div>
            <div class="" style="width: 22%; flex:0 0 auto; ">
                <a href="<?= $main_url ?>tabel/warning.php" style="text-decoration:none; color:white;">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>Polda</div>
                            <div>3</div>
                        </div>
                        <div class="card-body border-top border-dark d-flex align-items-center justify-content-between"
                            style="--bs-border-opacity: .5;">
                            <div>Polres</div>
                            <div><?= $polres_kuning ?></div>

                        </div>
                    </div>
                </a>
            </div>
            <div class="" style="width: 22%; flex:0 0 auto;">
                <a href="<?= $main_url ?>tabel/danger.php" style="text-decoration:none; color:white;">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>Polda</div>
                            <div>3</div>
                        </div>
                        <div class="card-body border-top border-dark d-flex align-items-center justify-content-between"
                            style="--bs-border-opacity: .5;">
                            <div>Polres</div>
                            <div><?= $polres_merah ?></div>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-2 col-md-4">
                <a href="<?= $main_url ?>laporan/gabungan.php" style="text-decoration:none; color:white;">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>Persentase</div>
                            <div>20%</div>
                        </div>
                        <div class="card-body border-top border-dark d-flex align-items-center justify-content-between"
                            style="--bs-border-opacity: .5;">
                            <div>Persentase</div>
                            <div><?= number_format($persentase, 2) ?>%</div>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-2 col-md-4">
                <a href="<?= $main_url ?>laporan/gabungan.php" style="text-decoration:none; color:white;">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>Total</div>
                            <div>34</div>
                        </div>
                        <div class="card-body border-top border-dark d-flex align-items-center justify-content-between"
                            style="--bs-border-opacity: .5;">
                            <div>Total</div>
                            <div><?= $polres_hijau + $polres_hijau + $polres_merah?></div>

                        </div>
                    </div>
                </a>
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
                        <div class="d-inline-flex align-items-center gap-2">
                            <select class="form-select" name="triwulan" id="triwulan">
                                <option value="1">Triwulan 1</option>
                                <option value="2">Triwulan 2</option>
                                <option value="3">Triwulan 3</option>
                                <option value="4">Triwulan 4</option>
                            </select>
                            <div class="d-inline-flex align-items-center gap-1 border border-dark rounded px-1 py-1"
                                style="--bs-border-opacity: .25; background-color:white">
                                <div id="itable" style=" padding:2px 5px; border-radius:5px; cursor:pointer;">
                                    <i class="fa-solid fa-table"></i>
                                </div>
                                <div id="ichart"
                                    style=" padding:2px 5px; border-radius:5px; cursor:pointer; background-color:rgba(0,0,0,0.15)">
                                    <i class="fa-solid fa-chart-simple"></i>
                                </div>

                            </div>
                        </div>
                    </div>

                    <head>
                        <script type="text/javascript" src="chartjs/Chart.js"></script>
                    </head>

                    <body>
                        <style type="text/css">
                        

                        table {
                            margin: 0px auto;
                        }
                        </style>


                        <center>
                            <h2>Grafik Persentase Polres<br />- keseluruhan -</h2>
                        </center>

                        <div style="width: 100%; margin: 0px auto; overflow: auto;">
                            <canvas id="myChart"></canvas>
                        </div>

                        <br />
                        <br />
                        <script>
                        // Ambil referensi ke elemen-elemen ikon
                        const tableIcon = document.getElementById('itable');
                        const chartIcon = document.getElementById('ichart');

                        // Tambahkan event listener untuk itable
                        tableIcon.addEventListener('click', function() {
                            // Tambahkan background-color pada itable
                            tableIcon.style.backgroundColor = 'rgba(0, 0, 0, 0.15)';
                            // Hapus background-color dari ichard
                            chartIcon.style.backgroundColor = 'transparent';
                            console.log("ditekan")
                        });

                        // Tambahkan event listener untuk ichard
                        chartIcon.addEventListener('click', function() {
                            // Tambahkan background-color pada ichard
                            chartIcon.style.backgroundColor = 'rgba(0, 0, 0, 0.15)';
                            // Hapus background-color dari itable
                            tableIcon.style.backgroundColor = 'transparent';
                            console.log("ditekan")
                        });



                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: <?php echo json_encode($POLRES_ALL); ?>,
                                datasets: [{
                                    label: 'Nilai',
                                    data: <?php echo json_encode($NILAI_POLRES_ALL); ?>,
                                    backgroundColor: <?php echo json_encode($backgroundColorArray); ?>,
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    xAxes: [{
                                        ticks: {
                                            autoSkip: false,
                                            maxRotation: 90,
                                            minRotation: 90
                                        }
                                    }],
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                },
                                onClick: (event, elements) =>{
                                    console.log(myChart.data.labels[elements[0]._index]);
                                    var namaKota = myChart.data.labels[elements[0]._index];
                                    window.location = "<?php echo $main_url; ?>tabel/data.php?q="+ namaKota;
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