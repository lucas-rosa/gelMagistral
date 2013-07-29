{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes/editar/cod_perfil/{view}$dados.cod_usuario{/view}')" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $controller_acao !== false && isset($controller_acao){/view}
			<table>
				<tr>
					<td class="detalhes">
						<strong>Controler e Ação</strong>
					</td>
					
					<td class="detalhes">
						{view}foreach from=$controller_acao item=contr{/view}
							<strong>Controller:</strong>{view}$contr.PermissaoGeral.FrameworkControllers.txt_nome_amigavel{/view}  <strong>Ação:</strong>{view}$contr.PermissaoGeral.FrameworkAcoes.txt_nome_amigavel{/view}
							<br><br>
						{view}/foreach{/view}
					</td>
				</tr>
			</table>
			
			<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes')" />{view}$textos_layout[52]{/view}</button>
			<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes/editar/cod_perfil/{view}$cod_perfil{/view}')" />{view}$textos_layout[42]{/view}</button>
		{view}else{/view}
			<div class="notification error">
				{view}$textos_layout[45]{/view}
			</div>
			<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes')" />{view}$textos_layout[52]{/view}</button>
		{view}/if{/view}
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}