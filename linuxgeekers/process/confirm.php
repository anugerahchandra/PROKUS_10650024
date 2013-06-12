<?php
include '../admin/inc/config.php';

if (isset($_POST['confirm'])) {
	$kode_pesan = $_POST['kode_pesan'];
	$total = $_POST['total'];
	$rekening = $_POST['rekening'];
	$sql = "INSERT INTO payment (id_payment,kode_order,total,rekening,tanggal,status) VALUES ('','$kode_pesan', '$total','$rekening',now(),0)";
	$result = mysql_query($sql) or die(mysql_error());
	if ($result) {
		header('location:../index.php');
		echo "OK!";
	} else {
		header('location:../index.php');
		echo "Ups!";
	}
	mysql_close();
}
?>
