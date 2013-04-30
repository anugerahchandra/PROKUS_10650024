<?php
if (isset($_GET['action'])) {
	if ($_GET['action'] == "del") {
		$id = $_GET['id'];
		$hapus = "DELETE FROM payment WHERE id_payment='$id'";
		mysql_query($hapus);
		$sql = "";
	}
}

if (isset($_GET['hal'])) {
	$halaman = $_GET['hal'];
} else {
	$halaman = 1;
}
$jumlahDataPerHalaman = 5;
$sql = "SELECT * FROM payment";
$run = mysql_query($sql);
$jumlahData = mysql_num_rows($run);
$sql = "";
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$dataMulai = ($halaman * $jumlahDataPerHalaman) - $jumlahDataPerHalaman;
$sql = "SELECT * FROM payment WHERE status=1 LIMIT $dataMulai, $jumlahDataPerHalaman";
$result = mysql_query($sql) or die(mysql_error());
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Payment</h3>
		</header>
		<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
					<th>Kode Order</th>
					<th>Tanggal</th>
					<th>Total</th>
					<th>Rekening</th>
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
					<td><?php echo rupiah($rows['total']); ?></td>
					<td><?php echo $rows['rekening']; ?></td>
					<td><?php if ($rows['status']==0){echo "Belum Diterima";}else{echo "Sudah Diterima";} ?></td>
					<td>
						<a href="index.php?page=payment&action=del&id=<?php echo $rows['id_payment']; ?>"><input type="image" src="images/icn_trash.png" title="Delete"></a>
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
									echo "<a href=\"index.php?page=payment&hal=" . ($halaman - 1) . "\"><< Back </a>";
								} else {
									echo "<< Back ";
								}
								echo "|";
								if ($halaman < $jumlahHalaman) {
									echo "<a href=\"index.php?page=payment&hal=" . ($halaman + 1) . "\"> Next >></a>";
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