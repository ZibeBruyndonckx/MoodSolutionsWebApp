<?php
/* Smarty version 3.1.31, created on 2024-01-23 10:29:52
  from "C:\MAMP\htdocs\oefD2\oef2_16_1_24\smarty\templates\template1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_65af9520c94c49_88051658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a53d6c64a7f29f879dfbe07ae45df66f60afd2c6' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\oefD2\\oef2_16_1_24\\smarty\\templates\\template1.tpl',
      1 => 1706005775,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65af9520c94c49_88051658 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <title>test</title>
</head>
<body>
    <h1>Vind naam van postcode</h1>
    <form method="POST" action="main.php">
        <label for="postal_code">Enter postcode:</label>
        <input type="text" name="postal_code" id="postal_code">
        <input type="submit" name="submit" value="Search">
    </form>

    <?php if ($_smarty_tpl->tpl_vars['municipality']->value) {?>
        <p>Postcode: <?php echo $_smarty_tpl->tpl_vars['postalCode']->value;?>
 - Gemeente: <?php echo $_smarty_tpl->tpl_vars['municipality']->value;?>
</p>
    <?php } else { ?>
        <p>Gemeente niet gevonden: <?php echo $_smarty_tpl->tpl_vars['postalCode']->value;?>
</p>
    <?php }?>
</body>
</html>
<?php }
}
