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
if ($fileSize > 0 || $fileError == 0) {
    $move = move_uploaded_file($_FILES['foto']['tmp_name'], '../../upload/foto/' . $fileName);
    if ($move) {
        echo "File sudah diupload";
    } else {
        echo "Gagal mengupload file";
    }
} else {
    echo "Gagal mengupload file: " . $fileError;
}
$foto = $fileName;

$sql = "INSERT INTO produk(kode_produk,nama_produk,harga,stok,id_kategori,foto,deskripsi,time,post)
		VALUES('$kode_produk','$nama','$harga','$stok','$kategori','$foto','$deskripsi',NOW(),'$post')";
$result = mysql_query($sql) or die(mysql_error());
if ($result) {
	header('location:../index.php?page=products');
} else {
	echo("Ups");
}
mysql_close();
?>