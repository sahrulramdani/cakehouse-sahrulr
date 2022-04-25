<?php

session_start();

require 'function.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'dashboard_admin.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'dashboard_admin.php';
			</script>
		";
    }
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
                        <a class="p-navlink nav-color-1 d-block" href="index.php">Kembali Ke Beranda</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card-body mt-5">

                    <h3 class="mb-5 text-center nav-color-1">Tambah Data Makanan</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <label for="nama_makanan" class="l-input-small"> Nama Makanan</label>
                            <div class="field">
                                <input type="text" name="nama_makanan" class="mediuminput" id="nama_makanan">
                            </div>
                        </fieldset>
                        <fieldset>
                            <label for="harga" class="vsmallinput">Harga </label>
                            <div class="field">
                                <input type="text" name="harga" id="harga" />
                            </div>
                        </fieldset>
                        <fieldset>
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar </label>
                            <div class="field">
                                <input type="file" class="form-control" name="gambar" id="gambar">
                            </div>
                        </fieldset>
                        <fieldset>
                            <label for="keterangan" class="form-label">Keterangan </label>
                            <div class="field">
                                <textarea id="keterangan" name="keterangan" class="mediuminput" rows="5"
                                    cols="50"></textarea>
                            </div>
                        </fieldset>
                        <input type="submit" class="btn btn-1" name="submit" value="Simpan" />
                        <input type="button" class="btn btn-1" value="Kembali"
                            onclick="document.location.href = 'dashboard_admin.php'" />
                    </form>
                </div>
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