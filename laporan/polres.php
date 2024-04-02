<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location: ../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Polres - Sistem Evaluasi Polres";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <!-- Modal Edit-->
        <form method="POST" action="edit_polres.php">
            <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalEdit">
            </div>
        </form>

        <!-- Modal Delete -->
        <form method="POST" action="hapus_polres.php">
            <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
            </div>
        </form>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Polres</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Polres</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Polres</span>
                    <a href="<?= $main_url ?>tambah-data/polres/add-laporan.php"
                        class="btn btn-sm btn-primary float-end"><i class="fa-solid fa-plus"></i> Tambah</a>
                    <a href="<?= $main_url ?>laporan/cetak-laporan.php" class="btn btn-sm btn-success float-end me-1"><i
                            class="fa-solid fa-print"></i>
                        Cetak</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="exampleNoSetting">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">
                                    <center>Polres</center>
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
                            $queryLaporan = mysqli_query($koneksi, "SELECT * FROM laporan_polres");
                            while ($data = mysqli_fetch_array($queryLaporan)) {
                                $queryPersentase = mysqli_query($koneksi, "SELECT * FROM persentase_polres WHERE Periode = '{$data['Periode']}' AND PG = '{$data['PG']}'");
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
                                <td></td>
                                <td><?= $dataPersentase['Polres'] ?></td>
                                <td>
                                    <center><?= date('d-m-Y', strtotime($data['Periode'])) ?></center>
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
                                <td>
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
                url: 'modal_edit_polres.php',
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
                url: 'modal_hapus_polres.php',
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








    <!-- Modal Edit
                            <div class="modal fade" id="modalEdit<?=$dataPersentase['id'] ?>" tabindex="-1"
                                aria-labelledby="modalEdit<?=$dataPersentase['id'] ?>Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="modalEdit<?=$dataPersentase['id'] ?>Label">
                                                Edit Data </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body ">
                                            <form method="POST" action="edit_polres.php">
                                                <input type="hidden" name="id" value="<?=$dataPersentase['id'] ?>" />
                                                <div class="form-group mb-2">
                                                    <label style="font-weight:600;"
                                                        for="exampleFormControlInput1">Polres</label>
                                                    <input type="text" class="form-control"
                                                        value="<?=$dataPersentase['Polres'] ?>" name="Polres" readonly>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label style="font-weight:600;"
                                                        for="exampleFormControlInput1">Persentase</label>
                                                    <input name="Persentase" type="text" class="form-control"
                                                        value="<?=$dataPersentase['Persentase'] ?>">
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="PG" style="font-weight:600;">Program Giat</label>

                                                    <select name="PG" class="form-control" id="PG"
                                                        class="form-select border-0 border-bottom">

                                                        <option value="A11"
                                                        <?php if($dataPersentase["PG"] == "A11") echo "selected";?>>
                                                            A11</option>
                                                        <option value="A21"
                                                            <?php if($dataPersentase["PG"] == "A21") echo "selected";?>>
                                                            A21</option>
                                                        <option value="A41"
                                                            <?php if($dataPersentase["PG"] == "A41") echo "selected";?>>
                                                            A41</option>
                                                        <option value="C72"
                                                            <?php if($dataPersentase["PG"] == "C72") echo "selected";?>>
                                                            C72</option>
                                                        <option value="C81"
                                                            <?php if($dataPersentase["PG"] == "C81") echo "selected";?>>
                                                            C81</option>
                                                        <option value="C82"
                                                            <?php if($dataPersentase["PG"] == "C82") echo "selected";?>>
                                                            C82</option>
                                                        <option value="D101"
                                                            <?php if($dataPersentase["PG"] == "D101") echo "selected";?>>
                                                            D101</option>
                                                        <option value="D102"
                                                            <?php if($dataPersentase["PG"] == "D102") echo "selected";?>>
                                                            D102</option>
                                                        <option value="D103"
                                                            <?php if($dataPersentase["PG"] == "D103") echo "selected";?>>
                                                            D103</option>
                                                        <option value="D104"
                                                            <?php if($dataPersentase["PG"] == "D104") echo "selected";?>>
                                                            D104</option>
                                                        <option value="D111"
                                                            <?php if($dataPersentase["PG"] == "D111") echo "selected";?>>
                                                            D111</option>
                                                        <option value="D112"
                                                            <?php if($dataPersentase["PG"] == "D112") echo "selected";?>>
                                                            D112</option>
                                                        <option value="D121"
                                                            <?php if($dataPersentase["PG"] == "D121") echo "selected";?>>
                                                            D121</option>
                                                        <option value="D122"
                                                            <?php if($dataPersentase["PG"] == "D122") echo "selected";?>>
                                                            D122</option>
                                                        <option value="E131"
                                                            <?php if($dataPersentase["PG"] == "E131") echo "selected";?>>
                                                            E131</option>
                                                        <option value="E132"
                                                            <?php if($dataPersentase["PG"] == "E132") echo "selected";?>>
                                                            E132</option>
                                                        <option value="E141"
                                                            <?php if($dataPersentase["PG"] == "E141") echo "selected";?>>
                                                            E141</option>
                                                        <option value="E142"
                                                            <?php if($dataPersentase["PG"] == "E142") echo "selected";?>>
                                                            E142</option>
                                                        <option value="E151"
                                                            <?php if($dataPersentase["PG"] == "E151") echo "selected";?>>
                                                            E151</option>
                                                        <option value="E152"
                                                            <?php if($dataPersentase["PG"] == "E152") echo "selected";?>>
                                                            E152</option>
                                                        <option value="G161"
                                                            <?php if($dataPersentase["PG"] == "G161") echo "selected";?>>
                                                            G161</option>
                                                    </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label style="font-weight:600;"
                                                        for="exampleFormControlInput1">Periode</label>

                                                    <input type="date" name="Periode"
                                                        class="form-control-plaintext border-bottom" id="Periode"
                                                        value="<?php echo $dataPersentase["Periode"]; ?>" />


                                                </div>

                                                <div class="form-group mb-2">
                                                    <label style="font-weight:600;"
                                                        for="exampleFormControlInput1">Triwulan</label>
                                                    <select name="Triwulan" id="Triwulan"
                                                        class="form-select border-0 border-bottom">
                                                        <option value="1"
                                                            <?php if($dataPersentase['Triwulan'] == "1") echo "selected";?>>
                                                            1</option>
                                                        <option value="2"
                                                            <?php if($dataPersentase['Triwulan'] == "2") echo "selected";?>>
                                                            2</option>
                                                        <option value="3"
                                                            <?php if($dataPersentase['Triwulan'] == "3") echo "selected";?>>
                                                            3</option>
                                                        <option value="4"
                                                            <?php if($dataPersentase['Triwulan'] == "4") echo "selected";?>>
                                                            4</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" id="submit"
                                                class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->