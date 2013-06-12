<?php
require_once '../admin/inc/config.php';
session_start();

if (isset($_SESSION['cart'])) {$cart = $_SESSION['cart'];
}
if (isset($_POST['update'])) {
	$cart = $_SESSION['cart'];
	if ($cart) {
		$newcart = '';
		foreach ($_POST as $key => $value) {
			//echo $key . "=>" . $value . "<br>";
			if (stristr($key, 'qty')) {
				$id = str_replace('qty', '', $key);
				//echo $id . '<br><br>';
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
	$_SESSION['cart'] = $cart;
	header("location:../index.php?page=cart");
} else if (isset($_POST['checkout'])) {
	header("location:../index.php?page=order");
}
?>