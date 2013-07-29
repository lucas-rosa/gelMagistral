{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[34]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}perfis')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[35]){/view}
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[33]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}perfis/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[36]){/view}
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>
	
	<div class="tab default-tab" id="tab0">
		{view}if $controller_acao !== false{/view}
			<form name="frm_perfis" id="frm_perfis" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}perfis/editar', 'frm_perfis', '{view}$URL_DEFAULT{/view}perfis', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')" >
			<!--<form name="frm_perfis" id="frm_perfis" method="post" action="{view}$URL_DEFAULT{/view}perfis/editar" >-->
				<fieldset>
					<legend>Dados de publica&ccedil;&atilde;o</legend>
					<dl>
						<dt>
							<label>Controller e Ação</label>
						</dt>
						
						<dd>
							{view}$html{/view}
						</dd>
						
						<dt>
							<label>Nome do perfil</label>
						</dt>
						
						<dd>
							<input type="text" name="txt_perfil" id="txt_perfil" value="{view}$nome_perfil{/view}" maxlength="255" onchange="verificaLogin('{view}$URL_DEFAULT{/view}perfis/verificalogin', 'txt_perfil', 'msg_txt_perfil', $(this).val(), $('#cod_tipo').val())" />
							<div id="msg_txt_perfil" class="msg_erro"></div>
						</dd>
					</dl>
				</fieldset>
				
				<input type="hidden" name="cod_tipo" id="cod_tipo" value="{view}$cod_tipo{/view}" />
				<button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[51]{/view}</button>
				&nbsp;ou&nbsp;
				
				{view}if isset($smarty.session.UserPermissoes[34]){/view}
					<a href="{view}$URL_DEFAULT{/view}perfis" />{view}$textos_layout[61]{/view}</a>
				{view}/if{/view}
			</form>
		{view}else{/view}
			<div class="notification error">
				{view}$textos_layout[45]{/view}
			</div>
			{view}if isset($smarty.session.UserPermissoes[34]){/view}
				<button type="button" class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}perfis')">{view}$textos_layout[52]{/view}</button>
			{view}/if{/view}
		{view}/if{/view}
	</div>			
{view}include file="{view}$FOOTER{/view}"{/view}