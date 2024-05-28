<?php
/* Smarty version 3.1.31, created on 2017-01-17 15:27:48
  from "/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/cursisten.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_587e29e4eff284_67403846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9063c5fdee3e27fd97d070508bf79838b5b069f8' => 
    array (
      0 => '/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/cursisten.tpl',
      1 => 1484663206,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587e29e4eff284_67403846 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '1047453597587e29e4eae995_69641284';
?>
<!DOCTYPE html>
<html  lang="nl">
<head>
<meta charset='UTF-8'>
<link rel='stylesheet' href='../css/cursisten.css'>
<?php echo '<script'; ?>
  src="../js_lib/copyright.js"><?php echo '</script'; ?>
>

<title>Smarty en Cursisten</title>
</head>

<body>
<div id='wrapper'>
	<header>
		<img src='../images/webontwikkeling.jpeg'  height=100% alt='webontwikkeling'>
		<h1>Web-ontwikkeling</h1>
	</header>
	<main>
	  <?php echo $_smarty_tpl->tpl_vars['inhoud']->value;?>

	</main>
  
	<footer>
	
		<?php echo '<script'; ?>
>
    
			document.write(copyRight('webontwikkeling.info'));
		<?php echo '</script'; ?>
>
		
	</footer>
  
</div>

</body>
</html>
<?php }
}
