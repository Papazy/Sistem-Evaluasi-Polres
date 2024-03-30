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
    $id         = $_POST['id'];
    $Polres    = $_POST['Polres'];
    $Persentase    = $_POST['Persentase'];
    $Periode    = $_POST['Periode'];
    $PG         = $_POST['PG'];
    $Triwulan   = $_POST['Triwulan'];

    // mengupdate database
    var_dump($id);
    var_dump($Polres);
    var_dump($Persentase);
    var_dump($Periode);
    var_dump($PG);
   
    var_dump($Triwulan);
    $Persentase = gantiKoma($Persentase);
    //update data
    $sql = "UPDATE persentase_polres SET Persentase = '$Persentase', Periode = '$Periode', PG = '$PG', Triwulan = '$Triwulan' WHERE id = '$id'";
    $query = mysqli_query($koneksi, $sql);
}

header("Location: polres.php");
exit;


?>
