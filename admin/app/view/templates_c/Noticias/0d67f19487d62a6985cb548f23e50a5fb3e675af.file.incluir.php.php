<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 10:09:09
         compiled from "app/view/templates/Noticias/incluir.php" */ ?>
<?php /*%%SmartyHeaderCode:14877969150fe81654a5c76-09106499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d67f19487d62a6985cb548f23e50a5fb3e675af' => 
    array (
      0 => 'app/view/templates/Noticias/incluir.php',
      1 => 1358769346,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14877969150fe81654a5c76-09106499',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'altura_crop' => 0,
    'largura_crop' => 0,
    'ARQ_DIN' => 0,
    'altura_cropada' => 0,
    'largura_cropada' => 0,
    'CONTROLLER_DADOS' => 0,
    'textos_layout' => 0,
    'idiomas' => 0,
    'idioma' => 0,
    'data_hora_atual' => 0,
    'data_hora_termino' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fe81658e95d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fe81658e95d')) {function content_50fe81658e95d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/plugin_crop.js"></script>
<script type="text/javascript">
var image_handling_file  = "<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/imagem";
var url_padrao = "<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
";
var altura_crop = '<?php echo $_smarty_tpl->tpl_vars['altura_crop']->value;?>
';
var largura_crop = '<?php echo $_smarty_tpl->tpl_vars['largura_crop']->value;?>
';
var arq_din = '<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
';
var altura_cropada = '<?php echo $_smarty_tpl->tpl_vars['altura_cropada']->value;?>
';
var largura_cropada =  '<?php echo $_smarty_tpl->tpl_vars['largura_cropada']->value;?>
';
</script>

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
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][25])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][24])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<form  enctype="multipart/form-data" name="frm_noticia" id="frm_noticia" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/incluir', 'frm_noticia', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
		<!--<form name="frm_noticia" id="frm_noticia" method="post" action='<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/incluir'>-->
			<?php  $_smarty_tpl->tpl_vars['idioma'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['idioma']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['idiomas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['idi']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['idioma']->key => $_smarty_tpl->tpl_vars['idioma']->value){
$_smarty_tpl->tpl_vars['idioma']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['idi']['iteration']++;
?>
				<fieldset>
					<legend><strong><?php echo $_smarty_tpl->tpl_vars['idioma']->value['txt_idioma'];?>
</strong></legend>
					<fieldset>
						<legend>Dados de publica&ccedil;&atilde;o</legend>
						<dl>
							<dt>
								<label>Publicado</label>
							</dt>
							<dd>
								<input type="radio" name="cod_publicado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" id="radio" value="1" checked /> Sim
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="cod_publicado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" id="radio2" value="0" /> N&atilde;o
								<div id="msg_cod_publicado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="msg_erro"></div>
								<p>
									Ao escolher "sim", o conte&uacute;do que est&aacute; sendo
									inclu&iacute;do passa a aparecer no website depois de salvo.<br />
									Ao escolher "n&atilde;o", o conte&uacute;do &eacute; salvo,
									por&eacute;m segue sem aparecer no website.
								</p>
							</dd>
							
							<dt>
								<label>Data de In&iacute;cio da Publica&ccedil;&atilde;o</label>
							</dt>
							<dd>
								<input type="text" name="dat_inicio_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" id="dat_inicio_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="datepicker small dataHora" maxlength="19" value="<?php echo $_smarty_tpl->tpl_vars['data_hora_atual']->value;?>
" />
								<div id="msg_dat_inicio_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="msg_erro"></div>
								<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
								<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
								<p>Marque a data e hora na qual voc&ecirc; quer que este
									conte&uacute;do passe a aparecer no website.</p>
							</dd>
							
							<dt>
								<label>Data de T&eacute;rmino da Publica&ccedil;&atilde;o</label>
							</dt>
							<dd>
								<input type="text" name="dat_termino_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" id="dat_termino_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="datepicker small dataHora" maxlength="19" value="<?php echo $_smarty_tpl->tpl_vars['data_hora_termino']->value;?>
" />
								<div id="msg_dat_termino_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="msg_erro"></div>
								<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
								<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
								<p>Marque a data e hora na qual voc&ecirc; quer que este
									conte&uacute;do deixe aparecer no website.</p>
							</dd>
						</dl>
					</fieldset>

					<fieldset>
						<legend>Dados do registro</legend>
						<dl>
							<dt>
								<label>Data</label>
							</dt>
							<dd>
								<input type="text" name="dat_data<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" id="dat_data<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="datepicker small data" />
								<div id="msg_dat_data<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="msg_erro"></div>
								<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
								<p>Formato correto: dd/mm/aaaa.</p>
								<p>Esta &eacute; a data que aparece junto ao conte&uacute;do no website.</p>
							</dd>

							<dt>
								<label>Imagem</label>
							</dt>
							<dd>
								<!-- INICIO DO HTML DO PLUGIN -->
								<input type="hidden" name="nome_img<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" value="" id="nome_img<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" /> 
								<input type="hidden" name="nome_img_cropada<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" value="" id="nome_img_cropada<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" /> 
								<div id="upload_status<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
								<p>
									<button type="button" id="upload_link<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="blue">Escolher Imagem</button>
									<button type="button" id="cancelar_upload<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="blue">Cancelar</button>
								</p>
								
								<div id="todo_conteudo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
">
									<span id="loader<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" style="display: none;">
										<img src="loader.gif" alt="Carregando..." />
									</span>
									
									<span id="progress<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></span> <br />
									<div id="uploaded_image<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
"></div>
									<div id="thumbnail_form<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" style="display: none;">
										<input type="hidden" name="x1" value="" id="x1<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
										<input type="hidden" name="y1" value="" id="y1<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
										<input type="hidden" name="x2" value="" id="x2<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
										<input type="hidden" name="y2" value="" id="y2<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
										<input type="hidden" name="w" value="" id="w<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
										<input type="hidden" name="h" value="" id="h<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" />
										<input type="hidden" name="flag" id="flag" value="inclusao">
										<button type="button" name="save_thumb<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" id="save_thumb<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="blue"> Salvar </button>
									</div>
								</div>
	    						<!-- FIM DO HTML DO PLUGIN -->
							</dd>

							<dt>
								<label>T&iacute;tulo</label>
							</dt>
							
							<dd>
								<input type="text" name="txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" id="txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" maxlength="255" class="medium" />
								<div id="msg_txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="msg_erro"></div>
								<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
							</dd>
							
							<dt>
								<label>Texto</label>
							</dt>
							
							<dd>
								<textarea name="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" id="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="wysiwyg large" ></textarea>
								<div id="msg_txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" class="msg_erro"></div>
								<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
							</dd>
						</dl>
						
						<input type="hidden" name="cod_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" id="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['idi']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['idioma']->value['cod_id'];?>
">
					</fieldset>
				</fieldset>
			<?php } ?>
			
			<button type="submit" id="btn_enviar" class="blue"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</button>
			&nbsp;ou&nbsp;
			<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
		</form>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>