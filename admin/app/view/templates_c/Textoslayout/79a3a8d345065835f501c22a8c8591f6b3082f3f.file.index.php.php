<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 14:13:06
         compiled from "app/view/templates/Textoslayout/index.php" */ ?>
<?php /*%%SmartyHeaderCode:98179766950fd69128a1b85-63453809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '79a3a8d345065835f501c22a8c8591f6b3082f3f' => 
    array (
      0 => 'app/view/templates/Textoslayout/index.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '98179766950fd69128a1b85-63453809',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_textos' => 0,
    'params' => 0,
    'texto' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd6912a1cab',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd6912a1cab')) {function content_50fd6912a1cab($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][1])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoslayout')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][2])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_textos']->value!==false){?>
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
						<th width="10%">Idioma</th>
						<th width="80%">Texto</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
				
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['texto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['texto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_textos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['texto']->key => $_smarty_tpl->tpl_vars['texto']->value){
$_smarty_tpl->tpl_vars['texto']->_loop = true;
?>
						<tr>
							<td width="10%"><?php echo $_smarty_tpl->tpl_vars['texto']->value['WebsiteIdiomas']['txt_idioma'];?>
</td>
							<td width="80%"><?php echo $_smarty_tpl->tpl_vars['texto']->value['txt_texto'];?>
</td>
							<td width="10%">
								<ul class="actions">
									<?php if (isset($_SESSION['UserPermissoes'][2])){?>
										<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoslayout/editar/cod_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['texto']->value['cod_relacao_idioma'];?>
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