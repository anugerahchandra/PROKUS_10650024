<?php
if (isset($_GET['action'])) {
	if ($_GET['action'] == "del") {
		$id = $_GET['id'];
		$hapus = "DELETE FROM order WHERE kode_order='$id'";
		mysql_query($hapus);
		$hapus = "DELETE FROM `order` WHERE `kode_order`='$id'";
		mysql_query($hapus);
		$sql = "";
	}else if ($_GET['action'] == "update") {
		$id = $_GET['id'];
		$update = "UPDATE order SET status=1 WHERE kode_order='$id'";
		mysql_query($update);
		$sql = "";
	}
}
if (isset($_GET['hal'])) {
	$halaman = $_GET['hal'];
} else {
	$halaman = 1;
}

$jumlahDataPerHalaman = 5;
$sql = "SELECT * FROM `order`";
$run = mysql_query($sql) or die(mysql_error());
$jumlahData = mysql_num_rows($run);
//$sql = "SELECT * FROM order";
//$run = mysql_query($sql);
//$jumlahData = mysql_num_rows($run);
$sql = "";
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$dataMulai = ($halaman * $jumlahDataPerHalaman) - $jumlahDataPerHalaman;
//$sql = "SELECT order.*,customers.nama FROM order,customers WHERE order.id_customer=customers.id_customer AND status=0 LIMIT $dataMulai, $jumlahDataPerHalaman";
$sql = "SELECT order.kode_order, order.tanggal, customers.nama, payment.total, payment.status FROM `order`, `payment`, `customers` WHERE order.id_payment=payment.id_payment AND order.id_customer=customers.id_customer LIMIT $dataMulai, $jumlahDataPerHalaman";
$result = mysql_query($sql) or die(mysql_error());
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Order</h3>
		</header>
		<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
					<th>Kode Order</th>
					<th>Tanggal</th>
					<th>Nama Customer</th>
					<th>Total</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($rows = mysql_fetch_array($result)) {
				?>
				
				<tr>
					<td><a href="index.php?page=order-detail&id=<?php echo $rows['kode_order']; ?>"><?php echo $rows['kode_order']; ?></a></td>
					<td><?php echo $rows['tanggal']; ?></td>
					<td><?php echo $rows['nama']; ?></td>
					<td><?php echo rupiah($rows['total']); ?></td>
					<td><?php if ($rows['status']==0){echo "Belum Dikirim";}else{echo "Sudah Dikirim";} ?></td>
					<td>
						<a href="index.php?page=order&action=update&id=<?php echo $rows['kode_order']; ?>"><input type="image" src="images/icn_alert_success.png" title="Pembayaran sudah diterima"></a>
						<a href="index.php?page=order&action=del&id=<?php echo $rows['kode_order']; ?>"><input type="image" src="images/icn_trash.png" title="Delete"></a>
					</td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="5">
						<center>
							<?php
							if ($jumlahData>$jumlahDataPerHalaman) {
								if ($halaman >= 2) {
									echo "<a href=\"index.php?page=order&hal=" . ($halaman - 1) . "\"><< Back </a>";
								} else {
									echo "<< Back ";
								}
								echo "|";
								if ($halaman < $jumlahHalaman) {
									echo "<a href=\"index.php?page=order&hal=" . ($halaman + 1) . "\"> Next >></a>";
								} else {
									echo " Next >> ";
								}
							}
							?>
						</center>
					</td>
				</tr>
			</tbody>
		</table>
	</article>
</section>