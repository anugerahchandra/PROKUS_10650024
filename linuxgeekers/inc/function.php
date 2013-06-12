<?php

function rupiah($uang) {
	$rupiah  = "";
	$panjang = Strlen($uang);
	while ($panjang > 3) {
		$rupiah = "." . substr($uang, -3) . $rupiah;
		$lebar = strlen($uang)-3;
		$uang   = substr($uang,0,$lebar);
		$panjang= strlen($uang);
	}
	$rupiah = "Rp ".$uang.$rupiah.",-";
	return $rupiah;
}

function kode_pesan() {
	$sql = "SELECT kode_order FROM cart ORDER BY kode_order DESC LIMIT 0,1";
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

/*function TampilkanCart() {
	if (isset($_SESSION['cart'])) {
	    $cart = $_SESSION['cart'];
	    $items = explode(',', $cart);
	    $total = 0;
	    $isikeranjang = array();
		
	    foreach ($items as $item) {
	    	if (isset($isikeranjang[$item])) {// Jika id produk yg sama sudah ada maka quantity ditambah
	    		$isikeranjang[$item] = $isikeranjang[$item] + 1;
			} else {
				$isikeranjang[$item] = 1;
			}
	    }
	    
		echo '
		<form action="process/cart.php" method="post" id="isicart">
			<table style="width: 100%;" border="0" cellspacing="0">
				<tr style="background-color: #333;">
					<th style="width: 40%">Nama</th>
					<th style="width: 15%;">Harga</th>
					<th style="width: 10%">Qty</th>
					<th style="width: 15%">Total</th>
					<th style="width: 10%;">Delete</th>
				</tr>
			';
	    if (strlen($cart)!=0) {
	    	foreach ($isikeranjang as $id => $qty) {
	    		//echo $isikeranjang;
				//echo $id."=>".$qty;
	    		$sql = "SELECT * FROM produk WHERE kode_produk = '$id'";
	    		$result = mysql_query($sql) or die(mysql_error());
	    		while ($row = mysql_fetch_assoc($result)) {
					echo '
				<tr>
					<td>'.$row['nama'].'</td>
					<td align="left">'.rupiah($row['harga']).'</td>
					<td>
						<input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" />
					</td>
					<td align="left">'.rupiah($row['harga'] * $qty ).'</td>
					<td><a style="text-decoration:none;color:#F00;" href="index.php?page=cart&action=delete&id='.$id.'">x</a></td>
				</tr>
						';
					$total += $row['harga'] * $qty;
				}
				$_SESSION['total'] = $total;
			}
			echo '
				<tr>
					<td colspan="3" align="right" style="padding-right: 30px;"><b>Total</b></td>
					<td colspan="2" align="left">'.rupiah($total).'</td>
				</tr>
				</table>
					<div style="padding-top: 20px; float: right; padding-right: 20px; width:100%;">
						<input style="float: right;" class="button" type="submit" value="Chekout" name="checkout" />
						<input style="float: right;" class="button" type="submit" value="Update" name="update" />
					</div>
				</form>
				';
		}
	}
}*/

?>