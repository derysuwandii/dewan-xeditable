<?php
	include 'koneksi.php';
	$nama_lengkap = mysqli_real_escape_string($db1, $_POST["nama_lengkap"]);
	$alamat = mysqli_real_escape_string($db1, $_POST["alamat"]);
	$jenkel = mysqli_real_escape_string($db1, $_POST["jenkel"]);
	$jabatan = mysqli_real_escape_string($db1, $_POST["jabatan"]);
	$umur = mysqli_real_escape_string($db1, $_POST["umur"]);
	$id = mysqli_real_escape_string($db1, $_POST["id"]);

	$query = "UPDATE tbl_karyawan SET nama_lengkap=?, alamat=?, jenkel=?, jabatan=?, umur=? WHERE id=?";
	$dewan1 = $db1->prepare($query);
	$dewan1->bind_param('sssssi', $nama_lengkap, $alamat, $jenkel, $jabatan, $umur, $id);
	$dewan1->execute();
?>
