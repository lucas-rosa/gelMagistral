{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[28]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[29]){/view}
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[31]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos/editar/cod_relacao_idioma/{view}$dados_texto.0.cod_relacao_idioma{/view}')" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_texto !== false{/view}
			{view}if $dados_texto.0.img_texto_cropado != "" {/view}
				<fieldset>
					<legend>Imagem do texto</legend>
					<table>
						<tr>
							<td class="detalhes"><strong>Imagem</strong><br />
								<img alt="{view}$dados.txt_titulo{/view}" src="{view}$ARQ_DIN{/view}{view}$dados_texto.0.img_texto_cropado{/view}">
							</td>
						</tr>
					</table>
				</fieldset>
			{view}/if{/view}
			
			{view}foreach from=$dados_texto item=dados{/view}
				<fieldset>
					<legend>{view}$dados.WebsiteIdiomas.txt_idioma{/view}</legend>
					<table>
						<tr>
							<td class="detalhes"><strong>T&iacute;tulo</strong><br />
								<h3>{view}$dados.txt_titulo{/view}</h3>
							</td>
						</tr>
						
						<tr>
							<td class="detalhes"><strong>Texto</strong><br />
								{view}$dados.txt_texto{/view}
							</td>
						</tr>
					</table>
					<br/>
				</fieldset>
			{view}/foreach{/view}
			
			{view}if isset($smarty.session.UserPermissoes[28]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos')">{view}$textos_layout[52]{/view}</button>
				&nbsp;&nbsp;&nbsp;
			{view}/if{/view}
			
			{view}if isset($smarty.session.UserPermissoes[31]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos/editar/cod_relacao_idioma/{view}$dados.cod_relacao_idioma{/view}')">{view}$textos_layout[42]{/view}</button>
			{view}/if{/view}
			
		{view}else{/view}
			<div class="notification error">
				{view}$textos_layout[45]{/view}
			</div>
			{view}if isset($smarty.session.UserPermissoes[28]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos')">{view}$textos_layout[52]{/view}</button>
			{view}/if{/view}
		{view}/if{/view}
	</div>    
{view}include file="{view}$FOOTER{/view}"{/view}