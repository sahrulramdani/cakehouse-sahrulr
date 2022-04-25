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
                    <a class="p-navlink ms-5 nav-color-1" aria-current="page" href="index.php">BERANDA</a>
                    <a class="p-navlink ms-5 nav-color-1" href="produk.php">PRODUK</a>
                    <a class="p-navlink ms-5 nav-color-1" href="tentang_kami.php">TENTANG KAMI</a>
                    <a class="p-navlink ms-5 p-aktif nav-color-1" href="kontak.php">KONTAK</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="row">
        <div class="col-sm-5 col-md-6 text-center mt-5">
            <h3 class="nav-color-1">KONTAK KAMI</h3>
            <p class="nav-color-1"><img src="img/icon2.png" alt="icon2"> @cakeHouse</p>
            <p class="nav-color-1"><img src="img/icon3.png" alt="icon3"> helo@cekehouse.com</p>
        </div>

        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">

            <div class="form-group">
                <label for="caption col-md-6" class="col-sm-2 col-form-label nav-color-1">Nama
                    <input class="form-control w-100" type="text" placeholder="Nama Awal">
                </label>

                <label class="caption">
                    <input class="form-control" type="text" placeholder="Nama Terakhir" />
                </label>
            </div>

            <br clear=" all" />

            <div class="form-group ">
                <label class="nav-color-1" for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nama@****.com" />
            </div>

            <br clear="all" />

            <div class="form-group">
                <label class="nav-color-1" for="exampleFormControlTextarea1">Message *</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <br clear="all" />

            <button type="submit" class="btn btn-1">Kirim</button>

        </div>
    </div>

    <br clear="all" />
    <br clear="all" />

    <div class="row">
        <div class="col-sm-5 col-md-6 text-center mt-5">
            <img src="img/icon4.png" alt="icon4" style="width: 10%" />
            <img src="img/logo2.png" alt="logo2" style="width: 10%" />
        </div>

        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
            <div class="form-group">
                <h3 class="nav-color-1">Alamat Toko</h3>
                <p class="nav-color-1">Sentra Summarecon Bekasi Jl. Bulevard Ahmad Yani Blok M, Marga Mulya, Kec.
                    Bekasi
                    Utara, Kota Bks, Jawa Barat 17142</p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1962.48342866217!2d107.00248621645022!3d-6.226461808729799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698c71cf814d97%3A0xd22a5d56809f070a!2sSummarecon%20Mall%20Bekasi!5e1!3m2!1sid!2sid!4v1632715046876!5m2!1sid!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

        </div>
    </div>


    <div class="container-fluid mt-5 pt-4">
        <div class="row w-50 mx-auto d-block">
            <div class="col w-50 py-4 color-1 font-1 mx-auto d-block text-center foot">
                <img src="img/logo1.png" alt="logo1" style="width: 70%" />
                <p>Copyright©2020, all rights reserved</p>
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