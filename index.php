<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location: auth/login.php");
    exit;
}

require "config.php";
require_once "utils.php";
require_once "utils2.php";
$title = "Dashboard - Sistem Evaluasi Polres";
require_once "template/header.php";
// require_once "template/navbar.php";
require_once "template/sidebar.php";

$TRIWULAN_SELECTED = 1;
if (isset($_GET['triwulan'])) {
    $TRIWULAN_SELECTED = $_GET['triwulan'];
}

$DAERAH = "Polres";
if (isset($_GET['d'])) {
    $DAERAH = $_GET['d'];
}
$jenis = $DAERAH == "Polda" ? "polda" : "polres";
$satker = $DAERAH == "Polda" ? "Satker" : "Polres";




$start_date = '';
$end_date = '';
switch ($TRIWULAN_SELECTED) {
    case 1:
        $start_date = date('Y-m-d', strtotime('January 1'));
        $end_date = date('Y-m-d', strtotime('March 31'));
        break;
    case 2:
        $start_date = date('Y-m-d', strtotime('April 1'));
        $end_date = date('Y-m-d', strtotime('June 30'));
        break;
    case 3:
        $start_date = date('Y-m-d', strtotime('July 1'));
        $end_date = date('Y-m-d', strtotime('September 30'));
        break;
    case 4:
        $start_date = date('Y-m-d', strtotime('October 1'));
        $end_date = date('Y-m-d', strtotime('December 31'));
        break;
    default:
        // Default to full year if triwulan selected is invalid
        $start_date = date('Y-m-d', strtotime('January 1'));
        $end_date = date('Y-m-d', strtotime('December 31'));
        break;
}




$queryPolres = mysqli_query($koneksi, "SELECT * FROM polres");
$totalPolres = mysqli_num_rows($queryPolres);

$queryKegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan");
$totalKegiatan = mysqli_num_rows($queryKegiatan);

$queryLaporan = mysqli_query($koneksi, "SELECT * FROM laporan_" . $jenis . "");
$totalLaporan = mysqli_num_rows($queryLaporan);


$queryPeriode = mysqli_query($koneksi, "SELECT DISTINCT Periode FROM laporan_" . $jenis . " WHERE Periode >= '$start_date' AND Periode <= '$end_date' ");

$PERIODE_ALL = array();
while ($periode = mysqli_fetch_array($queryPeriode)) {
    $PERIODE_ALL[] = $periode["Periode"];
}

$periode_select = "None";
if (count($PERIODE_ALL) > 0) {
    if (isset($_GET["periode"])) {
        $periode_select = $_GET["periode"];
    } else {
        $periode_select = "None";
    }
}





if($periode_select == "None"){

    $queryPG = mysqli_query($koneksi, "SELECT DISTINCT " . $satker . " FROM persentase_" . $jenis . " WHERE Triwulan ='{$TRIWULAN_SELECTED}'");
}else{
    $queryPG = mysqli_query($koneksi, "SELECT DISTINCT " . $satker . " FROM persentase_" . $jenis . " WHERE Periode = '{$periode_select}'");
}
$POLRES_ALL = array();
$i = 0;
while ($polres = mysqli_fetch_array($queryPG)) {
    $POLRES_ALL[$i] = $polres[$satker];
    $i++;
}
$NILAI_POLRES_ALL = array();


foreach ($POLRES_ALL as $satuan) {
    if ($periode_select == "None"){
        $queryNilai = mysqli_query($koneksi, "SELECT * FROM persentase_" . $jenis . " WHERE " . $satker . " = '$satuan' AND Triwulan ='{$TRIWULAN_SELECTED}'");
    }else{
        $queryNilai = mysqli_query($koneksi, "SELECT * FROM persentase_" . $jenis . " WHERE " . $satker . " = '$satuan' AND Periode = '{$periode_select}'");
    }
    $nilai = 0;
    $jumlah = 0;
    while ($data = mysqli_fetch_array($queryNilai)) {
        $nilai += (float) $data['Persentase'];
        $jumlah++;
    }
    if ($jumlah != 0) {
        $NILAI_POLRES_ALL[] = $nilai / $jumlah;
    }
    
}

$Min = 0;
$Max = 0;
if($periode_select == "None"){
    $queryMinMax = mysqli_query($koneksi, "SELECT Min, Max FROM laporan_" . $jenis . " WHERE Triwulan ='{$TRIWULAN_SELECTED}'");
}else{
    $queryMinMax = mysqli_query($koneksi, "SELECT Min, Max FROM laporan_" . $jenis . " WHERE Periode = '{$periode_select}'");
}
while ($data = mysqli_fetch_array($queryMinMax)) {
    $Min = $data['Min'];
    $Max = $data['Max'];
    break;
}

// var_dump($Min);
// print_r("<br>");
// var_dump($Max);
// print_r("<br>");
// var_dump($NILAI_POLRES_ALL);
// print_r("<br>");

$backgroundColorArray = array();
foreach ($NILAI_POLRES_ALL as $nilai) {
    if ($nilai >= $Max) {
        $backgroundColorArray[] = 'rgba(0, 255, 0, 0.5)'; // Hijau
    } elseif ($nilai > $Min ) {
        $backgroundColorArray[] = 'rgba(255, 255, 0, 0.5)'; // Kuning
    } else {
        $backgroundColorArray[] = 'rgba(255, 0, 0, 0.5)'; // Merah
    }
}

// var_dump($backgroundColorArray);


// Menghitung NIlai Kartu
// POLRES
$polres_merah = 0;
$polres_kuning = 0;
$polres_hijau = 0;

$polda_merah = 0;
$polda_kuning = 0;
$polda_hijau = 0;

if($periode_select != "None"){
    $polres_merah = hitungPersentaseDariPeriode("Polres",$periode_select, "Merah");
    $polres_kuning = hitungPersentaseDariPeriode("Polres",$periode_select, "Kuning");
    $polres_hijau = hitungPersentaseDariPeriode("Polres",$periode_select, "Hijau");
    // POLDA
    
    $polda_merah = hitungPersentaseDariPeriode("Polda",$periode_select, "Merah");
    $polda_kuning = hitungPersentaseDariPeriode("Polda",$periode_select, "Kuning");
    $polda_hijau = hitungPersentaseDariPeriode("Polda",$periode_select, "Hijau");
    

}else{
    $polres_merah = hitungPersentaseDariTriwulan("Polres",$TRIWULAN_SELECTED, "Merah");
    $polres_kuning = hitungPersentaseDariTriwulan("Polres",$TRIWULAN_SELECTED, "Kuning");
    $polres_hijau = hitungPersentaseDariTriwulan("Polres",$TRIWULAN_SELECTED, "Hijau");
    // POLDA
    
    $polda_merah = hitungPersentaseDariTriwulan("Polda",$TRIWULAN_SELECTED, "Merah");
    $polda_kuning = hitungPersentaseDariTriwulan("Polda",$TRIWULAN_SELECTED, "Kuning");
    $polda_hijau = hitungPersentaseDariTriwulan("Polda",$TRIWULAN_SELECTED, "Hijau");
}

// print_r("<br>");
// var_dump($polres_merah);
// print_r("<br>");
// var_dump($polda_merah);

if ($polres_hijau == 0 && $polres_kuning == 0 && $polres_merah == 0) {
    $persentase = 0;
} else {
    $persentase = $polres_hijau / ($polres_hijau + $polres_kuning + $polres_merah) * 100;
}

if ($polda_hijau == 0 && $polda_kuning == 0 && $polda_merah == 0) {
    $persentase_polda = 0;
} else {
    $persentase_polda = $polda_hijau / ($polda_hijau + $polda_kuning + $polda_merah) * 100;
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
                <div class="" style="width: 20%; flex:0 0 auto;">
                    <h5 class="mb-3">
                        <center>Tercapai <i class="fa-regular fa-face-smile" style="color: green;"></i></center>
                    </h5>
                    <div class="card bg-success text-white mb-4">
                        <a href="<?= $main_url ?>table/success.php?j=polda" style="text-decoration:none; color:white;">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h4>Polda</h4>
                                </div>
                                <div>
                                    <?= $polda_hijau ?>
                                </div>
                            </div>
                        </a>
                        <a href="<?= $main_url ?>table/success.php?j=polres" style="text-decoration:none; color:white;">
                            <div class="card-body border-top border-dark d-flex align-items-center justify-content-between"
                                style="--bs-border-opacity: .5;">
                                <div>
                                    <h6>Polres</h6>
                                </div>
                                <div>
                                    <?= $polres_hijau ?>
                                </div>

                            </div>
                        </a>
                    </div>
                </div>
                <div class="" style="width: 20%; flex:0 0 auto; ">
                    <h5 class="mb-3">
                        <center>Cukup <i class="fa-regular fa-face-meh" style="color: #C7BA28;"></i></center>
                    </h5>
                    <a href="<?= $main_url ?>table/warning.php?j=polda" style="text-decoration:none; color:white;">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h4>Polda</h4>
                                </div>
                                <div>
                                    <?= $polda_kuning ?>
                                </div>
                            </div>
                    </a>
                    <a href="<?= $main_url ?>table/warning.php?j=polres" style="text-decoration:none; color:white;">
                        <div class="card-body border-top border-dark d-flex align-items-center justify-content-between"
                            style="--bs-border-opacity: .5;">
                            <div>
                                <h6>Polres</h6>
                            </div>
                            <div>
                                <?= $polres_kuning ?>
                            </div>

                        </div>
                </div>
                </a>
            </div>
            <div class="" style="width: 20%; flex:0 0 auto;">
                <h5 class="mb-3">
                    <center>Tidak <i class="fa-regular fa-face-frown" style="color: red;"></i></center>
                </h5>
                <a href="<?= $main_url ?>table/danger.php?j=polda" style="text-decoration:none; color:white;">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h4>Polda</h4>
                            </div>
                            <div>
                                <?= $polda_merah ?>
                            </div>
                        </div>
                </a>
                <a href="<?= $main_url ?>table/danger.php?j=polres" style="text-decoration:none; color:white;">
                    <div class="card-body border-top border-dark d-flex align-items-center justify-content-between"
                        style="--bs-border-opacity: .5;">
                        <div>
                            <h6>Polres</h6>
                        </div>
                        <div>
                            <?= $polres_merah ?>
                        </div>

                    </div>
            </div>
            </a>
        </div>
        <div class="" style="width: 20%; flex:0 0 auto;">
            <h5 class="mb-3"><center>Persentase <i class="fa-solid fa-percent" style="color: blue;"></i></center></h5>
            <a href="<?= $main_url ?>gabungan/polres.php" style="text-decoration:none; color:white;">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div><h4>Polda</h4></div>
                        <div>
                            <?= number_format($persentase_polda, 2) ?>%
                        </div>
                    </div>
                    <div class="card-body border-top border-dark d-flex align-items-center justify-content-between"
                        style="--bs-border-opacity: .5;">
                        <div><h6>Polres</h6></div>
                        <div>
                            <?= number_format($persentase, 2) ?>%
                        </div>

                    </div>
                </div>
            </a>
        </div>
        <div class="" style="width: 20%; flex:0 0 auto;">
            <h5 class="mb-3"><center>Jumlah <i class="fa-solid fa-hotel" style="color: gray;"></i></center></h5>
            <a href="<?= $main_url ?>gabungan/polres.php" style="text-decoration:none; color:white;">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body d-flex align-items-center justify-content-between">
                        <div><h4>Polda</h4></div>
                        <div>
                            <?= $polda_hijau + $polda_hijau + $polda_merah ?>
                        </div>
                    </div>
                    <div class="card-body border-top border-dark d-flex align-items-center justify-content-between"
                        style="--bs-border-opacity: .5;">
                        <div><h6>Polres</h6></div>
                        <div>
                            <?= $polres_hijau + $polres_hijau + $polres_merah ?>
                        </div>

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
                    Capaian
                    <select class="form-select ms-2" name="daerah" id="daerah" onchange="updateDaerah(this.value)">
                        <option value="Polda" <?php if ($DAERAH == "Polda")
                            echo 'selected'; ?>>Polda</option>
                        <option value="Polres" <?php if ($DAERAH == "Polres")
                            echo 'selected'; ?>>Polres</option>

                    </select>
                </div>
                <div class="d-inline-flex align-items-center gap-2">
                    <select class="form-select" name="triwulan" id="triwulan" onchange="updateTriwulan(this.value)">

                        <option value="1&d=<?= $DAERAH; ?>" <?php if ($TRIWULAN_SELECTED == "1")
                              echo 'selected'; ?>>Triwulan
                            1</option>
                        <option value="2&d=<?= $DAERAH; ?>" <?php if ($TRIWULAN_SELECTED == "2")
                              echo 'selected'; ?>>Triwulan
                            2</option>
                        <option value="3&d=<?= $DAERAH; ?>" <?php if ($TRIWULAN_SELECTED == "3")
                              echo 'selected'; ?>>Triwulan
                            3</option>
                        <option value="4&d=<?= $DAERAH; ?>" <?php if ($TRIWULAN_SELECTED == "4")
                              echo 'selected'; ?>>Triwulan
                            4</option>
                    </select>

                    <select class="form-select" style="width: 150px;" onchange="updatePeriode(this.value)">

                        <?php
                        $selected = $periode_select == "None" ? "selected" : "";
                        echo "<option value='None&triwulan{$TRIWULAN_SELECTED}&d={$DAERAH}' {$selected}>None</option>";
                        foreach ($PERIODE_ALL as $periode) {
                            $selected = $periode == $periode_select ? "selected" : "";
                            echo "<option value='{$periode}&triwulan{$TRIWULAN_SELECTED}&d={$DAERAH}' {$selected}>{$periode}</option>";
                        }
                        ?>
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
                    <?php if (count($NILAI_POLRES_ALL)) { ?>
                    <canvas id="myChart" style=""></canvas>
                    <div class="table-chart" style="display:none">
                        <?php require_once "table/components/table-simple.php"; ?>
                    </div>
                    <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        Data tidak ditemukan
                    </div>
                    <?php } ?>

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



                var ctx = document.getElementById('myChart');
                Chart.register(ChartDataLabels);
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
                            x: [{
                                ticks: {
                                    autoSkip: false,
                                    maxRotation: 90,
                                    minRotation: 90
                                }
                            }],
                            y: {
                                beginAtZero: true,
                                min: 0,
                                max: 100
                            }
                        },
                        layout: {
                            padding: 35
                        },
                        onClick: (event, elements) => {
                            console.log(myChart.data.labels[elements[0].index]);
                            var namaKota = myChart.data.labels[elements[0].index];

                            window.location = "<?php echo $main_url; ?>table/data-periode.php?q=" +
                                namaKota +
                                "&periode=<?= $periode_select ?>&triwulan=<?= $TRIWULAN_SELECTED ?>&d=<?= $DAERAH; ?>";
                        },
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            datalabels: {
                                anchor: 'end',
                                align: 'end',
                                color: 'blue',
                                font: {
                                    weight: 'bold'
                                },
                                formatter: function(value, context) {
                                    if (typeof value === 'number' && !isNaN(value) && Number.isFinite(
                                            value) && Number(value) === value) {
                                        return value.toFixed(2) + '%';
                                    } else {
                                        return value + '%';
                                    }
                                }
                            }
                        }
                    }
                });

                tableIcon.addEventListener('click', tampilTable);
                chartIcon.addEventListener('click', tampilChart);

                function tampilChart() {
                    var table = document.querySelector('.table-chart');
                    table.style.display = 'none';
                    var chart = document.getElementById('myChart');
                    chart.style.display = 'block';
                }

                function tampilTable() {
                    var table = document.querySelector('.table-chart');
                    table.style.display = 'block';
                    var chart = document.getElementById('myChart');
                    chart.style.display = 'none';
                }

                function updateTriwulan(triwulan) {
                    window.location = "<?php echo $main_url; ?>index.php?triwulan=" + triwulan;
                }

                function updateDaerah(daerah) {
                    window.location = "<?php echo $main_url; ?>index.php?d=" + daerah;
                }

                function updatePeriode(periode) {
                    window.location = "<?php echo $main_url; ?>index.php?periode=" + periode;
                }
                </script>
            </body>
            <div class="card-body"><canvas id="myBarChart" height="85"></canvas></div>
        </div>
    </div>
</div>
</div>
</main>

<?php

require_once "template/footer.php";

?>