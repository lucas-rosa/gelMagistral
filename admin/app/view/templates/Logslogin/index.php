{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[62]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}logslogin')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_logs_login !== false{/view}
			<table class="datatable" id="first-desc">
				<thead>
					<tr>
						<th width="15%">Data</th>
						<th width="15%">Hora</th>
						<th width="40%">Usuário</th>
						<th width="30%">IP</th>
					</tr>
				</thead>

				<tbody>
					{view}foreach from=$dados_logs_login item=logs_login{/view}
						<tr>
							<td>{view}$logs_login.data_login{/view}</td>
							<td>{view}$logs_login.hora_login{/view}</td>
							<td>
							{view}if $logs_login.Usuarios.txt_nome != ''{/view}
								{view}$logs_login.Usuarios.txt_nome{/view}
							{view}else{/view}
								<i>Registro excluído</i>
							{view}/if{/view}</td>
							<td>{view}$logs_login.num_ip{/view}</td>
						</tr>
					{view}/foreach{/view}
				</tbody>
			</table>
		{view}else{/view}
			{view}$textos_layout[49]{/view}
		{view}/if{/view}
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}