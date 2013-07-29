{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[8]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[32]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[10]){/view}
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<form name="frm_usuario" id="frm_usuario" action="javascript:acao('{view}$URL_DEFAULT{/view}usuarios/incluir', 'frm_usuario', '{view}$URL_DEFAULT{/view}usuarios', new Array('{view}$textos_layout[43]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
		<!--<form name="frm_usuario" id="frm_usuario" method="post" action="{view}$URL_DEFAULT{/view}usuarios/incluir">-->
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Nome</label>
					</dt>
					<dd>
						<input type="text" name="txt_nome" id="txt_nome" class="medium" maxlength="60" />
						<div id="msg_txt_nome" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
					
					<dt>
						<label>E-mail</label>
					</dt>
					<dd>
						<input type="text" name="txt_email" id="txt_email" class="medium" maxlength="255" />
						<div id="msg_txt_email" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
					
					<dt>
						<label>Login</label>
					</dt>
					<dd>
						<input type="text" name="txt_login" id="txt_login" class="medium" maxlength="20" onchange="verificaLogin('{view}$URL_DEFAULT{/view}usuarios/verificalogin', 'txt_login', 'msg_txt_login', $(this).val())" />
						<div id="msg_txt_login" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
					
					<dt>
						<label>Senha</label>
					</dt>
					<dd>
						<input type="password" name="txt_senha" id="txt_senha" class="medium" maxlength="255"   />
						<div id="msg_txt_senha" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
					
					<dt>
						<label>Confirmar a senha</label>
					</dt>
					
					<dd>
						<input type="password" name="txt_confirma_senha" id="txt_confirma_senha" class="medium" maxlength="255"  />
						<div id="msg_txt_confirma_senha" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
					<dt>
						<label>Status</label>
					</dt>
					<dd>
						<select name="cod_status" id="cod_status">
							<option selected value="">--Selecione o status--</option>
							{view}foreach from=$dados_status item=status{/view}
								<option value="{view}$status.cod_id{/view}">{view}$status.txt_descricao{/view}</option>
							{view}/foreach{/view}
						</select>
						<div id="msg_cod_status" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
					
					<dt>
						<label>Perfil do usuário</label>
					</dt>
					<dd>
						<select name="cod_perfil" id="cod_perfil">
							<option selected value="">--Selecione o perfil--</option>
							{view}foreach from=$perfis item=perfil{/view}
								<option value="{view}$perfil.cod_tipo{/view}">{view}$perfil.txt_perfil{/view}</option>
							{view}/foreach{/view}
						</select>
						<div id="msg_perfil" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
					
					<dt>
						<label>Código de referência</label>
					</dt>
					<dd>
						<input type="text" name="cod_referencia" id="cod_referencia" class="medium" maxlength="255" />
						<div id="msg_cod_referencia" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
			  </dl>
			</fieldset>
			
			<input type="hidden" name="check_senha" id="check_senha" value="S" /> 
			<button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[43]{/view}</button>
			&nbsp;ou&nbsp;
			{view}if isset($smarty.session.UserPermissoes[8]){/view}
				<a href="{view}$URL_DEFAULT{/view}usuarios" />{view}$textos_layout[61]{/view}</a>
			{view}/if{/view}
		</form>
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}