{view}include file="{view}$HEAD{/view}"{/view}

<h2>Textos</h2>

{view}if $dados_lista_comum !== false && isset($dados_lista_comum){/view}
	<strong>Título</strong><br />
	{view}$dados_lista_comum.txt_titulo{/view}
	<br /><br />
	
	{view}if ($dados_lista_comum.img_texto){/view}
		<img src="{view}$ARQ_DIN{/view}{view}$dados_lista_comum.img_texto{/view}" alt="{view}$dados_lista_comum.txt_titulo{/view}" title="{view}$dados_lista_comum.txt_titulo{/view}" width="250" />
	{view}/if{/view}
	<br /><br />
	
	<strong>Texto</strong><br />
	{view}$dados_lista_comum.txt_texto{/view}
	
{view}else{/view}
    {view}$textos_layout[22]{/view}
{view}/if{/view}
        
{view}include file="{view}$FOOTER{/view}"{/view}