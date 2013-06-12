<?php
$sql = "SELECT * FROM produk WHERE post=1";
$result = mysql_query($sql) or die(mysql_error());
?>
<div id="shop">
	<ul class="items">
		<?php
while ($rows = mysql_fetch_array($result)) {
		?>
		<li>
			<span><img src="upload/foto/<?php echo $rows['foto']; ?>" alt="shirt" width="202"  /></span>
			<span class="price">IDR <?php echo $rows['harga']; ?></span><?php echo $rows['nama_produk']; ?>
			<br/>
			<a href="index.php?page=cart&action=add&id=<?php echo $rows['kode_produk']; ?>" class="buy">Buy</a>
		</li>
		<?php
		}
		?>
	</ul>
</div>