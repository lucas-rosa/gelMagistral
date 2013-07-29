<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 09:41:06
         compiled from "app/view/templates/Emailformulario/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:165906333850fd29526ed3a4-70682984%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e297d03183efcf27d891cc3e7b5c70e7a7871326' => 
    array (
      0 => 'app/view/templates/Emailformulario/detalhes.php',
      1 => 1358768444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165906333850fd29526ed3a4-70682984',
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
    'dados_email_formulario' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd2952868ac',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd2952868ac')) {function content_50fd2952868ac($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][58])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][59])){?>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][60])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados_texto']->value['cod_id'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_email_formulario']->value!==false&&isset($_smarty_tpl->tpl_vars['dados_email_formulario']->value)){?>
			<article class="half-block">
				<div class="article-container">
					<section>
						<table>
							<tr>
								<td width="50%" class="detalhes">
									<strong>E-mail</strong><br />
									<h3><?php echo $_smarty_tpl->tpl_vars['dados_email_formulario']->value['txt_email'];?>
</h3>
								</td>
					
								<td width="50%" class="detalhes">
									<strong>Formulário</strong><br />
									<?php echo $_smarty_tpl->tpl_vars['dados_email_formulario']->value['txt_formulario'];?>

								</td>
							</tr>
				
							<tr>
								<td width="50%" class="detalhes">
									<strong>Conversão</strong><br />
									<?php echo $_smarty_tpl->tpl_vars['dados_email_formulario']->value['txt_conversao'];?>

								</td>
							</tr>
						</table>
					</section>
				</div>
			</article>
			
			<div class="clearfix"></div>
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
            &nbsp;&nbsp;&nbsp;
            <button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario/editar/cod_id/<?php echo $_smarty_tpl->tpl_vars['dados_email_formulario']->value['cod_id'];?>
')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
                
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
		<?php }?>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>