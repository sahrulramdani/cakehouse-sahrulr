<?php
session_start();
require 'function.php';

if( !isset($_SESSION['username']) ) {
	header("Location: index.php");
	exit;
}

$id = $_GET["id_makanan"];
$mkn = query("SELECT * FROM tbl_makanan WHERE id_makanan = $id")[0];

$getuser = $_SESSION['username'];
$getrow = query("SELECT * FROM tbl_user WHERE username = '$getuser'")[0];
$tgl = date('Y-m-d');
 

if(isset($_POST['hitung'])){

    if($_POST['alamat'] == null){
		echo "<script>
        alert('Isi Alamat');
     </script>";

        if($_POST['jumlah'] <= 0){
            echo "<script>
            alert('Isi Jumlah Dengan Benar');
            </script>";

        return false;
        }
	}

    if($_POST['jumlah'] <= 0){
		echo "<script>
        alert('Isi Jumlah Dengan Benar');
        </script>";

    return false;
    }

    $tanggal = $_POST['tanggal'];
    $namauser = $_POST['username'];
    $namaproduk = $_POST['nama_makanan'];
    $alamat = $_POST['alamat'];
    $pesan = $_POST['pesan'];
    $harga = $_POST['harga'];
    $jumlah = $_POST['jumlah'];
    $total = $harga*$jumlah+10000;
}

if(isset($_POST['beli'])){

    if (pembelian($_POST) > 0) {
        $tanggal;
        $namauser;
        $namaproduk;
        $alamat;
        $pesan;
        $harga = $_POST['harga'];
        $jumlah;
        $total = $harga*$jumlah+10000;
        $id_user = query("SELECT id_user FROM tbl_user WHERE username = '$getuser'");
    
        header("Location: dashboard_user.php");
        exit;
    } else {
        echo mysqli_error($conn);
        echo "<script>
                 alert('Pembelian gagal');
              </script>";
        header("Location : produk.php");
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
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo1.png" alt="logo1" width="250" href="index.html" />
            </a>
        </div>
    </nav>


    <div class="container-fluid mt-5">
        <div style="float: left;">
            <h3 class="color-1">Pembelian</h3>
        </div>
    </div>

    <br clear="all" />

    <form action="" method="post">
        <div id="container">
            <div class="row align-items-start px-5 align-content-center mt-3">
                <table class="table table-borderless">
                    <td colspan="2" class="color-1">
                        <p class="fw-bold">Username : </p>
                        <input type="text" id="username" name="username" value="<?= $getrow['username'] ?>" readonly
                            class="no-border form-control color-1 w-50">
                        <p class="fw-bold">Nama : </p>
                        <input type="text" id="nama" name="nama"
                            value="<?= $getrow['nama_dpn'] ?> <?= $getrow['nama_blg']?>" readonly
                            class="no-border form-control color-1 w-50">
                        <p class="fw-bold">Nomor Telepon : </p>
                        <input type="text" id="no_hp" name="no_hp" value="<?= $getrow['no_hp'] ?>" readonly
                            class="no-border form-control color-1 w-50">
                    </td>
                    <td>
                        <input class="form-control color-1" name="tanggal" id="tanggal" value="<?= $tgl ?>">
                    </td>
                    <td>
                        <div class="input-group h-50">
                            <?php 
                                if(isset($_POST['hitung'])){
                                    ?>
                            <label for="alamat" class="input-group-text color-1">Masukan Alamat Tujuan</label>
                            <input class="form-control color-1" name="alamat" id="alamat" value="<?= $alamat ?>">
                            <?php
                                }else{
                                    ?>
                            <label for="alamat" class="input-group-text color-1">Masukan Alamat Tujuan</label>
                            <input class="form-control color-1" name="alamat" id="alamat">
                            <?php 
                                }
                            ?>

                        </div>
                    </td>
                </table>


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="color-1">Produk Dipesan</th>
                            <th scope="col" class="color-1">Harga Satuan</th>
                            <th scope="col" class="color-1">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="color-1">
                                <img src="upload/<?= $mkn["gambar"]?>" alt="gmbr" style="width: 10%" />
                                <input type="text" name="nama_makanan" id="nama_makanan"
                                    value="<?= $mkn['nama_makanan'] ?>" readonly class="form-control color-1 w-25" />
                            </td>
                            <td class="color-1" name="harga" id="harga">
                                <input type="number" name="harga" id="harga" value="<?= $mkn['harga'] ?>" readonly
                                    class="form-control color-1" />
                            </td>
                            <td class="text-center">

                                <?php 
                                if(isset($_POST['hitung'])){
                                    ?>
                                <input type="number" name="jumlah" id="jumlah" class="form-control color-1"
                                    value="<?= $_POST['jumlah'] ?>">
                                <?php
                                }else{
                                    ?>
                                <input type="number" name="jumlah" id="jumlah" class="form-control color-1">
                                <?php 
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php 
                                
                                    if(isset($_POST['hitung'])){
                                        ?>
                                <input type="text" class="form-control color-1 w-50" name="pesan" id="pesan"
                                    placeholder="(Opsional) Tinggalkan Pesan Ke Penjual" value="<?= $pesan ?>">
                                <?php
                                    }else{
                                        ?>
                                <input type="text" class="form-control color-1 w-50" name="pesan" id="pesan"
                                    placeholder="(Opsional) Tinggalkan Pesan Ke Penjual">
                                <?php
                                    }
                                
                                ?>
                            </td>
                            <td class="color-1">Opsi Pengiriman :</td>
                            <td colspan="2"><select class="form-control color-1" id="exampleFormControlSelect1">
                                    <option value="" disabled selected hidden>Gofood : IDR.10000</option>
                                    <option value="0">GrabFood : IDR.10000</option>
                                    <option value="1">Gofood : IDR.10000</option>
                                </select></td>
                        </tr>
                    </tbody>
                </table>

                <div class="container-fluid mt-5">
                    <div style="float: left;">
                        <td>
                            <p class="fw-bold color-1">Total Pembayaran : <input type="number" name="total" id="total"
                                    value="<?= $total ?>" class="form-control color-1" readonly></p>
                        </td>
                    </div>
                    <div style="float: right;">
                        <td>
                            <?php 
                            
                                if(isset($_POST['hitung'])){
                                    ?>
                            <a href="produk.php" class="btn btn-1">Batalkan</a>
                            <button type="submit" class="btn btn-1" name="beli" id="beli">Beli</button>
                            <?php 
                                }else{
                                    ?>
                            <a href="produk.php" class="btn btn-1">Batalkan</a>
                            <button type="submit" class="btn btn-1" name="hitung" id="hitung">Hitung</button>
                            <?php
                                }
                            
                            ?>

                        </td>
                    </div>
                </div>
    </form>

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