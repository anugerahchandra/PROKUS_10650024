<?php
//require_once '../inc/function.php';
require_once '../admin/inc/config.php';
session_start();

if (!isset($_POST['submit'])) {
	$kode_pesan = kode_pesan();
	$_SESSION['kode_pesan']=$kode_pesan;
	$kode_customer=kode_customer();
	$total = $_SESSION['total'];
	$cart = $_SESSION['cart'];
	
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$tlp = $_POST['tlp'];
	$provinsi = $_POST['provinsi'];
	$kota = $_POST['kota'];
	$alamat = $_POST['alamat'];
	$kode_pos = $_POST['kode_pos'];

	$sql = "INSERT INTO customers (id_customer,nama,email,tlp,provinsi,kota,alamat,kode_pos,kode_order) VALUES ('$kode_customer', '$nama', '$email','$tlp','$provinsi','$kota','$alamat','$kode_pos','$kode_pesan')";
	//echo $sql;
	$result = mysql_query($sql) or die(mysql_error());
	
	if ($cart) {
		$items = explode(',', $cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		
		$sql_pesan = "INSERT INTO `order` (kode_order,tanggal,id_customer) VALUES ('$kode_pesan', now(), '$kode_customer')";
		echo $sql_pesan."<br>";
		mysql_query($sql_pesan) or die(mysql_error());
		foreach ($contents as $id => $qty) {
			$sql = "INSERT INTO `order_detail`(`kode_order`, `kode_produk`, `jumlah`) VALUES ('$kode_pesan','$id',$qty)";
			echo $sql."<br>";
			$result = mysql_query($sql) or die(mysql_error());
			// STOK
			$tampilProduk = mysql_query("SELECT * FROM produk WHERE kode_produk='$id'") or die(mysql_error());
			while ($rows = mysql_fetch_array($tampilProduk)) {
				$stok=$rows['stok']-$qty;
				$update_stok = "UPDATE produk SET stok=$stok WHERE kode_produk='$id'";
				mysql_query($update_stok);
			}
		}
	} else {
		echo '<p>Keranjang belanja masih kosong.</p>';
	}

	$_SESSION['cart'] = '';

	if ($result) {
		header('location:../index.php?page=payment');
		//echo "ok";
	} else {
		header('location:../index.php?page=cart');
		//echo "ups!";
	}
	mysql_close();
}
echo 'ok';
function kode_pesan() {
	$sql = "SELECT kode_order FROM `order` ORDER BY kode_order DESC LIMIT 0,1";
	$result = mysql_query($sql) or die(mysql_error());
	list($kode_temp) = mysql_fetch_row($result);
	if ($kode_temp == '')
		$kode = "O001";
	else {
		$jum = substr($kode_temp, 1, 6);
		$jum++;
		if ($jum <= 9)
			$kode = "O00" . $jum;
		elseif ($jum <= 99)
			$kode = "O0" . $jum;
		elseif ($jum <= 999)
			$kode = "O" . $jum;
		else
			die("Kode pemesanan melebihi batas");
	}
	return $kode;
}

function kode_customer() {
	$sql = "SELECT id_customer FROM customers ORDER BY id_customer DESC LIMIT 0,1";
	$result = mysql_query($sql) or die(mysql_error());
	list($kode_temp) = mysql_fetch_row($result);
	if ($kode_temp == '')
		$kode = "C001";
	else {
		$jum = substr($kode_temp, 1, 6);
		$jum++;
		if ($jum <= 9)
			$kode = "C00" . $jum;
		elseif ($jum <= 99)
			$kode = "C0" . $jum;
		elseif ($jum <= 999)
			$kode = "C" . $jum;
	
		else
			die("Kode pemesanan melebihi batas");
	}
	return $kode;
}
?>
