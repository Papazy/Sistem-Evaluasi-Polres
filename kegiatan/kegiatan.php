<?php 

    session_start();

    if (!isset($_SESSION['ssLogin'])) {
        header("location: ../auth/login.php");
        exit;
    }

    require_once "../config.php";

    $title = "Kegiatan - Sistem Evaluasi Polres";
    require_once "../tamplate/header.php";
    require_once "../tamplate/navbar.php";
    require_once "../tamplate/sidebar.php";

?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Kegiatan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Kegiatan</li>
                    </ol>
                    <div class="card">
                        <div class="card-header">
                            <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Kegiatan</span>
                            <a href="<?= $main_url ?>kegiatan/add-kegiatan.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Program Giat</center></th>
                                <th scope="col"><center>Judul Kegiatan</center></th>
                                <th scope="col"><center>Setting</center></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                
                                    $no = 1;
                                    $queryKegiatan = mysqli_query($koneksi, "SELECT * FROM kegiatan");
                                    while ($data = mysqli_fetch_array($queryKegiatan)) { ?>

                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td align="center"><?= $data['pg'] ?></td>
                                        <td align="center"><?= $data['judul'] ?></td>
                                        <td align="center">
                                            <a href="" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen" title="Edit"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash" title="Delete"></i></a>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </main>
            



<?php 

    require_once "../tamplate/footer.php";

?>