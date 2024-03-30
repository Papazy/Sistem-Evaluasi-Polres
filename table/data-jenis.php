<?php 

    session_start();

    if (!isset($_SESSION['ssLogin'])) {
        header("location: ../auth/login.php");
        exit;
    }

    require_once "../config.php";

    $title = "Polres - Sistem Evaluasi Polres";
    require_once "../template/header.php";
    require_once "../template/navbar.php";
    require_once "../template/sidebar.php";

    $nama_kota = $_GET["p"];
    $jenis = $_GET["q"];

    $queryData = mysqli_query($koneksi, "SELECT * FROM persentase_polres WHERE Polres = '$nama_kota'");
    $queryPeriodeData = mysqli_query($koneksi, "SELECT DISTINCT Periode FROM persentase_polres WHERE Polres = '$nama_kota'");
    $dataPersentase = array();

    $countDataPeriode = array();
    $PERIODE_ALL = array();
    while($periode = mysqli_fetch_array($queryPeriodeData)){
        $Min = 0;
        $Max = 0;
        $queryMinMax = mysqli_query($koneksi, "SELECT Min, Max FROM laporan_polres");
        while($data = mysqli_fetch_array($queryMinMax)){
            $Min = $data['Min'];
            $Max = $data['Max'];
            break;
        }
        $periode_select = $periode['Periode'];
        $queryData = mysqli_query($koneksi, "SELECT * FROM persentase_polres WHERE Polres = '$nama_kota' AND Periode = '$periode_select'");
        $count = 0;
        while($data = mysqli_fetch_array($queryData)){
            $nilai = $data['Persentase'];
            if ($jenis == "danger"){
                if ($nilai <  $Min){
                    $count++;
                }
            } else if ($jenis == "warning"){
                if ($nilai >= $Min && $nilai <= $Max){
                    $count++;
                }
            } else if ($jenis == "success"){
                if ($nilai > $Max){
                    $count++;
                }
            }
        }
        $PERIODE_ALL[] = $periode['Periode'];
        $countDataPeriode[] = $count;
    }

    $Breadcumb = ($jenis == "danger") ? "Tidak Lulus" : (($jenis == "warning") ? "Cukup" : "Lulus");
    // $url_header = "";
    // if($jenis == "danger"){
    //     $url_header = "../table"
    // }else if($jenis == "warning"){
    //     $class = "bg-warning";
    // }else if($jenis == "success"){
    //     $class = "bg-success";
    // }


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Polres <?= $nama_kota; ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a style="text-decoration: none;" href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none;"
                        href="../table/<?= $jenis ?>.php"><?= $Breadcumb ?></a></li>
                <li class="breadcrumb-item active"><a style="text-decoration: none;"
                        href="../table/data-jenis.php?q=<?= $jenis ?>&p=<?=$nama_kota?>"><?= $nama_kota ?></a></li>


            </ol>

            <div class="card w-50">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Kategori <?=$Breadcumb?></span>
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
                    <table class="table table-hover" id="datatablesSimple">
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
                            foreach($PERIODE_ALL as $periode){
                                if($countDataPeriode[$i] == 0){
                                    $i++;
                                    continue;
                                }
                            ?>
                            <tr>
                                <th scope="row">
                                    <center><?= $no++ ?></center>
                                </th>
                                <td>
                                    <center><?= date('d-m-Y', strtotime($periode)); ?></center>
                                </td>
                                <td style="padding:0; margin:0">
                                    <center class="<?= $class ?>" style="width:100%; height:100%; margin:0;">
                                        <?= $countDataPeriode[$i] ?></center>
                                </td>
                                <td>
                                    <center>
                                        <a href="<?= $main_url?>table/data-satuan.php?q=<?= $jenis?>&p=<?=$nama_kota?>&periode=<?=$periode?>"
                                            class="btn btn-sm btn-primary"><i class="fa-solid fa-magnifying-glass"></i>
                                            Show</a>
                                    </center>
                                </td>
                            </tr>


                            <?php $i++; } ?>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </main>




    <?php 

    require_once "../template/footer.php";

?>