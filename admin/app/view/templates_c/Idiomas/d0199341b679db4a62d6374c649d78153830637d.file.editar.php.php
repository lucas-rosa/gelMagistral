<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 13:30:34
         compiled from "app/view/templates/Idiomas/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:150525364550fd5f1aa8f1a8-33828913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0199341b679db4a62d6374c649d78153830637d' => 
    array (
      0 => 'app/view/templates/Idiomas/editar.php',
      1 => 1358782033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150525364550fd5f1aa8f1a8-33828913',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_idioma' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd5f1ac2810',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd5f1ac2810')) {function content_50fd5f1ac2810($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][5])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][26])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][7])){?>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_idioma']->value!==false&&isset($_smarty_tpl->tpl_vars['dados_idioma']->value)){?>
			<form name="frm_idioma" id="frm_idioma" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/editar', 'frm_idioma', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Idioma</label>
						</dt>
						<dd>
							<input type="text" name="txt_idioma" id="txt_idioma" value="<?php echo $_smarty_tpl->tpl_vars['dados_idioma']->value['txt_idioma'];?>
" class="medium" maxlength="255" />
							<div id="msg_txt_idioma" class="msg_erro"></div>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
		
						<dt>
							<label>Meta tag</label>
						</dt>
						<dd>
							<input type="text" name="txt_meta" id="txt_meta" value="<?php echo $_smarty_tpl->tpl_vars['dados_idioma']->value['txt_meta'];?>
" class="medium" maxlength="10" />
							<div id="msg_txt_meta"></div>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
					</dl>
				</fieldset>
		
				<input type="hidden" name="cod_id" id="cod_id" value="<?php echo $_smarty_tpl->tpl_vars['dados_idioma']->value['cod_id'];?>
" />
				<button type="submit" id="btn_enviar" class="blue"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
				&nbsp;ou&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
			</form>
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
		<?php }?>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>