<script type="text/javascript">
	function displayDate() {
		document.getElementById("demo").innerHTML = Date();
	}

	function validateForm() {
		var x = document.forms["myForm"]["fname"].value;
		if(x == null || x == "") {
			alert("Nama harus diisi");
			return false;
		}
		var x = document.forms["myForm"]["email"].value;
		var atpos = x.indexOf("@");
		var dotpos = x.lastIndexOf(".");
		if(x == null || x == "") {
			alert("Email harus diisi");
			return false;
		}
		if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
			alert("Email tidak valid");
			return false;
		}
	}

</script>
<div id="main">
<span style="font-family: 'Voltaire', sans-serif; color: white; margin-top:75px; font-size: 30px;"><br><b>CONTACT US</b></span>
	<p id="demo"></p>
	<div class="form">
		<form name="myForm" action="log.php" onsubmit="return validateForm()" method="post">
			<table align="left">
				<br><br><tr>
					<td align="left" width="100">Name</td>
					<td align="left">
					<input style="height:30px;" class="input" name="fname" type="text" size="40">
					</td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td align="left">Email </td>
					<td align="left">
					<input style="height:30px;" class="input" name="email" type="text" size="40">
					</td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td align="left">Message </td>
					<td>	<textarea style="height:110px;" class="input" rows="6" name="message" cols="36">  </textarea></td>
				</tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr></tr>
				<tr>
					<td></td>
					<td colspan="2" align="center">
					<input style="height:40px; width:90;" type="submit" value="Submit">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>