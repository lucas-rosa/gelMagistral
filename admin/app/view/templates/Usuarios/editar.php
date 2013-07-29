{view}include file="{view}$HEAD{/view}"{/view}

<header>
	<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
	<nav>
		<ul class="tab-switch">
			{view}if isset($smarty.session.UserPermissoes[8]){/view}
				<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
			{view}/if{/view}
			
			{view}if isset($smarty.session.UserPermissoes[32]){/view}
				<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
			{view}/if{/view}
			
			{view}if isset($smarty.session.UserPermissoes[10]){/view}
				<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
			{view}/if{/view}
		</ul>
	</nav>
</header>

<div class="tab default-tab" id="tab0">
	{view}if $dados_usuario !== false{/view}
		<form name="frm_usuario" id="frm_usuario" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}usuarios/editar', 'frm_usuario', '{view}$URL_DEFAULT{/view}usuarios', new Array('{view}$textos_layout[51]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
		<!--<form name="frm_usuario" id="frm_usuario" method="post" action="{view}$URL_DEFAULT{/view}usuarios/editar">-->
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Nome</label>
					</dt>
					<dd>
						<input type="text" name="txt_nome" id="txt_nome" value="{view}$dados_usuario.txt_nome{/view}" class="medium" maxlength="60" />
						<div id="msg_txt_nome" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
	
					<dt>
						<label>E-mail</label>
					</dt>
					<dd>
						<input type="text" name="txt_email" id="txt_email" value="{view}$dados_usuario.txt_email{/view}" class="medium" maxlength="255" />
						<div id="msg_txt_email" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
	
					<dt>
						<label>Login</label>
					</dt>
					<dd>
						<input type="text" name="txt_login" id="txt_login" value="{view}$dados_usuario.txt_login{/view}" class="medium" maxlength="20" onchange="verificaLogin('{view}$URL_DEFAULT{/view}usuarios/verificalogin', 'txt_login', 'msg_txt_login', $(this).val(), $('#cod_id').val())" />
						<div id="msg_txt_login" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
	
					<dt>
						<label>Status</label>
					</dt>
					<dd>
						<select name="cod_status" id="cod_status">
							<option value="">{view}$textos_layout[46]{/view}</option>
							{view}foreach from=$array_status item=status{/view}
								<option value="{view}$status.cod_id{/view}" {view}if $dados_usuario.cod_status==$status.cod_id{/view} selected="selected"{view}/if{/view}">{view}$status.txt_descricao{/view}</option>
							{view}/foreach{/view}
						</select>
						<div id="msg_cod_status" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
	
					<dt>
						<label>Alterar a senha?</label>
					</dt>
					<dd>
						<input type="checkbox" name="check_senha" id="check_senha" value="S" onclick="checkSenha()" />
					</dd>
	
					<div id="senhas" style="display: none;">
						<dt>
							<label>Senha</label>
						</dt>
						<dd>
							<input type="password" name="txt_senha" id="txt_senha" class="medium" maxlength="255" disabled="disabled" />
							<div id="msg_txt_senha" class="msg_erro"></div>
							<p>Preenchimento obrigat&oacute;rio (se checkbox marcado).</p>
						</dd>
	
						<dt>
							<label>Confirmar a senha</label>
						</dt>
						<dd>
							<input type="password" name="txt_confirma_senha" id="txt_confirma_senha" class="medium" maxlength="255" disabled="disabled" />
							<div id="msg_txt_confirma_senha" class="msg_erro"></div>
							<p>Preenchimento obrigat&oacute;rio (se checkbox marcado).</p>
						</dd>
					</div>
					
					<dt>
						<label>Permissões</label>
					</dt>
					<!--<dd>
						{view}foreach from=$permissoes item=perm{/view}
							{view}if isset($perm.PermissaoUsuario[0]){/view}
								<input type="checkbox" checked name="permissao[]" value="{view}$perm.cod_id{/view}" />
								<strong>Controller:</strong>{view}$perm.FrameworkControllers.txt_nome_amigavel{/view}<strong>Ação:</strong>{view}$perm.FrameworkAcoes.txt_nome_amigavel{/view}<br> <br>
							{view}else{/view}
								<input type="checkbox" name="permissao[]" value="{view}$perm.cod_id{/view}" />
								<strong>Controller:</strong>{view}$perm.FrameworkControllers.txt_nome_amigavel{/view}<strong>Ação:</strong>{view}$perm.FrameworkAcoes.txt_nome_amigavel{/view}<br> <br>
							{view}/if{/view}
						{view}/foreach{/view}
					</dd>-->
					
					<dd>
						{view}$html{/view}
					</dd>
				</dl>
			</fieldset>
	
			<button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[51]{/view}</button>
			&nbsp;ou&nbsp;
			
			{view}if isset($smarty.session.UserPermissoes[8]){/view}
				<a href="{view}$URL_DEFAULT{/view}usuarios" />{view}$textos_layout[61]{/view}</a>
			{view}/if{/view}	
			<input type="hidden" name="cod_id" id="cod_id" value="{view}$dados_usuario.cod_id{/view}" />
		</form>
	{view}else{/view}
		<div class="notification error">
				<p>
					<strong>{view}$textos_layout[45]{/view}</strong>
				</p>
			</div>
		{view}if isset($smarty.session.UserPermissoes[8]){/view}
			<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios')">{view}$textos_layout[52]{/view}</button>
		{view}/if{/view}
	{view}/if{/view}
</div>
{view}include file="{view}$FOOTER{/view}"{/view}
