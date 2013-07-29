{view}include file="{view}$HEAD{/view}"{/view}
<header>
    <h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
    <nav>
        <ul class="tab-switch">
            {view}if isset($smarty.session.UserPermissoes[20]){/view}
            <li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}novidades')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
            {view}/if{/view}

            {view}if isset($smarty.session.UserPermissoes[22]){/view}
            <li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
            {view}/if{/view}

            {view}if isset($smarty.session.UserPermissoes[25]){/view}
            <li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}novidades/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
            {view}/if{/view}

            {view}if isset($smarty.session.UserPermissoes[24]){/view}	
            <li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}novidades/editar/cod_relacao_idioma/{view}$dados_noticia.0.cod_relacao_idioma{/view}')" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
            {view}/if{/view}
        </ul>
    </nav>
</header>

<div class="tab default-tab" id="tab0">
    {view}if $dados_novidade !== false{/view}
    {view}foreach from=$dados_novidade item=dados{/view}
    <article class="half-block">
        <div class="article-container">
            <header>
                <h2>{view}$dados.WebsiteIdiomas.txt_idioma{/view}</h2>
            </header>
            <section>
                <table>
                    <tr>
                        <td class="detalhes">
                            <strong>Data</strong><br />
                            {view}$dados.dat_data{/view}
                        </td>
                    </tr>
                    <tr>
                        <td class="detalhes">
                            <strong>T&iacute;tulo</strong><br />
                            <h3>{view}$dados.txt_titulo{/view}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="detalhes">
                            <strong>Texto</strong><br />
                            {view}$dados.txt_texto{/view}
                        </td>
                    </tr>
                    <tr>
                        <td class="detalhes">
                            {view}if strlen(trim($dados.img_cropada)) > 0{/view}
                            <strong>Imagem</strong><br />
                            <img src="{view}$ARQ_DIN{/view}{view}$dados.img_cropada{/view}" alt="{view}$dados.txt_titulo{/view}" title="{view}$dados.txt_titulo{/view}" height="200" width="140" />
                            {view}/if{/view}
                        </td>
                    </tr>
                    <tr>
                        <td class="detalhes">
                            <strong>Publicado</strong><br />
                            {view}if $dados.cod_publicado == 1{/view} Sim {view}else{/view} N&atilde;o {view}/if{/view}
                        </td>
                    </tr>
                    <tr>
                        <td class="detalhes">
                            <strong>Data de In&iacute;cio da Publica&ccedil;&atilde;o</strong><br />
                            {view}$Helper->FormataDataHora($dados.dat_inicio_publicacao,'br'){/view}
                        </td>
                    </tr>
                    <tr>
                        <td class="detalhes">
                            <strong>Data de T&eacute;rmino da Publica&ccedil;&atilde;o</strong><br />
                            {view}$Helper->FormataDataHora($dados.dat_termino_publicacao,'br'){/view}
                        </td>
                    </tr>
                </table>
            </section>
        </div>
    </article>
    {view}/foreach{/view}

    <div class="clearfix"></div>
    {view}if isset($smarty.session.UserPermissoes[20]){/view}
    <button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}novidades')">{view}$textos_layout[52]{/view}</button>
    &nbsp;&nbsp;&nbsp;
    {view}/if{/view}

    {view}if isset($smarty.session.UserPermissoes[24]){/view}
    <button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}novidades/editar/cod_relacao_idioma/{view}$dados.cod_relacao_idioma{/view}')">{view}$textos_layout[42]{/view}</button>
    {view}/if{/view}
    {view}else{/view}
    <div class="notification error">
        {view}$textos_layout[45]{/view}
    </div>
    {view}if isset($smarty.session.UserPermissoes[20]){/view}
    <button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}novidades')">{view}$textos_layout[52]{/view}</button>
    {view}/if{/view}
    {view}/if{/view}
</div>    
{view}include file="{view}$FOOTER{/view}"{/view}