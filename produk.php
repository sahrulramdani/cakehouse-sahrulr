<?php
session_start();
require 'function.php';

$makanan = query("SELECT * FROM tbl_makanan"); 

if ( isset($_POST["cari"])) {
    $makanan = cari($_POST["keyword"]);
}

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
            <div id="right-nav">
                <?php
                if (isset($_SESSION['username'])) {
                    
                    if($getrow['status']=="1")
                    {
                        ?>
                <a class="p-navlink nav-color-1" aria-current="page" href="dashboard_admin.php">Dashboard</a>
                <a class="p-navlink nav-color-1" aria-current="page" href="logout.php">Logout</a>
                <?php
                    }else if($getrow['status']=="2")
                    {
                        ?>
                <a class="p-navlink nav-color-1" aria-current="page" href="dashboard_user.php">Dashboard</a>
                <a class="p-navlink nav-color-1" aria-current="page" href="logout.php">Logout</a>
                <?php
                    }else
                    {
                        echo "error";
                    }

                }else{
                ?>
                <a class="p-navlink nav-color-1" aria-current="page" href="login.php">Login </a>
                <a class="p-navlink nav-color-1" aria-current="page" href="register.php">Register</a>
                <?php
                }
                ?>
            </div>
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
                    <a class="p-navlink ms-5 p-aktif nav-color-1" aria-current=" page" href="produk.php">PRODUK</a>
                    <a class="p-navlink ms-5 nav-color-1" href="tentang_kami.php">TENTANG KAMI</a>
                    <a class="p-navlink ms-5 nav-color-1" href="kontak.php">KONTAK</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-5">
        <div class="row">
            <form class="d-flex ms-5" action="" method="post">
                <input class="form-control me-2 p-search w-25" type="search" placeholder="Cari Produk" name="keyword"
                    id="keyword" autocomplete="off">
                <button class="btn btn-outline-success p-btn-search" type="submit" name="cari"
                    id="btn-cari">Cari</button>
            </form>
        </div>
        <div id="container">
            <div class="row align-items-start px-5 align-content-center mt-3">
                <?php $i = 1; ?>
                <?php foreach ($makanan as $row) : ?>
                <div class="card col-md-3 ms-5 mt-5 border-0 color-1" style="width: 18rem;" data-aos="zoom-in">
                    <img src="upload/<?= $row["gambar"]; ?>" class="card-img-top gmbr-p" alt="produk">
                    <div class="card-body">
                        <h5 class="card-title"><?= $row["nama_makanan"]; ?></h5>
                        <p class="card-text"><?= $row["keterangan"]; ?></p>
                        <a href="detail.php?id_makanan=<?= $row['id_makanan']?>" class="btn btn-1">IDR.
                            <?= $row["harga"]?></a>
                    </div>
                </div>
                <?php $i++; ?>
                <?php endforeach; ?>
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