{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[63]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}logsalteracoes')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_logs_login !== false{/view}
			<table class="datatable" id="first-desc">
				<thead>
					<tr>
						<th width="10%">Data</th>
						<th width="10%">Hora</th>
						<th width="20%">Usuário</th>
						<th width="20%">IP</th>
                                                <th width="20%">Tabela</th>
						<th width="10%">Ação</th>
						<th width="10%">Registro</th>
					</tr>
				</thead>

				<tbody>
					{view}foreach from=$dados_logs_alteracoes item=logs_alteracoes{/view}
						<tr>
							<td>{view}$logs_alteracoes.dat_data{/view}</td>
							<td>{view}$logs_alteracoes.dat_hora{/view}</td>
							<td>
							{view}if $logs_alteracoes.Usuarios.txt_nome != ''{/view}
								{view}$logs_alteracoes.Usuarios.txt_nome{/view}
							{view}else{/view}
								<i>Registro excluído</i>
							{view}/if{/view}</td>
							<td>{view}$logs_alteracoes.num_ip{/view}</td>
                                                        <td>{view}$logs_alteracoes.txt_tabela{/view}</td>
							<td>
							{view}if $logs_alteracoes.cha_acao == I{/view}
								Incluir
							{view}elseif $logs_alteracoes.cha_acao == A{/view}
								Editado
							{view}elseif $logs_alteracoes.cha_acao == X{/view}
								Excluído
							{view}/if{/view}
							</td>
							<td>{view}$logs_alteracoes.cod_id{/view}</td>
						</tr>
					{view}/foreach{/view}
				</tbody>
			</table>
		{view}else{/view}
			{view}$textos_layout[49]{/view}
		{view}/if{/view}
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}