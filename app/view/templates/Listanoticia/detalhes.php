{view}include file="{view}$HEAD{/view}"{/view}

<h2>Not�cias</h2>

{view}if $dados_noticias !== false && isset($dados_noticias){/view}
	<strong>Data</strong><br />
	{view}$dados_noticias.dat_data{/view}
	<br /><br />
	
	<strong>T�tulo</strong><br />
	{view}$dados_noticias.txt_titulo{/view}
	<br /><br />

	{view}if $dados_noticias.txt_imagem{/view}
	<strong>Imagem</strong><br />
	<img src="{view}$ARQ_DIN{/view}{view}$dados_noticias.txt_imagem{/view}" width="500" alt="{view}$dados_noticias.txt_titulo{/view}" title="{view}$dados_noticias.txt_titulo{/view}" />
	{view}/if{/view}
	<br /><br />

	<strong>Texto</strong><br />
	{view}$dados_noticias.txt_texto{/view}
	                    
	<!-- Mostra as 5 not�cias mais recentes -->
	
	<br /><br /><br /><br />
	
	<h3>Amostra de "Mais Not�cias"</h3>
	
	<ul>
		{view}foreach from=$dados_noticias_mais_dados item=noticias_mais_dados{/view}
			<li>
				{view}$noticias_mais_dados.dat_data{/view}<br />
				{view}$noticias_mais_dados.txt_titulo{/view}<br />
				{view}$Helper->reduzir_string($noticias_mais_dados.txt_texto,100){/view}<br />
				<a href="{view}$URL_DEFAULT{/view}listanoticia/detalhes/{view}$noticias_mais_dados.txt_permalink{/view}">ver not�cia &raquo;</a>
			</li>
		{view}/foreach{/view}
	</ul>
{view}else{/view}
    {view}$textos_layout[22]{/view}
{view}/if{/view}
        
{view}include file="{view}$FOOTER{/view}"{/view}