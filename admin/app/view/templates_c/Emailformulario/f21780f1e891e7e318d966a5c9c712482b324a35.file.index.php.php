<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 09:42:00
         compiled from "app/view/templates/Emailformulario/index.php" */ ?>
<?php /*%%SmartyHeaderCode:172658819450fd29881e6063-82816151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f21780f1e891e7e318d966a5c9c712482b324a35' => 
    array (
      0 => 'app/view/templates/Emailformulario/index.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172658819450fd29881e6063-82816151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_email_formulario' => 0,
    'params' => 0,
    'email_formulario' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd29883aa49',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd29883aa49')) {function content_50fd29883aa49($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][58])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][59])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][60])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_email_formulario']->value!==false){?>
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
						<th width="40%">E-mail</th>
						<th width="50%">Formulário</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
				
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['email_formulario'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['email_formulario']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_email_formulario']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['email_formulario']->key => $_smarty_tpl->tpl_vars['email_formulario']->value){
$_smarty_tpl->tpl_vars['email_formulario']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['email_formulario']->value['txt_email'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['email_formulario']->value['txt_formulario'];?>
</td>
							<td>
								<ul class="actions">
									<?php if (isset($_SESSION['UserPermissoes'][51])){?>
										<li><a class="view" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario/detalhes/cod_id/<?php echo $_smarty_tpl->tpl_vars['email_formulario']->value['cod_id'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
									<?php }?>
									
									<?php if (isset($_SESSION['UserPermissoes'][51])){?>
										<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario/editar/cod_id/<?php echo $_smarty_tpl->tpl_vars['email_formulario']->value['cod_id'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
									<?php }?>
								</ul>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php }else{ ?>
			<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[24];?>

		<?php }?>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>