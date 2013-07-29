<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 13:38:47
         compiled from "app/view/templates/Idiomas/index.php" */ ?>
<?php /*%%SmartyHeaderCode:183086512750fd6107998396-72600565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23e8e174e90c23382dd707d6c77b812ad7928f54' => 
    array (
      0 => 'app/view/templates/Idiomas/index.php',
      1 => 1358782032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '183086512750fd6107998396-72600565',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'params' => 0,
    'dados_idioma' => 0,
    'idioma' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd6107b6168',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd6107b6168')) {function content_50fd6107b6168($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][5])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
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
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
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

		<table class="datatable" id="first-asc">
			<thead>
				<tr>
					<th width="50%">Idioma</th>
					<th width="40%">Meta-tag</th>
					<th width="10%">&nbsp;</th>
				</tr>
			</thead>
			
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['idioma'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['idioma']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_idioma']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['idioma']->key => $_smarty_tpl->tpl_vars['idioma']->value){
$_smarty_tpl->tpl_vars['idioma']->_loop = true;
?>
					<tr>
						<td><?php echo $_smarty_tpl->tpl_vars['idioma']->value['txt_idioma'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['idioma']->value['txt_meta'];?>
</td>
						<td>
							<ul class="actions">
								<?php if (isset($_SESSION['UserPermissoes'][7])){?>
									<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/editar/cod_id/<?php echo $_smarty_tpl->tpl_vars['idioma']->value['cod_id'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
								<?php }?>
								
								<?php if (isset($_SESSION['UserPermissoes'][6])){?>
									<li><a class="delete" onclick="javascript:exclusao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas/excluir/cod_id/<?php echo $_smarty_tpl->tpl_vars['idioma']->value['cod_id'];?>
', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[9];?>
')" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[49];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[49];?>
</a></li>
								<?php }?>
							</ul>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>