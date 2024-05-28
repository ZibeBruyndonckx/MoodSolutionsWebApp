<?php
/* Smarty version 3.1.31, created on 2017-01-31 16:18:25
  from "/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/template1C.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5890aac1b0d417_99567014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '415469262c7ee117f32d84abb33c1f5e3d231bf7' => 
    array (
      0 => '/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/template1C.tpl',
      1 => 1485875905,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5890aac1b0d417_99567014 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"mijn_layout"), 0, false);
?>


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

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
