<?php
/* Smarty version 3.1.31, created on 2022-03-17 09:45:32
  from "/Users/micky/Documents/www/webo/C_Applicaties/APP_05_text_manipulatie/smarty/templates/content.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6233033c1208d1_98887735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74d4dc2bcfdd9ec2a50a7cd0e56a84c4db4fdb5c' => 
    array (
      0 => '/Users/micky/Documents/www/webo/C_Applicaties/APP_05_text_manipulatie/smarty/templates/content.tpl',
      1 => 1522154988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6233033c1208d1_98887735 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="nl">

<head>
	<meta charset="UTF-8">
	<link href="../css/content.css" rel="stylesheet" type="text/css">
	<?php echo '<script'; ?>
 src="../js_lib/copyright.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="../ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
	<title>ledenadmin - more info</title>
</head>

<body>
	<div id="wrapper">
		<main>
			<?php echo $_smarty_tpl->tpl_vars['inhoud']->value;?>

			<input type='button' value='Venster sluiten' onclick='window.close()'>
		</main>
		<footer>
			<?php echo '<script'; ?>
>
				document.write(copyRight("webontwikkeling.info"));

			<?php echo '</script'; ?>
>
		</footer>
	</div>
</body>

</html>
<?php }
}
