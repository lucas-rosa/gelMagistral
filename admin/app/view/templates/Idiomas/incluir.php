{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[5]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}idiomas')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[26]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}idiomas/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[7]){/view}
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<form name="frm_idioma" id="frm_idioma" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}idiomas/incluir', 'frm_idioma', '{view}$URL_DEFAULT{/view}idiomas', new Array('{view}$textos_layout[43]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Idioma</label>
					</dt>
	
					<dd>
						<input type="text" name="txt_idioma" id="txt_idioma" class="medium" maxlength="255" />
						<div id="msg_txt_idioma" class="msg_erro"></div>
						<p>{view}$textos_layout[47]{/view}</p>
					</dd>
	
					<dt>
						<label>Meta tag</label>
					</dt>
					<dd>
						<input type="text" name="txt_meta" id="txt_meta" class="medium" maxlength="10" />
						<div id="msg_txt_meta" class="msg_erro"></div>
						<p>{view}$textos_layout[47]{/view}</p>
					</dd>
				</dl>
			</fieldset>
	
			<button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[43]{/view}</button>
			&nbsp;ou&nbsp;
			{view}if isset($smarty.session.UserPermissoes[5]){/view}
				<a href="{view}$URL_DEFAULT{/view}idiomas">{view}$textos_layout[61]{/view}</a>
			{view}/if{/view}
		</form>
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}