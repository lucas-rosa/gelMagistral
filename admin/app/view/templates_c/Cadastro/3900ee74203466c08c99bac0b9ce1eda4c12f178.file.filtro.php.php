<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 15:11:29
         compiled from "app/view/templates/Cadastro/filtro.php" */ ?>
<?php /*%%SmartyHeaderCode:198376682950fec8413e8128-75526321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3900ee74203466c08c99bac0b9ce1eda4c12f178' => 
    array (
      0 => 'app/view/templates/Cadastro/filtro.php',
      1 => 1358870907,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198376682950fec8413e8128-75526321',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'dados_cadastro' => 0,
    'cadastro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fec84147578',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fec84147578')) {function content_50fec84147578($_smarty_tpl) {?><table class="datatable">
	<thead>
		<tr>
			<th width="20%">Data</th>
			<th width="20%">Hora</th>
			<th width="40%">Nome</th>
			<th width="20%">E-mail</th>
		</tr>
	</thead>

	<tbody>
		<?php  $_smarty_tpl->tpl_vars['cadastro'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cadastro']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_cadastro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cadastro']->key => $_smarty_tpl->tpl_vars['cadastro']->value){
$_smarty_tpl->tpl_vars['cadastro']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['cadastro']->value['dat_cadastro'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['cadastro']->value['hora_cadastro'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['cadastro']->value['txt_nome'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['cadastro']->value['txt_email'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>