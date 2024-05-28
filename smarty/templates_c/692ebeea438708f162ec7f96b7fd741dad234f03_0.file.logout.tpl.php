<?php
/* Smarty version 3.1.31, created on 2024-05-12 13:02:07
  from "C:\MAMP\htdocs\EindProjectZibe\smarty\templates\logout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6640bdcf26c178_00105176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '692ebeea438708f162ec7f96b7fd741dad234f03' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\EindProjectZibe\\smarty\\templates\\logout.tpl',
      1 => 1715518890,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6640bdcf26c178_00105176 (Smarty_Internal_Template $_smarty_tpl) {
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
			<?php echo '<script'; ?>
 language="javascript">
				document.write(copyRight("Zibe"));
				function goBack() {
					window.history.back();
				}
			<?php echo '</script'; ?>
>
		</footer>
	</div>
</body>

</html><?php }
}
