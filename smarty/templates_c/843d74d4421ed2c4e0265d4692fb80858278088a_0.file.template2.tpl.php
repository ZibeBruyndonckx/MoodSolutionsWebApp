<?php
/* Smarty version 3.1.31, created on 2024-01-16 12:58:37
  from "C:\MAMP\htdocs\oefD2\oef2_16_1_24\smarty\templates\template2.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_65a67d7dea6219_82052597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '843d74d4421ed2c4e0265d4692fb80858278088a' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\oefD2\\oef2_16_1_24\\smarty\\templates\\template2.tpl',
      1 => 1705409908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a67d7dea6219_82052597 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title> <?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? "Test" : $tmp);?>
 </title>
</head>
<body>
<h1>Lesgever:</h1>
<table width="80%" border="1">
<tr>
<td width="30%"><h3>Naam &amp; Voornaam :</h3></td>
<td width="40%"><h3> <?php echo $_smarty_tpl->tpl_vars['naam']->value;?>
 </h3></td>
<td width="40%"><h3> <?php echo $_smarty_tpl->tpl_vars['voornaam']->value;?>
 </h3></td>
</tr>
<tr>
<td><h3>Cursus:</h3></td>
<td colspan="2"><h3> <?php echo $_smarty_tpl->tpl_vars['cursus']->value;?>
 </h3></td>
</tr>
</table>
</body>
</html><?php }
}
