<aside id="sidebar" class="column">
	<h3>Produk</h3>
	<ul class="toggle">
		<li class="icn_new_article">
			<a href="index.php?page=add-product">Tambah Produk</a>
		</li>
		<li class="icn_edit_article">
			<a href="index.php?page=products">Lihat Produk</a>
		</li>
		<li class="icn_categories">
			<a href="index.php?page=category">Kategori</a>
		</li>
	</ul>
	<h3>Pembeli</h3>
	<ul class="toggle">
		<!--<li class="icn_add_user"><a href="#">Add New User</a></li>
		<li class="icn_view_users"><a href="#">View Users</a></li>-->
		<li class="icn_profile">
			<a href="index.php?page=customers">Pembeli</a>
		</li>
	</ul>
	<h3>Order</h3>
	<ul class="toggle">
		<li class="icn_photo">
			<a href="index.php?page=order">Lihat Order</a>
		</li>
		<li class="icn_view_users">
			<a href="index.php?page=payment">Pembayaran</a>
		</li>
		
			<!--<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>-->
	</ul>
	<h3>Admin</h3>
	<ul class="toggle">
		<li class="icn_add_user">
			<a href="index.php?page=add-admin">Tambah Admin</a>
		</li>
        <li class="icn_view_users">
        	<a href="index.php?page=admin">Lihat Admin</a>
        </li>
		<!--<li class="icn_settings"><a href="#">Options</a></li>
		<li class="icn_security"><a href="#">Security</a></li>-->
		<li class="icn_jump_back">
			<a href="logout.php">Logout</a>
		</li>
	</ul>
	<?php
	include 'footer.php';
	?>
</aside>
