<?php /* Smarty version Smarty-3.1.1, created on 2013-01-14 09:13:08
         compiled from "app/view/templates/Permissoes/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:206192038150f3e844011c81-99578787%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7c9bcff277e6d1b56ea596019fb220a490963c6' => 
    array (
      0 => 'app/view/templates/Permissoes/editar.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206192038150f3e844011c81-99578787',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'controller_acao' => 0,
    'contr' => 0,
    'nome_perfil' => 0,
    'cod_perfil' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50f3e8441af97',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f3e8441af97')) {function content_50f3e8441af97($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
				<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['controller_acao']->value!==false&&isset($_smarty_tpl->tpl_vars['controller_acao']->value)){?>
			<form name="frm_conteudo" id="frm_conteudo" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/editar', 'frm_conteudo', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
				<fieldset>
					<legend>Dados de publica&ccedil;&atilde;o</legend>
					<dl>
						<dt>
							<label>Controller e Ação</label>
						</dt>
		
						<dd>
							<?php  $_smarty_tpl->tpl_vars['contr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_acao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contr']->key => $_smarty_tpl->tpl_vars['contr']->value){
$_smarty_tpl->tpl_vars['contr']->_loop = true;
?>
								<?php if (isset($_smarty_tpl->tpl_vars['contr']->value['PermissaoVinculo'][0])){?>
									<input type="checkbox" name="controller_acao[]" id="controller_acao" value="<?php echo $_smarty_tpl->tpl_vars['contr']->value['cod_id'];?>
" checked="checked" />
								<?php }else{ ?>
									<input type="checkbox" name="controller_acao[]" id="controller_acao" value="<?php echo $_smarty_tpl->tpl_vars['contr']->value['cod_id'];?>
" />
								<?php }?>
								
								<b>Controller:</b>
								<?php echo $_smarty_tpl->tpl_vars['contr']->value['FrameworkControllers']['txt_nome_amigavel'];?>

								<b>Ação:</b>
								<?php echo $_smarty_tpl->tpl_vars['contr']->value['FrameworkAcoes']['txt_nome_amigavel'];?>
 <br />
							<?php } ?>
						</dd>
		
						<dt>
							<label>Nome do perfil</label>
						</dt>
		
						<dd>
							<input type="text" name="txt_perfil" id="txt_perfil" value="<?php echo $_smarty_tpl->tpl_vars['nome_perfil']->value[0]['txt_perfil'];?>
" />
							<div id="msg_txt_perfil" class="msg_erro"></div>
						</dd>
					</dl>
				</fieldset>
		
				<input type="hidden" name="cod_perfil" id="cod_perfil" value="<?php echo $_smarty_tpl->tpl_vars['cod_perfil']->value;?>
" />
				<button type="submit" id="btn_enviar" class="gray" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
				&nbsp;ou&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
			</form>
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo')" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
		<?php }?>
	</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>