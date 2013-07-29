{view}include file="{view}$HEAD{/view}"{/view}

<form id="form_login" name="form_login" action="javascript:acao('{view}$URL_DEFAULT{/view}login/logado', 'form_login', '{view}$URL_DEFAULT{/view}admin/logado', new Array('{view}$textos_layout[3]{/view}', '{view}$textos_layout[2]{/view}'), 'btn_enviar', 'msg_erro')" method="post">
    <fieldset>
        <dl>
            <dt><label>Login:</label></dt>

            <dd>
                <input type="text" name="txt_login" id="txt_login" maxlength="20" />
                <div id="msg_erro_login" class="msg_erro"></div>
            </dd>

            <dt><label>Senha:</label></dt>

            <dd>
                <input type="password" name="txt_senha" id="txt_senha" maxlength="20" />
                <div id="msg_erro_senha" class="msg_erro"></div>
            </dd>
        </dl>
    </fieldset>

    <button type="submit" id="btn_enviar" />Enviar</button>
</form>

{view}include file="{view}$FOOTER{/view}"{/view}