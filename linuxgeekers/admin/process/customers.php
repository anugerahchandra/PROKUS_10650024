<?php
include '../inc/config.php';
if (isset($_GET['action'])) {
	if ($_GET['action'] == "del") {
		$id = $_GET['id'];
		$hapus = "DELETE FROM customers WHERE id_customer='$id'";
		mysql_query($hapus);
		$sql = "";
		header("location:../index.php?page=customers");
	}
}else{
	header("location:../index.php?page=customers");
}
?>
