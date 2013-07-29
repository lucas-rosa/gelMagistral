{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[51]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[53]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco/exportar')" href="" rel="tooltip" title="Exportar cadastros">Exportar cadastros</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[52]){/view}
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_faleConosco !== false && isset($dados_faleConosco){/view}
			<table>
				<tr>
					<td width="50%" class="detalhes">
						<strong>IP</strong><br />
						<h3>{view}$dados_faleConosco.num_ip{/view}</h3>
					</td>
		
					<td width="50%" class="detalhes">
						<strong>Data Hora</strong><br />
						{view}$dados_faleConosco.datahora{/view}
					</td>
				</tr>

				<tr>
					<td width="50%" class="detalhes">
						<strong>Nome</strong><br />
						{view}$dados_faleConosco.txt_nome{/view}
					</td>
		
					<td width="50%" class="detalhes">
						<strong>Telefone</strong><br />
						{view}$dados_faleConosco.txt_telefone{/view}
					</td>
				</tr>

				<tr>
					<td width="50%" class="detalhes">
						<strong>Assunto</strong><br />
						{view}$dados_faleConosco.txt_assunto{/view}
					</td>
		
					<td width="50%" class="detalhes">
						<strong>Mensagem</strong><br />
						{view}$dados_faleConosco.txt_mensagem{/view}
		            </td>
				</tr>
				
				<tr>
					<td class="detalhes" colspan="2">
						{view}if isset($smarty.session.UserPermissoes[51]){/view}
							<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco')">{view}$textos_layout[52]{/view}</button>
	               		{view}/if{/view}
	                </td>
	            </tr>
            </table>
        {view}else{/view}
        	<div class="notification error">
        		{view}$textos_layout[45]{/view}
			</div>
			{view}if isset($smarty.session.UserPermissoes[51]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}faleconosco')">{view}$textos_layout[52]{/view}</button>
       		{view}/if{/view}
        {view}/if{/view}
    </div>
{view}include file="{view}$FOOTER{/view}"{/view}