<?php
/* Smarty version 3.1.31, created on 2022-01-31 07:29:04
  from "/Users/micky/Documents/www/webo/B_PHP/PHP_11_basis_applicatie_deel_1/smarty/templates/basisAppl.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_61f78fc090eab1_84276538',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fae3bbce0751a9cec506ea474e0d51ab3df53c70' => 
    array (
      0 => '/Users/micky/Documents/www/webo/B_PHP/PHP_11_basis_applicatie_deel_1/smarty/templates/basisAppl.tpl',
      1 => 1643108915,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61f78fc090eab1_84276538 (Smarty_Internal_Template $_smarty_tpl) {
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
