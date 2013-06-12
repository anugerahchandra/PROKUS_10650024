<div id="body_kit">
	<div id="cart_body">
		<div id="body_sidebar">
			<span class="sidebar_flow">Select Product</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow">Add to Cart</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow">Checkout</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow">Order Form</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow" style="color: #0CF;" >Payment</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow">Confirm Payment</span>
		</div>
		<div id="body_cart">
			<?php
			$sql = "SELECT * FROM admin";
			$result = mysql_query($sql) or die(mysql_error());
			?>
			<div class="body_title">
				Payment
			</div>
			<p>
				Kode Order Anda adalah : <font color="#0CF;"><?php echo @$_SESSION['kode_pesan']; ?></font>
			</p>
			<p>
				Jumlah yang harus ditransfer : <font color="#00CCFF;"><?php echo @$_SESSION['total']; ?></font>
			</p>
			<br/>
			<p>
				Silakan lakukan pembayaran di salah satu bank berikut ini
			</p>
			<p style="text-align: left;">
				- BCA Cab. Sudirman Yogyakarta No. Rek. 0372093674 a/n Anugerah Chandra Utama
			</p>
			<p style="text-align: left;">
				- Mandiri Cab. Wisma PU Yogyakarta No. Rek. 137-00-00751965-9 a/n Anugerah Chandra Utama
			</p>
			
		</div>
	</div>
	<div class="void_row"></div>
</div>