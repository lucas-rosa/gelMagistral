{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>

		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[8]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[67]){/view}
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[32]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[10]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/editar/cod_id/{view}$dados_usuario.cod_id{/view}')" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_usuario !== false{/view}
			<table>
				<tr>
					<td width="50%" class="detalhes">
						<strong>Nome</strong><br />
						<h3>{view}$dados_usuario.txt_nome{/view}</h3>
					</td>
					
					<td width="50%" class="detalhes">
						<strong>Perfil</strong><br />
						{view}$dados_usuario.PermissaoPerfis.txt_perfil{/view}
					</td>
				</tr>
				
				<tr>
					<td width="50%" class="detalhes">
						<strong>Login</strong><br />
						{view}$dados_usuario.txt_login{/view}
					</td>
					
					<td width="50%" class="detalhes">
						<strong>Status</strong><br />
						{view}$dados_usuario.UsuariosStatus.txt_descricao{/view}
					</td>
				</tr>
				
				<tr>
					<td colspan="2" class="detalhes">
						<strong>E-mail</strong><br />
						{view}$dados_usuario.txt_email{/view}
					</td>
				</tr>
				
				<tr>
					<td width="100%" class="detalhes" colspan="2">
						<strong>Permissões</strong><br />
						{view}$html{/view}
					</td>
				</tr>
		
				<tr>
					<td class="detalhes" colspan="2">
						{view}if isset($smarty.session.UserPermissoes[10]){/view}
							<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/editar/cod_id/{view}$dados_usuario.cod_id{/view}')">{view}$textos_layout[42]{/view}</button>
							&nbsp;&nbsp;&nbsp;
						{view}/if{/view}
						
						{view}if isset($smarty.session.UserPermissoes[8]){/view}
							<a href="{view}$URL_DEFAULT{/view}usuarios" />{view}$textos_layout[61]{/view}</a>
						{view}/if{/view}
					</td>
				</tr>
			</table>
	
		{view}else{/view}
			<div class="notification error">
				<p>
					<strong>{view}$textos_layout[45]{/view}</strong>
				</p>
			</div>
			{view}if isset($smarty.session.UserPermissoes[8]){/view}
				<button class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios')">{view}$textos_layout[52]{/view}</button>
			{view}/if{/view}
		{view}/if{/view}
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}