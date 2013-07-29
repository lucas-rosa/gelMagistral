<?php /* Smarty version Smarty-3.1.1, created on 2013-01-23 15:57:20
         compiled from "app/view/templates/Cadastro/index.php" */ ?>
<?php /*%%SmartyHeaderCode:23731634851002480a51db7-18800347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6d7ac055aff8885ede1acc98c0a7f865aa7d69f' => 
    array (
      0 => 'app/view/templates/Cadastro/index.php',
      1 => 1358851280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23731634851002480a51db7-18800347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_cadastro' => 0,
    'params' => 0,
    'cadastro' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_51002480ca466',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51002480ca466')) {function content_51002480ca466($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][43])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][44])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][56])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/exportar')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[53];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[53];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][45])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_cadastro']->value!==false){?>
			<?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])&&$_smarty_tpl->tpl_vars['params']->value['sucesso']==true){?>
				<div class="notification success">
					<a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
					<p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
				</div>
			<?php }?>
			
			<?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])&&$_smarty_tpl->tpl_vars['params']->value['erro']==true){?>
				<div class="notification error">
					<a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
					<p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
				</div>
			<?php }?>

			<table class="datatable" id="first-desc">
				<thead>
					<tr>
						<th width="10%">Data</th>
						<th width="10%">Hora</th>
						<th width="34%">Nome</th>
						<th width="10%">E-mail</th>
						<th width="30%">Comentário</th>
						<th width="6%">&nbsp;</th>
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
							<td><?php echo $_smarty_tpl->tpl_vars['cadastro']->value['txt_comentario'];?>
</td>
							<td>
								<ul class="actions">
									<?php if (isset($_SESSION['UserPermissoes'][44])){?>
										<li><a class="view" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/detalhes/cod_id/<?php echo $_smarty_tpl->tpl_vars['cadastro']->value['cod_id'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
									<?php }?>
									
									<?php if (isset($_SESSION['UserPermissoes'][45])){?>
										<li><a class="edit"	href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/editar/cod_id/<?php echo $_smarty_tpl->tpl_vars['cadastro']->value['cod_id'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
									<?php }?>
										
									<?php if (isset($_SESSION['UserPermissoes'][46])){?>
										<li><a class="delete" onclick="javascript:exclusao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/excluir/cod_id/<?php echo $_smarty_tpl->tpl_vars['cadastro']->value['cod_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[9];?>
')" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[49];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[49];?>
</a></li>
									<?php }?>
								</ul>
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