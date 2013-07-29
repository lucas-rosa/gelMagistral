{view}include file="{view}$HEAD{/view}"{/view}
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/plugin_crop.js"></script>
<script type="text/javascript">
    var image_handling_file  = "{view}$URL_DEFAULT{/view}dicas/imagem";
    var url_padrao = "{view}$URL_DEFAULT{/view}";
    var altura_crop = '{view}$altura_crop{/view}';
    var largura_crop = '{view}$largura_crop{/view}';
    var arq_din = '{view}$ARQ_DIN{/view}';
    var altura_cropada = '{view}$altura_cropada{/view}';
    var largura_cropada =  '{view}$largura_cropada{/view}';
</script>

<header>
    <h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
    <nav>
        <ul class="tab-switch">
            {view}if isset($smarty.session.UserPermissoes[96]){/view}
            <li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}dicas')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
            {view}/if{/view}

            {view}if isset($smarty.session.UserPermissoes[100]){/view}
            <li class="inativo">{view}$textos_layout[41]{/view}</li>
            {view}/if{/view}

            {view}if isset($smarty.session.UserPermissoes[99]){/view}
            <li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}dicas/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
            {view}/if{/view}

            {view}if isset($smarty.session.UserPermissoes[97]){/view}
            <li class="inativo">{view}$textos_layout[42]{/view}</li>
            {view}/if{/view}
        </ul>
    </nav>
</header>

<div class="tab default-tab" id="tab0">
    <form  enctype="multipart/form-data" name="frm_dica" id="frm_dica" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}dicas/incluir', 'frm_dica', '{view}$URL_DEFAULT{/view}dicas', new Array('{view}$textos_layout[43]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
<!--        <form name="frm_dica" id="frm_dica" method="post" action='{view}$URL_DEFAULT{/view}dicas/incluir'>-->

        <fieldset>
            <legend>Dados do registro</legend>
            <dl>

                <dt>
                <label>Idioma</label>
                </dt>
                <dd>
                    <select id="cod_idioma" name="cod_idioma" class="rounded">
                        <option value="">Selecione</option>
                        {view}foreach from=$idiomas item=idi{/view}
                        <option value="{view}$idi.cod_id{/view}">{view}$idi.txt_idioma{/view}</option>
                        {view}/foreach{/view}
                    </select>
                    <div id="msg_cod_idioma" class="msg_erro"></div>
                    <p>{view}$textos_layout[47]{/view}</p>
                    <p>
                        Selecione um idioma para esta dica.
                    </p>
                </dd>

                <dt>
                <label>Data</label>
                </dt>
                <dd>
                    <input type="text" name="dat_data" id="dat_data" class="datepicker small data" />
                    <div id="msg_dat_data" class="msg_erro"></div>
                    <p>{view}$textos_layout[47]{/view}</p>
                    <p>Formato correto: dd/mm/aaaa.</p>
                    <p>Esta &eacute; a data que aparece junto ao conte&uacute;do no website.</p>
                </dd>

                <dt>
                <label>T&iacute;tulo</label>
                </dt>

                <dd>
                    <input type="text" name="txt_titulo" id="txt_titulo" maxlength="255" class="medium" />
                    <div id="msg_txt_titulo" class="msg_erro"></div>
                    <p>{view}$textos_layout[47]{/view}</p>
                </dd>

                <dt>
                <label>Texto</label>
                </dt>

                <dd>
                    <textarea name="txt_texto" id="txt_texto" class="wysiwyg large" ></textarea>
                    <div id="msg_txt_texto" class="msg_erro"></div>
                    <p>{view}$textos_layout[47]{/view}</p>
                </dd>

                <dt>
                <label>Imagem</label>
                </dt>
                <dd>
                    <input type="hidden" name="nome_img1" value="" id="nome_img1" />
                    <input type="hidden" name="nome_img_cropada1" value="" id="nome_img_cropada1" />
                    <div id="upload_status1" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
                    <p>
                        <button type="button" id="upload_link1">Escolher Imagem</button>
                        <button type="button" id="cancelar_upload1">Cancelar</button>
                    </p>
                    <div id="todo_conteudo1">
                        <span id="loader1" style="display: none;">
                            <img src="loader.gif" alt="Carregando..." />
                        </span>
                        <span id="progress1"></span> <br />
                        <div id="uploaded_image1"></div>
                        <div id="thumbnail_form1" style="display: none;">
                            <input type="hidden" name="x1" value="" id="x11" />
                            <input type="hidden" name="y1" value="" id="y11" />
                            <input type="hidden" name="x2" value="" id="x21" />
                            <input type="hidden" name="y2" value="" id="y21" />
                            <input type="hidden" name="w" value="" id="w1" />
                            <input type="hidden" name="h" value="" id="h1" />
                            <input type="hidden" name="flag" id="flag" value="inclusao">
                            <button type="button" name="save_thumb1" id="save_thumb1" > Salvar </button>
                        </div>
                    </div>

                    <br /><p>{view}$textos_layout[47]{/view}</p>
                    <p>A imagem será salva com 655px x 300px</p>
                    <div id="msg_imagem1"></div>
                </dd>

            </dl>

        </fieldset>

        <button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[43]{/view}</button>
        
        &nbsp;ou&nbsp;
        {view}if isset($smarty.session.UserPermissoes[96]){/view}
        <a href="{view}$URL_DEFAULT{/view}dicas">{view}$textos_layout[61]{/view}</a>
        {view}/if{/view}	
    </form>
</div>
{view}include file="{view}$FOOTER{/view}"{/view}