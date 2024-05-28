<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link href="../css/basic.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js_lib/copyright.js"></script>
<script type="text/javascript" src="../js_lib/popUp.js"></script>
{section name=teller loop=$jsInclude}
   <script src="{$jsInclude[teller]}"></script>
{/section}
<link rel="icon" href="../img/MOOD_Logo_small.jpg" type="image/jpg">
<title>Mood</title>
</head>

<body>
<div id="container">
	<header>
		<img src="../img/MOOD_Logo_big.png"  height="150px" alt="Logo of Mood Solutions"/>
		<h1>Mood Solutions</h1>
		<nav> 
			<ul>
		  {section name=teller loop=$menu}
        <li><a href="{$menu[teller].d_link}">
         {$menu[teller].d_item}
        </a></li>
     {/section}
		</ul> 
	</nav>
	{if $userInfoDisplay[0]} <h2>{$userInfoDisplay[1]}</h2> 
		<img onclick="popUp('upload_pfp.php')" src="{$userInfoDisplay[2]}" height="100px" style="border-radius: 50%;" alt="User profile picture"/>
		<img id="settingsBtn" onclick="popUp('upload_settings.php')" src="../img/settingsIcon.png" height="35px" alt="Settings"/>
	{/if}
	</header>
  
	<main>
		{$inhoud}
	</main>
  
	<footer>
		<script>
			document.write(copyRight("Zibe"));
		</script>
	</footer>
  
</div>

</body>
</html>