<?php
include '../inc/config.php';
$nama = $_POST['nama'];
$sql = "INSERT INTO kategori (id_kategori,nama_kategori)
		VALUES('','$nama')";
$result = mysql_query($sql) or die(mysql_error());
if ($result) {
	header('location:../index.php?page=category');
} else {
	echo("Ups");
}
mysql_close();
?>