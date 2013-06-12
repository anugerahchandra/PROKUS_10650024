<?php
include '../inc/config.php';
if (isset($_GET['action'])) {
	if ($_GET['action'] == "del") {
		$id = $_GET['id'];
		$hapus = "DELETE FROM kategori WHERE id_kategori='$id'";
		mysql_query($hapus);
		$sql = "";
		header("location:../index.php?page=category");
	}
}else{
	header("location:../index.php?page=category");
}
?>