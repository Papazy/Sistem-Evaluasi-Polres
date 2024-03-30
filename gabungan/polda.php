<?php
session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Total - Sistem Evaluasi Polres";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="px-4">
            <div class="d-flex align-items-end mb-2">
                <div class="col">
                    <h1 class="mt-4">Total</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Total</li>
                    </ol>
                </div>
                <div class="col-auto me-3">
                    <a href="<?php echo $main_url?>gabungan/polres.php" class="btn btn-secondary">
                        Data Polres
                        <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
            <div class="card d-flex flex-column">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Polda</span>
                    <a href="<?= $main_url ?>laporan/add-laporan.php" class="btn btn-sm btn-primary float-end"><i
                            class="fa-solid fa-plus"></i> Tambah</a>
                    <a href="<?= $main_url ?>laporan/cetak-laporan.php" class="btn btn-sm btn-success float-end me-1"><i
                            class="fa-solid fa-print"></i>
                        Cetak</a>
                </div>
                <div class="card-body overflow-auto">
                    <div class="row mt-3">
                        <div class="col-auto">

                            <table class="table table-bordered">
                                <style>
                                .table-bordered {
                                    border-collapse: collapse;
                                }

                                .table-bordered th,
                                .table-bordered td {
                                    border: 1px solid #000;
                                    padding: 8px;
                                    text-align: center;
                                }
                                </style>

                                <thead class="thead-dark">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Satker</th>
                                        <th colspan="21">Program Giat</th>
                                        <th rowspan="2">Min</th>
                                        <th rowspan="2">Max</th>
                                        <th rowspan="2">Priode</th>

                                    </tr>
                                    <tr>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>
                                        <th colspan="1">A1</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Polres 1</td>
                                        <td>Program 1</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Periode 2</td>
                                        <td>Min 1</td>
                                        <td>Max 1</td>
                                        <td>Priode</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <?php
require_once "../template/footer.php";
?>