<?php /* Smarty version Smarty-3.1.1, created on 2013-01-14 09:18:24
         compiled from "app/view/templates/Permissoes/incluir.php" */ ?>
<?php /*%%SmartyHeaderCode:196252563250f3e9802021c9-25896936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcd11c05fb355f378adbb22faf6fbafec55fe325' => 
    array (
      0 => 'app/view/templates/Permissoes/incluir.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '196252563250f3e9802021c9-25896936',
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
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50f3e9803367d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f3e9803367d')) {function content_50f3e9803367d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
				<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<form name="frm_permissoes" id="frm_permissoes" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/incluir', 'frm_permissoes', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')" >
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Controler e Ação</label>
					</dt>
					
					<dd>
						<?php  $_smarty_tpl->tpl_vars['contr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_acao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contr']->key => $_smarty_tpl->tpl_vars['contr']->value){
$_smarty_tpl->tpl_vars['contr']->_loop = true;
?>
							<input type="checkbox" name="controller_acao[]" id="controller_acao" value="<?php echo $_smarty_tpl->tpl_vars['contr']->value['cod_id'];?>
" />
							<b>Controller:</b> <?php echo $_smarty_tpl->tpl_vars['contr']->value['FrameworkControllers']['txt_nome_amigavel'];?>
 <b>Ação:</b> <?php echo $_smarty_tpl->tpl_vars['contr']->value['FrameworkAcoes']['txt_nome_amigavel'];?>

							<br/>
						<?php } ?>
						
					</dd>
					
					<dt>
						<label>Nome do perfil</label>
					</dt>
					
					<dd>
						<input type="text" name="txt_perfil" id="txt_perfil" />
						<div id="msg_txt_perfil" class="msg_erro"></div>
					</dd>
				</dl>
			</fieldset>

			<button type="submit" id="btn_enviar" class="gray" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</button>
			&nbsp;ou&nbsp;
			<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
		</form>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>