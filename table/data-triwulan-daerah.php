


<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Polres - Sistem Evaluasi Polres";
require_once "../template/header.php";
// require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$jenis = "Polres";
if (isset($_GET['j'])) {
    $jenis = $_GET['j'];
}
$title_jenis = $jenis == "Polres" ? "Polres" : "Polda";
$satuan = $jenis == "Polres" ? "Polres" : "Satker";


$TRIWULAN_SELECTED = isset($_GET['triwulan']) ? $_GET['triwulan'] : 1;
$nama_kota = $_GET["q"];

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

$queryPeriode = mysqli_query($koneksi, "SELECT DISTINCT Periode FROM persentase_" . $jenis . " WHERE ".$satuan." = '$nama_kota' AND Triwulan = '{$TRIWULAN_SELECTED}' ");


while ($periode = mysqli_fetch_array($queryPeriode)) {
    $PERIODE[] = $periode["Periode"];
}

// print_r("<br>");
// var_dump($PERIODE);



$queryData = mysqli_query($koneksi, "SELECT * FROM persentase_" . $jenis . " WHERE " . $satuan . " = '{$nama_kota}' AND Triwulan = '$TRIWULAN_SELECTED'");

// print_r("<br>");
// var_dump($nama_kota);
// print_r("<br>");
// var_dump($PERIODE);
// print_r("<br>");
// $Breadcumb = ($class == "danger") ? "Tidak Lulus" : (($class == "warning") ? "Cukup" : "Lulus");



?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">
                <?= $title_jenis ?>
                <?= $nama_kota; ?>
            </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a style="text-decoration: none;" href="../index.php">Home</a></li>
                
                <li class="breadcrumb-item active"><a style="text-decoration: none;"
                        href="../table/data-jenis.php?j=<?= $jenis ?>&q=<?= $class ?>&p=<?= $nama_kota ?>">
                        Triwulan <?= $TRIWULAN_SELECTED ?>
                    </a></li>
                <li class="breadcrumb-item active"><a style="text-decoration: none;"
                        href="../table/data-jenis.php?j=<?= $jenis ?>&q=<?= $class ?>&p=<?= $nama_kota ?>">
                        <?= $nama_kota ?>
                    </a></li>
                


            </ol>

            <div class="card w-50">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Kategori

                    </span>
                    <div class="d-flex align-items-center">
                        <style>
                            select {
                                -webkit-appearance: none;
                                -moz-appearance: none;
                                text-indent: 1px;
                                text-overflow: '';
                            }
                        </style>
                        <!-- <label class="mx-2 ">Periode</label>
                        <select class="form-select" style="width: 150px;" onchange="location = this.value;">
                            <?php
                            echo "<option value='?periode={$periode_select}' selected>{$periode_select}</option>";
                            ?>
                        </select> -->
                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-hover" id="example">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <center>No</center>
                                </th>
                                <th scope="col">
                                    <center>Periode</center>
                                </th>
                                <th scope="col">
                                    <center>Jumlah</center>
                                </th>
                                <th scope="col">

                                </th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $no = 1;
                            $i = 0;
                            foreach ($PERIODE as $period) {
                                $query = mysqli_query($koneksi, "SELECT COUNT(*) as Jumlah FROM persentase_" . $jenis . " WHERE " . $satuan . " = '{$nama_kota}' AND Periode = '{$period}' AND Triwulan = '{$TRIWULAN_SELECTED}'");
                                $data = mysqli_fetch_array($query);
                                
                                if ($data["Jumlah"] == 0) {
                                    $i++;
                                    continue;
                                }

                               
                                ?>
                                <tr>
                                    <th scope="row">
                                        <center>
                                            <?= $no++ ?>
                                        </center>
                                    </th>
                                    <td>
                                        <center>
                                            <?= date('d-m-Y', strtotime($period)); ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?= $data["Jumlah"] ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="<?= $main_url ?>table/data-periode.php?&q=<?= $nama_kota ?>&periode=<?= $period; ?>&triwulan=<?= $TRIWULAN_SELECTED ?>&d=<?=$jenis?>"
                                                class="btn btn-sm btn-primary"><i class="fa-solid fa-magnifying-glass"></i>
                                                Show</a>
                                        </center>
                                    </td>
                                </tr>


                                <?php $i++;
                            } ?>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </main>




    <?php

    require_once "../template/footer.php";

    ?>