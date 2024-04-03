<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <a class="nav-link" href="<?= $main_url ?>user/edit-judul.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-to-square"></i></div>
                        Edit Judul
                    </a>
                    <a class="nav-link" href="<?= $main_url ?>user/add-user.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        Pengguna
                    </a>

                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                        Ganti Password
                    </a>
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading">Data</div>
                    <li>
                        <button class="nav-link btn btn-toggle align-items-center rounded collapsed"
                            data-bs-toggle="collapse" data-bs-target="#add-collapse" aria-expanded="true">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-plus"></i></div>
                            Tambah data
                        </button>
                        <div class="collapse" id="add-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <ul type="none">
                                    <li>
                                        <a class="nav-link" href="<?= $main_url ?>tambah-data/polda/add-polda.php">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-building-columns"></i>
                                            </div>
                                            Polda
                                        </a>
                                    </li>
                                </ul>
                                <ul type="none">
                                    <li>
                                        <a class="nav-link" href="<?= $main_url ?>tambah-data/polres/add-laporan.php">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-landmark-dome"></i>
                                            </div>
                                            Polres
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button class="nav-link btn btn-toggle align-items-center rounded collapsed"
                            data-bs-toggle="collapse" data-bs-target="#report-collapse" aria-expanded="true">
                            <div class="sb-nav-link-icon"><i class="fa-regular fa-paste"></i></div>
                            Laporan
                        </button>
                        <div class="collapse" id="report-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <ul type="none">
                                    <li>
                                        <a class="nav-link" href="<?= $main_url ?>laporan/polda.php">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-building-columns"></i>
                                            </div>
                                            Polda
                                        </a>
                                    </li>
                                </ul>
                                <ul type="none">
                                    <li>
                                        <a class="nav-link" href="<?= $main_url ?>laporan/polres.php">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-landmark-dome"></i>
                                            </div>
                                            Polres
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <button class="nav-link btn btn-toggle align-items-center rounded collapsed"
                            data-bs-toggle="collapse" data-bs-target="#total-collapse" aria-expanded="true">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-table-columns"></i></div>
                            Total
                        </button>
                        <div class="collapse" id="total-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw- normal pb-1 small">
                                <ul type="none">
                                    <li>
                                        <a class="nav-link" href="<?= $main_url ?>gabungan/polda.php">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-building-columns"></i>
                                            </div>
                                            Polda
                                        </a>
                                    </li>
                                </ul>
                                <ul type="none">
                                    <li>
                                        <a class="nav-link" href="<?= $main_url ?>gabungan/polres.php">
                                            <div class="sb-nav-link-icon"><i class="fa-solid fa-landmark-dome"></i>
                                            </div>
                                            Polres
                                        </a>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </li>

                    <li>
                                    <button class="nav-link btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#kegiatan-collapse" aria-expanded="true">
                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-list-check"></i></div>
                                        Kegiatan
                                    </button>
                                    <div class="collapse" id="kegiatan-collapse">
                                        <ul class="btn-toggle-nav list-unstyled fw- normal pb-1 small">
                                            <ul type="none">
                                                <li>
                                                    <a class="nav-link" href="<?= $main_url ?>kegiatan/polda/kegiatan.php">
                                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-building-columns"></i></div>
                                                        Polda
                                                    </a>
                                                </li>
                                            </ul>
                                            <ul type="none">
                                                <li>
                                                    <a class="nav-link" href="<?= $main_url ?>kegiatan/polres/kegiatan.php">
                                                        <div class="sb-nav-link-icon"><i class="fa-solid fa-landmark-dome"></i></div>
                                                        Polres
                                                    </a>
                                                </li>
                                            </ul>
                                        </ul>
                                    </div>
                                </li>

                </div>
            </div>
            <div class="sb-sidenav-footer border">
                <div class="small">Logged in as:</div>
                <?= $_SESSION["ssUser"] ?>
            </div>
        </nav>
    </div>