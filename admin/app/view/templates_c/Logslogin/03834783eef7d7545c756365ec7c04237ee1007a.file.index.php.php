<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 13:49:08
         compiled from "app/view/templates/Logslogin/index.php" */ ?>
<?php /*%%SmartyHeaderCode:43413021650fd6374500002-01668020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03834783eef7d7545c756365ec7c04237ee1007a' => 
    array (
      0 => 'app/view/templates/Logslogin/index.php',
      1 => 1358782721,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43413021650fd6374500002-01668020',
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
    'logs_login' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd63746105c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd63746105c')) {function content_50fd63746105c($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][62])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
logslogin')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
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
						<th width="15%">Data</th>
						<th width="15%">Hora</th>
						<th width="40%">Usuário</th>
						<th width="30%">IP</th>
					</tr>
				</thead>

				<tbody>
					<?php  $_smarty_tpl->tpl_vars['logs_login'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['logs_login']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_logs_login']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['logs_login']->key => $_smarty_tpl->tpl_vars['logs_login']->value){
$_smarty_tpl->tpl_vars['logs_login']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['logs_login']->value['data_login'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['logs_login']->value['hora_login'];?>
</td>
							<td>
							<?php if ($_smarty_tpl->tpl_vars['logs_login']->value['Usuarios']['txt_nome']!=''){?>
								<?php echo $_smarty_tpl->tpl_vars['logs_login']->value['Usuarios']['txt_nome'];?>

							<?php }else{ ?>
								<i>Registro excluído</i>
							<?php }?></td>
							<td><?php echo $_smarty_tpl->tpl_vars['logs_login']->value['num_ip'];?>
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