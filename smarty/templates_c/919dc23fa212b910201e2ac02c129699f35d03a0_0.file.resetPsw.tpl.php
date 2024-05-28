<?php
/* Smarty version 3.1.31, created on 2024-05-07 13:36:15
  from "C:\MAMP\htdocs\EindProjectZibe\smarty\templates\resetPsw.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_663a2e4f8d14b5_08035206',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '919dc23fa212b910201e2ac02c129699f35d03a0' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\EindProjectZibe\\smarty\\templates\\resetPsw.tpl',
      1 => 1715088073,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_663a2e4f8d14b5_08035206 (Smarty_Internal_Template $_smarty_tpl) {
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
	<title>Reset paswoord</title>
</head>

<body>
	<div id="container">
		<main>
			<p id=msg><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p><br/>
			<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
?email=<?php echo $_smarty_tpl->tpl_vars['email']->value;?>
">
				<label>Paswoord:</label>
				<input type=password name=paswoord>
            <label>Confirm Paswoord:</label>
				<input type=password name=confirmPaswoord>
				<input type=submit name='submit' value="Reset paswoord" class=submit>
				<div class=clearfix></div>
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
