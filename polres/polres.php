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
                            <a href="<?= $main_url ?>polres/add-polres.php" class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah</a>
                        </div>
                        <div class="card-body">
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Nama Polres</center></th>
                                <th scope="col"><center>Lokasi/koordinat</center></th>
                                <th scope="col"><center>Setting</center></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                
                                    $no = 1;
                                    $queryPolres = mysqli_query($koneksi, "SELECT * FROM polres");
                                    while ($data = mysqli_fetch_array($queryPolres)) { ?>

                                    <tr>
                                        <th scope="row"><?= $no++ ?></th>
                                        <td align="center"><?= $data['nama'] ?></td>
                                        <td align="center"><?= $data['lokasi'] ?></td>
                                        <td align="center">
                                            <a href="" class="btn btn-sm btn-warning"><i class="fa-solid fa-pen" title="Edit"></i> Edit</a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash" title="Delete"></i> Delete</a>
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