<?php
if (isset($_GET['action'])) {
	if ($_GET['action'] == "payment") {
		$id = $_GET['id'];
		$update = "UPDATE payment SET status=1 WHERE kode_order='$id'";
		mysql_query($update);
		$sql = "";
	}else if ($_GET['action'] == "complete") {
		$id = $_GET['id'];
		$update = "UPDATE cart SET status=1 WHERE kode_order='$id'";
		mysql_query($update);
		$sql = "";
	}
}
?>
<section id="main" class="column">
	<article class="module width_full" style="min-height: 500px; width: 55%; float: left;">
		<?php
		$id = $_GET['id'];
		$sql = "SELECT * FROM  `order` WHERE kode_order =  '$id'";
		$result = mysql_query($sql) or die(mysql_error());
		?>
		<header>
			<h3>Detail Order</h3>
		</header>
		<div class="module_content">
			<?php
			while ($rows = mysql_fetch_array($result)) {
			?>
					<?php
					$kode_produk = $rows['kode_produk'];
					$sql_produk = "SELECT * FROM produk WHERE kode_produk='$kode_produk'";
					$result_produk = mysql_query($sql_produk) or die(mysql_error());
					while ($rows_produk = mysql_fetch_array($result_produk)) {
						echo '<img src="../upload/foto/'.$rows_produk['foto'].'" width="100px" />';
					}
					?>
				<div style="float: right; margin-right: 150px; width: 300px;">
					<h3>Kode Produk : <?php echo $rows['kode_produk'];?></h3>
					<h3>Nama Produk : 
					<?php
					$kode_produk = $rows['kode_produk'];
					$sql_produk = "SELECT * FROM produk WHERE kode_produk='$kode_produk'";
					$result_produk = mysql_query($sql_produk) or die(mysql_error());
					while ($rows_produk = mysql_fetch_array($result_produk)) {
						echo $rows_produk['nama'];
					}
					?>
					</h3>
					<h3><?php echo "Jumlah : ".$rows['jml']; ?></h3>
				</div>
				<hr />
			<?php
			}
			?>
		</div>
	</article>
	<article class="module width_full" style="width: 30%; float: left;">
		<header>
			<h3>Status Barang</h3>
		</header>
		<div class="module_content">
			<?php
			$sql = "SELECT * FROM cart WHERE kode_order='$id'";
			$result = mysql_query($sql) or die(mysql_error());
			while ($row = mysql_fetch_array($result)) {
				if ($row['status']==0) {
					echo '<h4 class="alert_error">Barang Belum Dikirim</h4>';
					echo '<center><p><a href="index.php?page=order-detail&action=complete&id='.$row['kode_order'].'">Ubah Status Order!</a></p></center>';
				}else if ($row['status']==1) {
					echo '<h4 class="alert_success">Barang Sudah Dikirim</h4>';
				}
			}
			?>
			<div class="spacer"></div>
		</div>
	</article>
	<article class="module width_full" style="width: 30%; float: left;">
		<header>
			<h3>Customer</h3>
		</header>
		<div class="module_content">
			<?php
			$sql_customer = "SELECT * FROM customers WHERE kode_order='$_GET[id]'";
			$result_customer = mysql_query($sql_customer) or die(mysql_error());
			while ($rows_customer = mysql_fetch_array($result_customer)) {
			?>
			<p>Nama : <?php echo $rows_customer['nama'];?></p>
			<p>Provinsi : <?php echo $rows_customer['provinsi'];?></p>
			<p>Kota : <?php echo $rows_customer['kota'];?></p>
			<p>Alamat : <?php echo $rows_customer['alamat'];?></p>
			<p>Kode Pos : <?php echo $rows_customer['kode_pos'];?></p>
			<p>No Telpon : <?php echo $rows_customer['tlp'];?></p>
			<?php	
			}
			?>
		</div>
	</article>
	<article class="module width_full" style="width: 30%; float: left;">
		<header>
			<h3>Status Pembayaran</h3>
		</header>
		<div class="module_content">
			<?php
			$sql = "SELECT * FROM payment WHERE kode_order='$id'";
			$result = mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($result)==1){
				while ($row = mysql_fetch_array($result)) {
					if ($row['status']==0) {
						echo '<h4 class="alert_warning">Sudah Melakukan Pembayaran</h4>';
						echo '<center><p><a href="index.php?page=order-detail&action=payment&id='.$row['kode_order'].'">Ubah Status Pembayaran!</a></p></center>';
						echo '<p>Jumlah Transfer : '.rupiah($row['total']).'</p>';
						echo '<p>Tanggal Transfer : '.$row['tanggal'].'</p>';
						echo '<p>Rekening : '.$row['rekening'].'</p>';
					}else if ($row['status']==1) {
						echo '<h4 class="alert_success">Pembayaran Valid</h4>';
						echo '<p>Jumlah Transfer : '.rupiah($row['total']).'</p>';
						echo '<p>Tanggal Transfer : '.$row['tanggal'].'</p>';
						echo '<p>Rekening : '.$row['rekening'].'</p>';
					}
				}
			}else{
				echo '<h4 class="alert_error">Belum Melakukan Pembayaran</h4>';
			}
			?>
			<div class="spacer"></div>
		</div>
	</article>
	<div class="spacer"></div>
</section>