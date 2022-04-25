<?php
session_start();
require 'function.php';

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
                    <a class="p-navlink ms-5 nav-color-1" href="produk.php">PRODUK</a>
                    <a class="p-navlink ms-5 p-aktif nav-color-1" aria-current="page" href="trntang_kami.php">TENTANG
                        KAMI</a>
                    <a class="p-navlink ms-5 nav-color-1" href="kontak.php">KONTAK</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row text-center mt-5 w-50 mx-auto d-block" data-aos="fade-in">
            <p class="color-1">Di dunia Makanan CAKE HOUSE terus mengatur kecepatan dan inovasi dalam industri yang
                berkembang pesat dan terus-menerus inovatif ini. Pecinta kue yang canggih telah belajar untuk mengenali
                dan mengharapkan kualitas yang luar biasa. Saat para pecinta kue mencari pengalaman kue yang lebih baik,
                CAKE HOUSE akan terus memuaskan para pecinta kue. Pendiri Perusahaan berbagi hasrat bersama untuk kue
                dan kue kering yang luar biasa.</p>
        </div>

        <div class="card mb-3 color-1 border-0 " style="max-width: 80%;">
            <div class="row g-0" data-aos="fade-right">
                <div class="col mt-5 ms-5">
                    <div class="col-md-4 float-start">
                        <img src="img/d1.jpg" class="img-fluid rounded-start ms-5" alt="d1">
                    </div>
                    <div class="col-md-6 ms-5 float-end">
                        <div class="card-body">
                            <p class="card-text">Awal mula CAKE HOUSE dimulai dengan visi dan semangat untuk menciptakan
                                kue dan kue kering dengan rasa yang luar biasa. Bisnis ini dimulai sebagai perusahaan
                                paruh waktu berbasis rumah. dengan pusar kantor perusahaan berlokasi di Bintara, Bekasi.
                                <br><br><br><br>
                                Filosofi CAKE HOUSE didasarkan pada keyakinan bahwa produk kue yang kami ciptakan dapat
                                unggul dan berhasil dipasarkan kepada pelanggan yang semakin diskriminatif, dengan tetap
                                terjangkau untuk dinikmati semua orang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-3 color-1 border-0 " style="max-width: 80%;">
            <div class="row g-0 " data-aos="fade-left">
                <div class="col mt-5 ms-5">
                    <div class="col-md-6 ms-5 float-start">
                        <div class="card-body">
                            <p class="card-text">Kue berkualitas unggul ini menjadikan CAKE HOUSE sebagai yang terdepan
                                di pasar kue kering. di Indonesia. Kami akan terus menetapkan standar untuk kue-kue
                                terbaik di mana saja!
                                <br><br><br><br>
                                Seiring berkembangnya CAKE HOUSE, impian kami tetap sama. Konsep untuk desain toko kami
                                juga tetap tidak berubah. Kami ingin Anda, pelanggan setia kami, merasa senyaman di toko
                                kami seperti di rumah sendiri.
                                <br><br><br><br>
                                Kami berharap dapat menyambut Anda di toko CAKE HOUSE yang ramah dan nyaman untuk Anda!
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 float-end">
                        <img src="img/d2.jpg" class="img-fluid rounded-start ms-5" alt="d2">
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