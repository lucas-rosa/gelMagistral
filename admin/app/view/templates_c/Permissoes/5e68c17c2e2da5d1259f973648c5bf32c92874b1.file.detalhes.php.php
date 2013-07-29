<?php /* Smarty version Smarty-3.1.1, created on 2013-01-14 14:13:01
         compiled from "app/view/templates/Permissoes/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:68186724150f42e8d398d44-06236525%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e68c17c2e2da5d1259f973648c5bf32c92874b1' => 
    array (
      0 => 'app/view/templates/Permissoes/detalhes.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68186724150f42e8d398d44-06236525',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados' => 0,
    'controller_acao' => 0,
    'contr' => 0,
    'cod_perfil' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50f42e8d4ec70',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f42e8d4ec70')) {function content_50f42e8d4ec70($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/editar/cod_perfil/<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_usuario'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['controller_acao']->value!==false&&isset($_smarty_tpl->tpl_vars['controller_acao']->value)){?>
			<table>
				<tr>
					<td class="detalhes">
						<strong>Controler e Ação</strong>
					</td>
					
					<td class="detalhes">
						<?php  $_smarty_tpl->tpl_vars['contr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contr']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['controller_acao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['contr']->key => $_smarty_tpl->tpl_vars['contr']->value){
$_smarty_tpl->tpl_vars['contr']->_loop = true;
?>
							<strong>Controller:</strong><?php echo $_smarty_tpl->tpl_vars['contr']->value['PermissaoGeral']['FrameworkControllers']['txt_nome_amigavel'];?>
  <strong>Ação:</strong><?php echo $_smarty_tpl->tpl_vars['contr']->value['PermissaoGeral']['FrameworkAcoes']['txt_nome_amigavel'];?>

							<br><br>
						<?php } ?>
					</td>
				</tr>
			</table>
			
			<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes')" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
			<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes/editar/cod_perfil/<?php echo $_smarty_tpl->tpl_vars['cod_perfil']->value;?>
')" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
permissoes')" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
		<?php }?>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>