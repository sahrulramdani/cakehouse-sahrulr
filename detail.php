<?php

session_start();

require 'function.php';

$makanan = query("SELECT * FROM tbl_makanan"); 

$id = $_GET["id_makanan"];

$mkn = query("SELECT * FROM tbl_makanan WHERE id_makanan = $id")[0];

if (isset($_SESSION['username'])) {
    $getuser = $_SESSION['username'];
    $getrow = query("SELECT * FROM tbl_user WHERE username = '$getuser'")[0];    
}

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
    <nav class="navbar navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo1.png" alt="logo1" width="250" href="index.html" />
            </a>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-10">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="p-navlink ms-5 nav-color-1" href="index.php">BERANDA</a>
                    <a class="p-navlink ms-5 p-aktif nav-color-1" aria-current="page" href="produk.php">PRODUK</a>
                    <a class="p-navlink ms-5 nav-color-1" href="tentang_kami.php">TENTANG KAMI</a>
                    <a class="p-navlink ms-5 nav-color-1" href="kontak.php">KONTAK</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-5">
        <div class="row px-5">
            <div class="card mb-3 mx-auto d-block border-0 color-1" style="max-width: 80%;">
                <div class="row g-0">
                    <div class="col-md-6">
                        <img src="upload/<?= $mkn["gambar"]?>" class="img-fluid rounded-start" alt="gmbr"
                            data-aos="fade-in">
                    </div>
                    <div class="col-md-6 ps-5">
                        <div class="card-body ms-5">
                            <h2 class="card-title"><?= $mkn["nama_makanan"]?></h2>
                            <p class="card-text"><?= $mkn["keterangan"]?></p>
                            <h3 class="mt-5">IDR. <?= $mkn["harga"]?></h3>
                            <div class="pb-5 mt-5">

                                <?php 

                                    if (isset($_SESSION['username'])) {
                                        if($getrow['status']=="1"){
                                                    ?>
                                <a href="produk.php" class="btn btn-1">Kembali</a>
                                <?php
                                        }else{
                                                    ?>
                                <a href="produk.php" class="btn btn-1">Kembali</a>
                                <button type="button" class="btn btn-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Pesan
                                </button>
                                <?php
                                                }
                                    }else{

                                        ?>
                                <a href="produk.php" class="btn btn-1">Kembali</a>
                                <button type="button" class="btn btn-1" data-bs-toggle="modal"
                                    data-bs-target="#peringatan">
                                    Pesan
                                </button>
                                <?php

                                    }

                                ?>


                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Lakukan Pemesanan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="modal-title"><?= $mkn["nama_makanan"]?></h6>
                                                <br>
                                                <h6><?= $mkn["harga"]?></h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Keluar</button>
                                                <a href="checkout.php?id_makanan=<?= $id ?>" class="btn btn-1">Lakukan
                                                    Pembelian</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="peringatan" tabindex="-1" aria-labelledby="peringatanLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="peringatanLabel">Anda Belum Login</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Silahkan lakukan login atau registrasi
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a class="btn btn-1" href="login.php">Login</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5 pt-4">
        <div class="row w-50 mx-auto d-block">
            <div class="col w-50 py-4 color-1 font-1 mx-auto d-block text-center foot">
                <img src="img/logo1.png" alt="logo1" style="width: 70%" />
                <p>Copyright©2020, all rights reserved</p>
                <a href="#">
                    <img src="img/icon1.png" alt="icon1">
                </a>
                <a href="#">
                    <img src="img/icon2.png" alt="icon2">
                </a>
            </div>
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