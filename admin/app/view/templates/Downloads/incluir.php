{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
			<nav>
				<ul class="tab-switch">
					{view}if isset($smarty.session.UserPermissoes[68]){/view}
						<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}downloads')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
					{view}/if{/view}
						
					{view}if isset($smarty.session.UserPermissoes[70]){/view}
						<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}downloads/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
					{view}/if{/view}
				</ul>
			</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<form name="frm_donwloads" id="frm_donwloads" method="post" action="javascript:enviar('{view}$URL_DEFAULT{/view}downloads/incluir', 'frm_donwloads', '{view}$URL_DEFAULT{/view}downloads', new Array('{view}$textos_layout[2]{/view}','{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>								
					<dt>
						<label>T&iacute;tulo</label>
					</dt>	
					<dd>
						<input type="text" name="txt_titulo" id="txt_titulo" maxlength="255" class="medium"/>
						<div id="msg_txt_titulo" class="msg_erro"></div>
						<p>{view}$textos_layout[47]{/view}</p>
					</dd>
					
					<dt>
						<label>Arquivo</label>
					</dt>
					<dd>
						<input type="file" id="txt_arquivo" name="txt_arquivo" />
						<div id="msg_txt_arquivo" class="msg_erro"></div>
						<p>{view}$textos_layout[47]{/view}</p>
					</dd>
				</dl>
			</fieldset>
				<button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[43]{/view}</button>
				&nbsp;ou&nbsp;
			
				{view}if isset($smarty.session.UserPermissoes[68]){/view}	
					<a href="{view}$URL_DEFAULT{/view}downloads">{view}$textos_layout[61]{/view}</a>
				{view}/if{/view}
		</form>
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}