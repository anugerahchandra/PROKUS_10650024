<?php
if (isset($_GET['hal'])) {
	$halaman = $_GET['hal'];
} else {
	$halaman = 1;
}
$jumlahDataPerHalaman = 10;
$sql = "SELECT * FROM produk";
$run = mysql_query($sql);
$jumlahData = mysql_num_rows($run);
$sql = "";
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$dataMulai = ($halaman * $jumlahDataPerHalaman) - $jumlahDataPerHalaman;
$sql = "SELECT produk.*,kategori.* FROM produk,kategori WHERE produk.id_kategori=kategori.id_kategori LIMIT $dataMulai, $jumlahDataPerHalaman";
$result = mysql_query($sql) or die(mysql_error());
?>

<section id="main" class="column">
  <article class="module width_3_quarter">
    <header>
      <h3 class="tabs_involved">Produk</h3>
    </header>
    <table class="tablesorter" cellspacing="0">
      <thead>
        <tr>
          <th width="30%">Kode Produk</th>
		  <th width="30%">Nama Produk</th>
          <th width="15%">Kategori</th>
          <th width="10%">Harga</th>
          <th width="10%">Stok</th>
          <th width="10%">Status</th>
          <th width="10%">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
				while ($rows = mysql_fetch_array($result)) {
		?>
        <tr>
          <td><?php echo $rows['kode_produk']; ?></td>
		  <td><?php echo $rows['nama_produk']; ?></td>
          <td><?php echo $rows['nama_kategori']; ?></td>
          <td><?php echo rupiah($rows['harga']); ?></td>
          <td><?php echo $rows['stok']; ?></td>
          <td><?php if ($rows['post']==1){ echo "Aktif";}else{echo "Tidak Aktif";} ?></td>
          <td>
          	<a href="index.php?page=edit-product&id=<?php echo $rows['kode_produk']; ?>">
            	<input type="image" src="images/icn_edit.png" title="Edit">
            </a>
            <a href="process/products.php?action=del&id=<?php echo $rows['kode_produk']; ?>">
            	<input type="image" src="images/icn_trash.png" title="Delete">
            </a>
          </td>
        </tr>
        <?php
				}
		?>
        <tr>
          <td colspan="5" align="right">
              <?php
			if ($jumlahData > $jumlahDataPerHalaman) {
				if ($halaman >= 2) {
					echo "<a href=\"index.php?page=products&hal=" . ($halaman - 1) . "\"><< Back</a>";
				} else {
					echo "<< Back ";
				}
				echo "  |  ";
				if ($halaman < $jumlahHalaman) {
					echo "<a href=\"index.php?page=products&hal=" . ($halaman + 1) . "\"> Next >></a>";
				} else {
					echo "Next >> ";
				}
			}
			?>
          </td>
        </tr>
      </tbody>
    </table>
  </article>
</section>
