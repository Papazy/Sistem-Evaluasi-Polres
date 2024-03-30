<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location: ../../auth/login.php");
    exit;
}

require_once "../../config.php";

$title = "Tambah Polres - Sistem Evaluasi Polres";
require_once "../../template/header.php";
require_once "../../template/navbar.php";
require_once "../../template/sidebar.php";

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Polres</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="laporan.php">Polres</a></li>
                <li class="breadcrumb-item active">Tambah Polres</li>
            </ol>
            <form action="proses-laporan.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-regular fa-square-plus"></i> Form Polres</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-rotate-left"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-11">

                                <div class="mb-3 row">
                                    <label for="Periode" class="col-sm-2 col-form-label">Polres-persentase</label>
                                    <label for="Periode" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -45px;">
                                        <input type="file" name="filecsv" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Periode" class="col-sm-2 col-form-label">Periode</label>
                                    <label for="Periode" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -45px;">
                                        <input type="date" name="Periode" class="form-control-plaintext border-bottom" id="Periode" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="PG" class="col-sm-2 col-form-label">Program Giat</label>
                                    <label for="PG" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -45px;">
                                        <select name="PG" id="PG" class="form-select border-0 border-bottom">
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="A11">A11</option>
                                            <option value="A21">A21</option>
                                            <option value="A41">A41</option>
                                            <option value="C72">C72</option>
                                            <option value="C81">C81</option>
                                            <option value="C82">C82</option>
                                            <option value="D101">D101</option>
                                            <option value="D102">D102</option>
                                            <option value="D103">D103</option>
                                            <option value="D104">D104</option>
                                            <option value="D111">D111</option>
                                            <option value="D112">D112</option>
                                            <option value="D121">D121</option>
                                            <option value="D122">D122</option>
                                            <option value="E131">E131</option>
                                            <option value="E132">E132</option>
                                            <option value="E141">E141</option>
                                            <option value="E142">E142</option>
                                            <option value="E151">E151</option>
                                            <option value="E152">E152</option>
                                            <option value="G161">G161</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Min" class="col-sm-2 col-form-label">Min</label>
                                    <label for="Min" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -45px;">
                                        <input type="number" name="Min" class="form-control-plaintext border-bottom" id="Min" value="" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Max" class="col-sm-2 col-form-label">Max</label>
                                    <label for="Max" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -45px;">
                                        <input type="number" name="Max" class="form-control-plaintext border-bottom" id="Max" value="" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Tw" class="col-sm-2 col-form-label">Triwulan</label>
                                    <label for="Tw" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -45px;">
                                        <select name="Triwulan" id="Triwulan" class="form-select border-0 border-bottom">
                                            <option value="" selected>-- Pilih --</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                        </select>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>




    <?php

    require_once "../../template/footer.php";

    ?>