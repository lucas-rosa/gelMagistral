<?php /* Smarty version Smarty-3.1.1, created on 2012-12-20 14:13:59
         compiled from "app/view/templates/Configuracoes/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:122149617950d339475db7d2-82558242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14c85c27025043f51f7fb771519169d44020f8aa' => 
    array (
      0 => 'app/view/templates/Configuracoes/editar.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122149617950d339475db7d2-82558242',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'dados_configuracao' => 0,
    'textos_layout' => 0,
    'idiomas' => 0,
    'idioma' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50d3394784d49',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50d3394784d49')) {function content_50d3394784d49($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][4])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['cod_id'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][3])){?>
					<li><a class="default-tab" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_configuracao']->value!==false&&isset($_smarty_tpl->tpl_vars['dados_configuracao']->value)){?>
			<form name="frm_configuracoes" id="frm_configuracoes" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/editar', 'frm_configuracoes','<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/cod_id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['cod_id'];?>
', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
			<!--<form name="frm_configuracoes" id="frm_configuracoes" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/editar">-->
				<fieldset>
					<legend>Configura&ccedil;&otilde;es gerais</legend>                
					<dl>
						<dt>
							<label>T&iacute;tulo padr&atilde;o do website</label>
	                    </dt>
	                    
	                    <dd>
	                    	<input type="text" name="txt_default_title" id="txt_default_title" value="<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_title'];?>
" class="medium" maxlength="255"/>
	                    	<div id="msg_txt_default_title" class="msg_erro"></div>
	                    	<p>Recomenda-se o t&iacute;tulo ter de 10 a 70 caracteres</p>
	                    	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
	                    </dd>
					</dl>
					
					<dl>
						<dt>
							<label>Idioma padr&atilde;o</label>
						</dt>
	                        
	                    <dd>
	                    	<select name="cod_idioma_default" id="cod_idioma_default" class="small">
	                    		<option value="">--<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
--</option>
	                    		<?php  $_smarty_tpl->tpl_vars['idioma'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['idioma']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['idiomas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['idioma']->key => $_smarty_tpl->tpl_vars['idioma']->value){
$_smarty_tpl->tpl_vars['idioma']->_loop = true;
?>
	                    			<option value="<?php echo $_smarty_tpl->tpl_vars['idioma']->value['cod_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['dados_configuracao']->value['cod_idioma_default']==$_smarty_tpl->tpl_vars['idioma']->value['cod_id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['idioma']->value['txt_idioma'];?>
</option>
	                    		<?php } ?>
	                        </select>
	                        <div id="msg_cod_idioma_default" class="msg_erro"></div>
	            			<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
	            		</dd>
					</dl>
					
					<dl>
						<dt>
							<label>Palavras-chave padr&atilde;o do website</label>
	                    </dt>
	                        
	                    <dd>
	                    	<textarea name="txt_default_key" id="txt_default_key" class="medium"><?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_key'];?>
</textarea>
	                    	<div id="msg_txt_default_key" class="msg_erro"></div>
	                    	<p>Recomenda-se o uso de no m&aacute;ximo 15 palavras-chave. Os termos devem ser separados por v&iacute;rgulas.</p>
	                    	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
	                    </dd>
					</dl>
					
					<dl>
						<dt>
							<label>Descri&ccedil;&atilde;o padr&atilde;o do website</label>
	                    </dt>
	                        
	                    <dd>
	                    	<textarea name="txt_default_desc" id="txt_default_desc" class="medium"><?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_default_desc'];?>
</textarea>
	                        <div id="msg_txt_default_desc" class="msg_erro"></div>
	                        <p>Recomenda-se a descri&ccedil;&atilde;o ter de 70 a 160 caracteres</p>
	                        <p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
	                    </dd>
					</dl>
					
					<dl>
						<dt>
							<label>E-mail (webmaster)</label>
	                    </dt>                       
	                    <dd>
	                    	<input type="text" name="txt_email_webmaster" id="txt_email_webmaster" value="<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['txt_email_webmaster'];?>
" class="medium" maxlength="255"/>
	                    	<div id="msg_txt_email_webmaster" class="msg_erro"></div>
	                        <p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
	                    </dd>
	                </dl>
	            </fieldset>
	                
	            <button type="submit" id="btn_enviar" class="gray" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
	            &nbsp;ou&nbsp; 
	            <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/cod_id/<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['cod_id'];?>
" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
	            <input type="hidden" name="cod_id" id="cod_id" value="<?php echo $_smarty_tpl->tpl_vars['dados_configuracao']->value['cod_id'];?>
" />
	        </form>
	    <?php }else{ ?>
	    	<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes')" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
	    <?php }?>
    </div>   	
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>