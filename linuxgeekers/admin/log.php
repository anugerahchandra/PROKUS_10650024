<?php
$nama = $_POST['fname'];
$email = $_POST['email'];
$pesan = $_POST['message'];
$myFile = "data.txt";
$fh = fopen($myFile, "a") or die("can�t open file");
$stringData = "Nama : " . $nama . " Email : " . $email . " Pesan : " . $pesan . "\n";
fwrite($fh, $stringData);
fclose($fh);
echo "sukses";
?>