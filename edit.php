<?php
session_start();

require 'function.php';
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
// ambil data di URL
$id = $_GET["id_makanan"];
// query data mahasiswa berdasarkan id
$makanan = query("SELECT * FROM tbl_makanan WHERE id_makanan = $id")[0];
// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
		<script>
		alert('data berhasil diubah!');
		document.location.href = 'dashboard_admin.php';
		</script>
		";
    } else {
        echo "
		<script>
		alert('data gagal diubah!');
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
                    <h3 class="mb-5 text-center nav-color-1">Ubah Data Makanan</h3>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_makanan" value="<?= $makanan['id_makanan'] ?>" />
                        <input type="hidden" name="gambarLama" value="<?= $makanan['gambar'] ?>" />
                        <p>
                            <label class=" form-label">Nama Makanan</label>
                        <div class="field">
                            <input type="text" name="nama_makanan" id="nama_makanan" class="mediuminput"
                                value="<?= $makanan['nama_makanan'] ?>" />
                        </div>
                        </p>

                        <br clear="all" />
                        <p>
                            <label class="form-label">Harga</label>
                        <div class="field">
                            <input type="number" name="harga" id="harga" class="vsmallinput"
                                value="<?= $makanan['harga'] ?>" />
                        </div>
                        </p>

                        <p>
                            <label class="form-label">Keterangan</label>
                        <div class="field">
                            <textarea id="keterangan" name="keterangan" class="mediuminput" rows="5"
                                cols="50"><?= $makanan['keterangan'] ?></textarea>
                        </div>
                        </p>
                        <p class="form-label">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar </label>
                        <div class="col-sm-10">
                            <img src="upload/<?= $makanan['gambar']; ?>"
                                style="width: 120px; height:120px; float: left;margin-bottom: 5px;">
                            <input type="file" class="form-control" name="gambar" id="gambar">
                        </div>
                        </p>
                        <input type="submit" class="btn btn-1" name="submit" value="Simpan" />
                        <input type="button" class="btn btn-1" value="Kembali"
                            onclick="document.location.href = 'dashboard_admin.php'" />
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>