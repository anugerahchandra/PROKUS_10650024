<?php
if (isset($_GET['id'])) {
	$kode_produk = $_GET['id'];
	$sql = "SELECT * FROM produk WHERE kode_produk='$kode_produk'";
	$result = mysql_query($sql) or die(mysql_error());
?>
<section id="main" class="column">
	<article class="module width_full">
		<header>
			<h3>Edit Produk</h3>
		</header>
		<?php
		while ($rows = mysql_fetch_array($result)) {
		?>
		<div class="module_content">
			<form action="process/edit-product.php" method="post" enctype="multipart/form-data">
				<fieldset style="width:48%; float: left; margin-right: 3%;">
					<label>Nama produk</label>
					<input type="text" style="width:92%;" name="nama" value="<?php echo $rows['nama_produk']; ?>">
				</fieldset>
				<fieldset style="width:48%; float:left;" >
					<label>Kode Produk</label>
					<input type="hidden" name="kode_produk" value="<?php echo $rows['kode_produk']; ?>" />
					<input type="text" style="width:92%;" name="kode_produk" maxlength="5" disabled value="<?php echo $rows['kode_produk']; ?>">
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right:3%" >
					<label>Harga</label>
					<input type="text" style="width:92%;" name="harga" value="<?php echo $rows['harga']; ?>">
				</fieldset>
				<fieldset style="width:48%; float:left;" >
					<label>Stok</label>
					<input type="text" style="width:92%;" name="stok" value="<?php echo $rows['stok']; ?>">
				</fieldset>
				<fieldset>
					<label>Deskripsi</label>
					<textarea rows="20" name="deskripsi"><?php echo $rows['deskripsi']; ?></textarea>
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label>Kategori</label>
					<select style="width:92%;" name="kategori">
						<?php
						$sql_kategori = "SELECT * FROM kategori";
						$result = mysql_query($sql_kategori) or die(mysql_error());
						while ($row = mysql_fetch_array($result)) {
							if ($row['id_kategori'] == $rows['id_kategori']) {
								echo "<option selected value=" . $row['id_kategori'] . ">" . $row['nama_kategori'] . "</option>";
							} else {
								echo "<option value=" . $row['id_kategori'] . ">" . $row['nama_kategori'] . "</option>";
							}
						}
						?>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label>Foto</label>
					<input type="file" style="width:92%;" name="foto">
					<img height="30%" style="margin:10px;float:left;" src="../upload/foto/<?php echo $rows['foto']; ?>" />
				</fieldset><div class="clear"></div>
		</div>
		<footer>
			<div class="submit_link">
				<select name="post">
					<option <?php if ($rows['post']==0){echo "selected";} ?> value="0" >Draft</option>
					<option <?php if ($rows['post']==1){echo "selected";} ?> value="1">Published</option>
				</select>
				<input type="submit" value="Publish" class="alt_btn">
				<input type="reset" value="Reset">
			</div>
		</footer>
		<?php
		}
		?>
		</form>
	</article>
</section>
<?php
}else{
header('location:index.php?page=products');
}
?>