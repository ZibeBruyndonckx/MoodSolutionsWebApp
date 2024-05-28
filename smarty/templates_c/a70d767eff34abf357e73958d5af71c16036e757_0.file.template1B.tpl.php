<?php
/* Smarty version 3.1.31, created on 2017-01-31 16:05:31
  from "/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/template1B.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5890a7bb8119e6_64635099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a70d767eff34abf357e73958d5af71c16036e757' => 
    array (
      0 => '/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/template1B.tpl',
      1 => 1485875131,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5890a7bb8119e6_64635099 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Template 1</title>
</head>

<body>

<h1>Lesgever:</h1>
<table width="100%" border="1">
  <tr>
    <td width="30%"><h3>Naam &amp; Voornaam :</h3></td>
    <td width="40%"><h3><?php echo $_smarty_tpl->tpl_vars['naam']->value;?>
</h3></td>
    <td width="40%"><h3><?php echo $_smarty_tpl->tpl_vars['voornaam']->value;?>
</h3></td>
  </tr>
  <tr>
    <td><h3>Cursus:</h3></td>
    <td colspan="2"><h3><?php echo $_smarty_tpl->tpl_vars['cursus']->value;?>
 </h3></td>
  </tr>
</table>

  
</body>
</html>
<?php }
}
