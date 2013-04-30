<section id="main" class="column">
	<article class="module width_3_quarter" style="width: 50%;">
		<header>
			<h3>Tambah Kategori</h3>
		</header>
		<div class="module_content">
			<form action="process/add-category.php" method="post">
				<fieldset style="width: 98%;">
					<label>Nama</label>
					<input type="text" name="nama" style="width: 92%;">
					<div class="submit_link">
						<input type="submit" value="Add" class="alt_btn">
					</div>
				</fieldset>
			</form>
		</div>
	</article>
	<?php
	if (isset($_GET['hal'])) {
		$halaman = $_GET['hal'];
	} else {
		$halaman = 1;
	}
	$jumlahDataPerHalaman = 5;
	$sql = "SELECT * FROM kategori";
	$run = mysql_query($sql);
	$jumlahData = mysql_num_rows($run);
	$sql = "";
	$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
	$dataMulai = ($halaman * $jumlahDataPerHalaman) - $jumlahDataPerHalaman;
	$sql = "SELECT * FROM kategori LIMIT $dataMulai, $jumlahDataPerHalaman";
	$result = mysql_query($sql) or die(mysql_error());
	?>
	<article class="module width_3_quarter" style="width: 40%; float: left;">
		<header>
			<h3 class="tabs_involved">Daftar Kategori</h3>
		</header>
		<table class="tablesorter" cellspacing="0">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama Kategori</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
            	<?php
				while ($rows = mysql_fetch_array($result)) {
				?>
				<tr>
					<td><?php echo $rows['id_kategori']; ?></td>
					<td><?php echo $rows['nama_kategori']; ?></td>
					<td>
						<a href="process/category.php?action=del&id=<?php echo $rows['id_kategori']; ?>"><input type="image" src="images/icn_trash.png" title="Delete"></a>
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
	<div class="spacer"></div>
</section>