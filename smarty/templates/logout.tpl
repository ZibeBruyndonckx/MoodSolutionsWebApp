<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
   <link rel="icon" href="../img/MOOD_Logo_small.jpg" type="image/jpg">
	<link rel="stylesheet" href="../css/login.css">
	<script src="../js_lib/copyright.js"></script>
	<title>Forgot login</title>
</head>

<body>
	<div id="container">
		<main>
			<p id=msg>{$msg}</p><br/>
			<form method=post action={$action}>
			<div id='forgot'>
				<button onclick="goBack()">Go Back</button>
				</div> <br/><br/>
				<label>Dankuwel voor uw bezoek</label>
				<label>Vergeet mij</label>
				<input type=checkbox name=persist>
				<input type=submit name='submit' value="Logout" class=submit>
				<div class=clearfix></div>
			</form>
		</main>
		<footer>
			<script language="javascript">
				document.write(copyRight("Zibe"));
				function goBack() {
					window.history.back();
				}
			</script>
		</footer>
	</div>
</body>

</html>