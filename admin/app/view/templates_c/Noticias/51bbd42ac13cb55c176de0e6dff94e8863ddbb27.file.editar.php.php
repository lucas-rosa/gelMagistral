<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 10:09:15
         compiled from "app/view/templates/Noticias/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:185743734450fe816bc73de0-42081210%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51bbd42ac13cb55c176de0e6dff94e8863ddbb27' => 
    array (
      0 => 'app/view/templates/Noticias/editar.php',
      1 => 1358770366,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185743734450fe816bc73de0-42081210',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'ARQ_DIN' => 0,
    'altura_crop' => 0,
    'largura_crop' => 0,
    'altura_cropada' => 0,
    'largura_cropada' => 0,
    'CONTROLLER_DADOS' => 0,
    'textos_layout' => 0,
    'dados_noticia' => 0,
    'dados' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fe816c27994',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fe816c27994')) {function content_50fe816c27994($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/plugin_crop.js"></script>
	<script type="text/javascript">
		var image_handling_file  = "<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/imagem";
		var url_padrao = "<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
";
		var arq_din = "<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
";
		var altura_crop = '<?php echo $_smarty_tpl->tpl_vars['altura_crop']->value;?>
';
		var largura_crop = '<?php echo $_smarty_tpl->tpl_vars['largura_crop']->value;?>
';
		var altura_cropada = '<?php echo $_smarty_tpl->tpl_vars['altura_cropada']->value;?>
';
		var largura_cropada =  '<?php echo $_smarty_tpl->tpl_vars['largura_cropada']->value;?>
';
		var imagem_edicao = "<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/imagemEdicao";
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
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/incluir')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[43];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][24])){?>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>
			
	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_noticia']->value!==false&&isset($_smarty_tpl->tpl_vars['dados_noticia']->value)){?>
			<form name="frm_noticia" id="frm_noticia" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/editar', 'frm_noticia', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')" >
			<!--<form name="frm_noticia" id="frm_noticia" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias/editar">-->
				<?php  $_smarty_tpl->tpl_vars['dados'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dados']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_noticia']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['dad']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->key => $_smarty_tpl->tpl_vars['dados']->value){
$_smarty_tpl->tpl_vars['dados']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['dad']['iteration']++;
?>
					<fieldset>
						<legend><strong><?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_idioma'];?>
</strong></legend>
						<fieldset>
							<legend>Dados de publica&ccedil;&atilde;o</legend>
							<dl>
								<dt>
									<label>Publicado</label>
								</dt>
								
								<dd>
									<input type="radio" name="cod_publicado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="radio" value="1" <?php if ($_smarty_tpl->tpl_vars['dados']->value['cod_publicado']==1){?>checked="checked" <?php }?> />Sim 
		                            &nbsp;&nbsp;&nbsp;&nbsp;
		                            <input type="radio" name="cod_publicado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="radio2" value="0" <?php if ($_smarty_tpl->tpl_vars['dados']->value['cod_publicado']==0){?>checked="checked" <?php }?> /> N&atilde;o
									<p>
										Ao escolher "sim", o conte&uacute;do que est&aacute; sendo inclu&iacute;do passa a aparecer no website depois de salvo.<br />
										Ao escolher "n&atilde;o", o conte&uacute;do &eacute; salvo,
										por&eacute;m segue sem aparecer no website.
									</p>
								</dd>
											
								<dt>
									<label>Data de In&iacute;cio da Publica&ccedil;&atilde;o</label>
								</dt>
										
								<dd>
									<input type="text" name="dat_inicio_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="dat_inicio_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" maxlength="19" class="datepicker small dataHora" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['dat_inicio_publicacao'];?>
" />
									<div id="msg_dat_inicio_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="msg_erro"></div>
									<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
									<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
									<p>Marque a data e hora na qual voc&ecirc; quer que este conte&uacute;do passe a aparecer no website.</p>
								</dd>
										
								<dt>
									<label>Data de T&eacute;rmino da Publica&ccedil;&atilde;o</label>
								</dt>
										
								<dd>
									<input type="text" name="dat_termino_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="dat_termino_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" maxlength="19" class="datepicker small dataHora" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['dat_termino_publicacao'];?>
" />
									<div id="msg_dat_termino_publicacao<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="msg_erro"></div>
									<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
									<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
									<p>Marque a data e hora na qual voc&ecirc; quer que este conte&uacute;do deixe aparecer no website.</p>
								</dd>
							</dl>
						</fieldset>
									
						<fieldset>
							<legend>Dados do registro</legend>
							<dl>
								<dt>
									<label>Imagem</label>
								</dt>
							
								<dd>
									<!-- INICIO DO HTML DO PLUGIN -->
									<div id="imagem_cropada_ftp<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" name="imagem_cropada_ftp<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
"></div>
									<button type="button" id="deletar<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" name="deletar" class="blue">Deletar imagem atual</button>
									<button type="button" id="editar<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" name="editar_imagem" class="blue">Editar imagem</button>
									<button type="button" id="nova_imagem<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="blue">Inserir imagem</button>
									<button type="button" id="cancelar_recropagem<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="blue">Cancelar recropagem</button>										    
									<button type="button" id="cancelar_upload<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="blue">Cancelar</button>
									
									<div id="todo_conteudo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
">
										<div id="upload_status<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
										<input type="hidden" name="nome_img<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="nome_img<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value='<?php echo $_smarty_tpl->tpl_vars['dados']->value['img_original'];?>
'  />
										<input type="hidden" name="nome_img_cropada<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="nome_img_cropada<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['img_cropada'];?>
"  /> 						
										<div id="uploaded_image<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
"></div>
										<div id="thumbnail_form<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" style="display: none;">
											<input type="hidden" name="x1" value="" id="x1<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" />
											<input type="hidden" name="y1" value="" id="y1<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" />
											<input type="hidden" name="x2" value="" id="x2<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" />
											<input type="hidden" name="y2" value="" id="y2<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" />
											<input type="hidden" name="w" value="" id="w<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" />
											<input type="hidden" name="h" value="" id="h<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" />
											<button type="button" name="save_thumb<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="save_thumb<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="blue">Salvar</button>
											<button type="button" name="salvar_recropagem<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="salvar_recropagem<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="blue">Salvar Recropagem</button>
											<input type="hidden" name="flag" id="flag" value="edicao">
											<input type="hidden" name="id_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="id_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
">
											<input type="hidden" value="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
">
											<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_id'];?>
" id="id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" name="id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" />
										</div>
									</div>
									<!-- FIM DO HTML DO PLUGIN -->
								</dd>
								
								<dt>
									<label>Data</label>
								</dt>
		
								<dd>
									<input type="text" name="dat_data<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="dat_data<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" maxlength="10" class="datepicker small data"  value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['dat_data'];?>
"/> 
									<div id="msg_dat_data<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="msg_erro"></div>
									<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
									<p>Formato correto: dd/mm/aaaa.</p>
									<p>Esta &eacute; a data que aparece junto ao conte&uacute;do no
									website.</p>
								</dd>
			
								<dt>
									<label>T&iacute;tulo</label>
								</dt>
								
								<dd>
									<input type="text" name="txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" maxlength="255" class="medium" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_titulo'];?>
" />
									<div id="msg_txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="msg_erro"></div>
									<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
								</dd>
										
								<dt>
									<label>Texto</label>
								</dt>
								
								<dd>
									<textarea name="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="wysiwyg large"><?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_texto'];?>
</textarea>
									<div id="msg_txt_texto<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="msg_erro"></div>
									<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
								</dd>
							</dl>
						</fieldset>
					</fieldset>
								
					<input type="hidden" name="cod_id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="cod_id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_id'];?>
" />
					<input type="hidden" name="cod_relacao_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="cod_relacao_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_relacao_idioma'];?>
" />
					<input type="hidden" name="cod_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="cod_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_idioma'];?>
" />
				<?php } ?>
							
				<button type="submit" id="btn_enviar" class="blue"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
				&nbsp;ou&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
			</form>
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