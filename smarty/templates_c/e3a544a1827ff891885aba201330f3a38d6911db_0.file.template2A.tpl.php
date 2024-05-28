<?php
/* Smarty version 3.1.31, created on 2017-01-31 16:31:07
  from "/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/template2A.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5890adbb100134_92772712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3a544a1827ff891885aba201330f3a38d6911db' => 
    array (
      0 => '/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/template2A.tpl',
      1 => 1485876662,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5890adbb100134_92772712 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Looping 1"), 0, false);
?>


<h1>Lesgever:</h1>
<table width="80%" border="1">
  <tr>
    <td width="31%"><h3>Naam &amp; Voornaam :</h3></td>
    <td width="32%"><h3><?php echo $_smarty_tpl->tpl_vars['naam']->value;?>
</h3></td>
    <td width="37%"><h3><?php echo $_smarty_tpl->tpl_vars['voornaam']->value;?>
</h3></td>
  </tr>
  <tr>
    <td colspan="3"><h3>Cursussen:</h3></td>
  </tr>
  <?php
$__section_teller_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_teller']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller'] : false;
$__section_teller_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['cursussen']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_teller_0_total = $__section_teller_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = new Smarty_Variable(array());
if ($__section_teller_0_total != 0) {
for ($__section_teller_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] = 0; $__section_teller_0_iteration <= $__section_teller_0_total; $__section_teller_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']++){
?>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><h3>
    
<?php echo $_smarty_tpl->tpl_vars['cursussen']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] : null)];?>
<br />

    </h3></td>
  </tr>
  <?php
}
}
if ($__section_teller_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = $__section_teller_0_saved;
}
?>
</table> 

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
