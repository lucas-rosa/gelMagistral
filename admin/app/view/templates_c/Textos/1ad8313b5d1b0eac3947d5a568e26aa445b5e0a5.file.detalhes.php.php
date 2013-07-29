<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 09:08:57
         compiled from "app/view/templates/Textos/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:47053016050fd21c9eed4f8-35631498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1ad8313b5d1b0eac3947d5a568e26aa445b5e0a5' => 
    array (
      0 => 'app/view/templates/Textos/detalhes.php',
      1 => 1358763163,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '47053016050fd21c9eed4f8-35631498',
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
    'ARQ_DIN' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd21ca13e9e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd21ca13e9e')) {function content_50fd21ca13e9e($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][28])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][29])){?>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][31])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/editar/id_rel_idioma/<?php echo $_smarty_tpl->tpl_vars['dados_texto']->value['cod_texto'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_texto']->value!==false){?>
			<?php  $_smarty_tpl->tpl_vars['dados'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dados']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_texto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->key => $_smarty_tpl->tpl_vars['dados']->value){
$_smarty_tpl->tpl_vars['dados']->_loop = true;
?>
				<fieldset>
					<legend><?php echo $_smarty_tpl->tpl_vars['dados']->value['WebsiteIdiomas']['txt_idioma'];?>
</legend>
					<table>
						<tr>
							<td class="detalhes"><strong>T&iacute;tulo</strong><br />
								<h3><?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_titulo'];?>
</h3>
							</td>
						</tr>
						
						<tr>
							<td class="detalhes"><strong>Texto</strong><br />
								<?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_texto'];?>

							</td>
						</tr>
						
						<tr>
							<td class="detalhes"><strong>Imagem</strong><br />
								<img alt="<?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_titulo'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['dados']->value['img_texto_cropado'];?>
">
							</td>
						</tr>
					</table>
					<br/>
				</fieldset>
			<?php } ?>
		
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
			&nbsp;&nbsp;&nbsp;
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/editar/cod_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_relacao_idioma'];?>
')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
		
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
		<?php }?>
	</div>    
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>