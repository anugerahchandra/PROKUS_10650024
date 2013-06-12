<?php
include '../inc/config.php';
$kode_produk = $_POST['kode_produk'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$kategori = $_POST['kategori'];
$deskripsi = addslashes($_POST['deskripsi']);
$post = $_POST['post'];
$fileName = $_FILES['foto']['name'];
$fileSize = $_FILES['foto']['size'];
$fileError = $_FILES['foto']['error'];

if ($fileSize > 0) {
	$move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../upload/foto/' . $fileName);
	if ($move) {
		//echo "File sudah diupload";
	} else {
		//echo "Gagal mengupload file";
	}
	$foto = $fileName;
	$sql = "UPDATE produk SET nama_produk='$nama',harga='$harga',stok='$stok',id_kategori='$kategori',deskripsi='$deskripsi',post='$post',foto='$foto' WHERE kode_produk='$kode_produk'";
} else {
	//$foto = $_POST['foto'];
	$sql = "UPDATE produk SET nama_produk='$nama',harga='$harga',stok='$stok',id_kategori='$kategori',deskripsi='$deskripsi',post='$post' WHERE kode_produk='$kode_produk'";
}

$result = mysql_query($sql) or die(mysql_error());
if ($result) {
	header('location:../index.php?page=products');
} else {
	echo("Ups");
}
mysql_close();
?>