<?php 

    session_start();

    if (!isset($_SESSION['ssLogin'])) {
        header("location: ../../auth/login.php");
        exit;
    }

    require_once "../../config.php";

    if (isset($_POST['simpan'])) {
        $pg     = $_POST['pg'];
        $judul  = $_POST['judul'];

        mysqli_query($koneksi, "INSERT INTO kegiatan_polres VALUES('$pg', '$judul')");

        echo "<script>
                alert('Data berhasil disimpan');
                document.location.href = 'add-kegiatan.php';
             </script>";   
        return;

    }

?>