<?php
if (isset($_GET['hal'])) {
	$halaman = $_GET['hal'];
} else {
	$halaman = 1;
}
$jumlahDataPerHalaman = 5;
$sql = "SELECT * FROM customers";
$run = mysql_query($sql);
$jumlahData = mysql_num_rows($run);
$sql = "";
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$dataMulai = ($halaman * $jumlahDataPerHalaman) - $jumlahDataPerHalaman;
$sql = "SELECT * FROM customers LIMIT $dataMulai, $jumlahDataPerHalaman";
$result = mysql_query($sql) or die(mysql_error());
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Customers</h3>
		</header>
		<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama</th>
					<th>Email</th>
					<th>Telpon</th>
					<th>Alamat</th>
					<th>Order</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($rows = mysql_fetch_array($result)) {
				?>
				<tr>
					<td><?php echo $rows['id_customer']; ?></td>
					<td><?php echo $rows['nama']; ?></td>
					<td><?php echo $rows['email']; ?></td>
					<td><?php echo $rows['tlp']; ?></td>
					<td><?php echo $rows['alamat']; ?></td>
					<td><a href="index.php?page=order-detail&id=<?php echo $rows['kode_order']; ?>"><?php echo $rows['kode_order']; ?></a></td>
					<td>
						<a href="process/customers.php?action=del&id=<?php echo $rows['id_customer']; ?>"><input type="image" src="images/icn_trash.png" title="Trash"></a>
					</td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td colspan="7">
						<center>
							<?php
							if ($jumlahData>$jumlahDataPerHalaman) {
								if ($halaman >= 2) {
									echo "<a href=\"index.php?page=customers&hal=" . ($halaman - 1) . "\"><< Back </a>";
								} else {
									echo "<< Back ";
								}
								echo "|";
								if ($halaman < $jumlahHalaman) {
									echo "<a href=\"index.php?page=customers&hal=" . ($halaman + 1) . "\"> Next >></a>";
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