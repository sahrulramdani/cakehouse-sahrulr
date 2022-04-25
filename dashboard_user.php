<?php 
session_start();
require 'function.php';

if( !isset($_SESSION['username']) ) {
	header("Location: index.php");
	exit;
}

$getuser = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- AOS Animasi CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Personal CSS -->
    <link rel="stylesheet" href="css/personal.css" />

    <link rel="icon" href="img/logo2.png" />
    <title>Cake House</title>

</head>

<body>
    <nav class="navbar navbar-light bg-light z">
        <button class="navbar-toggler ms-3" type="button" data-bs-toggle="offcanvas" href="#offcanvasExample"
            aria-controls="offcanvasExample" role="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo1.png" alt="logo1" width="250" href="index.html" />
            </a>
        </div>
    </nav>

    <div class="offcanvas offcanvas-start mt-11" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title color-1" id="offcanvasExampleLabel">Batal</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="mt-3">
                <ul class="nav fw-bold">
                    <li><a class="p-navlink nav-color-1 d-block" href="profil.php">Profil</a></li>
                </ul>
                <ul class="nav fw-bold">
                    <li><a class="p-navlink nav-color-1 d-block p-aktif " href="dashboard_admin.php">Dasbor</a></li>
                </ul>
                <ul class="nav fw-bold">
                    <li><a class="p-navlink nav-color-1 d-block" href="index.php">Kembali Ke Beranda</a></li>
                </ul>
            </div>
        </div>
    </div>

    <br clear="all" />

    <div class="container color-1">
        <div class="row">
            <h4>Daftar Pembelian : </h4>
            <?php 
            $pembelian = query("SELECT * FROM tbl_pembelian WHERE nama_user = '$getuser'");

            rsort($pembelian);
            
            foreach($pembelian as $row) : 
            
            ?>
            <div class="card m-4" style="width: 18rem;">
                <div class="card-body shadow-lg">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['nama_produk']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $row['nama_user']; ?></h6>
                        <p class="card-text">Jumlah : <?= $row['jumlah']; ?></p>
                        <p class="card-text">Total : <?= $row['total']; ?></p>
                        <p class="card-text">Tanggal : <?= $row['tanggal']; ?></p>
                        <p class="card-text">Alamat : <?= $row['alamat']; ?></p>
                        <p class="card-text">Pesan : <?= $row['pesan']; ?></p>

                        <?php 
                        
                            if ($row['status']=="Belum Dibuat") {
                                ?>
                        <div class="btn btn-danger"><?= $row['status']; ?></div>
                        <?php
                            }else if ($row['status']=="Dibuat"){
                                ?>
                        <div class="btn btn-1"><?= $row['status']; ?></div>
                        <?php
                            }else if ($row['status']=="Diantar"){
                                ?>
                        <div class="btn btn-primary"><?= $row['status']; ?></div>
                        <?php
                            }else if ($row['status']=="Diterima"){
                                ?>
                        <div class="btn btn-success"><?= $row['status']; ?></div>
                        <?php
                            }

                        ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>


    <!--Js Bootstrap-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--AOS Js-->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>