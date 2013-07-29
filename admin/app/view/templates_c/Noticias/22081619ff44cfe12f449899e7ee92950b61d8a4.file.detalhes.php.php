<?php /* Smarty version Smarty-3.1.1, created on 2013-01-21 10:37:19
         compiled from "app/view/templates/Noticias/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:165449235950fd367fcdca55-99403416%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22081619ff44cfe12f449899e7ee92950b61d8a4' => 
    array (
      0 => 'app/view/templates/Noticias/detalhes.php',
      1 => 1358770110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '165449235950fd367fcdca55-99403416',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_noticia' => 0,
    'dados' => 0,
    'ARQ_DIN' => 0,
    'Helper' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fd367ff1b38',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fd367ff1b38')) {function content_50fd367ff1b38($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][20])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][22])){?>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][25])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][24])){?>	
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/editar/cod_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['dados_noticia']->value[0]['cod_relacao_idioma'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_noticia']->value!==false){?>
			<?php  $_smarty_tpl->tpl_vars['dados'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dados']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_noticia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->key => $_smarty_tpl->tpl_vars['dados']->value){
$_smarty_tpl->tpl_vars['dados']->_loop = true;
?>
		   		<article class="half-block">
					<div class="article-container">
						<header>
							<h2><?php echo $_smarty_tpl->tpl_vars['dados']->value['WebsiteIdiomas']['txt_idioma'];?>
</h2>
						</header>
						<section>
							<table>
		                    	<tr>
									<td class="detalhes">
										<strong>Data</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['dados']->value['dat_data'];?>

									</td>
		                        </tr>
								<tr>
									<td class="detalhes">
										<strong>T&iacute;tulo</strong><br />
										<h3><?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_titulo'];?>
</h3>
									</td>
								</tr>
								<tr>
									<td class="detalhes">
										<strong>Texto</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_texto'];?>

									</td>
								</tr>
								<tr>
									<td class="detalhes">
										<?php if (strlen(trim($_smarty_tpl->tpl_vars['dados']->value['img_cropada']))>0){?>
											<strong>Imagem</strong><br />
											<img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['dados']->value['img_cropada'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_titulo'];?>
" height="200" width="140" />
										<?php }?>
									</td>
								</tr>
								<tr>
									<td class="detalhes">
										<strong>Publicado</strong><br />
										<?php if ($_smarty_tpl->tpl_vars['dados']->value['cod_publicado']==1){?> Sim <?php }else{ ?> N&atilde;o <?php }?>
									</td>
								</tr>
								<tr>
									<td class="detalhes">
										<strong>Data de In&iacute;cio da Publica&ccedil;&atilde;o</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['Helper']->value->FormataDataHora($_smarty_tpl->tpl_vars['dados']->value['dat_inicio_publicacao'],'br');?>

									</td>
								</tr>
								<tr>
									<td class="detalhes">
										<strong>Data de T&eacute;rmino da Publica&ccedil;&atilde;o</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['Helper']->value->FormataDataHora($_smarty_tpl->tpl_vars['dados']->value['dat_termino_publicacao'],'br');?>

									</td>
								</tr>
							</table>
						</section>
					</div>
				</article>
			<?php } ?>
			
        	<div class="clearfix"></div>
        	<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
        	&nbsp;&nbsp;&nbsp;
        	<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/editar/cod_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_relacao_idioma'];?>
')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
	
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
		<?php }?>
	</div>    
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>