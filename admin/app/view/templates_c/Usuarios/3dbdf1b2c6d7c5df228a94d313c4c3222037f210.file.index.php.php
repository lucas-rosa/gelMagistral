<?php /* Smarty version Smarty-3.1.1, created on 2012-12-13 17:47:07
         compiled from "app/view/templates/Usuarios/index.php" */ ?>
<?php /*%%SmartyHeaderCode:139342731450ca30bb554cb6-59960682%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3dbdf1b2c6d7c5df228a94d313c4c3222037f210' => 
    array (
      0 => 'app/view/templates/Usuarios/index.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139342731450ca30bb554cb6-59960682',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_usuario' => 0,
    'params' => 0,
    'usuario' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50ca30bb73097',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ca30bb73097')) {function content_50ca30bb73097($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
	
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][8])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][32])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][10])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">			
		<?php if ($_smarty_tpl->tpl_vars['dados_usuario']->value!==false){?>
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
			
			<table class="datatable">
				<thead>
					<tr>
						<th width="20%">Nome</th>
						<th width="20%">E-mail</th>
						<th width="20%">Login</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
				
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['usuario'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['usuario']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_usuario']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->key => $_smarty_tpl->tpl_vars['usuario']->value){
$_smarty_tpl->tpl_vars['usuario']->_loop = true;
?>
					<tr>
						<td width="20%"><?php echo $_smarty_tpl->tpl_vars['usuario']->value['txt_nome'];?>
</td>
						<td width="20%"><?php echo $_smarty_tpl->tpl_vars['usuario']->value['txt_email'];?>
</td>
						<td width="20%"><?php echo $_smarty_tpl->tpl_vars['usuario']->value['txt_login'];?>
</td>
						<td width="10%">
							<ul class="actions">
								<?php if (isset($_SESSION['UserPermissoes'][10])){?>
									<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/editar/id/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['cod_id'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
">editar</a></li>
								<?php }?>
									
								<?php if (isset($_SESSION['UserPermissoes'][9])){?>
									<li><a class="delete" onclick="javascript:exclusao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/excluir/id/<?php echo $_smarty_tpl->tpl_vars['usuario']->value['cod_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[9];?>
')" rel="tooltip" original-title="Excluir registro">excluir</a></li>
								<?php }?>
							</ul>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
						
			<?php }else{ ?>
			<div class="notification error">
				<p>
					<strong>Registro n&atilde;o encontrado.</strong>
				</p>
			</div>
			<?php }?>
		</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>