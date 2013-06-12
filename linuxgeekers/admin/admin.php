<?php
if (isset($_GET['hal'])) {
	$halaman = $_GET['hal'];
} else {
	$halaman = 1;
}
$jumlahDataPerHalaman = 5;
$sql = "SELECT * FROM admin";
$run = mysql_query($sql);
$jumlahData = mysql_num_rows($run);
$sql = "";
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$dataMulai = ($halaman * $jumlahDataPerHalaman) - $jumlahDataPerHalaman;
$sql = "SELECT * FROM admin LIMIT $dataMulai, $jumlahDataPerHalaman";
$result = mysql_query($sql) or die(mysql_error());
?>
<section id="main" class="column">
	<article class="module width_3_quarter">
		<header>
			<h3 class="tabs_involved">Admin</h3>
		</header>
		<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
					<th>Nama</th>
					<th>Username</th>
					<th>Email</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($rows = mysql_fetch_array($result)) {
				?>
				<tr>
					<td><?php echo $rows['nama']; ?></td>
					<td><?php echo $rows['username']; ?></td>
					<td><?php echo $rows['email']; ?></td>
					<td>
                        <a href="index.php?page=edit-admin&username=<?php echo $rows['username']; ?>"><input type="image" src="images/icn_edit.png" title="Edit"></a>
                        <a href="process/admin.php?action=del&username=<?php echo $rows['username']; ?>"><input type="image" src="images/icn_trash.png" title="Delete"></a>
					</td>
				</tr>
				<?php } ?>
				<tr>
					<td colspan="4">
						<center>
							<?php
							if ($jumlahData>$jumlahDataPerHalaman) {
								if ($halaman >= 2) {
									echo "<a href=\"index.php?page=admin&hal=" . ($halaman - 1) . "\"><< Back </a>";
								} else {
									echo "<< Back ";
								}
								echo "|";
								if ($halaman < $jumlahHalaman) {
									echo "<a href=\"index.php?page=admin&hal=" . ($halaman + 1) . "\"> Next >></a>";
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
