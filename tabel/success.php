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
                                        <center>Periode</center>
                                    </th>
                                    <th scope="col">
                                        <center>Total Persentase</center>
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                

                                <tr>
                                    <th scope="row">1</th>
                                    <td align="center">1</td>
                                    <td align="center">1</td>
                                    <td align="center">
                                        <a href="" class="btn btn-sm btn-primary"><i class="fa-solid fa-magnifying-glass"></i> Show</a>
                                        
                                    </td>
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