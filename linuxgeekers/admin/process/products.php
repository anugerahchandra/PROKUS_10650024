<?php
include '../inc/config.php';
if (isset($_GET['action'])) {
	if ($_GET['action'] == "del") {
		$id = $_GET['id'];
		$sql = "SELECT * FROM produk WHERE kode_produk='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		while ($rows = mysql_fetch_array($result)) {
			$file = "../upload/foto/" . $rows['foto'];
			unlink($file);
		}
		$hapus = "DELETE FROM produk WHERE kode_produk='$id'";
		mysql_query($hapus);
		$sql = "";
		header("location:../index.php?page=products");
	}
} else {
	header("location:../index.php?page=products");
}
?>