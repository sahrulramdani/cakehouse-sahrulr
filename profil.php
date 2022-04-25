<?php

session_start();
require 'function.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$getuser = $_SESSION['username'];
$getrow = query("SELECT * FROM tbl_user WHERE username = '$getuser'")[0];


?>
<html>
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
    <title>Profil < Cake House </title>

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
                    <li><a class="p-navlink nav-color-1 d-block p-aktif " href="profil.php">Profil</a></li>
                </ul>
                <ul class="nav fw-bold">
                    <li><a class="p-navlink nav-color-1 d-block" href="                
                    <?php
                    if ($getrow['status']=="1") {
                        echo "dashboard_admin.php";
                    }else{
                        echo "dashboard_user.php";
                    }
                ?>">Dasbor</a></li>
                </ul>
                <?php 
                
                    if($getrow['status']=="1"){
                        ?>
                <ul class="nav fw-bold">
                    <li><a class="p-navlink nav-color-1 d-block" href="pemesanan.php">Pemesanan</a></li>
                </ul>
                <?php
                    }
                    
                ?>
                <ul class="nav fw-bold">
                    <li><a class="p-navlink nav-color-1 d-block" href="index.php">Kembali Ke Beranda</a></li>
                </ul>
            </div>
        </div>
    </div>


    <section class="contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Biodata Diri</h2>
                    <br clear="all" />

                </div>
            </div>

            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <form>
                        <div class="form-group row">
                            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <p><?= $getrow['nama_dpn'];?> <?= $getrow['nama_blg'] ?></p>
                            </div>
                        </div>

                        <br clear="all" />

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <p><?= $getrow['username']; ?></p>
                            </div>
                        </div>

                        <br clear="all" />

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <p><?= $getrow['email']; ?></p>
                            </div>
                        </div>

                        <br clear="all" />

                        <div class="form-group row">
                            <label for="telp" class="col-sm-2 col-form-label">No Telepon</label>
                            <div class="col-sm-10">
                                <p><?= $getrow['no_hp']; ?></p>
                            </div>
                        </div>

                        <br clear="all" />

                        <div class="form-group row">
                            <label for="telp" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <p>
                                    <?php 
                                        if ($getrow['status']=='1') {
                                            echo "Admin";
                                        }else{
                                            echo "User";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>

                        <br clear="all" />
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!--Js Bootstrap-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--AOS Js-->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>