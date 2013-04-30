<section id="main" class="column">
	<h4 class="alert_info">Selamat datang Admin</h4>
	<article class="module width_full">
		<header>
			<h3>Status</h3>
		</header>
		<div class="module_content">
			<article class="stats_graph">
				<?php
					$sql = "SELECT * FROM produk";
					$result = mysql_query($sql) or die(mysql_error());
					$products = 0;
					$item = 0;
					while ($rows = mysql_fetch_array($result)) {
						$products = $products + 1;
						$item = $item + $rows['stok'];
					}
					$sql = "SELECT * FROM payment";
					$result = mysql_query($sql) or die(mysql_error());
					$total = 0;
					while ($rows = mysql_fetch_array($result)) {
						$total = $total + $rows['total'];
					}
				?>
				<h2>Total Jenis Produk : <?php echo $products; ?></h2>
				<h2>Total Produk (item) : <?php echo $item; ?></h2>
				<h2>Total Pendapatan : <?php echo rupiah($total); ?></h2>
			</article>
			<article class="stats_overview">
				<div class="overview_today">
					<p class="overview_day">
						New Order
					</p>
					<?php
					$sql = "SELECT * FROM `payment` WHERE status=0";
					$result = mysql_query($sql) or die(mysql_error());
					$order = 0;
					while ($rows = mysql_fetch_array($result)) {
						$order = $order + 1;
					}
					?>
					<p class="overview_count">
						<a href="index.php?page=order"><?php echo $order; ?></a>
					</p>
					
					<p class="overview_day">
						All Order
					</p>
					<?php
					$sql = "SELECT * FROM `order`";
					$result = mysql_query($sql) or die(mysql_error());
					$allOrder = 0;
					while ($rows = mysql_fetch_array($result)) {
						$allOrder = $allOrder + 1;
					}
					?>
					<p class="overview_count">
						<?php echo $allOrder; ?>
					</p>
				</div>
				<div class="overview_previous">
					<p class="overview_day">
						New Payment
					</p>
					<?php
					$sql = "SELECT * FROM payment WHERE status=0";
					$result = mysql_query($sql) or die(mysql_error());
					$payment = 0;
					while ($rows = mysql_fetch_array($result)) {
						$payment = $payment + 1;
					}
					?>
					<p class="overview_count">
						<a href="index.php?page=payment"><?php echo $payment; ?></a>
					</p>
					
					<p class="overview_day">
						New Payment
					</p>
					<?php
					$sql = "SELECT * FROM payment";
					$result = mysql_query($sql) or die(mysql_error());
					$allPayment = 0;
					while ($rows = mysql_fetch_array($result)) {
						$allPayment = $allPayment + 1;
					}
					?>
					<p class="overview_count">
						<?php echo $allPayment; ?>
					</p>
				</div>
			</article>
			<div class="clear"></div>
		</div>
	</article>
	<div class="spacer"></div>
</section>