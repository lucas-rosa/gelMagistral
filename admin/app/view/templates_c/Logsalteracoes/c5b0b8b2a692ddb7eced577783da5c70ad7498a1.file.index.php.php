<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 14:11:57
         compiled from "app/view/templates/Logsalteracoes/index.php" */ ?>
<?php /*%%SmartyHeaderCode:36372763750fd68cd649af7-32808506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5b0b8b2a692ddb7eced577783da5c70ad7498a1' => 
    array (
      0 => 'app/view/templates/Logsalteracoes/index.php',
      1 => 1358784714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36372763750fd68cd649af7-32808506',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_logs_login' => 0,
    'dados_logs_alteracoes' => 0,
    'logs_alteracoes' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd68cd78d98',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd68cd78d98')) {function content_50fd68cd78d98($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][63])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
logsalteracoes')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_logs_login']->value!==false){?>
			<table class="datatable" id="first-desc">
				<thead>
					<tr>
						<th width="10%">Data</th>
						<th width="10%">Hora</th>
						<th width="30%">Usuário</th>
						<th width="30%">IP</th>
						<th width="10%">Ação</th>
						<th width="10%">Registro</th>
					</tr>
				</thead>

				<tbody>
					<?php  $_smarty_tpl->tpl_vars['logs_alteracoes'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['logs_alteracoes']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_logs_alteracoes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['logs_alteracoes']->key => $_smarty_tpl->tpl_vars['logs_alteracoes']->value){
$_smarty_tpl->tpl_vars['logs_alteracoes']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['logs_alteracoes']->value['dat_data'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['logs_alteracoes']->value['dat_hora'];?>
</td>
							<td>
							<?php if ($_smarty_tpl->tpl_vars['logs_alteracoes']->value['Usuarios']['txt_nome']!=''){?>
								<?php echo $_smarty_tpl->tpl_vars['logs_alteracoes']->value['Usuarios']['txt_nome'];?>

							<?php }else{ ?>
								<i>Registro excluído</i>
							<?php }?></td>
							<td><?php echo $_smarty_tpl->tpl_vars['logs_alteracoes']->value['num_ip'];?>
</td>
							<td>
							<?php if ($_smarty_tpl->tpl_vars['logs_alteracoes']->value['cha_acao']=='I'){?>
								Incluir
							<?php }elseif($_smarty_tpl->tpl_vars['logs_alteracoes']->value['cha_acao']=='A'){?>
								Editado
							<?php }elseif($_smarty_tpl->tpl_vars['logs_alteracoes']->value['cha_acao']=='X'){?>
								Excluído
							<?php }?>
							</td>
							<td><?php echo $_smarty_tpl->tpl_vars['logs_alteracoes']->value['cod_id'];?>
</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php }else{ ?>
			<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[49];?>

		<?php }?>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>