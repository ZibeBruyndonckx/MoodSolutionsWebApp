<?php
/* Smarty version 3.1.31, created on 2017-02-06 09:33:48
  from "/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/template2B.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_589834ecf17d30_91494305',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf6c9ef18c863ce697a8632182b5be39f83ada1e' => 
    array (
      0 => '/Applications/MAMP/htdocs/webo/B_php/php10/smarty/templates/template2B.tpl',
      1 => 1484645948,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_589834ecf17d30_91494305 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Looping 1"), 0, false);
?>


<h1>Lesgever:</h1>
<table width="50%" border="1">
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
$__section_teller_0_start = min(1, $__section_teller_0_loop);
$__section_teller_0_total = min(($__section_teller_0_loop - $__section_teller_0_start), 2);
$_smarty_tpl->tpl_vars['__smarty_section_teller'] = new Smarty_Variable(array());
if ($__section_teller_0_total != 0) {
for ($__section_teller_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index'] = $__section_teller_0_start; $__section_teller_0_iteration <= $__section_teller_0_total; $__section_teller_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_teller']->value['index']++){
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
