<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 08:26:44
         compiled from "app/view/templates/Seo/incluir.php" */ ?>
<?php /*%%SmartyHeaderCode:161428816550fe69646b75b3-62867404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '481424c9d070d9c0ac82b57485c57572ef1f37e3' => 
    array (
      0 => 'app/view/templates/Seo/incluir.php',
      1 => 1358850402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161428816550fe69646b75b3-62867404',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fe696484bb5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fe696484bb5')) {function content_50fe696484bb5($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][18])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<form name="frm_seo" id="frm_seo" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/incluir', 'frm_seo', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Caminho da p&aacute;gina</label>
					</dt>
					<dd>
						<input type="text" name="url_caminho" id="url_caminho" class="medium" maxlength="255" />
						<div id="msg_url_caminho" class="msg_erro"></div>
						<p>Parte da URL da p&aacute;gina, exclu&iacute;do o dom&iacute;nio principal. Ex.: se sua p&aacute;gina for "http://www.google.com/sua-pagina", o caminho é "sua-pagina".</p>
						<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					</dd>

					<dt>
						<label>T&iacute;tulo da p&aacute;gina</label>
					</dt>
					<dd>
						<input type="text" name="txt_title" id="txt_title" class="medium" maxlength="255" />
						<div id="msg_txt_title" class="msg_erro"></div>
						<p>Recomenda-se o t&iacute;tulo ter de 10 a 70 caracteres</p>
						<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					</dd>
	
	
					<dt>
						<label>Palavras-chave da p&aacute;gina</label>
					</dt>
					<dd>
						<textarea name="txt_keywords" id="txt_keywords" class="medium"></textarea>
						<div id="msg_txt_keywords" class="msg_erro"></div>
	                   	<p>Recomenda-se o uso de no m&aacute;ximo 15 palavras-chave. Os termos devem ser separados por v&iacute;rgulas.</p>
						<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					</dd>
						
					<dt>
						<label>Descri&ccedil;&atilde;o da p&aacute;gina</label>
					</dt>
					<dd>
						<textarea name="txt_description" id="txt_description" class="medium"></textarea>
						<div id="msg_txt_description" class="msg_erro"></div>
	                   	<p>Recomenda-se a descri&ccedil;&atilde;o ter de 70 a 160 caracteres</p>
	                   	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					</dd>
				</dl>
			</fieldset>
				
			<button type="submit" id="btn_enviar" class="blue"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</button>
			&nbsp;ou&nbsp;
			<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
		</form>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>