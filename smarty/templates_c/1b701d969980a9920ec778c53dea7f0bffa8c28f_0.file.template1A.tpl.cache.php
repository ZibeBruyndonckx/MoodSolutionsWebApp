<?php
/* Smarty version 3.1.31, created on 2017-01-17 10:25:54
  from "/Applications/MAMP/htdocs/webo/B_php/smarty-test/smarty/templates/template1A.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_587de32234fe65_07257491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b701d969980a9920ec778c53dea7f0bffa8c28f' => 
    array (
      0 => '/Applications/MAMP/htdocs/webo/B_php/smarty-test/smarty/templates/template1A.tpl',
      1 => 1453366935,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587de32234fe65_07257491 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2048197998587de3222e7791_64847182';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Template 1</title>
</head>

<body>

<h1>Lesgever:</h1>
<p>

Naam & Voornaam : <?php echo $_smarty_tpl->tpl_vars['naam']->value;?>
 &nbsp;<?php echo $_smarty_tpl->tpl_vars['voornaam']->value;?>
<br>
Cursus: <?php echo $_smarty_tpl->tpl_vars['cursus']->value;?>
<br>
</p>
</body>
</html>
<?php }
}
