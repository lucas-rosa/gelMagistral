{view}include file="{view}$HEAD{/view}"{/view}
	<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script type="text/javascript">
	jQuery(document).ready(function()
			{
				var mapa = "{view}$mapa{/view}";
				var conta = 1;
				var array_mapa = mapa.split("|");
	
				for (i in array_mapa)
				{
					if(array_mapa[i] != "")
					{
						var explodir = array_mapa[i].split("[;]");
						
					    var latlng = new google.maps.LatLng(explodir[0],explodir[1]);
	
					    var myOptions = {
					    	    zoom: 14,
					    	    center: latlng,
					    	    mapTypeId: google.maps.MapTypeId.ROADMAP
					    };
					
					    var map = new google.maps.Map(document.getElementById("map_canvas"+conta), myOptions);
					
					    var marker = new google.maps.Marker({
					        position: latlng, 
					        map: map,
					        title:"Localização"
					    });
					}
					conta++;
				}
			});
	</script>

	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>		
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[12]){/view}
					<li><a class="default-tab" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[13]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}contatos/editar/cod_relacao_idioma/{view}$dados_contatos.0.cod_relacao_idioma{/view}')" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		{view}if $dados_contatos !== false{/view}
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

	   		<article class="half-block">
				<div class="article-container">
					{view}foreach from=$dados_contatos item=endereco name=foo{/view}
						<header>
							<h2>{view}$endereco.WebsiteIdiomas.txt_idioma{/view}</h2>
						</header>
							
						<section>		
							<table>
								<tr>
									<td width="50%" class="detalhes"><strong>Raz&atilde;o Social</strong><br />
										<h3>{view}$endereco.txt_razao_social{/view}</h3>
									</td>
									
									<td width="50%" class="detalhes"><strong>CNPJ</strong><br />
										{view}$endereco.txt_cnpj{/view}
									</td>
								</tr>
								
								<tr>
									<td class="detalhes"><strong>Endere&ccedil;o</strong><br />
										{view}$endereco.txt_endereco{/view}
									</td>
									<td class="detalhes"><strong>N&uacute;mero / Complemento</strong><br />
										{view}$endereco.txt_numero{/view} /
										{view}$endereco.txt_complemento{/view}
									</td>
								</tr>
								
								<tr>
									<td class="detalhes"><strong>CEP</strong><br />
										{view}$endereco.txt_cep{/view}
									</td>
									<td class="detalhes"><strong>Bairro</strong><br />
										{view}$endereco.txt_bairro{/view}
									</td>
								</tr>
								
								<tr>
									<td class="detalhes"><strong>Cidade</strong><br />
										{view}$endereco.CepCidades.txt_cidade{/view}
									</td>
									<td class="detalhes"><strong>UF</strong><br />
										{view}$endereco.CepUf.txt_uf{/view}
									</td>
								</tr>
								
								<tr>
									<td class="detalhes"><strong>Pa&iacute;s</strong><br />
										{view}$endereco.txt_pais{/view}
									</td>
									<td class="detalhes"><strong>Telefone Principal</strong><br />
										{view}$endereco.txt_telefone{/view}
									</td>
								</tr>
								
								<tr>
									<td class="detalhes" colspan="2"><strong>Localiza&ccedil;&atilde;o no Google Maps</strong><br />
										<div id="map_canvas{view}$smarty.foreach.foo.iteration{/view}" style="width:100%; height:240px"></div>
									</td>
								</tr>
								
								<tr>
									<td>
										{view}if isset($smarty.session.UserPermissoes[13]){/view}
											<button class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}contatos/editar/cod_relacao_idioma/{view}$dados_contatos.0.cod_relacao_idioma{/view}')">{view}$textos_layout[42]{/view}</button>
										{view}/if{/view}
									</td>
								</tr>
							</table>					
						</section>
						<br/><br/>
					{view}/foreach{/view}
				</div>
			</article>

	        <div class="clearfix"></div>
	        	{view}else{/view}
					<div class="notification error">
						<p>
							<strong>{view}$textos_layout[45]{/view}</strong>
						</p>
					</div>
				{view}/if{/view}
			</div>
            
{view}include file="{view}$FOOTER{/view}"{/view}