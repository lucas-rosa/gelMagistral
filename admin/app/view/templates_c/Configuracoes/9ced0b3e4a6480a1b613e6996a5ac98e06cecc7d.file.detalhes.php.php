<?php /* Smarty version Smarty-3.1.1, created on 2013-01-09 09:59:26
         compiled from "app/view/templates/Configuracoes/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:75969091150ed5b9ec62fd6-84037861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ced0b3e4a6480a1b613e6996a5ac98e06cecc7d' => 
    array (
      0 => 'app/view/templates/Configuracoes/detalhes.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75969091150ed5b9ec62fd6-84037861',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'textos_layout' => 0,
    'URL_DEFAULT' => 0,
    'dados_configuracao' => 0,
    'params' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50ed5b9ee14d4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ed5b9ee14d4')) {function content_50ed5b9ee14d4($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][4])){?>
					<li><a class="default-tab" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][3])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/editar/cod_id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['id'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_configuracao']->value!==false){?>
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
			
			<table>
				<tr>
					<td width="50%" class="detalhes">
						<strong>T&iacute;tulo padr&atilde;o do website</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_title'];?>

					</td>
					
					<td width="50%" class="detalhes">
						<strong>Idioma padr&atilde;o</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['WebsiteIdiomas']['txt_idioma'];?>

					</td>
				</tr>
				
				<tr>
					<td class="detalhes">
						<strong>Palavras-chave padr&atilde;o do website</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_key'];?>

					</td>
					
					<td class="detalhes">
						<strong>Descri&ccedil;&atilde;o padr&atilde;o do website</strong><br />
						<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_desc'];?>

					</td>
				</tr>
				
				<tr>
					<td class="detalhes" colspan="2"><strong>E-mail (webmaster)</strong><br />
					<a href="mailto:<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_email_webmaster'];?>
"><?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_email_webmaster'];?>
</a>
					</td>
				</tr>
			
				<tr>
					<td class="detalhes" colspan="2">
						<?php if (isset($_SESSION['UserPermissoes'][3])){?>
							<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/editar/cod_id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['cod_id'];?>
');" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
						<?php }?>
				    </td>
				</tr>
			</table>
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
            <br /><br />
                    	
            <button class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes')" />Voltar</button>
		<?php }?>
	</div>
            
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>