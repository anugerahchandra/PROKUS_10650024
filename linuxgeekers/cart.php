<?php
if (isset($_SESSION['cart'])) {
	$cart = $_SESSION['cart'];
}
$_SESSION['size'] = "";
if (isset($_GET['action'])) {
	$action = $_GET['action'];
	switch ($action) {
		case 'add' :
			if ($cart) {
				$cart .= ',' . $_GET['id'];
			} else {
				$cart = $_GET['id'];
			}
			header("location:index.php?page=cart");
			break;
		case 'delete' :
			if ($cart) {
				$items = explode(',', $cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($_GET['id'] != $item) {
						if ($newcart != '') {
							$newcart .= ',' . $item;
						} else {
							$newcart = $item;
						}
					}
				}
				$cart = $newcart;
			}
			header("location:index.php?page=cart");
			break;
		case 'update' :
			if ($cart) {
				$newcart = '';
				foreach ($_POST as $key => $value) {
					if (stristr($key, 'qty')) {
						$id = str_replace('qty', '', $key);
						$items = ($newcart != '') ? explode(',', $newcart) : explode(',', $cart);
						$newcart = '';
						foreach ($items as $item) {
							if ($id != $item) {
								if ($newcart != '') {
									$newcart .= ',' . $item;
								} else {
									$newcart = $item;
								}
							}
						}
						for ($i = 1; $i <= $value; $i++) {
							if ($newcart != '') {
								$newcart .= ',' . $id;
							} else {
								$newcart = $id;
							}
						}
					}
				}
			}
			$cart = $newcart;
			header("location:index.php?page=cart");
			break;
	}
}
$_SESSION['cart'] = $cart;
?>
<div id="body_kit">
	<div id="cart_body">
		<div id="body_cart" style="width:100%;">
		<div id="body_sidebar">
			<span class="sidebar_flow">Select Product</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow" style="color: #0CF;">Add to Cart</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow">Checkout</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow" >Order Form</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow">Payment</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow">Confirm Payment</span>
		</div>
			<?php
			if (!$cart) {
				echo "<p>Keranjang belanja Anda kosong. Anda belum pesan apapun. <br/>Silakan memilih barang di halaman <a style=\"text-decoration:none;color:#0CF;\" href=\"index.php?page=products\">PRODUCTS!</a></p>";
			} else {
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
		<form action="process/cart.php" method="post" style="float:left;">
			<table style="width: 100%; text-align:left; font-size:18px; margin-top:30px; margin-left:30px;" border="0" cellspacing="0">
				<tr style="background-color: black;">
					<th style="width: 180px">NAMA</th>
					<th style="width: 30px;">HARGA</th>
					<th style="width: 10px">QTY</th>
					<th style="width: 50px">TOTAL</th>
					<th style="width: 10px;">DELETE</th>
				</tr>
			';
					if (strlen($cart) != 0) {
						foreach ($isikeranjang as $id => $qty) {
							//echo $isikeranjang;
							//echo $id."=>".$qty;
							$sql = "SELECT * FROM produk WHERE kode_produk = '$id'";
							$result = mysql_query($sql) or die(mysql_error());
							while ($row = mysql_fetch_assoc($result)) {
								echo '
				<tr>
					<td>' . $row['nama_produk'] . '</td>
					<td align="left">' . $row['harga'] . '</td>
					<td>
						<input type="text" name="qty' . $id . '" value="' . $qty . '" size="3" maxlength="3" />
					</td>
					<td align="left">' . $row['harga'] * $qty . '</td>
					<td><a style="text-decoration:none;color:#F00; text-align:center; " href="index.php?page=cart&action=delete&id=' . $id . '">x</a></td>
				</tr>
						';
								$total += $row['harga'] * $qty;
							}
							$_SESSION['total'] = $total;
						}
						echo '
				<tr>
					<td colspan="3" align="right" style="padding-right: 30px;"><b>Total</b></td>
					<td colspan="2" align="left">' . $total . '</td>
				</tr>
				</table>
					<div style="padding-top: 0px; float: right; padding-right: 20px; width:100%;">
						<input style="float: right; height:30px; width:90px;" class="button" type="submit" value="Chekout" name="checkout" />
						<input style="float: right; height:30px; width:90px;" class="button" type="submit" value="Update" name="update" />
					</div>
				</form>
				';
					}
				}
			}
			?>
			</div>
		</div>
	</div>
	<div class="void_row"></div>
</div>