<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Tambah User - Sistem Evaluasi Polres";
require_once "../tamplate/header.php";
require_once "../tamplate/navbar.php";
require_once "../tamplate/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';
if ($msg == 'cencel') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fa-solid fa-triangle-exclamation"></i> Tambah user gagal, username sudah ada...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}
if ($msg == 'notimage') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fa-solid fa-triangle-exclamation"></i> Tambah user gagal, file yang anda upload bukan gambar...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}
if ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert"><i class="fa-solid fa-triangle-exclamation"></i> Tambah user gagal, maximal ukuran gambar 1 MB...
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}
if ($msg == 'added') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="fa-solid fa-circle-check"></i> Tambah user berhasil, segera ganti password anda !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Judul</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Edit Judul</li>
            </ol>
            <form action="proses-edit-judul.php" method="post">
                <div class="form-group">
                    <label for="judul" class="col-form-label">Judul</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $main_title; ?>"
                        required>
                </div>
                <button type="submit" name="edit-judul" class="btn btn-primary btn-block rounded- mt-2">Simpan
                    Judul</button>
            </form>
        </div>
    </main>
    <?php

    require_once "../tamplate/footer.php";

    ?>