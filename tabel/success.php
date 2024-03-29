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
    
    $Min = 0;
    $Max = 0;
    $queryMinMax = mysqli_query($koneksi, "SELECT Min, Max FROM laporan_polres");
    while($data = mysqli_fetch_array($queryMinMax)){
        $Min = $data['Min'];
        $Max = $data['Max'];
        break;
    }

    
    $queryPG = mysqli_query($koneksi, "SELECT DISTINCT Polres FROM persentase_polres");
    $POLRES_ALL =  array();
    $i = 0;
    while($polres = mysqli_fetch_array($queryPG)){
        $POLRES_ALL[$i] = $polres['Polres'];
        $i++;
    }
    $NILAI_POLRES_ALL = array();

    foreach($POLRES_ALL as $satuan){
        $queryNilai = mysqli_query($koneksi, "SELECT * FROM persentase_polres WHERE Polres = '$satuan'");
        $nilai = 0;
        $jumlah = 0;
        while($data = mysqli_fetch_array($queryNilai)){
            $nilai = $data['Persentase'];
            if ($nilai >=  $Max){
                $jumlah++;
            }
        }
        $NILAI_POLRES_ALL[] = $jumlah;

    }

    // var_dump($NILAI_POLRES_ALL);
        
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Polres Hijau</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Data /</li>
            </ol>
          
                <div class="card w-75">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Polres</span>

                    </div>
                    <div class="card-body ">
                        <style>
                        /* Style untuk tabel */
                        #datatablesSimple {
                            width: 100%;
                            border-collapse: collapse;
                        }

                        #datatablesSimple th,
                        #datatablesSimple td {
                            padding: 8px;
                            text-align: center;
                        }

                        /* Style untuk baris ganjil */
                        #datatablesSimple tbody tr:nth-child(odd) {
                            background-color: #f2f2f2;
                        }

                        /* Style untuk tombol */
                        .btn {
                            padding: 6px 12px;
                            font-size: 14px;
                        }
                        </style>
                        <table class="table table-hover" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">
                                        <center>Polres</center>
                                    </th>
                                    <th scope="col">
                                        <center>Total Persentase</center>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $i = 0;
                                    $TOTAL_PG = 0;
                                    foreach($POLRES_ALL as $polres){
                                    
                                        if ($NILAI_POLRES_ALL[$i] == 0){
                                            $i++;
                                            continue;
                                        }    
                                        $TOTAL_PG += $NILAI_POLRES_ALL[$i];
                                ?>

                                <tr>
                                    <th scope="row"><?=$i+1;?></th>
                                    <td align="center"><?= $polres;?></td>
                                    <td align="center"><?= $NILAI_POLRES_ALL[$i]?></td>
                                    <td align="center">
                                        <a href="" class="btn btn-sm btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Show</a>
                                        
                                    </td>
                                </tr>

                                <?php $i++;} ?>
                                <tr>
                                    <th scope="row">TOTAL</th>
                                    <td align="center"></td>
                                    <td align="center"><?= $TOTAL_PG?></td>
                                    <td align="center"></td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
          
        </div>
</div>
</main>




<?php 

    require_once "../tamplate/footer.php";

?>