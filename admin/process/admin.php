<?php
include '../inc/config.php';
if (isset($_GET['action'])) {
	if ($_GET['action'] == "del") {
		$username = $_GET['username'];
		$hapus = "DELETE FROM admin WHERE username='$username'";
		mysql_query($hapus);
		$sql = "";
		header("location:../index.php?page=admin");
	}
} else {
	header("location:../index.php?page=admin");
}
?>