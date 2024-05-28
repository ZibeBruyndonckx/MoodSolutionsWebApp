<?php
/* Smarty version 3.1.31, created on 2019-01-16 19:07:46
  from "/Applications/MAMP/htdocs/webo/B_php/php11_TTVA_2/smarty/templates/basisAppl.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5c3f72f23f90d9_55400528',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37444eaa5cddc9e4ff928bc3634de7ac98cde3a5' => 
    array (
      0 => '/Applications/MAMP/htdocs/webo/B_php/php11_TTVA_2/smarty/templates/basisAppl.tpl',
      1 => 1546528964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5c3f72f23f90d9_55400528 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="../css/basisAppl.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
 type="text/javascript" src="../js_lib/copyright.js"><?php echo '</script'; ?>
>

<title>Basis applicatie</title>
</head>

<body>
<div id="mainbox">
	<header>
		<img src="../images/basis.png"  height="100%" alt="Basis applicatie"/>
		<p>Applicatie</p>
	</header>
	<nav>
		<ul>
		     <?php
$__section_teller_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_teller']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller'] : false;
$__section_teller_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['menu']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_teller_0_total = $__section_teller_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = new Smarty_Variable(array());
if ($__section_teller_0_total != 0) {
for ($__section_teller_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] = 0; $__section_teller_0_iteration <= $__section_teller_0_total; $__section_teller_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']++){
?>
          <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'];?>

            	</a>
          </li>
     <?php
}
}
if ($__section_teller_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = $__section_teller_0_saved;
}
?>
		</ul> 
	</nav>
  
	<main>
		<article id="artMain">
		
			<?php echo $_smarty_tpl->tpl_vars['output']->value;?>

		</article>
	</main>
  
	<footer>
		<?php echo '<script'; ?>
 language="javascript">	document.write(copyRight("webontwikkeling.info"));
		<?php echo '</script'; ?>
>
	</footer>
  
</div>

</body>
</html>
<?php }
}
