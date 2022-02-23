<?php
include 'koneksi.php';

$query = "SELECT * FROM tbl_karyawan";
$dewan1 = $db1->prepare($query);
$dewan1->execute();
$res1 = $dewan1->get_result();
$output = array();
while ($row = $res1->fetch_assoc()) {
	$output[] = $row;
}
echo json_encode($output);
?>