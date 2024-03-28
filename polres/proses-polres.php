<?php 

    session_start();

    if (!isset($_SESSION['ssLogin'])) {
        header("location: ../auth/login.php");
        exit;
    }

    require_once "../config.php";

    if (isset($_POST['simpan'])) {
        $nama    = htmlspecialchars($_POST['nama']);
        $lokasi  = $_POST['lokasi'];

        mysqli_query($koneksi, "INSERT INTO polres VALUES('$nama', '$lokasi')");

        echo "<script>
                alert('Data berhasil disimpan');
                document.location.href = 'add-polres.php';
             </script>";   
        return;

    }

?>