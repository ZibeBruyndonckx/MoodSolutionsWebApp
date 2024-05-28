<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" href="../img/MOOD_Logo_small.jpg" type="image/jpg">
	<link rel="stylesheet" href="../css/login.css">
	<script src="../js_lib/copyright.js"></script>
	<title>Reset paswoord</title>
</head>

<body>
	<div id="container">
		<main>
			<p id=msg>{$msg}</p><br/>
			<form method="post" action="{$action}?email={$email}">
				<label>Paswoord:</label>
				<input type=password name=paswoord>
            <label>Confirm Paswoord:</label>
				<input type=password name=confirmPaswoord>
				<input type=submit name='submit' value="Reset paswoord" class=submit>
				<div class=clearfix></div>
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