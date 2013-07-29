{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[58]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}emailformulario')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[59]){/view}
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[60]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}emailformulario/editar/cod_id/{view}$dados_email_formulario.cod_id{/view}')" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_email_formulario !== false && isset($dados_email_formulario){/view}
			<article class="half-block">
				<div class="article-container">
					<section>
						<table>
							<tr>
								<td width="50%" class="detalhes">
									<strong>E-mail</strong><br />
									<h3>{view}$dados_email_formulario.txt_email{/view}</h3>
								</td>
					
								<td width="50%" class="detalhes">
									<strong>Formulário</strong><br />
									{view}$dados_email_formulario.txt_formulario{/view}
								</td>
							</tr>
				
							<tr>
								<td width="50%" class="detalhes">
									<strong>Conversão</strong><br />
									{view}$dados_email_formulario.txt_conversao{/view}
								</td>
							</tr>
						</table>
					</section>
				</div>
			</article>
			
			<div class="clearfix"></div>
			
			{view}if isset($smarty.session.UserPermissoes[58]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}emailformulario')">{view}$textos_layout[52]{/view}</button>
            	&nbsp;&nbsp;&nbsp;
            {view}/if{/view}
            
            {view}if isset($smarty.session.UserPermissoes[60]){/view}
           	 	<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}emailformulario/editar/cod_id/{view}$dados_email_formulario.cod_id{/view}')">{view}$textos_layout[42]{/view}</button>
            {view}/if{/view}    
            
		{view}else{/view}
			<div class="notification error">
				{view}$textos_layout[45]{/view}
			</div>
			{view}if isset($smarty.session.UserPermissoes[58]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}emailformulario')">{view}$textos_layout[52]{/view}</button>
			{view}/if{/view}
		{view}/if{/view}
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}