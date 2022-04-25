<?php
require 'function.php';

if (isset($_POST["register"])) {
    
    if( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('User Berhasil Dibuat!');
              </script>";
        
       header("Location: login.php");
       exit;
    } else {
        echo mysqli_error($conn);
        echo "<script>
                 alert('Isi data diri anda');
              </script>";
    }

}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="img/logo2.png" />
    <title>Register < Cake House</title>

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                crossorigin="anonymous">

            <!-- Style CSS -->
            <link rel="stylesheet" href="css/style.css" />
            <link rel="stylesheet" href="css/personal.css" />

</head>

<body>
    <div class="main">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="card-body mt-5">

                        <h3 class="mb-5 text-center nav-color-1">REGISTER</h3>

                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_dpn" name="nama_dpn"
                                    placeholder="Nama Depan" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="nama_blg" name="nama_blg"
                                    placeholder="Nama Belakang" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input type="tel" class="form-control" id="no_hp" name="no_hp"
                                    placeholder="(+62)-xxxx-xxxx-xxx" autocomplete="off" />
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    autocomplete="off">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password2" name="password2"
                                    placeholder="Konfirmasi Password">
                            </div>

                            <div class="form-group my-4">
                                <button type="submit" class="btn form-control btn-1" name="register">Register</button>
                            </div>
                        </form>

                        <div>
                            <p class="nav-color-1"> Sudah Punya Akun? <a href="login.php">Login</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>