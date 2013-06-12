<?php
function kode_produk() {
	$sql = "SELECT kode_produk FROM produk ORDER BY kode_produk DESC LIMIT 0,1";
	$result = mysql_query($sql) or die(mysql_error());
	list($kode_temp) = mysql_fetch_row($result);
	if ($kode_temp == ''){
		$kode = "P0001";
	} else {
		$jum = substr($kode_temp, 1, 4);
		$jum++;
		if ($jum <= 9){
			$kode = "P000" . $jum;
		}else if ($jum <= 99) {
			$kode = "P00" . $jum;
		}else if ($jum <= 999) {
			$kode = "P0" . $jum;
		}else if ($jum <= 9999) {
			$kode = "P" . $jum;
		}else {
			die("Kode melebihi batas");
		}
	}
	return $kode;
}
?>
<section id="main" class="column">
	<article class="module width_full">
		<header>
			<h3>Tambah Produk Baru</h3>
		</header>
		<div class="module_content">
			<form action="process/add-product.php" method="post" enctype="multipart/form-data">
				<fieldset style="width:48%; float: left; margin-right: 3%;">
					<label>Nama produk</label>
					<input type="text" style="width:92%;" name="nama">
				</fieldset>
				<fieldset style="width:48%; float:left;" >
					<label>Kode Produk</label>
					<input type="text" style="width:92%;" name="kode_produk" maxlength="5" value="<?php echo kode_produk();?>" >
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right:3%" >
					<label>Harga</label>
					<input type="text" style="width:92%;" name="harga">
				</fieldset>
				<fieldset style="width:48%; float:left;" >
					<label>Stok</label>
					<input type="text" style="width:92%;" name="stok">
				</fieldset>
				<fieldset>
					<label>Deskripsi</label>
					<textarea rows="20" name="deskripsi"></textarea>
				</fieldset>
				<fieldset style="width:48%; float:left; margin-right: 3%;">
					<label>Kategori</label>
					<select style="width:92%;" name="kategori">
						<?php
						$sql_kategori = "SELECT * FROM kategori";
						$result = mysql_query($sql_kategori) or die(mysql_error());
						while ($rows = mysql_fetch_array($result)) {
							echo "<option value=".$rows['id_kategori'].">".$rows['nama_kategori']."</option>";
						}
						?>
					</select>
				</fieldset>
				<fieldset style="width:48%; float:left;">
					<label>Foto</label>
					<input type="file" style="width:92%;" name="foto">
				</fieldset><div class="clear"></div>
		</div>
		<footer>
			<div class="submit_link">
				<select name="post">
					<option value="0" >Draft</option>
					<option selected value="1">Published</option>
				</select>
				<input type="submit" value="Publish" class="alt_btn">
				<input type="reset" value="Reset">
			</div>
		</footer>
		</form>
	</article>
</section>