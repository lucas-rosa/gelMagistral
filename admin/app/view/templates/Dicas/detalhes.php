{view}include file="{view}$HEAD{/view}"{/view}
<header>
    <h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
    <nav>
        <ul class="tab-switch">
            {view}if isset($smarty.session.UserPermissoes[96]){/view}
            <li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}dicas')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
            {view}/if{/view}

            {view}if isset($smarty.session.UserPermissoes[100]){/view}
            <li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
            {view}/if{/view}

            {view}if isset($smarty.session.UserPermissoes[99]){/view}
            <li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}dicas/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
            {view}/if{/view}

            {view}if isset($smarty.session.UserPermissoes[97]){/view}	
            <li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}dicas/editar/cod_relacao_idioma/{view}$dados_noticia.0.cod_relacao_idioma{/view}')" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
            {view}/if{/view}
        </ul>
    </nav>
</header>

<div class="tab default-tab" id="tab0">
    {view}if $dados_dica !== false{/view}
        
        <article class="half-block">
            <div class="article-container">
                <header>
                    <h2>Dados Gerais</h2>
                </header>
                <section>
                    <table>
                        
                        <tr>
                            <td class="detalhes">
                                <strong>Idioma</strong><br />
                                <h3>{view}$dados_dica.txt_idioma{/view}</h3>
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="detalhes">
                                <strong>T&iacute;tulo</strong><br />
                                <h3>{view}$dados_dica.txt_titulo{/view}</h3>
                            </td>
                        </tr>
                        <tr>
                            <td class="detalhes">
                                <strong>Texto</strong><br />
                                {view}$dados_dica.txt_texto{/view}
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="detalhes">
                                <strong>Data</strong><br />
                                {view}$dados_dica.dat_data{/view}
                            </td>
                        </tr>
                        
                        <tr>
                            <td class="detalhes">
                                {view}if $dados_dica.img_cropada{/view}
                                <strong>Imagem</strong><br />
                                <img src="{view}$ARQ_DIN{/view}{view}$dados_dica.img_cropada{/view}" alt="{view}$dados_dica.txt_titulo{/view}" title="{view}$dados_dica.txt_titulo{/view}" height="" width="655" />
                                {view}/if{/view}
                            </td>
                        </tr>
                    </table>
                </section>
            </div>
        </article>
     

        <div class="clearfix"></div>
        {view}if isset($smarty.session.UserPermissoes[96]){/view}
        <button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}dicas')">{view}$textos_layout[52]{/view}</button>
        &nbsp;&nbsp;&nbsp;
        {view}/if{/view}

        {view}if isset($smarty.session.UserPermissoes[97]){/view}
        <button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}dicas/editar/cod_id/{view}$dados_dica.cod_id{/view}')">{view}$textos_layout[42]{/view}</button>
        {view}/if{/view}
        {view}else{/view}
        <div class="notification error">
            {view}$textos_layout[45]{/view}
        </div>
        {view}if isset($smarty.session.UserPermissoes[96]){/view}
        <button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}dicas')">{view}$textos_layout[52]{/view}</button>
        {view}/if{/view}
    {view}/if{/view}
</div>    
{view}include file="{view}$FOOTER{/view}"{/view}