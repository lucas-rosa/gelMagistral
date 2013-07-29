<?php /* Smarty version Smarty-3.1.1, created on 2012-12-13 17:47:09
         compiled from "app/view/templates/Usuarios/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:177289913250ca30bd38f1f1-68258832%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1adac8975cd5130699e2a0b2442bbec994bb9ff5' => 
    array (
      0 => 'app/view/templates/Usuarios/editar.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177289913250ca30bd38f1f1-68258832',
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
    'array_status' => 0,
    'status' => 0,
    'permissoes' => 0,
    'perm' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50ca30bd5d60a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ca30bd5d60a')) {function content_50ca30bd5d60a($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<header>
	<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
	<nav>
		<ul class="tab-switch">
			<?php if (isset($_SESSION['UserPermissoes'][8])){?>
				<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
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
				<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
			<?php }?>
		</ul>
	</nav>
</header>

<div class="tab default-tab" id="tab0">
	<form name="frm_usuario" id="frm_usuario" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/editar', 'frm_usuario', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
	<!--<form name="frm_usuario" id="frm_usuario" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios/editar">-->
		<fieldset>
			<legend>Dados do registro</legend>
			<dl>
				<dt>
					<label>Nome</label>
				</dt>
				<dd>
					<input type="text" name="txt_nome" id="txt_nome" value="<?php echo $_smarty_tpl->tpl_vars['dados_usuario']->value['txt_nome'];?>
" class="medium" maxlength="60" />
					<div id="msg_txt_nome" class="msg_erro"></div>
					<p>Preenchimento obrigat&oacute;rio.</p>
				</dd>

				<dt>
					<label>E-mail</label>
				</dt>
				<dd>
					<input type="text" name="txt_email" id="txt_email" value="<?php echo $_smarty_tpl->tpl_vars['dados_usuario']->value['txt_email'];?>
" class="medium" maxlength="255" />
					<div id="msg_txt_email" class="msg_erro"></div>
					<p>Preenchimento obrigat&oacute;rio.</p>
				</dd>

				<dt>
					<label>Login</label>
				</dt>
				<dd>
					<input type="text" name="txt_login" id="txt_login" value="<?php echo $_smarty_tpl->tpl_vars['dados_usuario']->value['txt_login'];?>
" class="medium" maxlength="20" />
					<div id="msg_txt_login" class="msg_erro"></div>
					<p>Preenchimento obrigat&oacute;rio.</p>
				</dd>

				<dt>
					<label>Status</label>
				</dt>
				<dd>
					<select name="cod_status" id="cod_status">
						<option value=""><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
</option>
						<?php  $_smarty_tpl->tpl_vars['status'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['status']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['array_status']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['status']->key => $_smarty_tpl->tpl_vars['status']->value){
$_smarty_tpl->tpl_vars['status']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['status']->value['cod_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['dados_usuario']->value['cod_status']==$_smarty_tpl->tpl_vars['status']->value['cod_id']){?> selected="selected"<?php }?>"><?php echo $_smarty_tpl->tpl_vars['status']->value['txt_descricao'];?>
</option>
						<?php } ?>
					</select>
					<div id="msg_cod_status" class="msg_erro"></div>
					<p>Preenchimento obrigat&oacute;rio.</p>
				</dd>

				<dt>
					<label>Alterar a senha?</label>
				</dt>
				<dd>
					<input type="checkbox" name="check_senha" id="check_senha" value="S" onclick="checkSenha()" />
				</dd>

				<div id="senhas" style="display: none;">
					<dt>
						<label>Senha</label>
					</dt>
					<dd>
						<input type="password" name="txt_senha" id="txt_senha" class="medium" maxlength="255" disabled="disabled" />
						<div id="msg_txt_senha" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio (se checkbox marcado).</p>
					</dd>

					<dt>
						<label>Confirmar a senha</label>
					</dt>
					<dd>
						<input type="password" name="txt_confirma_senha" id="txt_confirma_senha" class="medium" maxlength="255" disabled="disabled" />
						<div id="msg_txt_confirma_senha" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio (se checkbox marcado).</p>
					</dd>
				</div>
				
				<dt>
					<label>Permissões</label>
				</dt>
				<dd>
					<?php  $_smarty_tpl->tpl_vars['perm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['perm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['permissoes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['perm']->key => $_smarty_tpl->tpl_vars['perm']->value){
$_smarty_tpl->tpl_vars['perm']->_loop = true;
?>
						<?php if (isset($_smarty_tpl->tpl_vars['perm']->value['PermissaoUsuario'][0])){?>
							<input type="checkbox" checked name="permissao[]" value="<?php echo $_smarty_tpl->tpl_vars['perm']->value['cod_id'];?>
" />
							<strong>Controller:</strong><?php echo $_smarty_tpl->tpl_vars['perm']->value['FrameworkControllers']['txt_nome_amigavel'];?>
<strong>Ação:</strong><?php echo $_smarty_tpl->tpl_vars['perm']->value['FrameworkAcoes']['txt_nome_amigavel'];?>
<br> <br>
						<?php }else{ ?>
							<input type="checkbox" name="permissao[]" value="<?php echo $_smarty_tpl->tpl_vars['perm']->value['cod_id'];?>
" />
							<strong>Controller:</strong><?php echo $_smarty_tpl->tpl_vars['perm']->value['FrameworkControllers']['txt_nome_amigavel'];?>
<strong>Ação:</strong><?php echo $_smarty_tpl->tpl_vars['perm']->value['FrameworkAcoes']['txt_nome_amigavel'];?>
<br> <br>
						<?php }?>
					<?php } ?>
				</dd>
			</dl>
		</fieldset>

		<button type="submit" id="btn_enviar" class="gray" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
		&nbsp;ou&nbsp;
		<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
		<input type="hidden" name="cod_id" id="cod_id" value="<?php echo $_smarty_tpl->tpl_vars['dados_usuario']->value['cod_id'];?>
" />
	</form>
</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>