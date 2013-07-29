<?php /* Smarty version Smarty-3.1.1, created on 2012-09-26 11:31:29
         compiled from "app/view/templates/Configuracoes/index.php" */ ?>
<?php /*%%SmartyHeaderCode:2104236062506311c11519c9-23851891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ec2c2e810bc24a4fbb73c375e370e38a950e144' => 
    array (
      0 => 'app/view/templates/Configuracoes/index.php',
      1 => 1342703474,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2104236062506311c11519c9-23851891',
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
  'unifunc' => 'content_506311c1299d8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506311c1299d8')) {function content_506311c1299d8($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


		<header>
			<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
			
			<nav>
				<ul class="tab-switch">
					<li><a class="default-tab" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['id'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				</ul>
			</nav>
		</header>
		
		<div class="tab default-tab" id="tab0">

			<?php if ($_smarty_tpl->tpl_vars['dados_configuracao']->value!==false){?>
				<?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])){?>
					<div class="notification success">
	                    <a href="#" class="close-notification" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[44];?>
" rel="tooltip">x</a>
	                    <p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
                   	</div>
                <?php }?>
                			
				<table>
					<tr>
						<td width="50%" class="detalhes"><strong>T&iacute;tulo padr&atilde;o do website</strong><br />
							<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_title'];?>

						</td>						
						<td width="50%" class="detalhes"><strong>Idioma padr&atilde;o</strong><br />
							<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['WebsiteIdiomas']['idioma'];?>

						</td>
					</tr>
					<tr>
						<td class="detalhes"><strong>Palavras-chave padr&atilde;o do website</strong><br />
							<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_key'];?>

						</td>
						<td class="detalhes"><strong>Descri&ccedil;&atilde;o padr&atilde;o do website</strong><br />
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
				</table>
                <br />
							<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['id'];?>
');" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>

			
				<?php }else{ ?>
					<div class="notification error">
						<p>
							<strong><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>
</strong>
						</p>
					</div>
				<?php }?>

			</div>
            
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>