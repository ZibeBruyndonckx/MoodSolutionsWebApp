<?php
/* Smarty version 3.1.31, created on 2024-05-22 19:49:55
  from "C:\MAMP\htdocs\EindProjectZibe\smarty\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_664e4c636f1482_29394555',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '178c65068f2504359c51ad3b2d595748676f0090' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\EindProjectZibe\\smarty\\templates\\login.tpl',
      1 => 1716407351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_664e4c636f1482_29394555 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="icon" href="../img/MOOD_Logo_small.jpg" type="image/jpg">
	<link rel="stylesheet" href="../css/login.css">
	<?php echo '<script'; ?>
 src="../js_lib/copyright.js"><?php echo '</script'; ?>
>
	<title>Login</title>
</head>

<body>
	<div id="container">
		<main>
			<p id=msg><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p><br/>
			<form method=post action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
>
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
			<?php echo '<script'; ?>
 language="javascript">
				document.write(copyRight("Zibe"));

			<?php echo '</script'; ?>
>
		</footer>
	</div>
</body>

</html><?php }
}
