{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[43]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[45]){/view}	
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_cadastro !== false && isset($dados_cadastro){/view}
			<form name="frm_cadastro" id="frm_cadastro" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}cadastro/editar', 'frm_cadastro', '{view}$URL_DEFAULT{/view}cadastro', new Array('{view}$textos_layout[51]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
			<!--<form name="frm_cadastro" id="frm_cadastro" method="post" action="{view}$URL_DEFAULT{/view}cadastro/editar">-->
				<fieldset>
					<legend>Dados do registro</legend>
					<dl>
						<dt>
							<label>Nome</label>
						</dt>
						<dd>
							<input type="text" name="txt_nome" id="txt_nome" maxlength="255" value="{view}$dados_cadastro.txt_nome{/view}" />
							<div id="msg_txt_nome" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Sexo</label>
						</dt>
						<dd>
							<select name="cod_sexo" id="cod_sexo">
								<option value="">--{view}$textos_layout[46]{/view}--</option>
								<option value="1" {view}if $dados_cadastro.cod_sexo == 1{/view} selected="selected" {view}/if{/view}>Masculino</option>
								<option value="2" {view}if $dados_cadastro.cod_sexo == 2{/view} selected="selected" {view}/if{/view}>Feminino</option>
							</select>
							<div id="msg_cod_sexo" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Profissão</label>
						</dt>
						<dd>
							<input type="text" name="txt_profissao" id="txt_profissao" maxlength="255" value="{view}$dados_cadastro.txt_profissao{/view}" />
							<div id="msg_txt_profissao" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Data de nascimento</label>
						</dt>
						<dd>
							<input type="text" name="dat_nascimento" id="dat_nascimento" class="data datepicker small" maxlength="10" value="{view}$dados_cadastro.dat_nascimento{/view}" />
							<div id="msg_dat_nascimento" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>CEP</label>
						</dt>
						<dd>
							<input type="text" name="txt_cep" id="txt_cep" class="cep" maxlength="9" value="{view}$dados_cadastro.txt_cep{/view}" onkeyup="getCep('{view}$URL_DEFAULT{/view}cadastro/carregaEndereco','{view}$URL_DEFAULT{/view}cadastro/buscaCidades', $('#txt_cep').val(), 'msg_txt_cep', 'txt_endereco', 'txt_bairro', 'cod_estado', 'cod_cidade', 'combo_cidade')" />
							<div id="msg_txt_cep" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Endereço</label>
						</dt>
						<dd>
							<input type="text" name="txt_endereco" id="txt_endereco" maxlength="255" value="{view}$dados_cadastro.txt_endereco{/view}" />
							<div id="msg_txt_endereco" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Bairro</label>
						</dt>
						<dd>
							<input type="text" name="txt_bairro" id="txt_bairro" maxlength="255" value="{view}$dados_cadastro.txt_bairro{/view}" />
							<div id="msg_txt_bairro" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Estado</label>
						</dt>
						<dd>
							<select name="cod_estado" id="cod_estado" onchange="getCidade('{view}$URL_DEFAULT{/view}cadastro/buscaCidades',$(this).val(),'cod_cidade','combo_cidade')">
                            	<option value="">--{view}$textos_layout[46]{/view}--</option>
                            	{view}foreach from=$estados item=estado{/view}
                            		<option value="{view}$estado.cod_id{/view}" {view}if $dados_cadastro.cod_estado == $estado.cod_id{/view} selected="selected" {view}/if{/view}>{view}$estado.txt_uf{/view}</option>
                            	{view}/foreach{/view}
                            </select>
							<div id="msg_cod_estado" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Cidade</label>
						</dt>
						<dd>
							<div id="combo_cidade">
								<select name="cod_cidade" id="cod_cidade" >
									<option value="">--{view}$textos_layout[46]{/view}--</option>
									
									{view}foreach from=$dados_cadastro.cidades item=cidade{/view}
	                            		<option value="{view}$cidade.cod_id{/view}" {view}if $cidade.cod_id == $dados_cadastro.cod_cidade{/view} selected="selected" {view}/if{/view}>{view}$cidade.txt_cidade{/view}</option>
	                            	{view}/foreach{/view}
	                            	
								</select>
							</div>
							<div id="msg_cod_cidade" class="msg_erro"></div>
						</dd>

						<dt>
							<label>Telefone</label>
						</dt>
						<dd>
							<input type="text" name="txt_telefone" id="txt_telefone" class="telefone" maxlength="14" value="{view}$dados_cadastro.txt_telefone{/view}" />
							<div id="msg_txt_telefone" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>E-mail</label>
						</dt>
						<dd>
							<input type="text" name="txt_email" id="txt_email" maxlength="255" value="{view}$dados_cadastro.txt_email{/view}" />
							<div id="msg_txt_email" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Comentário</label>
						</dt>
						<dd>
							<textarea name="txt_comentario" id="txt_comentario" class="wysiwyg large">{view}$dados_cadastro.txt_comentario{/view}</textarea>
							<div id="msg_txt_comentario" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Receber newsletter</label>
						</dt>
						<dd>
							<input type="checkbox" name="cod_chk_newsletter" id="cod_chk_newsletter" value="1" {view}if $dados_cadastro.cod_chk_newsletter == 1{/view} checked="checked" {view}/if{/view}>
						</dd>
					</dl>
				</fieldset>
	
				<input type="hidden" name="cod_id" id="cod_id" value="{view}$dados_cadastro.cod_id{/view}" />
	
				<button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[51]{/view}</button>
				&nbsp;ou&nbsp;
				{view}if isset($smarty.session.UserPermissoes[43]){/view}
					<a href="{view}$URL_DEFAULT{/view}cadastro">{view}$textos_layout[61]{/view}</a>
				{view}/if{/view}
			</form>
		{view}else{/view}
			<div class="notification error">
				{view}$textos_layout[45]{/view}
			</div>
			{view}if isset($smarty.session.UserPermissoes[43]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro')">{view}$textos_layout[52]{/view}</button>
			{view}/if{/view}
			
		{view}/if{/view}
	</div>

{view}include file="{view}$FOOTER{/view}"{/view}