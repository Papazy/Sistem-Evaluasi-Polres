<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Polda - Sistem Evaluasi Polda";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Polda</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Polda</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Polda</span>
                    <a href="<?= $main_url ?>polda/add-polda.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah</a>
                    <a href="<?= $main_url ?>laporan/cetak-laporan.php" class="btn btn-sm btn-success float-end me-1"><i class="fa-solid fa-print"></i> Cetak</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">
                                    <center>Polda</center>
                                </th>
                                <th scope="col">
                                    <center>Periode</center>
                                </th>
                                <th scope="col">
                                    <center>PG</center>
                                </th>
                                <th scope="col">
                                    <center>Persentase</center>
                                </th>
                                <th scope="col">
                                    <center>Min</center>
                                </th>
                                <th scope="col">
                                    <center>Max</center>
                                </th>
                                <th scope="col">
                                    <center>Tw</center>
                                </th>
                                <th scope="col">
                                    <center>Setting</center>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            $no = 1;
                            $queryLaporan = mysqli_query($koneksi, "SELECT * FROM laporan_polda");
                            while ($data = mysqli_fetch_array($queryLaporan)) {
                                $queryPersentase = mysqli_query($koneksi, "SELECT * FROM persentase_polres WHERE Periode = '{$data['Periode']}' AND PG = '{$data['PG']}'");
                                while ($dataPersentase = mysqli_fetch_array($queryPersentase)) {
                            ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td align="center"><?= $dataPersentase['Polda'] ?></td>
                                        <td><center><?= $data['Periode'] ?></center></td>
                                        <td><center><?= $data['PG'] ?></center></td>
                                        <td><center><?= $dataPersentase['Persentase'] . "%" ?></td>
                                        <td><center><?= $data['Min'] . "%" ?></center></td>
                                        <td><center><?= $data['Max'] . "%" ?></center></td>
                                        <td><center><?= $data['Triwulan'] ?></center></td>
                                        <td align="center">
                                            <a href="" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen" title="Edit"></i> Edit</a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash" title="Delete"></i> Delete</a>
                                        </td>
                                    </tr>

                            <?php }
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