<?php


session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";


function gantiKoma($nilai)
{
    // Periksa apakah nilai merupakan bilangan desimal dengan tanda koma
    if (strpos($nilai, ',') !== false) {
        // Ganti tanda koma dengan titik
        $nilai = str_replace(',', '.', $nilai);
    }
    return $nilai;
}


// Periksa apakah ada filecsv

if (isset($_POST["submit"])){
    $pg        = $_POST['pg'];
    $nama_kegiatan  = $_POST['nama_kegiatan];
    

    // mengupdate database
    var_dump($pg);
    var_dump($nama_kegiatan;
    
    //update data
    $sql = "UPDATE persentase_polda SET nama_kegiatan = '$nama_kegiatan'  WHERE pg = '$pg'";
    $query = mysqli_query($koneksi, $sql);

    // Periksa apakah masih ada
    $sql = "SELECT * FROM persentase_polda WHERE PG = 'pg'";
    $data = mysqli_query($koneksi, $sql);
    if(mysqli_num_rows($data) == 0){
        print_r("Menghapus $pg);
        print_r("<br>");
        $sql = "DELETE FROM laporan_polda WHERE pg = '$pg'";
        mysqli_query($koneksi, $sql);
    }

    $periksaPeriode = mysqli_query($koneksi, "SELECT *  WHERE PG = '$PG'");
    if(mysqli_num_rows($periksaPeriode) == 0){
        mysqli_query($koneksi,"INSERT INTO laporan_polda (PG, nama_kegiatan) VALUES ('$PG', '$nama_kegiatan')");
    }
}

header("Location: polda.php");
exit;


?>
