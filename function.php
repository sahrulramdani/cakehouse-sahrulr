<?php
// koneksi ke database
$conn = mysqli_connect("127.0.0.1", "root", "", "cakehouse2_db");

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data)
{
	global $conn;

	$nama_makanan = htmlspecialchars($data["nama_makanan"]);
	$harga = htmlspecialchars($data["harga"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	// upload gambar
	$gambar = upload();
	if (!$gambar) {
		return false;
	}
	$query = "INSERT INTO tbl_makanan
				VALUES
			  ('', '$nama_makanan', '$harga', '$gambar', '$keterangan')
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}


function upload()
{

	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if ($error === 4) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}
	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}
	// cek jika ukurannya terlalu besar
	if ($ukuranFile > 1000000) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}
	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'upload/' . $namaFileBaru);
	return $namaFileBaru;
}

function delete($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_user WHERE id_user = $id");
	return mysqli_affected_rows($conn);
}

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM tbl_makanan WHERE id_makanan = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data)
{
	global $conn;

	$id = $data["id_makanan"];
	$nama_makanan = htmlspecialchars($data["nama_makanan"]);
	$harga = htmlspecialchars($data["harga"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	$keterangan = htmlspecialchars($data["keterangan"]);
	

	// cek apakah user pilih gambar baru atau tidak
	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	} else {
		$gambar = upload();
	}
	$query = "UPDATE tbl_makanan SET
				nama_makanan = '$nama_makanan',
				harga = '$harga',
				gambar = '$gambar',
				keterangan = '$keterangan'
				
			  WHERE id_makanan = $id
			";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function ubahStatus($data)
{
	global $conn;

	$status = $data['status'];
	$id = $data['id'];

	$query = "UPDATE tbl_pembelian SET `status` = '$status' WHERE id_pembelian = '$id'";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function cari($keyword)
{
	$query = "SELECT * FROM tbl_makanan
			  WHERE
				nama_makanan LIKE '%$keyword%' OR
				harga LIKE '%$keyword%'
			";
	return query($query);
}

function registrasi($data)
{
	global $conn;

	$namadepan = $data["nama_dpn"];
	$namabelakang = $data["nama_blg"];
	$username = strtolower(stripslashes($data["username"]));
	$nohp = $data["no_hp"];
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	
	$result = mysqli_query($conn, "SELECT email FROM tbl_user WHERE email = '$email'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>
				alert('email sudah terdaftar!')
			  </script>";
		return false;
	}
	//cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
					alert('Password tidak sesuai');
			  </script>";

		return false;
	}
	$password = password_hash($password, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO tbl_user VALUES('', '$namadepan', '$namabelakang', '$username', '$nohp', '$email', '$password', '', '2')");

	return mysqli_affected_rows($conn);
}

function pembelian($data)
{
	global $conn;
	
	$namauser = $data['username'];
	$nohp = $data['no_hp'];
	$namaproduk = $data['nama_makanan'];
	$jumlah = $data['jumlah'];
	$total = $data['total'];
	$tgl = $data['tanggal'];
	$alamat = $data['alamat'];
	$pesan = $data['pesan'];

	mysqli_query($conn, "INSERT INTO tbl_pembelian VALUES('', '$namauser','$nohp' , '$namaproduk', '$jumlah', '$total', '$tgl', '$alamat', '$pesan', 'Belum Dibuat')");

	return mysqli_affected_rows($conn);

}