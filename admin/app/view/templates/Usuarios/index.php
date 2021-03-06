{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
	
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[8]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[32]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}usuarios/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[10]){/view}
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">			
		{view}if $dados_usuario !== false{/view}
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
						<th width="20%">Nome</th>
						<th width="20%">E-mail</th>
						<th width="20%">Login</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
				
				<tbody>
					{view}foreach from=$dados_usuario item=usuario{/view}
					<tr>
						<td width="20%">{view}$usuario.txt_nome{/view}</td>
						<td width="20%">{view}$usuario.txt_email{/view}</td>
						<td width="20%">{view}$usuario.txt_login{/view}</td>
						<td width="10%">
							<ul class="actions">
								{view}if isset($smarty.session.UserPermissoes[67]){/view}
									<li><a class="view" href="{view}$URL_DEFAULT{/view}usuarios/detalhes/cod_id/{view}$usuario.cod_id{/view}" rel="tooltip" original-title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
								{view}/if{/view}
								
								{view}if isset($smarty.session.UserPermissoes[10]){/view}
									<li><a class="edit" href="{view}$URL_DEFAULT{/view}usuarios/editar/cod_id/{view}$usuario.cod_id{/view}" rel="tooltip" original-title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
								{view}/if{/view}
									
								{view}if isset($smarty.session.UserPermissoes[9]){/view}
									<li><a class="delete" onclick="javascript:exclusao('{view}$URL_DEFAULT{/view}usuarios/excluir/cod_id/{view}$usuario.cod_id{/view}', '{view}$URL_DEFAULT{/view}usuarios', '{view}$textos_layout[9]{/view}')" rel="tooltip" original-title="{view}$textos_layout[49]{/view}">{view}$textos_layout[49]{/view}</a></li>
								{view}/if{/view}
							</ul>
						</td>
					</tr>
					{view}/foreach{/view}
				</tbody>
			</table>
						
			{view}else{/view}
			<div class="notification error">
				<p>
					<strong>Registro n&atilde;o encontrado.</strong>
				</p>
			</div>
			{view}/if{/view}
		</div>
{view}include file="{view}$FOOTER{/view}"{/view}