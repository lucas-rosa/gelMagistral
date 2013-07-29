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

        <div class="dica-full">
            
            <h1>{view}$dados_dicas.txt_titulo{/view}</h1>
            
            {view}if $dados_dicas.img_cropada{/view}
            <img src="{view}$ARQ_DIN{/view}{view}$dados_dicas.img_cropada{/view}" alt="{view}$dados_dicas.txt_titulo{/view}" title="{view}$dados_dicas.txt_titulo{/view}" />
            {view}/if{/view}
            
            <p>{view}$dados_dicas.txt_texto{/view}</p>
            <a href="{view}$URL_DEFAULT{/view}dicasdesaude">< VOLTAR</a>
        </div>

        <div class="dicas-slider-det">
            
            <h1>Veja algumas dicas</h1>
            
            {view}foreach from=$dados_outras_dicas item=outras_dicas{/view}
            <div class="dica-left"> 
                <h1>{view}$outras_dicas.txt_titulo{/view}</h1>
                {view}if $outras_dicas.img_cropada{/view}
                <img src="{view}$ARQ_DIN{/view}{view}$outras_dicas.img_cropada{/view}" alt="{view}$outras_dicas.txt_titulo{/view}" title="{view}$outras_dicas.txt_titulo{/view}" />
                {view}/if{/view}
                <p>{view}$outras_dicas.txt_texto{/view}</p>
                <a href="{view}$URL_DEFAULT{/view}dicasdesaude/detalhes/{view}$outras_dicas.txt_permalink{/view}" target="_blank">+ LER MAIS</a>
            </div>
            {view}/foreach{/view}
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