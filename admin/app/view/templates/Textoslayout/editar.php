{view}include file="{view}$HEAD{/view}"{/view}
<header>
    <h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
    <nav>
        <ul class="tab-switch">
            {view}if isset($smarty.session.UserPermissoes[1]){/view}
            <li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}textoslayout')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
            {view}/if{/view}

            {view}if isset($smarty.session.UserPermissoes[2]){/view}
            <li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
            {view}/if{/view}
        </ul>
    </nav>
</header>

<div class="tab default-tab" id="tab0">

    {view}if $dados_texto !== false{/view}

    <form name="frm_textoslayout" id="frm_textoslayout" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}textoslayout/editar', 'frm_textoslayout', '{view}$URL_DEFAULT{/view}textoslayout', new Array('{view}$textos_layout[51]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
        {view}foreach from=$dados_texto item=dados name=dad{/view}
        <fieldset>
            <legend>{view}$dados.txt_idioma{/view}</legend>
            <fieldset>
                <legend>Dados do registro</legend>
                <dl>
                    <dt>
                    <label>Texto</label>
                    </dt>

                    <dd>
                        <input type="text" name="txt_texto{view}$smarty.foreach.dad.iteration{/view}" id="txt_texto{view}$smarty.foreach.dad.iteration{/view}" maxlength="255" class="medium" value="{view}$dados.txt_texto{/view}" />
                        <div id="msg_txt_texto{view}$smarty.foreach.dad.iteration{/view}" class="msg_erro"></div>		
                        <p>Preenchimento obrigat&oacute;rio.</p>

                        <input type="hidden" name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.cod_id{/view}" />
                        <input type="hidden" name="cod_relacao_idioma{view}$smarty.foreach.dad.iteration{/view}" id="cod_relacao_idioma{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.cod_relacao_idioma{/view}" />
                        <input type="hidden" name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.cod_idioma{/view}" />
                    </dd>
                </dl>
            </fieldset>
        </fieldset>
        {view}/foreach{/view}

        <button type="submit" id="btn_enviar" class="blue" >{view}$textos_layout[51]{/view}</button>
        &nbsp;ou&nbsp;

        {view}if isset($smarty.session.UserPermissoes[1]){/view}
        <a href="{view}$URL_DEFAULT{/view}textoslayout">{view}$textos_layout[61]{/view}</a>
        {view}/if{/view}
    </form>
    {view}else{/view}
        <div class="notification error">
            {view}$textos_layout[45]{/view}
        </div>

        {view}if isset($smarty.session.UserPermissoes[1]){/view}
            <button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}textoslayout')">{view}$textos_layout[52]{/view}</button>
        {view}/if{/view}

    {view}/if{/view}
</div>

{view}include file="{view}$FOOTER{/view}"{/view}