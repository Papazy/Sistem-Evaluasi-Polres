<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Polres - Sistem Evaluasi Polres";
require_once "../tamplate/header.php";
require_once "../tamplate/navbar.php";
require_once "../tamplate/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Polres</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Polres</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Polres</span>
                    <a href="<?= $main_url ?>laporan/add-laporan.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah</a>
                    <a href="<?= $main_url ?>laporan/cetak-laporan.php" class="btn btn-sm btn-success float-end me-1"><i class="fa-solid fa-print"></i> Cetak</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">
                                    <center>Polres</center>
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
                            $queryLaporan = mysqli_query($koneksi, "SELECT * FROM laporan");
                            while ($data = mysqli_fetch_array($queryLaporan)) {
                                $queryPersentase = mysqli_query($koneksi, "SELECT * FROM persentase WHERE Periode = '{$data['Periode']}' AND PG = '{$data['PG']}'");
                                while ($dataPersentase = mysqli_fetch_array($queryPersentase)) {
                            ?>
                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td align="center"><?= $dataPersentase['Polres'] ?></td>
                                        <td><center><?= $data['Periode'] ?></center></td>
                                        <td><center><?= $data['PG'] ?></center></td>
                                        <td><center><?= $dataPersentase['Persentase'] . "%" ?></td>
                                        <td><center><?= $data['Min'] . "%" ?></center></td>
                                        <td><center><?= $data['Max'] . "%" ?></center></td>
                                        <td><center><?= $data['Tw'] ?></center></td>
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

    require_once "../tamplate/footer.php";

    ?>