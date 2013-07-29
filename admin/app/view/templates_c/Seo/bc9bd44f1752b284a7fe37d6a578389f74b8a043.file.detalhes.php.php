<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 08:21:25
         compiled from "app/view/templates/Seo/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:112509057950fe6825e50926-37340526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc9bd44f1752b284a7fe37d6a578389f74b8a043' => 
    array (
      0 => 'app/view/templates/Seo/detalhes.php',
      1 => 1358850047,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112509057950fe6825e50926-37340526',
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
  'unifunc' => 'content_50fe68260ad9e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fe68260ad9e')) {function content_50fe68260ad9e($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][19])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][18])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/editar/cod_id/<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['cod_id'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_seo']->value!==false){?>
			<table>
				<tr>
					<td width="50%" class="detalhes">
						<strong>Caminho da p&aacute;gina</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['url_caminho'];?>

					</td>
					
					<td width="50%" class="detalhes">
						<strong>T&iacute;tulo da p&aacute;gina</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_title'];?>

					</td>
				</tr>
				
				<tr>
					<td class="detalhes">
						<strong>Palavras-chave da p&aacute;gina</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_keywords'];?>

					</td>
					
					<td class="detalhes" colspan="2">
						<strong>Descri&ccedil;&atilde;o da p&aacute;gina</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['txt_description'];?>

					</td>
				</tr>
			</table>
			<br />
			
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
			&nbsp;&nbsp;&nbsp;
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados_seo']->value['cod_id'];?>
')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
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