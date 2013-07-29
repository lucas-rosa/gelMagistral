{view}include file="{view}$HEAD{/view}"{/view}

	{view}if isset($params.mensagem_confirmacao) && $params.sucesso == true{/view}
		<div class="notification success">
			<a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
			<p>{view}$params.mensagem_confirmacao{/view}</p>
		</div>
	{view}/if{/view}
	
	{view}if isset($params.mensagem_confirmacao) && $params.erro == true{/view}
		<div class="notification error">
			<a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
			<p>{view}$params.mensagem_confirmacao{/view}</p>
		</div>
	{view}/if{/view}
	
<form name="frm_cadastro" id="frm_cadastro" autocomplete="off" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}cadastro/cadastrar','frm_cadastro', '{view}$URL_DEFAULT{/view}cadastro', new Array('{view}$textos_layout[3]{/view}', '{view}$textos_layout[2]{/view}'), 'btn_enviar', 'msg_erro')">
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
            	<input type="text" name="txt_cep" id="txt_cep" class="cep" maxlength="9" onkeyup="getCep('{view}$URL_DEFAULT{/view}cadastro/carregaEndereco','{view}$URL_DEFAULT{/view}cadastro/buscaCidades', $('#txt_cep').val(), 'msg_txt_cep', 'txt_endereco', 'txt_bairro', 'cod_estado', 'cod_cidade', 'combo_cidade')" />
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
				<select name="cod_estado" id="cod_estado" onchange="getCidade('{view}$URL_DEFAULT{/view}cadastro/buscacidades',$(this).val(), $(this).attr('name'),'combo_cidade')">
                   	<option value="">--Estado--</option>
                   	{view}foreach from=$estados item=estado{/view}
                   		<option value="{view}$estado.cod_id{/view}">{view}$estado.txt_uf{/view}</option>
                   	{view}/foreach{/view}
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
            	<img alt="C&oacute;digo de Seguran&ccedil;a" src="{view}$URL_DEFAULT{/view}cadastro/gerarCaptcha" width="150" />
            	<input type="text" name="captcha" id="captcha" maxlenght="6" />
            	<div id="msg_captcha" class="msg_erro"></div>
            </dd>
        </dl>
    </fieldset>
    <button type="submit" id="btn_enviar" />Enviar</button>
</form>	

{view}include file="{view}$FOOTER{/view}"{/view}