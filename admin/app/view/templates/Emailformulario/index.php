{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[58]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}emailformulario')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[59]){/view}
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[60]){/view}
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_email_formulario !== false{/view}
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
			
			<table class="datatable">
				<thead>
					<tr>
						<th width="40%">E-mail</th>
						<th width="50%">Formulário</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
				
				<tbody>
					{view}foreach from=$dados_email_formulario item=email_formulario{/view}
						<tr>
							<td>{view}$email_formulario.txt_email{/view}</td>
							<td>{view}$email_formulario.txt_formulario{/view}</td>
							<td>
								<ul class="actions">
									{view}if isset($smarty.session.UserPermissoes[59]){/view}
										<li><a class="view" href="{view}$URL_DEFAULT{/view}emailformulario/detalhes/cod_id/{view}$email_formulario.cod_id{/view}" rel="tooltip" original-title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
									{view}/if{/view}
									
									{view}if isset($smarty.session.UserPermissoes[60]){/view}
										<li><a class="edit" href="{view}$URL_DEFAULT{/view}emailformulario/editar/cod_id/{view}$email_formulario.cod_id{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
									{view}/if{/view}
								</ul>
							</td>
						</tr>
					{view}/foreach{/view}
				</tbody>
			</table>
		{view}else{/view}
			{view}$textos_layout[24]{/view}
		{view}/if{/view}
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}