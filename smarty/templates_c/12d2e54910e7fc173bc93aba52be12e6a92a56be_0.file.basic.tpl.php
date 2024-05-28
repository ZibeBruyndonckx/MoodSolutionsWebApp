<?php
/* Smarty version 3.1.31, created on 2024-05-27 19:16:12
  from "C:\MAMP\htdocs\EindProjectZibe\smarty\templates\basic.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6654dbfca24ed7_94608108',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12d2e54910e7fc173bc93aba52be12e6a92a56be' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\EindProjectZibe\\smarty\\templates\\basic.tpl',
      1 => 1716832266,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6654dbfca24ed7_94608108 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link href="../css/basic.css" rel="stylesheet" type="text/css">
<?php echo '<script'; ?>
 type="text/javascript" src="../js_lib/copyright.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../js_lib/popUp.js"><?php echo '</script'; ?>
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
<link rel="icon" href="../img/MOOD_Logo_small.jpg" type="image/jpg">
<title>Mood</title>
</head>

<body>
<div id="container">
	<header>
		<img src="../img/MOOD_Logo_big.png"  height="150px" alt="Logo of Mood Solutions"/>
		<h1>Mood Solutions</h1>
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
	<?php if ($_smarty_tpl->tpl_vars['userInfoDisplay']->value[0]) {?> <h2><?php echo $_smarty_tpl->tpl_vars['userInfoDisplay']->value[1];?>
</h2> 
		<img onclick="popUp('upload_pfp.php')" src="<?php echo $_smarty_tpl->tpl_vars['userInfoDisplay']->value[2];?>
" height="100px" style="border-radius: 50%;" alt="User profile picture"/>
		<img id="settingsBtn" onclick="popUp('upload_settings.php')" src="../img/settingsIcon.png" height="35px" alt="Settings"/>
	<?php }?>
	</header>
  
	<main>
		<?php echo $_smarty_tpl->tpl_vars['inhoud']->value;?>

	</main>
  
	<footer>
		<?php echo '<script'; ?>
>
			document.write(copyRight("Zibe"));
		<?php echo '</script'; ?>
>
	</footer>
  
</div>

</body>
</html><?php }
}
