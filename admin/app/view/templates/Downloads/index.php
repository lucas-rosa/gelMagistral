{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[68]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}downloads')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[70]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}downloads/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if isset($params.mensagem_confirmacao) && $params.sucesso == true{/view}
			<div class="notification success">
				<a href="#" class="close-notification"
					title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
				<p>{view}$params.mensagem_confirmacao{/view}</p>
			</div>
		{view}/if{/view}
		
		{view}if isset($params.mensagem_confirmacao) && $params.erro == true{/view}
			<div class="notification error">
				<a href="#" class="close-notification"
					title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
				<p>{view}$params.mensagem_confirmacao{/view}</p>
			</div>
		{view}/if{/view}

		<table class="datatable">
			<thead>
				<tr>
					<th width="14%">Nome</th>
					<th width="14%">Data</th>
					<th width="14%">Hora</th>
					<th width="20%">Titulo</th>
					<th width="6%">&nbsp;</th>
				</tr>
			</thead>
	
			<tbody>
				{view}foreach from=$dados_download item=download{/view}
					<tr>
						<td>{view}$download.Usuarios.txt_nome{/view}</td>
						<td>{view}$download.dat_data{/view}</td>
						<td>{view}$download.dat_hora{/view}</td>
						<td>
							<a href="{view}$URL_DEFAULT{/view}downloads/downloadArq/arquivo/{view}$download.txt_arquivo{/view}" target="_blank">{view}$download.txt_titulo{/view}</a>
						</td>
		
						<td>
							<ul class="actions">
								<li>
									{view}if isset($smarty.session.UserPermissoes[69]){/view}
										<a class="delete" onclick="javascript:exclusao('{view}$URL_DEFAULT{/view}downloads/excluir/cod_id/{view}$download.cod_id{/view}', '{view}$URL_DEFAULT{/view}downloads', '{view}$textos_layout[9]{/view}')" rel="tooltip" original-title="{view}$textos_layout[48]{/view}">Excluir</a>
									{view}/if{/view}
								</li>
							</ul>
						</td>
					</tr>
				{view}/foreach{/view}
			</tbody>
		</table>
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}