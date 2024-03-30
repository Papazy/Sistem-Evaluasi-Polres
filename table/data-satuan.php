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
    $periode = $_GET["periode"];
    
    
    $PERSENTASE = array();
    $PG = array();
    $Min = 0;
    $Max = 0;
    $queryMinMax = mysqli_query($koneksi, "SELECT Min, Max FROM laporan_polres");
    while($data = mysqli_fetch_array($queryMinMax)){
        $Min = $data['Min'];
        $Max = $data['Max'];
        break;
    }

    $queryPersentase = mysqli_query($koneksi, "SELECT * FROM persentase_polres WHERE Polres = '$nama_kota' AND Periode = '$periode'");
    while($data = mysqli_fetch_array($queryPersentase)){
        if($jenis == "danger"){
            if((float)$data['Persentase'] < (float)$Min){
                $PG[] = $data['PG'];
                $PERSENTASE[] = $data['Persentase'];
            }
        }else if($jenis == "warning"){
            if((float)$data['Persentase'] >= (float)$Min && (float)$data['Persentase'] <= (float)$Max){
                $PG[] = $data['PG'];
                $PERSENTASE[] = $data['Persentase'];
            }
        }else if($jenis == "success"){
            if((float)$data['Persentase'] > (float)$Max){
                $PG[] = $data['PG'];
                $PERSENTASE[] = $data['Persentase'];
            }
        }
    }

    $Breadcumb = ($jenis == "danger") ? "Tidak Lulus" : (($jenis == "warning") ? "Cukup" : "Lulus");
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Polres <?= $nama_kota; ?></h1>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a style="text-decoration: none;" href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none;"
                        href="../table/<?= $jenis ?>.php"><?= $Breadcumb ?></a></li>
                <li class="breadcrumb-item"><a style="text-decoration: none;"
                        href="../table/data-jenis.php?q=<?= $jenis ?>&p=<?=$nama_kota?>"><?= $nama_kota ?></a></li>
                <li class="breadcrumb-item active"><a style="text-decoration: none;"
                        href="../table/data-satuan.php?q=<?= $jenis ?>&p=<?=$nama_kota?>&periode=<?=$periode?>"><?=  date('d-m-Y', strtotime($periode)); ?></a></li>
            </ol>

            <div class="card w-75">
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

                        <label class="px-2 py-1 mx-1 card bg-danger fw-bold fs-12">Min: <?=$Min . "%";?></label>
                        <label class="px-2 py-1 mx-1 card bg-success fw-bold fs-12">Max: <?=$Max . "%";?></label>
                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">
                                    <center>PG</center>
                                </th>
                                <th scope="col">
                                    <center>Persentase</center>
                                </th>
                               

                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $no = 1;
                            $i = 0;
                            foreach($PERSENTASE as $persen){
                                
                            ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td>
                                    <center><?= $PG[$i] ?></center>
                                </td>
                                <td style="padding:0; margin:0">
                                    <center class="<?= $class ?>" style="width:100%; height:100%; margin:0;">
                                        <?= $persen . "%" ?></center>
                                </td>
                               
                            </tr>


                            <?php 
                            $i++; } ?>
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </main>




    <?php 

    require_once "../template/footer.php";

?>