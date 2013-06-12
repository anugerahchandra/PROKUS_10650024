<?php
include '../inc/config.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$nama = $_POST['nama'];
$email = $_POST['email'];
$sql = "INSERT INTO admin(username,nama,password,email)
		VALUES('$username','$nama','$password','$email')";
$result = mysql_query($sql) or die(mysql_error());
if ($result) {
	header('location:../index.php?page=admin');
} else {
	echo("Ups");
}
mysql_close();
?>