<?php
/* Smarty version 3.1.31, created on 2024-03-19 15:19:49
  from "C:\MAMP\htdocs\setups\_SetupTT\smarty\templates\logon.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_65f9ad151e8133_63379744',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8921cfbe470a49d3d203c5b1710d3296c18cb873' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\setups\\_SetupTT\\smarty\\templates\\logon.tpl',
      1 => 1709641982,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65f9ad151e8133_63379744 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="../css/logon.css">
	<?php echo '<script'; ?>
 src="../js_lib/copyright.js"><?php echo '</script'; ?>
>
	<title>AAA</title>
</head>

<body>
	<div id="mainbox">
		<main>
			<p id=msg><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
			<form method=post action=<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
>
				<label>Logon-id</label>
				<input type=text name=logon>
				<label>Paswoord</label>
				<input type=password name=paswoord>
				<label>Permanent<br>(8 hours)</label>
				<input type=checkbox name=persist>
				<input type=submit name='submit' value=Verzenden class=submit>
				<div class=clearfix></div>
				<div id='vergeten'>
				<a href=../scripts/P_vergeten.php>Paswoord Vergeten?</a>
				</div>
			</form>
		</main>
		<footer>
			<?php echo '<script'; ?>
 language="javascript">
				document.write(copyRight("zibe"));

			<?php echo '</script'; ?>
>
		</footer>
	</div>
</body>

</html>
<?php }
}
