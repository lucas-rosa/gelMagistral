{view}include file="{view}$HEAD{/view}"{/view}	

<!-- SLIDER -->
<div class="banner-dicas">
    
    <div class="content-wrap clearfix">
        <span class="logo-aba">
        </span>
        <h1>DICAS DE SA&Uacute;DE</h1>
    </div>
</div>
<!-- FIM DO SLIDER -->

<div class="content-wrap clearfix">

    <div class="vejamais-side">
        <h1>VEJA TAMB&Eacute;M</h1>
        <div class="pedido">
            <a href="#">PEDIDO ONLINE
            <p>Envie suas receitas e manipule seus produtos sem precisar sair de casa.</p></a>

        </div>
        <div class="divider-side"></div>
        <div class="manipulacao">
            <a href="#">MANIPULA&Ccedil;&Atilde;O
            <p>Saiba mais sobre o processo e as vantagens de produtos manipulados.</p></a>
        </div>
        <div class="divider-side"></div>
        <div class="dicas-de-saude">
            <a href="#">DICAS DE SA&Uacute;DE
            <p>Confira dicas que podem fazer a diferença no seu dia a dia.</p></a>

        </div>
    </div>
    
    <div class="quemsomos-content">
        <div class="dicas-slider">
            <h1>Veja algumas dicas</h1>
            {view}foreach from=$dados_dicas item=dicas{/view}
                <div class="dica-left"> 
                    <h1>{view}$dicas.txt_titulo{/view}</h1>
                    
                    {view}if $dicas.img_cropada{/view}
                    <img src="{view}$ARQ_DIN{/view}{view}$dicas.img_cropada{/view}" alt="{view}$dicas.titulo{/view}" title="{view}$dicas.titulo{/view}" />
                    {view}/if{/view}
                    
                    <p>{view}$Helper->reduzir_string($dicas.txt_texto, 200){/view}</p>
                    <a href="{view}$URL_DEFAULT{/view}dicasdesaude/detalhes/{view}$dicas.txt_permalink{/view}" target="_blank">+ LER MAIS</a>
                </div>
            {view}/foreach{/view}
            
        </div>
        
        <!-- Inicio da paginacao -->
        {view}foreach from=$paginacao item=pag{/view}
                {view}$pag{/view}
        {view}/foreach{/view}
        <!-- Fim da paginacao -->
       

        <div class="videos">
            {view}if $dados_videos{/view}
                <h1>Gel Magistral TV</h1>
                <div style="display:none;" class="html5gallery" data-skin="light" data-width="605" data-height="456">
                    
                    {view}foreach from=$dados_videos item=videos{/view}
                     <a href="http://www.youtube.com/embed/QrBRtu_9w6w"><img src="{view}$videos.cod_video{/view}" alt="Teste 1 - Youtube Video"></a>
                    {view}/foreach{/view}
                    
                </div>
            {view}/if{/view}
        </div>

    </div>


	<!--
	Teste de t&iacute;tulo/texto from table "textos"<br />
	<h1>{view}$textos_site[1]['txt_titulo']{/view}</h1>
	{view}$textos_site[1]['texto']{/view}<br />

	<br /><br />
	Teste de texto from table "textosLayout"<br />
	<h2>{view}$textos_layout[1]{/view}</h2>
	-->

</div>

<script type="text/javascript">
    $(document).ready(youtubeGallery('#youtube-gallery','billabongprobr', 20));
</script>

{view}include file="{view}$FOOTER{/view}"{/view}