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
        <!-- Modal Edit-->
        <form method="POST" action="edit_polda.php">
            <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalEdit">
            </div>
        </form>

        <!-- Modal Delete -->
        <form method="POST" action="hapus_polda.php">
            <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
            </div>
        </form>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Polda</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Polda</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Polda</span>
                    <a href="<?= $main_url ?>tambah-data/polda/add-polda.php"
                        class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah</a>
                    <a href="<?= $main_url ?>laporan/cetak-laporan.php" class="btn btn-sm btn-success float-end me-1"><i
                            class="fa-solid fa-print"></i> Cetak</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="exampleNoSetting">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">
                                    <center>Satuan Kerja</center>
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
                                $queryPersentase = mysqli_query($koneksi, "SELECT * FROM persentase_polda WHERE Periode = '{$data['Periode']}' AND PG = '{$data['PG']}'");
                                while ($dataPersentase = mysqli_fetch_array($queryPersentase)) {
                                    $class = null;
                                    if((float)$dataPersentase['Persentase'] >= (float) $data["Max"]){
                                        $class = 'bg-success';
                                    }elseif((float)$dataPersentase['Persentase'] > (float) $data["Min"]){
                                        $class = 'bg-warning';
                                    }else{
                                        $class = 'bg-danger';

                                    }
                            ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td align="center"><?= $dataPersentase['Satker'] ?></td>
                                <td>
                                    <center><?= $data['Periode'] ?></center>
                                </td>
                                <td>
                                    <center><?= $data['PG'] ?></center>
                                </td>
                                <td style="padding:0; margin:0">
                                    <center class="<?= $class ?>" style="width:100%; height:100%; margin:0;">
                                        <?= $dataPersentase['Persentase'] . "%" ?></center>
                                </td>
                                <td>
                                    <center><?= $data['Min'] . "%" ?></center>
                                </td>
                                <td>
                                    <center><?= $data['Max'] . "%" ?></center>
                                </td>
                                <td>
                                    <center><?= $data['Triwulan'] ?></center>
                                </td>
                                <td align="center">
                                <button type="button" class="btn btn-sm btn-warning editButton" id="editButton"
                                        data-id="<?=$dataPersentase['id'] ?>"><i class="fa-solid fa-pen"
                                            title="Edit"></i>
                                        Edit</button>

                                    <button type="button" class="btn btn-sm btn-danger deleteButton"
                                        data-bs-toggle="modal" data-bs-target="#modalHapus<?=$dataPersentase['id'];?>"
                                        data-id="<?=$dataPersentase['id'] ?>"><i class="fa-solid fa-trash"
                                            title="Delete"></i>
                                        Delete</button>
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
    $(document).ready(function() {

        $('.editButton').click(function() {

            var id = $(this).data('id');
            // console.log(userid);
            // AJAX request
            $.ajax({
                url: 'modal_edit_polda.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(response) {
                    // Add response in Modal body
                    $('#modalEdit').html(response);

                    // Display Modal
                    $('#modalEdit').modal('show');
                }
            });
        });
        $('.deleteButton').click(function() {

            var id = $(this).data('id');
            $.ajax({
                url: 'modal_hapus_polda.php',
                type: 'post',
                data: {
                    id: id
                },
                success: function(response) {
                    // Add response in Modal body
                    $('#modalHapus').html(response);

                    // Display Modal
                    $('#modalHapus').modal('show');
                }
            });
        });
    });
    </script>




    <?php

    require_once "../template/footer.php";

    ?>