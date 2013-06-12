<?
require_once 'inc/config.php';
		$sql = "SELECT * FROM produk WHERE kode_produk='$id'";
		$result = mysql_query($sql) or die(mysql_error());
		while ($rows = mysql_fetch_array($result)) {
			$file=$rows['foto'];
			unlink("../upload/foto/.$file.");
		}
?>