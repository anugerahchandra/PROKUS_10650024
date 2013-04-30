<?php
include '../inc/config.php';
$username = $_POST['username'];
$nama = $_POST['nama'];
$email = $_POST['email'];
if ($_POST['password']==null) {
	$sql = "UPDATE admin SET email='$email', nama='$nama' WHERE username='$username'";
}else{
	$password = md5($_POST['password']);
	$sql = "UPDATE admin SET password='$password', email='$email', nama='$nama' where username='$username'";
}
$result = mysql_query($sql) or die(mysql_error());
if ($result) {
	header('location:../index.php?page=admin');
} else {
	echo("Ups");
}
mysql_close();
?>