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
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="<?= $main_url ?>user/add-user.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                User
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>user/edit-judul.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-pen-to-square"></i></div>
                                Edit Judul
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                                Ganti Password
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link" href="<?= $main_url ?>polda/polda.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-building-columns"></i></div>
                                Polda
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>laporan/laporan.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-landmark-dome"></i></div>
                                Polres
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>kegiatan/kegiatan.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book-bookmark"></i></div>
                                Kegiatan
                            </a>
                            <a class="nav-link" href="<?= $main_url ?>laporan/gabungan.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-briefcase"></i></div>
                                Laporan
                            </a>
                            <hr class="mb-0">

                        </div>
                    </div>
                    <div class="sb-sidenav-footer border">
                        <div class="small">Logged in as:</div>
                        <?= $_SESSION["ssUser"] ?>
                    </div>
                </nav>
            </div>