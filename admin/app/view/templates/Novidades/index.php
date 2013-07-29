{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[20]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}novidades')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[22]){/view}
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[25]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}novidades/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[24]){/view}
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>
			
	<div class="tab default-tab" id="tab0">
		{view}if $dados_novidades !== false{/view}
			{view}if isset($params.mensagem_confirmacao) && $params.sucesso == true{/view}
				<div class="notification success">
					<a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
					<p>{view}$params.mensagem_confirmacao{/view}</p>
				</div>
			{view}/if{/view}
			
			{view}if isset($params.mensagem_confirmacao) && $params.erro == true{/view}
				<div class="notification error">
					<a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
					<p>{view}$params.mensagem_confirmacao{/view}</p>
				</div>
			{view}/if{/view}
				
			<table class="datatable" id="sec-desc">
				<thead>
					<tr>
						<th width="20%">Idioma</th>
						<th width="10%">Data</th>
						<th width="50%">T&iacute;tulo</th>
						<th width="10%">Publicado</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
						
				<tbody>
					{view}foreach from=$dados_novidades item=novidades{/view}
						<tr>
							<td>{view}$novidades.WebsiteIdiomas.txt_idioma{/view}</td>
							<td>{view}$novidades.dat_data{/view}</td>
							<td>{view}$novidades.txt_titulo{/view}</td>
							<td>{view}if $novidades.cod_publicado == 1{/view} Sim {view}else{/view} N&atilde;o {view}/if{/view}</td>
							<td>
								<ul class="actions">
									{view}if isset($smarty.session.UserPermissoes[22]){/view}
										<li><a class="view" href="{view}$URL_DEFAULT{/view}novidades/detalhes/cod_relacao_idioma/{view}$novidades.cod_relacao_idioma{/view}" rel="tooltip" original-title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
									{view}/if{/view}
										
									{view}if isset($smarty.session.UserPermissoes[24]){/view}
										<li><a class="edit" href="{view}$URL_DEFAULT{/view}novidades/editar/cod_relacao_idioma/{view}$novidades.cod_relacao_idioma{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
									{view}/if{/view}
										
									{view}if isset($smarty.session.UserPermissoes[21]){/view}
										<li><a class="delete" onclick="javascript:exclusao('{view}$URL_DEFAULT{/view}novidades/excluir/cod_relacao_idioma/{view}$novidades.cod_relacao_idioma{/view}', '{view}$URL_DEFAULT{/view}novidades', '{view}$textos_layout[9]{/view}')" rel="tooltip" original-title="{view}$textos_layout[49]{/view}">{view}$textos_layout[49]{/view}</a></li>
									{view}/if{/view}
								</ul>
							</td>
						</tr>
					{view}/foreach{/view}
				</tbody>
			</table>   
		{view}else{/view}
			{view}$textos_layout[49]{/view}
		{view}/if{/view}
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}