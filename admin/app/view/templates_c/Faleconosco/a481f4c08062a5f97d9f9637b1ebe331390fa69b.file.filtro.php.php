<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 16:34:09
         compiled from "app/view/templates/Faleconosco/filtro.php" */ ?>
<?php /*%%SmartyHeaderCode:83763066250fedba159a121-48035094%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a481f4c08062a5f97d9f9637b1ebe331390fa69b' => 
    array (
      0 => 'app/view/templates/Faleconosco/filtro.php',
      1 => 1358878482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83763066250fedba159a121-48035094',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dados_fale_conosco' => 0,
    'fale_conosco' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fedba1631c9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fedba1631c9')) {function content_50fedba1631c9($_smarty_tpl) {?><table class="datatable">
	<thead>
		<tr>
			<th width="10%">Data</th>
			<th width="10%">Hora</th>
			<th width="20%">Nome</th>
			<th width="40%">E-mail</th>
			<th width="20%">Assunto</th>
		</tr>
	</thead>

	<tbody>
		<?php  $_smarty_tpl->tpl_vars['fale_conosco'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fale_conosco']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_fale_conosco']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fale_conosco']->key => $_smarty_tpl->tpl_vars['fale_conosco']->value){
$_smarty_tpl->tpl_vars['fale_conosco']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['data'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['hora'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['txt_nome'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['txt_email'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['txt_assunto'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>