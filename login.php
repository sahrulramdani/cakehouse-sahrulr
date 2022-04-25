<?php 
session_start();
require 'function.php';

// cek cookie
if( isset($_COOKIE['id_user']) && isset($_COOKIE['hash']) ) {
	$id = $_COOKIE['id_user'];
	$hash = $_COOKIE['hash'];

	// cek username berdasarkan id
	$result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id_user = $id");
	$row = mysqli_fetch_assoc($result);

	if( $hash === hash('sha256', $row['username'], false) ) {
		// set session
		$_SESSION['username'] = $row['username']; 
		// masuk ke halaman index
		header('Location: index.php');
		exit;
	}


}

// cek session
if( isset($_SESSION['username']) ) {
	header("Location: index.php");
	exit;
}

// jika tombol login ditekan
if( isset($_POST['login']) ) {

	// cek login
	// cek usernamenya dulu
	global $conn;
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cek_username = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username'");

	if( mysqli_num_rows($cek_username) === 1 ) {
		$row = mysqli_fetch_assoc($cek_username);
		// cek password
		if( password_verify($password, $row['password']) ) {
			// jika berhasil login
			$_SESSION['username'] = $_POST['username'];

			// jika remember di ceklis
			if( isset($_POST['remember']) ) {
				// buat cookie
					setcookie('id_user', $row['id_user'], time() + 60 * 60 * 24);
				$hash = hash('sha256', $row['username'], false);
				setcookie('hash', $hash, time() + 60 * 60 * 24);
			}

			header('Location: index.php');
			exit;
		}
	}
	
	$error = true;

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/logo2.png" />
    <title>Halaman Login</title>
    <style>
    ul li {
        list-style-type: none;
    }
    </style>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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

                        <h3>CAKE HOUSE</h3>
                        <?php if( isset($error) ) : ?>
                        <p style="color: red; font-style: italic;">username / password salah!</p>
                        <?php endif; ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username" autofocus>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                            </div>

                            <div>
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">Remember Me</label>
                            </div>

                            <p class="nav-color-1">
                                <a href="forgot.php" class="nav-color-1">Lupa Password</a>
                            </p>

                            <div class="form-group my-4">
                                <button type="submit" class="btn form-control btn-1" name="login">Login</button>
                            </div>

                            <p class="nav-color-1"> Member Baru? <a href="register.php">Buat Akun</a></p>

                        </form>

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