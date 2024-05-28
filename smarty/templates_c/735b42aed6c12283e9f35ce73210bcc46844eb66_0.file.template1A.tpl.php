<?php
/* Smarty version 3.1.31, created on 2017-01-31 16:02:10
  from "/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/template1A.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5890a6f225dd64_02698869',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '735b42aed6c12283e9f35ce73210bcc46844eb66' => 
    array (
      0 => '/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/template1A.tpl',
      1 => 1453366935,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5890a6f225dd64_02698869 (Smarty_Internal_Template $_smarty_tpl) {
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
