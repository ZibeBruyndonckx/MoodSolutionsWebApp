<?php
/* Smarty version 3.1.31, created on 2024-03-26 10:47:13
  from "C:\MAMP\htdocs\setups\_SetupTTT\smarty\templates\template1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6602a7b164b406_95146421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a30f267f4d5a0c64ddd73a3c0944b05c1b8adc0' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\setups\\_SetupTTT\\smarty\\templates\\template1.tpl',
      1 => 1711450017,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6602a7b164b406_95146421 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link href="../css/ledenAdmin.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
 type="text/javascript" src="../js_lib/copyright.js"><?php echo '</script'; ?>
>

<?php
$__section_teller_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_teller']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller'] : false;
$__section_teller_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['jsInclude']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_teller_0_total = $__section_teller_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = new Smarty_Variable(array());
if ($__section_teller_0_total != 0) {
for ($__section_teller_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] = 0; $__section_teller_0_iteration <= $__section_teller_0_total; $__section_teller_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']++){
?>
   <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['jsInclude']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)];?>
"><?php echo '</script'; ?>
>
<?php
}
}
if ($__section_teller_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = $__section_teller_0_saved;
}
?>

<title>Leden Administratie</title>
</head>

<body>
<div id="mainbox">
	<header>
		<img src="../images/basis.png"  height="100%" alt="php"/>
		<p>Webo</p>
	</header>

	<nav>
		<ul>
		  <?php
$__section_teller_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_teller']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller'] : false;
$__section_teller_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['menu']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_teller_1_total = $__section_teller_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = new Smarty_Variable(array());
if ($__section_teller_1_total != 0) {
for ($__section_teller_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] = 0; $__section_teller_1_iteration <= $__section_teller_1_total; $__section_teller_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']++){
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_link'];?>
">
         <?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)]['d_item'];?>

        </a></li>
     <?php
}
}
if ($__section_teller_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = $__section_teller_1_saved;
}
?>
		</ul> 
	</nav>
  
	<main>
		<article id="artleft">
			<?php echo (($tmp = @$_smarty_tpl->tpl_vars['commentaar']->value)===null||$tmp==='' ? "<h1>leden-admin</h1>" : $tmp);?>

		</article>
		<article id="artright">
			<?php echo $_smarty_tpl->tpl_vars['inhoud']->value;?>

		</article>
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
