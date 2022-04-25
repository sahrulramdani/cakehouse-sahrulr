<?php
session_start();
require 'function.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$makanan = query("SELECT * FROM tbl_makanan");

// tombol cari ditekan
if (isset($_POST["cari"])) {
    $makanan = cari($_POST["keyword"]);
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
                    <li>
                        <a class="p-navlink nav-color-1 d-block" href="profil.php">Profil</a>
                    </li>
                </ul>

                <ul class="nav fw-bold">
                    <li>
                        <a class="p-navlink nav-color-1 d-block p-aktif " href="dashboard_admin.php">Dasbor</a>
                    </li>
                </ul>

                <ul class="nav fw-bold">
                    <li>
                        <a class="p-navlink nav-color-1 d-block " href="pemesanan.php">Pemesanan</a>
                    </li>
                </ul>

                <ul class="nav fw-bold">
                    <li>
                        <a class="p-navlink nav-color-1 d-block" href="index.php">Kembali Ke Beranda</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row" style="float: right;">
            <form class="d-flex ms-5" action="" method="post">
                <input class="form-control me-2 p-search w-50" type="search" placeholder="Cari Produk" name="keyword"
                    id="keyword" autocomplete="off">
                <button class="btn btn-outline-success p-btn-search" type="submit" name="cari"
                    id="btn-cari">Cari</button>
            </form>
        </div>

        <div style="float: left;">
            <a href="tambah.php" class="btn btn-1">Tambah data</a>
            <a href="data_user.php" class="btn btn-1">Data User</a>
        </div>

    </div>

    <br clear="all" />

    <div id="container">
        <div class="row align-items-start px-5 align-content-center mt-3">
            <table class="table">
                <thead>
                    <tr>
                        <th width="50px">No.</th>
                        <th width="150px">Gambar</th>
                        <th width="150px">Nama</th>
                        <th width="50px">Harga</th>
                        <th width="200px">Keterangan</th>
                        <th width="100px">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($makanan as $row) : ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td>
                            <img src="upload/<?= $row["gambar"]; ?>" width="50">
                        </td>
                        <td><?= $row["nama_makanan"]; ?></td>
                        <td><?= $row["harga"]; ?></td>
                        <td><?= $row["keterangan"]; ?></td>
                        <td>
                            <a href="edit.php?id_makanan=<?php echo $row["id_makanan"]; ?>" class="btn btn-1">Edit</a>
                            <a href="hapus.php?id_makanan=<?php echo $row["id_makanan"]; ?>" class="btn btn-1"
                                onclick="return confirm('yakin?')">Hapus</a>
                        </td>

                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
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