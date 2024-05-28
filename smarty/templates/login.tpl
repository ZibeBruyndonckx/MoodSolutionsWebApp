<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" href="../img/MOOD_Logo_small.jpg" type="image/jpg">
	<link rel="stylesheet" href="../css/login.css">
	<script src="../js_lib/copyright.js"></script>
	<title>Login</title>
</head>

<body>
	<div id="container">
		<main>
			<p id=msg>{$msg}</p><br/>
			<form method=post action={$action}>
			<div id='forgot'>
				<a href=../scripts/Account_signUp.php>Geen Account?</a>
				</div> <br/><br/>
				<label>Email:</label>
				<input type=email name=email>
				<label>Paswoord:</label>
				<input type=password name=paswoord>
				<label>Permanent <br> (8 hours)</label>
				<input type=checkbox name=persist>
				<input type=submit name='submit' value="Log in" class=submit>
				<div class=clearfix></div>
				<div id='forgot'>
				<a href=../scripts/Account_forgotLogin.php>Paswoord Vergeten?</a>
				</div>
			</form>
		</main>
		<footer>
			<script language="javascript">
				document.write(copyRight("Zibe"));

			</script>
		</footer>
	</div>
</body>

</html>