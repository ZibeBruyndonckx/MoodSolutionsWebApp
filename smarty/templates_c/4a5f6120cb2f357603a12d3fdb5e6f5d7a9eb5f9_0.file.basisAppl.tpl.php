<?php
/* Smarty version 3.1.31, created on 2024-01-30 12:42:26
  from "C:\MAMP\htdocs\oefD2\oef2_16_1_24 copy\smarty\templates\basisAppl.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_65b8eeb220a5e2_58943381',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a5f6120cb2f357603a12d3fdb5e6f5d7a9eb5f9' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\oefD2\\oef2_16_1_24 copy\\smarty\\templates\\basisAppl.tpl',
      1 => 1706618106,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b8eeb220a5e2_58943381 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="../css/basisAppl.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
 src="../js_lib/copyright.js"><?php echo '</script'; ?>
>

<title>Basis applicatie</title>
</head>

<body>
<div id="container">
	<header>
		<img src="../images/basis.png"  height="100%" alt="Basis applicatie"/>
		<p> applicatie</p>
	</header>
  
	<main>
		<article>
			<?php echo $_smarty_tpl->tpl_vars['output']->value;?>

		</article>
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
