<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 09:49:44
         compiled from "app/view/templates/Textos/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:172132288950fe7cd8651286-54826498%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1011b1c5c3a989af2951e29b94bb81ba36d4009' => 
    array (
      0 => 'app/view/templates/Textos/editar.php',
      1 => 1358763366,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172132288950fe7cd8651286-54826498',
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
    'dados_texto' => 0,
    'dados' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fe7cd88ac06',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fe7cd88ac06')) {function content_50fe7cd88ac06($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/plugin_crop.js"></script>
	<script type="text/javascript">
		var image_handling_file  = "<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/imagem";	
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
textos/imagemEdicao";
	</script>

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
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][31])){?>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<form name="frm_textos" id="frm_textos" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/editar', 'frm_textos', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
		<!--<form name="frm_textos" id="frm_textos" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/editar">-->
				<fieldset>	
					<legend>Imagem</legend>
					<!-- INICIO DO HTML DO PLUGIN -->
					<div id="imagem_cropada_ftp1" name="imagem_cropada_ftp1"></div>								  
					<button type="button" id="deletar1" name="deletar" class="blue">Deletar imagem atual</button>
					<button type="button" id="editar1" name="editar_imagem" class="blue" >Editar imagem</button>
					<button type="button" id="nova_imagem1" class="blue">Inserir imagem</button>
				    <button type="button" id="cancelar_recropagem1" class="blue">Cancelar recropagem</button>										    
				    <button type="button" id="cancelar_upload1" class="blue">Cancelar</button>
				    
				    <div id="todo_conteudo1">
				    	<div id="upload_status1" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
						<input type="hidden" name="nome_img1" id="nome_img1" value='<?php echo $_smarty_tpl->tpl_vars['dados_texto']->value[0]['img_texto'];?>
'  />
					    <input type="hidden" name="nome_img_cropada1" id="nome_img_cropada1" value="<?php echo $_smarty_tpl->tpl_vars['dados_texto']->value[0]['img_texto_cropado'];?>
"  /> 						
						<div id="uploaded_image1"></div>
						<div id="thumbnail_form1" style="display: none;">
							<input  type="hidden" name="x1" value="" id="x11" />
							<input  type="hidden" name="y1" value="" id="y11" />
							<input  type="hidden" name="x2" value="" id="x21" />
							<input  type="hidden" name="y2" value="" id="y21" />
							<input  type="hidden" name="w" value="" id="w1" />
							<input  type="hidden" name="h" value="" id="h1" />
							<button type="button" name="save_thumb1" id="save_thumb1" class="blue" >Salvar</button>
							<button type="button" name="salvar_recropagem1" id="salvar_recropagem1" class="blue" >Salvar Recropagem</button>
							<input  type="hidden" name="flag" id="flag" value="edicao">
							<input  type="hidden" name="id_idioma1" id="id_idioma1" value="1">
							<input  type="hidden" value="1" id="1">
							<input  type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['dados_texto']->value[0]['cod_id'];?>
" id="id1" name="id1" />
						</div>
					</div>
					<!-- FIM DO HTML DO PLUGIN -->
				</fieldset>
				
				<?php  $_smarty_tpl->tpl_vars['dados'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dados']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_texto']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['dad']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['dados']->key => $_smarty_tpl->tpl_vars['dados']->value){
$_smarty_tpl->tpl_vars['dados']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['dad']['iteration']++;
?>
					<fieldset>
						<legend><?php echo $_smarty_tpl->tpl_vars['dados']->value['WebsiteIdiomas']['txt_idioma'];?>
</legend>
						<fieldset>
							<legend>Dados do registro</legend>
							<dl>
								<dt>
									<label>T&iacute;tulo</label>
								</dt>
								<dd>
									<input type="text" name="txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['txt_titulo'];?>
" class="small" />
									<div id="msg_txt_titulo<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" class="msg_erro"></div>
									<p>Preenchimento obrigat&oacute;rio.</p>
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
			
									<p>Preenchimento obrigat&oacute;rio.</p>
								</dd>
	
							</dl>
						</fieldset>
					</fieldset>
					<input type="hidden" name="cod_id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" id="cod_id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['dad']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['cod_id'];?>
" />
				<?php } ?>
				
				<button type="submit" id="btn_enviar" class="blue"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
				&nbsp;ou&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
			</form>
		</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>