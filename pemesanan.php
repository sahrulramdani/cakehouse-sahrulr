<?php 
session_start();
require 'function.php';

if( !isset($_SESSION['username']) ) {
	header("Location: index.php");
	exit;
}

$getuser = $_SESSION['username'];
$pembelian = query("SELECT * FROM tbl_pembelian WHERE id_pembelian");

if(isset($_POST['ubah'])){

    $status = $_POST['status'];
    $getid = $_POST['id'];

    if (ubahStatus($_POST) > 0) {
        $status;
        $getid;
        header("Location: pemesanan.php");
    }else{
        echo mysqli_error($conn);
        echo "<script>
                 alert('Ubah gagal');
              </script>";
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
                    <li><a class="p-navlink nav-color-1 d-block" href="profil.php">Profil</a></li>
                </ul>
                <ul class="nav fw-bold">
                    <li><a class="p-navlink nav-color-1 d-block" href="dashboard_admin.php">Dasbor</a></li>
                </ul>
                <ul class="nav fw-bold">
                    <li><a class="p-navlink nav-color-1 d-block p-aktif" href="pemesanan.php">Pemesanan</a></li>
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
            <h4>Pesanan Masuk : </h4>
            <?php 
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
                        <h4 class="color-primary">Status : <?= $row['status']; ?></h4>
                    </div>

                    <form action="" method="post">
                        <?php 
                                $i = 1;
                                $getstatus = query("SELECT * FROM `mst_data` WHERE `kode_data` = 'A03'");
                                $getid = $row['id_pembelian'];
                            ?>
                        <input type="text" name="id" id="id" value="<?= $getid ?>" class="visually-hidden">
                        <select name="status" id="status" class="form-select">
                            <?php foreach ($getstatus as $s) :?>
                            <option value="<?= $s['nama_data'] ?>" name="status" id="status"><?= $s['nama_data']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>

                        <?php 
                            if ($row['status']=="Diterima") {
                                ?>
                        <button type="submit" class=" btn btn-success mt-1" name="ubah" id="ubah">Ubah
                            Status</button>
                        <?php
                            }else if($row['status']=="Diantar"){
                                ?>
                        <button type="submit" class=" btn btn-primary mt-1" name="ubah" id="ubah">Ubah
                            Status</button>
                        <?php
                            }else if($row['status']=="Belum Dibuat"){
                                ?>
                        <button type="submit" class=" btn btn-danger mt-1" name="ubah" id="ubah">Ubah
                            Status</button>
                        <?php
                            }else if($row['status']=="Dibuat"){
                                ?>
                        <button type="submit" class=" btn btn-1 mt-1" name="ubah" id="ubah">Ubah
                            Status</button>
                        <?php
                            }
                        ?>
                    </form>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <form action="" method="post">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Status</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        <button type="button" class="btn btn-1" name="simpan" id="simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!--Js Bootstrap-->
    <script src="js/bootstrap.bundle.min.js"></script>
    <!--AOS Js-->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
    AOS.init();
    </script>
</body>

</html>