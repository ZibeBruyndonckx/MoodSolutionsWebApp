<?php
/* Smarty version 3.1.31, created on 2024-02-05 15:22:07
  from "C:\MAMP\htdocs\_Setup\smarty\templates\basisAppl.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_65c0ef0f8eafb4_39343505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1016425657a99e3852f359136b25ad898b2a0d6' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\_Setup\\smarty\\templates\\basisAppl.tpl',
      1 => 1707142920,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c0ef0f8eafb4_39343505 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="../css/styleBasis.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
 src="../js_lib/copyright.js"><?php echo '</script'; ?>
>

<title>Basic Applicatie</title>
</head>

<body>
<div id="container">
	<header>
		<img src="../images/basis.png"  height="95%" alt="Basic Applicatie"/>
		<p> Applicatie</p>
	</header>
  
	<main>
		<article>
			<?php echo $_smarty_tpl->tpl_vars['output']->value;?>

		</article>
	</main>
  
	<footer>
		<?php echo '<script'; ?>
>
  let nu = new Date();
  let copyright_string = '&copy; ' + nu.getFullYear() + ' Zibe';
  document.write(copyright_string); <?php echo '</script'; ?>
>
	</footer>  
</div>

</body>
</html>
<?php }
}
