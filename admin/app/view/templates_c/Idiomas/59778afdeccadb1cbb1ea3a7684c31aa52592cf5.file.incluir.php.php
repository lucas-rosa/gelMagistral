<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 13:27:40
         compiled from "app/view/templates/Idiomas/incluir.php" */ ?>
<?php /*%%SmartyHeaderCode:168737387850fd5e6c180992-73030241%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '59778afdeccadb1cbb1ea3a7684c31aa52592cf5' => 
    array (
      0 => 'app/view/templates/Idiomas/incluir.php',
      1 => 1358782059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168737387850fd5e6c180992-73030241',
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
  'unifunc' => 'content_50fd5e6c2c526',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd5e6c2c526')) {function content_50fd5e6c2c526($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][7])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<form name="frm_idioma" id="frm_idioma" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/incluir', 'frm_idioma', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Idioma</label>
					</dt>
	
					<dd>
						<input type="text" name="txt_idioma" id="txt_idioma" class="medium" maxlength="255" />
						<div id="msg_txt_idioma" class="msg_erro"></div>
						<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					</dd>
	
					<dt>
						<label>Meta tag</label>
					</dt>
					<dd>
						<input type="text" name="txt_meta" id="txt_meta" class="medium" maxlength="10" />
						<div id="msg_txt_meta" class="msg_erro"></div>
						<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
					</dd>
				</dl>
			</fieldset>
	
			<button type="submit" id="btn_enviar" class="blue"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</button>
			&nbsp;ou&nbsp;
			<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
		</form>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>