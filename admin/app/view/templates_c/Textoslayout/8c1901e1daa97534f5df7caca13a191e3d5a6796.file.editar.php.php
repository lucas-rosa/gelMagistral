<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 08:21:45
         compiled from "app/view/templates/Textoslayout/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:55231979950fd16b9e87526-70622763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c1901e1daa97534f5df7caca13a191e3d5a6796' => 
    array (
      0 => 'app/view/templates/Textoslayout/editar.php',
      1 => 1358763684,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55231979950fd16b9e87526-70622763',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_texto' => 0,
    'dados' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd16ba0e55c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd16ba0e55c')) {function content_50fd16ba0e55c($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][1])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoslayout')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][2])){?>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<form name="frm_textoslayout" id="frm_textoslayout" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoslayout/editar', 'frm_textoslayout', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoslayout', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
			<?php  $_smarty_tpl->tpl_vars['dados'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dados']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_texto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['dad']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->key => $_smarty_tpl->tpl_vars['dados']->value){
$_smarty_tpl->tpl_vars['dados']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['dad']['iteration']++;
?>
				<fieldset>
					<legend><?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_idioma'];?>
</legend>
					<fieldset>
						<legend>Dados do registro</legend>
						<dl>
							<dt>
								<label>Texto</label>
							</dt>
							
							<dd>
								<input type="text" name="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" maxlength="255" class="medium" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_texto'];?>
" />
								<div id="msg_txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="msg_erro"></div>		
								<p>Preenchimento obrigat&oacute;rio.</p>
								
								<input type="hidden" name="cod_id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="cod_id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_id'];?>
" />
								<input type="hidden" name="cod_relacao_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="cod_relacao_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_relacao_idioma'];?>
" />
								<input type="hidden" name="cod_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="cod_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_idioma'];?>
" />
							</dd>
						</dl>
					</fieldset>
				</fieldset>
			<?php } ?>
			
			<button type="submit" id="btn_enviar" class="blue" ><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
			&nbsp;ou&nbsp;
			<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoslayout"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
		</form>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>