<section id="main" class="column">
	<article class="module width_full">
		<header>
			<h3>Tambah Admin</h3>
		</header>
		<div class="module_content">
			<form action="process/add-admin.php" method="post">
				<fieldset style="width:48%;">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" style="width:92%;">
				</fieldset>
				<fieldset style="width:48%;" >
					<label>Username</label>
					<input type="text" name="username" style="width:92%;">
				</fieldset>
				<fieldset style="width:48%;" >
					<label>Password</label>
					<input type="password" name="password" style="width:92%;">
				</fieldset>
				<fieldset style="width:48%;" >
					<label>Email</label>
					<input type="text" name="email" style="width:92%;">
				</fieldset>
				<input type="submit" value="Save" class="alt_btn">
			</form>
	</article>
	<div class="spacer"></div>
</section>