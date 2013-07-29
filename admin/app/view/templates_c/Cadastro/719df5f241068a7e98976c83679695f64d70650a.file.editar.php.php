<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 15:21:06
         compiled from "app/view/templates/Cadastro/editar.php" */ ?>
<?php /*%%SmartyHeaderCode:180813048550feca82894de8-16919881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '719df5f241068a7e98976c83679695f64d70650a' => 
    array (
      0 => 'app/view/templates/Cadastro/editar.php',
      1 => 1358857567,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '180813048550feca82894de8-16919881',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_cadastro' => 0,
    'estados' => 0,
    'estado' => 0,
    'cidade' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50feca82b6e28',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50feca82b6e28')) {function content_50feca82b6e28($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][43])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][45])){?>	
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_cadastro']->value!==false&&isset($_smarty_tpl->tpl_vars['dados_cadastro']->value)){?>
			<form name="frm_cadastro" id="frm_cadastro" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/editar', 'frm_cadastro', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
			<!--<form name="frm_cadastro" id="frm_cadastro" method="post" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/editar">-->
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Nome</label>
						</dt>
						<dd>
							<input type="text" name="txt_nome" id="txt_nome" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_nome'];?>
" />
							<div id="msg_txt_nome" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Sexo</label>
						</dt>
						<dd>
							<select name="cod_sexo" id="cod_sexo">
								<option value="">--<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
--</option>
								<option value="1" <?php if ($_smarty_tpl->tpl_vars['dados_cadastro']->value['cod_sexo']==1){?> selected="selected" <?php }?>>Masculino</option>
								<option value="2" <?php if ($_smarty_tpl->tpl_vars['dados_cadastro']->value['cod_sexo']==2){?> selected="selected" <?php }?>>Feminino</option>
							</select>
							<div id="msg_cod_sexo" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Profissão</label>
						</dt>
						<dd>
							<input type="text" name="txt_profissao" id="txt_profissao" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_profissao'];?>
" />
							<div id="msg_txt_profissao" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Data de nascimento</label>
						</dt>
						<dd>
							<input type="text" name="dat_nascimento" id="dat_nascimento" class="data datepicker small" maxlength="10" value="<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['dat_nascimento'];?>
" />
							<div id="msg_dat_nascimento" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>CEP</label>
						</dt>
						<dd>
							<input type="text" name="txt_cep" id="txt_cep" class="cep" maxlength="9" value="<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_cep'];?>
" onkeyup="getCep('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/carregaEndereco','<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/buscaCidades', $('#txt_cep').val(), 'msg_txt_cep', 'txt_endereco', 'txt_bairro', 'cod_estado', 'cod_cidade', 'combo_cidade')" />
							<div id="msg_txt_cep" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Endereço</label>
						</dt>
						<dd>
							<input type="text" name="txt_endereco" id="txt_endereco" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_endereco'];?>
" />
							<div id="msg_txt_endereco" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Bairro</label>
						</dt>
						<dd>
							<input type="text" name="txt_bairro" id="txt_bairro" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_bairro'];?>
" />
							<div id="msg_txt_bairro" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Estado</label>
						</dt>
						<dd>
							<select name="cod_estado" id="cod_estado" onchange="getCidade('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/buscaCidades',$(this).val(),'cod_cidade','combo_cidade')">
                            	<option value="">--<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
--</option>
                            	<?php  $_smarty_tpl->tpl_vars['estado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estado']->key => $_smarty_tpl->tpl_vars['estado']->value){
$_smarty_tpl->tpl_vars['estado']->_loop = true;
?>
                            		<option value="<?php echo $_smarty_tpl->tpl_vars['estado']->value['cod_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['dados_cadastro']->value['cod_estado']==$_smarty_tpl->tpl_vars['estado']->value['cod_id']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['estado']->value['txt_uf'];?>
</option>
                            	<?php } ?>
                            </select>
							<div id="msg_cod_estado" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Cidade</label>
						</dt>
						<dd>
							<div id="combo_cidade">
								<select name="cod_cidade" id="cod_cidade" >
									<option value="">--<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[46];?>
--</option>
									
									<?php  $_smarty_tpl->tpl_vars['cidade'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cidade']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_cadastro']->value['cidades']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cidade']->key => $_smarty_tpl->tpl_vars['cidade']->value){
$_smarty_tpl->tpl_vars['cidade']->_loop = true;
?>
	                            		<option value="<?php echo $_smarty_tpl->tpl_vars['cidade']->value['cod_id'];?>
" <?php if ($_smarty_tpl->tpl_vars['cidade']->value['cod_id']==$_smarty_tpl->tpl_vars['dados_cadastro']->value['cod_cidade']){?> selected="selected" <?php }?>><?php echo $_smarty_tpl->tpl_vars['cidade']->value['txt_cidade'];?>
</option>
	                            	<?php } ?>
	                            	
								</select>
							</div>
							<div id="msg_cod_cidade" class="msg_erro"></div>
						</dd>

						<dt>
							<label>Telefone</label>
						</dt>
						<dd>
							<input type="text" name="txt_telefone" id="txt_telefone" class="telefone" maxlength="14" value="<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_telefone'];?>
" />
							<div id="msg_txt_telefone" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>E-mail</label>
						</dt>
						<dd>
							<input type="text" name="txt_email" id="txt_email" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_email'];?>
" />
							<div id="msg_txt_email" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Comentário</label>
						</dt>
						<dd>
							<textarea name="txt_comentario" id="txt_comentario" class="wysiwyg large"><?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_comentario'];?>
</textarea>
							<div id="msg_txt_comentario" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Receber newsletter</label>
						</dt>
						<dd>
							<input type="checkbox" name="cod_chk_newsletter" id="cod_chk_newsletter" value="1" <?php if ($_smarty_tpl->tpl_vars['dados_cadastro']->value['cod_chk_newsletter']==1){?> checked="checked" <?php }?>>
						</dd>
					</dl>
				</fieldset>
	
				<input type="hidden" name="cod_id" id="cod_id" value="<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['cod_id'];?>
" />
	
				<button type="submit" id="btn_enviar" class="blue"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[51];?>
</button>
				&nbsp;ou&nbsp;
				<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[61];?>
</a>
			</form>
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
		<?php }?>
	</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>