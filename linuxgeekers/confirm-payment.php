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
			<span class="sidebar_flow">Payment</span>
			<span class="arrow_down"></span>
			<span class="sidebar_flow" style="color: #0CF;">Confirm Payment</span>
		</div>
		<div id="body_cart" >
			<form style="float:left; " action="process/confirm.php" method="post">
				<div class="body_title">
					Confirm Payment
				</div>
				<div class="row">
					<div class="label">
						No Order
					</div>
					<input class="input" name="kode_pesan" />
				</div>
				<div class="row">
					<div class="label">
						Jumlah Transfer
					</div>
					<input class="input" name="total" />
				</div>
				<div class="row" style="height: 200px;">
					<div class="label">
						Rekening
					</div>
					<textarea class="input" name="rekening" style="width: 400px; height: 200px;"></textarea>
				</div>
				<div class="row">
					<input class="button" type="submit" value="Confirm" name="confirm" />
				</div>
			</form>
		</div>
	</div>
	<div class="void_row"></div>
</div>