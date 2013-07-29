<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 08:26:16
         compiled from "app/view/templates/Seo/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:131263292450fe6948d92f35-46937163%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c48f409901ced32ce6704854ca119492599221a9' => 
    array (
      0 => 'app/view/templates/Seo/editar.php',
      1 => 1358850133,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131263292450fe6948d92f35-46937163',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_seo' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fe694904f24',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fe694904f24')) {function content_50fe694904f24($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][14])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][15])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][19])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][18])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/editar/cod_id/<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['cod_id'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_seo']->value!==false&&isset($_smarty_tpl->tpl_vars['dados_seo']->value)){?>
			<form name="frm_seo" id="frm_seo" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/editar', 'frm_seo', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Caminho da p&aacute;gina</label>
						</dt>
						<dd>
							<input type="text" name="url_caminho" id="url_caminho" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['url_caminho'];?>
" />
							<div id="msg_url_caminho" class="msg_erro"></div>
							<p>Parte da URL da p&aacute;gina, exclu&iacute;do o dom&iacute;nio
								principal. Ex.: se sua p&aacute;gina for
								"http://www.google.com/sua-pagina", o caminho é "sua-pagina".</p>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
					
						<dt>
							<label>T&iacute;tulo da p&aacute;gina</label>
						</dt>
						<dd>
							<input type="text" name="txt_title" id="txt_title" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_title'];?>
" />
							<div id="msg_txt_title" class="msg_erro"></div>
							<p>Recomenda-se o t&iacute;tulo ter de 10 a 70 caracteres</p>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
					
						<dt>
							<label>Palavras-chave da p&aacute;gina</label>
						</dt>
						<dd>
							<textarea name="txt_keywords" id="txt_keywords" class="medium"><?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_keywords'];?>
</textarea>
							<div id="msg_txt_keywords" class="msg_erro"></div>
							<p>Recomenda-se o uso de no m&aacute;ximo 15 palavras-chave. Os
								termos devem ser separados por v&iacute;rgulas.</p>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
					
						<dt>
							<label>Descri&ccedil;&atilde;o da p&aacute;gina</label>
						</dt>
						<dd>
							<textarea name="txt_description" id="txt_description" class="medium"><?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_description'];?>
</textarea>
							<div id="msg_txt_description" class="msg_erro"></div>
							<p>Recomenda-se a descri&ccedil;&atilde;o ter de 70 a 160
								caracteres</p>
							<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
						</dd>
					</dl>
				</fieldset>
		
				<button type="submit" id="btn_enviar" class="blue"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
				&nbsp;ou&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
				<input type="hidden" name="cod_id" id="cod_id" value="<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['cod_id'];?>
" />
			</form>
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
		<?php }?>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>