<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 15:30:56
         compiled from "app/view/templates/Faleconosco/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:60319710550feccd06d2a27-71599186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03a249585533132b329adaeb4c5256cf21b1671d' => 
    array (
      0 => 'app/view/templates/Faleconosco/detalhes.php',
      1 => 1358875852,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '60319710550feccd06d2a27-71599186',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_faleConosco' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50feccd0843a2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50feccd0843a2')) {function content_50feccd0843a2($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][51])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][53])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/exportar')" href="" rel="tooltip" title="Exportar cadastros">Exportar cadastros</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][52])){?>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_faleConosco']->value!==false&&isset($_smarty_tpl->tpl_vars['dados_faleConosco']->value)){?>
			<table>
				<tr>
					<td width="50%" class="detalhes">
						<strong>IP</strong><br />
						<h3><?php echo $_smarty_tpl->tpl_vars['dados_faleConosco']->value['num_ip'];?>
</h3>
					</td>
		
					<td width="50%" class="detalhes">
						<strong>Data Hora</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_faleConosco']->value['datahora'];?>

					</td>
				</tr>

				<tr>
					<td width="50%" class="detalhes">
						<strong>Nome</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_faleConosco']->value['txt_nome'];?>

					</td>
		
					<td width="50%" class="detalhes">
						<strong>Telefone</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_faleConosco']->value['txt_telefone'];?>

					</td>
				</tr>

				<tr>
					<td width="50%" class="detalhes">
						<strong>Assunto</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_faleConosco']->value['txt_assunto'];?>

					</td>
		
					<td width="50%" class="detalhes">
						<strong>Mensagem</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_faleConosco']->value['txt_mensagem'];?>

		            </td>
				</tr>
				
				<tr>
					<td class="detalhes" colspan="2">
						<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
	                </td>
	            </tr>
            </table>
        <?php }else{ ?>
        	<div class="notification error">
        		<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
        <?php }?>
    </div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>