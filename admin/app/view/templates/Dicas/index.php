{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[96]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}dicas')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[100]){/view}
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[99]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}dicas/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[97]){/view}
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>
			
	<div class="tab default-tab" id="tab0">
		{view}if $dados_dicas !== false{/view}
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
						<th width="40%">Data</th>
						<th width="50%">T&iacute;tulo</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
						
				<tbody>
					{view}foreach from=$dados_dicas item=dicas{/view}
						<tr>
							
							<td>{view}$dicas.dat_data{/view}</td>
							<td>{view}$dicas.txt_titulo{/view}</td>
							
							<td>
								<ul class="actions">
									{view}if isset($smarty.session.UserPermissoes[100]){/view}
										<li><a class="view" href="{view}$URL_DEFAULT{/view}dicas/detalhes/cod_id/{view}$dicas.cod_id{/view}" rel="tooltip" original-title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
									{view}/if{/view}
										
									{view}if isset($smarty.session.UserPermissoes[97]){/view}
										<li><a class="edit" href="{view}$URL_DEFAULT{/view}dicas/editar/cod_id/{view}$dicas.cod_id{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
									{view}/if{/view}
										
									{view}if isset($smarty.session.UserPermissoes[98]){/view}
										<li><a class="delete" onclick="javascript:exclusao('{view}$URL_DEFAULT{/view}dicas/excluir/cod_id/{view}$dicas.cod_id{/view}', '{view}$URL_DEFAULT{/view}dicas', '{view}$textos_layout[9]{/view}')" rel="tooltip" original-title="{view}$textos_layout[49]{/view}">{view}$textos_layout[49]{/view}</a></li>
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