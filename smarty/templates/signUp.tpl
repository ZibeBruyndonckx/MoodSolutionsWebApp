<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" href="../img/MOOD_Logo_small.jpg" type="image/jpg">
	<link rel="stylesheet" href="../css/login.css">
	<script src="../js_lib/copyright.js"></script>
	<title>Sign up</title>
</head>

<body>
	<div id="container">
		<main>
			<p id=msg>{$msg}</p> <br/>
			<form method=post action={$action}>
            <label>Voornaam:</label>
				<input type=text name=vNaam>
            <label>Achternaam:</label>
				<input type=text name=aNaam>
				<label>Email:</label>
				<input type=email name=email>
				<label>Paswoord:</label>
				<input type=password name=paswoord>
            <label>Confirm Paswoord:</label>
				<input type=password name=confirmPaswoord>
				<input type=submit name='submit' value="Sign Up" class=submit>
				<div class=clearfix></div>
            <div id='forgot'>
				<a href=../scripts/Account_login.php>Ik heb al een account</a>
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