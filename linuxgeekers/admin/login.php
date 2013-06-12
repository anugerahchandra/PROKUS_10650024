<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Linux Geekers Login</title>
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
	</head>
	<body>
		<div id="login">
			<div id="login_form" style="height: 280px; width: 480px; padding: 10px;">
				<img src="images/logo-login.png" width="130px" /><br>
				<form action="process/login.php" method="post">
					<div class="login_row">
						<label for="email">Username</label>
						<input name="username" type="text" class="input" style="width: 300px; float: right;"/>
					</div>
					<div class="login_row">
						<label for="pass">Password</label>
						<input name="password" type="password" class="input" style="width: 300px; float: right;"/>
					</div>
					<div class="login_row">
						<input type="submit" value="LOG IN" class="button" style="margin: 10px; float: right;"/>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>