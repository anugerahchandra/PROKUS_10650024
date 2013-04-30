<?php
session_start();
include '../inc/config.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$cek = mysql_query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
if(mysql_num_rows($cek)==1){
    $c = mysql_fetch_array($cek);
    $_SESSION['username'] = $c['username'];
	header("location:../index.php");
}else{
    //die("password salah <a href=\"javascript:history.back()\">kembali</a>");
	header("location:../login.php");
}
?>