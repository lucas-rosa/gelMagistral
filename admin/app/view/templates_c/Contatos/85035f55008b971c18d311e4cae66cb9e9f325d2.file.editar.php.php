<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 09:49:34
         compiled from "app/view/templates/Contatos/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:171745318250fe7cce9aa289-17024677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85035f55008b971c18d311e4cae66cb9e9f325d2' => 
    array (
      0 => 'app/view/templates/Contatos/editar.php',
      1 => 1358853728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171745318250fe7cce9aa289-17024677',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_contatos' => 0,
    'cod_relacao_idioma' => 0,
    'contatos' => 0,
    'estados' => 0,
    'estado' => 0,
    'cidade' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fe7cceefc0f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fe7cceefc0f')) {function content_50fe7cceefc0f($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][12])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/detalhes')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][13])){?>
					<li><a class="default-tab" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_contatos']->value[0]['cod_id']!=''){?>
			<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/editar', 'frm_contatos','<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/detalhes/cod_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['cod_relacao_idioma']->value;?>
', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
			<!--<form name="frm_contatos" id="frm_contatos" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/editar">-->
				<?php  $_smarty_tpl->tpl_vars['contatos'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['contatos']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_contatos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['con']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['contatos']->key => $_smarty_tpl->tpl_vars['contatos']->value){
$_smarty_tpl->tpl_vars['contatos']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['con']['iteration']++;
?>
					<fieldset>
						<legend><strong><?php echo $_smarty_tpl->tpl_vars['contatos']->value['txt_idioma'];?>
</strong></legend>
						<fieldset>
							<legend>Dados do registro</legend>
							<fieldset>
								<dl>
			            			<dt>
										<label>Raz&atilde;o Social</label>
			                        </dt>
			                        
			                        <dd>
			                        	<input type="text" name="txt_razao_social<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="txt_razao_social<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" onkeyup="mascara(this,soLetras)" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['txt_razao_social'];?>
" class="medium" />
			                        </dd>
		
			                        <dt>
										<label>CNPJ</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_cnpj<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="txt_cnpj<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" maxlength="18" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['txt_cnpj'];?>
" class="medium cnpj"/>
			                        </dd>
		
			                        <dt>
										<label>N&uacute;mero</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_numero<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="txt_numero<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" onkeyup="mascara(this,soNumero)" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['txt_numero'];?>
"class="small" />
			                        	<div id="msg_erro_txt_numero<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" class="msg_erro"></div>
			                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
			                        </dd>
		
			                        <dt>
										<label>Complemento</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_complemento<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="txt_complemento<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['txt_complemento'];?>
" class="small"/>
			                        </dd>
		
			                        <dt>
										<label>CEP</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_cep<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="txt_cep<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" maxlength="9" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['txt_cep'];?>
" class="small cep" onkeyup="getCep('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/carregaEndereco','<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/buscaCidades', $('#txt_cep<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
').val(), 'msg_erro_txt_cep<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
', 'txt_endereco<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
', 'txt_bairro<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
', 'cod_estado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
', 'cod_cidade<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
', 'combo_cidade<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
')"/>
			                        	<div id="msg_erro_txt_cep<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" class="msg_erro"></div>
			                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
			                        </dd>
			                        
			                        <dt>
										<label>Endere&ccedil;o</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_endereco<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="txt_endereco<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" onkeyup="mascara(this,soLetras)" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['txt_endereco'];?>
" class="medium"/>
			                        	<div id="msg_erro_txt_endereco<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" class="msg_erro"></div>
			                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
			                        </dd>
		
			                        <dt>
										<label>Bairro</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_bairro<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="txt_bairro<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" onkeyup="mascara(this,soLetras)" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['txt_bairro'];?>
"class="medium"/>
			                        	<div id="msg_erro_txt_bairro<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" class="msg_erro"></div>
			                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
			                        </dd>
		
			                        <dt>
										<label>Estado</label>
			                        </dt>
			                        <dd>
			                        	<select name="cod_estado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="cod_estado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" onchange="getCidade('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/buscaCidades',$(this).val(),'cod_cidade<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
','combo_cidade<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
')">
			                            	<option value="">--<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
--</option>
			                            	<?php  $_smarty_tpl->tpl_vars['estado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estado']->key => $_smarty_tpl->tpl_vars['estado']->value){
$_smarty_tpl->tpl_vars['estado']->_loop = true;
?>
			                            		<option value="<?php echo $_smarty_tpl->tpl_vars['estado']->value['cod_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['contatos']->value['cod_estado']==$_smarty_tpl->tpl_vars['estado']->value['cod_id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['estado']->value['txt_uf'];?>
</option>
			                            	<?php } ?>
			                            </select>
			                        	<div id="msg_erro_cod_estado<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" class="msg_erro"></div>
			                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
			                        </dd>
		
			                        <dt>
										<label>Cidade</label>
			                        </dt>
			                        <dd>
			                        	<div id="combo_cidade<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
">
											<select name="cod_cidade<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="cod_cidade<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" >
												<option value="">--<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
--</option>
												
												<?php  $_smarty_tpl->tpl_vars['cidade'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cidade']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['contatos']->value['cidades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cidade']->key => $_smarty_tpl->tpl_vars['cidade']->value){
$_smarty_tpl->tpl_vars['cidade']->_loop = true;
?>
				                            		<option value="<?php echo $_smarty_tpl->tpl_vars['cidade']->value['cod_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['cidade']->value['cod_id']==$_smarty_tpl->tpl_vars['contatos']->value['cod_cidade']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cidade']->value['txt_cidade'];?>
</option>
				                            	<?php } ?>
				                            	
											</select>
										</div>
			                        	<div id="msg_erro_cod_cidade<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" class="msg_erro"></div>
			                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
			                        </dd>
								
			                        <dt>
										<label>Telefone</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_telefone<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="txt_telefone<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" maxlength="14" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['txt_telefone'];?>
" class="small telefone"/>
			                        	<div id="msg_erro_txt_telefone<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" class="msg_erro"></div>
			                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
			                        </dd>
		
			                        <dt>
										<label>Pa&iacute;s</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_pais<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="txt_pais<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" onkeyup="mascara(this,soLetras)" maxlenght="100" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['txt_pais'];?>
" class="medium"/>
			                        	<div id="msg_erro_txt_pais<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" class="msg_erro"></div>
			                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
			                        </dd>
			                    </dl>
			                </fieldset>
					
							<fieldset>
								<legend>Dados para Google Maps</legend>
								<dl>
			                        <dt>
										<label>Latitude</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="cod_latitude<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="cod_latitude<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['cod_latitude'];?>
" class="small"/>
			                        	<div id="msg_erro_latitude<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" class="msg_erro"></div>
			                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
			                        </dd>
		
			                        <dt>
										<label>Longitude</label>
			                        </dt>
			                        
			                        <dd>
			                        	<input type="text" name="cod_longitude<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="cod_longitude<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['cod_longitude'];?>
" class="small"/>
			                        	<div id="msg_erro_longitude<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" class="msg_erro"></div>
			                        	<p><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[47];?>
</p>
			                        </dd>
			                        
			                        <dd>
			                        	<input type="hidden" name="cod_id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="cod_id<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['cod_id'];?>
">
			                        	<input type="hidden" name="cod_relacao_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="cod_relacao_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['cod_relacao_idioma'];?>
" />
			                        	<input type="hidden" name="cod_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" id="cod_idioma<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['con']['iteration'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['contatos']->value['cod_idioma'];?>
" />
			                        </dd>
			                    </dl>
			                </fieldset>
				        </fieldset>
				    </fieldset>
				<?php } ?>
	                
	            <button type="submit" id="btn_enviar" class="blue"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
	            &nbsp;ou&nbsp; 
	            <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/detalhes" /><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
	        </form>
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