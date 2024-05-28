<?php
/* Smarty version 3.1.31, created on 2024-05-02 15:32:34
  from "C:\MAMP\htdocs\EindProjectZibe\smarty\templates\forgotLogin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6633b2125f9fa6_83886168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c30fe0be6e91e9f9d58846f1526b3d9a3cadbc1c' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\EindProjectZibe\\smarty\\templates\\forgotLogin.tpl',
      1 => 1714485991,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6633b2125f9fa6_83886168 (Smarty_Internal_Template $_smarty_tpl) {
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
	<title>Forgot login</title>
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
				<input type=submit name='submit' value="Stuur mail" class=submit>
				<div class=clearfix></div>
				<div id='forgot'>
				<a href=../scripts/Account_login.php>Log in</a>
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
