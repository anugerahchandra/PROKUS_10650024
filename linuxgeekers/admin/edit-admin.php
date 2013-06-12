<?php
if (isset($_GET['username'])) {
	$username = $_GET['username'];
	$sql = "SELECT * FROM admin WHERE username='$username'";
	$result = mysql_query($sql) or die(mysql_error());
?>
<section id="main" class="column">
	<article class="module width_full">
		<header>
			<h3>Edit Admin</h3>
		</header>
        <?php
		while ($rows = mysql_fetch_array($result)) {
		?>
		<div class="module_content">
			<form action="process/edit-admin.php" method="post">
				<fieldset style="width:48%;">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" style="width:92%;" value="<?php echo $rows['nama']; ?>">
				</fieldset>
				<fieldset style="width:48%;" >
					<label>Username</label>
					<input type="text" style="width:92%;" value="<?php echo $rows['username']; ?>" disabled>
                    <input type="hidden" name="username" value="<?php echo $rows['username']; ?>">
				</fieldset>
				<fieldset style="width:48%;" >
					<label>Password</label>
					<input type="password" name="password" style="width:92%;">
				</fieldset>
				<fieldset style="width:48%;" >
					<label>Email</label>
					<input type="text" name="email" style="width:92%;" value="<?php echo $rows['email']; ?>">
				</fieldset>
				<input type="submit" value="Edit" class="alt_btn">
			</form>
	</article>
	<div class="spacer"></div>
</section>
<?php
	}
}else{
	header('location:index.php?page=admin');
}
?>