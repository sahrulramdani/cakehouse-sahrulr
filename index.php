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
                    <a class="p-navlink ms-5 p-aktif nav-color-1" aria-current="page" href="index.php">BERANDA</a>
                    <a class="p-navlink ms-5 nav-color-1" href="produk.php">PRODUK</a>
                    <a class="p-navlink ms-5 nav-color-1" href="tentang_kami.php">TENTANG KAMI</a>
                    <a class="p-navlink ms-5 nav-color-1" href="kontak.php">KONTAK</a>
                </div>
            </div>
        </div>
    </nav>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-aos="fade-in">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/b1.jpg" class="d-block w-100" alt="b1" />
            </div>
            <div class="carousel-item">
                <img src="img/b2.jpg" class="d-block w-100" alt="b2" />
            </div>
            <div class="carousel-item">
                <img src="img/b3.jpg" class="d-block w-100" alt="b3" />
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container-fluid">
        <div class="row text-center px-5 mt-5" data-aos="fade-in">
            <h2 class="color-1">CAKE HOUSE</h2>
            <p class="color-1">Cake House Telah Berdiri Pada Tahun 2021, Dan Telah Menciptakan Berbagai Menu Kue Yang
                Lezat Dan Berkualitas Untuk Memenuhi Kepuasan Konsumen</p>
        </div>

        <div class="row">
            <div class="card mb-3 mx-auto d-block border-0 mt-3" style="max-width: 80%" data-aos="fade-left">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body text-end mt-5 color-1 w-75 float-end">
                            <h5 class="card-title">Dibuat Dengan Bahan Berkualitas</h5>
                            <p class="card-text">Cake House Menggunakan Bahan Bahan Yang 100% Alami Tanpa Pengawet
                                Buatan. Dibuat Dari Bahan Yang Berkualitas Dan Melalui Tahap Pengecekan Bahan, Untuk
                                Menciptakan Kue Yang Sehat Dan Lezat.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="img/c1.jpg" class="img-fluid rounded-start w-50 float-end" alt="..." />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card mb-3 mx-auto d-block border-0 mt-3" style="max-width: 80%" data-aos="fade-right">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="img/c2.jpg" class="img-fluid rounded-start w-50 float-start" alt="..." />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body text-start mt-5 color-1 w-75 float-start">
                            <h5 class="card-title">Proses Pembuatan Cepat</h5>
                            <p class="card-text">Proses Pembuatan Kue Cepat, Menggunakan Mesin Dan Oven Yang Mempuni
                                Agar Membuat Proses Memasak Menjadi Cepat Dan Maksimal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card mb-3 mx-auto d-block border-0 mt-3" style="max-width: 80%" data-aos="fade-left">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body text-end mt-5 color-1 w-75 float-end">
                        <h5 class="card-title">Dimasak Oleh Tenaga Ahli</h5>
                        <p class="card-text">Setiap Kue Di Cake House Dibuat Oleh Orang Orang Yang Ahli Dalam Bidang
                            Cake & Bakery Untuk Menciptakan Setiap Kue Yang Lezat Dan Enak.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="img/c1.jpg" class="img-fluid rounded-start w-50 float-end" alt="..." />
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
    <!--AOS Bootstrap-->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
    <script src="js/personal.js"></script>
</body>

</html>