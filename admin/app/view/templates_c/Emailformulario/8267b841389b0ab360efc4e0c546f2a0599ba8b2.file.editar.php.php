<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 09:41:20
         compiled from "app/view/templates/Emailformulario/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:200423407950fd29603554b0-86941576%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8267b841389b0ab360efc4e0c546f2a0599ba8b2' => 
    array (
      0 => 'app/view/templates/Emailformulario/editar.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '200423407950fd29603554b0-86941576',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_emailformulario' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd29604e32c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd29604e32c')) {function content_50fd29604e32c($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
	<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][58])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][59])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][60])){?>	
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_emailformulario']->value!==false&&isset($_smarty_tpl->tpl_vars['dados_emailformulario']->value)){?>
			<form name="frm_email" id="frm_email" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario/editar', 'frm_email', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
			<!--<form name="frm_email" id="frm_email" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario/editar">-->
				<fieldset>
					<legend>Dados do E-mail</legend>
					<dl>
						<dt>
							<label>E-mail</label>
						</dt>
		
						<dd>
							<input type="text" name="txt_email" id="txt_email" value="<?php echo $_smarty_tpl->tpl_vars['dados_emailformulario']->value['txt_email'];?>
" class="small" />
							<div id="msg_txt_email" class="msg_erro"></div>
							<p>Preenchimento obrigat&oacute;rio.</p>
						</dd>
		
						<dt>
							<label>Nome do Formulário</label>
						</dt>
						<dd>
							<input type="text" name="txt_formulario" id="txt_formulario" value="<?php echo $_smarty_tpl->tpl_vars['dados_emailformulario']->value['txt_formulario'];?>
" class="small" />
							<div id="msg_txt_formulario" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Conversão</label>
						</dt>
						<dd>
							<textarea type="text" name="txt_conversao" id="txt_conversao"><?php echo $_smarty_tpl->tpl_vars['dados_emailformulario']->value['txt_conversao'];?>
</textarea>
						</dd>
					</dl>
				</fieldset>
				
				<input type="hidden" name="cod_id" id="cod_id" value="<?php echo $_smarty_tpl->tpl_vars['dados_emailformulario']->value['cod_id'];?>
" />
				
				<button type="submit" id="btn_enviar" class="blue" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
				&nbsp;ou&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
			</form>
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario')" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
		<?php }?>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>