{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				<li class="inativo">{view}$textos_layout[41]{/view}</li>
				<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $controller_acao !== false && isset($controller_acao){/view}
			<form name="frm_conteudo" id="frm_conteudo" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}permissoes/editar', 'frm_conteudo', '{view}$URL_DEFAULT{/view}permissoes', new Array('{view}$textos_layout[51]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
				<fieldset>
					<legend>Dados de publica&ccedil;&atilde;o</legend>
					<dl>
						<dt>
							<label>Controller e Ação</label>
						</dt>
		
						<dd>
							{view}foreach from=$controller_acao item=contr{/view}
								{view}if isset($contr.PermissaoVinculo[0]){/view}
									<input type="checkbox" name="controller_acao[]" id="controller_acao" value="{view}$contr.cod_id{/view}" checked="checked" />
								{view}else{/view}
									<input type="checkbox" name="controller_acao[]" id="controller_acao" value="{view}$contr.cod_id{/view}" />
								{view}/if{/view}
								
								<b>Controller:</b>
								{view}$contr.FrameworkControllers.txt_nome_amigavel{/view}
								<b>Ação:</b>
								{view}$contr.FrameworkAcoes.txt_nome_amigavel{/view} <br />
							{view}/foreach{/view}
						</dd>
		
						<dt>
							<label>Nome do perfil</label>
						</dt>
		
						<dd>
							<input type="text" name="txt_perfil" id="txt_perfil" value="{view}$nome_perfil[0].txt_perfil{/view}" />
							<div id="msg_txt_perfil" class="msg_erro"></div>
						</dd>
					</dl>
				</fieldset>
		
				<input type="hidden" name="cod_perfil" id="cod_perfil" value="{view}$cod_perfil{/view}" />
				<button type="submit" id="btn_enviar" class="gray" />{view}$textos_layout[51]{/view}</button>
				&nbsp;ou&nbsp;
				<a href="{view}$URL_DEFAULT{/view}permissoes" />{view}$textos_layout[61]{/view}</a>
			</form>
		{view}else{/view}
			<div class="notification error">
				{view}$textos_layout[45]{/view}
			</div>
			<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo')" />{view}$textos_layout[52]{/view}</button>
		{view}/if{/view}
	</div>

{view}include file="{view}$FOOTER{/view}"{/view}
