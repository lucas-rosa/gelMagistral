<?php /* Smarty version Smarty-3.1.1, created on 2013-07-24 05:09:03
         compiled from "app/view/templates/Cadastro/index.php" */ ?>
<?php /*%%SmartyHeaderCode:880341051ef8b9fe5fc72-42390146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6d7ac055aff8885ede1acc98c0a7f865aa7d69f' => 
    array (
      0 => 'app/view/templates/Cadastro/index.php',
      1 => 1374503893,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '880341051ef8b9fe5fc72-42390146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'params' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'estados' => 0,
    'estado' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_51ef8ba01081a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ef8ba01081a')) {function content_51ef8ba01081a($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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
	
<form name="frm_cadastro" id="frm_cadastro" autocomplete="off" method="post" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/cadastrar','frm_cadastro', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[3];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
'), 'btn_enviar', 'msg_erro')">
	<fieldset>
        <legend>Legenda do fieldset</legend>
    	<dl>
            <dt><label>Nome</label></dt>
            <dd>
            	<input type="text" name="txt_nome" id="txt_nome" maxlength="255" />
            	<div id="msg_txt_nome" class="msg_erro"></div>
            </dd>
            
            <dt><label>Sexo</label></dt>
            <dd>
	            <input type="radio" name="cha_sexo" value="M" id="sexo_0" checked="checked" /> <label for="sexo_0"> Masculino</label>
	            <input type="radio" name="cha_sexo" value="F" id="sexo_1" /> <label for="sexo_1"> Feminino</label> 
            </dd>
        
            <dt><label>E-mail</label></dt>
            <dd>
	            <input type="text" name="txt_email" id="txt_email" maxlength="255" />
	            <div id="msg_txt_email" class="msg_erro"></div>
            </dd>
        
            <dt><label>Profissão</label></dt>
            <dd>
	            <input type="text" name="txt_profissao" id="txt_profissao" maxlength="255" />
	            <div id="msg_txt_profissao" class="msg_erro"></div>
            </dd>
        
            <dt><label>Data de nascimento</label></dt>
            <dd>
	            <input type="text" name="dat_nascimento" id="dat_nascimento" maxlength="10" class="data" />
	            <div id="msg_dat_nascimento" class="msg_erro"></div>
            </dd>
        
            <dt><label>CEP</label></dt>
            <dd>
            	<input type="text" name="txt_cep" id="txt_cep" class="cep" maxlength="9" onkeyup="getCep('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/carregaEndereco','<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/buscaCidades', $('#txt_cep').val(), 'msg_txt_cep', 'txt_endereco', 'txt_bairro', 'cod_estado', 'cod_cidade', 'combo_cidade')" />
	            <div id="msg_txt_cep" class="msg_erro"></div>
            </dd>
        
            <dt><label>Endere&ccedil;o completo</label></dt>
            <dd>
	            <input type="text" name="txt_endereco" id="txt_endereco" maxlength="255" />
	            <div id="msg_txt_endereco" class="msg_erro"></div>
            </dd>
        
            <dt><label>Bairro</label></dt>
            <dd>
	            <input type="text" name="txt_bairro" id="txt_bairro" maxlength="255" />
	            <div id="msg_txt_bairro" class="msg_erro"></div>
            </dd>
            
            <dt><label>Estado</label></dt>
			<dd>
				<select name="cod_estado" id="cod_estado" onchange="getCidade('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/buscacidades',$(this).val(), $(this).attr('name'),'combo_cidade')">
                   	<option value="">--Estado--</option>
                   	<?php  $_smarty_tpl->tpl_vars['estado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['estado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['estado']->key => $_smarty_tpl->tpl_vars['estado']->value){
$_smarty_tpl->tpl_vars['estado']->_loop = true;
?>
                   		<option value="<?php echo $_smarty_tpl->tpl_vars['estado']->value['cod_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['estado']->value['txt_uf'];?>
</option>
                   	<?php } ?>
                </select>
                <div id="msg_cod_estado" class="msg_erro"></div>
			</dd>
        
            <dt><label>Cidade</label></dt>
            <dd>
				<div id="combo_cidade">
					<select name="cod_cidade" disabled="disabled" id="cod_cidade">
						<option value="">--Cidade--</option>
					</select>
				</div>
            	<div id="msg_cod_cidade" class="msg_erro"></div>
            </dd>

			<dt><label>Telefone</label></dt>
            <dd>
	            <input type="text" name="txt_telefone" id="txt_telefone" maxlength="14" class="telefone"/>
	            <div id="msg_txt_telefone" class="msg_erro"></div>
            </dd>
        
            <dt><label>Mensagem</label></dt>
            <dd>
            	<textarea name="txt_comentario" id="txt_comentario"></textarea>
            	<div id="msg_txt_comentario" class="msg_erro"></div>
            </dd>
        
            <dd>
            	<input name="chk_newsletter" type="checkbox" value="S" id="chk_newsletter"/> <label for="chk_newsletter">Quero receber newsletter</label>
            </dd>
        
            <dt><label>C&oacute;digo de Seguran&ccedil;a</label></dt>
            <dd>
            	<img alt="C&oacute;digo de Seguran&ccedil;a" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/gerarCaptcha" width="150" />
            	<input type="text" name="captcha" id="captcha" maxlenght="6" />
            	<div id="msg_captcha" class="msg_erro"></div>
            </dd>
        </dl>
    </fieldset>
    <button type="submit" id="btn_enviar" />Enviar</button>
</form>	

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>