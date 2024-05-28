<?php
/* Smarty version 3.1.31, created on 2024-05-02 09:14:28
  from "C:\MAMP\htdocs\EindProjectZibe\smarty\templates\signUp.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_66335974912421_49664027',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '799c9985971e1a99582138778c5070414aa5744c' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\EindProjectZibe\\smarty\\templates\\signUp.tpl',
      1 => 1714486000,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66335974912421_49664027 (Smarty_Internal_Template $_smarty_tpl) {
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
	<title>Sign up</title>
</head>

<body>
	<div id="container">
		<main>
			<p id=msg><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p> <br/>
			<form method=post action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
>
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
