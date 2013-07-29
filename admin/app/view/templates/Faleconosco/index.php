{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[51]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[53]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco/exportar')" href="" rel="tooltip" title="Exportar cadastros">Exportar cadastros</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[52]){/view}
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_faleConosco !== false{/view}
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
						<th width="10%">Data</th>
						<th width="10%">Hora</th>
						<th width="30%">Nome</th>
						<th width="10%">E-mail</th>
						<th width="30%">Assunto</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
				
				<tbody>
					{view}foreach from=$dados_fale_conosco item=fale_conosco{/view}
						<tr>
							<td>{view}$fale_conosco.data{/view}</td>
							<td>{view}$fale_conosco.hora{/view}</td>
                            <td>{view}$fale_conosco.txt_nome{/view}</td>
                            <td>{view}$fale_conosco.txt_email{/view}</td>
                            <td>{view}$fale_conosco.txt_assunto{/view}</td>
                            <td>
                            	<ul class="actions">
                            		{view}if isset($smarty.session.UserPermissoes[52]){/view}
                            			<li><a class="view" href="{view}$URL_DEFAULT{/view}faleconosco/detalhes/cod_id/{view}$fale_conosco.cod_id{/view}" rel="tooltip" original-title="Ver detalhes">ver</a></li>
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