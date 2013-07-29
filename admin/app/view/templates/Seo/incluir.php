{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[14]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[15]){/view}
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[19]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}seo/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[18]){/view}
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<form name="frm_seo" id="frm_seo" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}seo/incluir', 'frm_seo', '{view}$URL_DEFAULT{/view}seo', new Array('{view}$textos_layout[43]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Caminho da p&aacute;gina</label>
					</dt>
					<dd>
						<input type="text" name="url_caminho" id="url_caminho" class="medium" maxlength="255" />
						<div id="msg_url_caminho" class="msg_erro"></div>
						<p>Parte da URL da p&aacute;gina, exclu&iacute;do o dom&iacute;nio principal. Ex.: se sua p&aacute;gina for "http://www.google.com/sua-pagina", o caminho é "sua-pagina".</p>
						<p>{view}$textos_layout[47]{/view}</p>
					</dd>

					<dt>
						<label>T&iacute;tulo da p&aacute;gina</label>
					</dt>
					<dd>
						<input type="text" name="txt_title" id="txt_title" class="medium" maxlength="255" />
						<div id="msg_txt_title" class="msg_erro"></div>
						<p>Recomenda-se o t&iacute;tulo ter de 10 a 70 caracteres</p>
						<p>{view}$textos_layout[47]{/view}</p>
					</dd>
	
	
					<dt>
						<label>Palavras-chave da p&aacute;gina</label>
					</dt>
					<dd>
						<textarea name="txt_keywords" id="txt_keywords" class="medium"></textarea>
						<div id="msg_txt_keywords" class="msg_erro"></div>
	                   	<p>Recomenda-se o uso de no m&aacute;ximo 15 palavras-chave. Os termos devem ser separados por v&iacute;rgulas.</p>
						<p>{view}$textos_layout[47]{/view}</p>
					</dd>
						
					<dt>
						<label>Descri&ccedil;&atilde;o da p&aacute;gina</label>
					</dt>
					<dd>
						<textarea name="txt_description" id="txt_description" class="medium"></textarea>
						<div id="msg_txt_description" class="msg_erro"></div>
	                   	<p>Recomenda-se a descri&ccedil;&atilde;o ter de 70 a 160 caracteres</p>
	                   	<p>{view}$textos_layout[47]{/view}</p>
					</dd>
				</dl>
			</fieldset>
				
			<button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[43]{/view}</button>
			&nbsp;ou&nbsp;
			
			{view}if isset($smarty.session.UserPermissoes[14]){/view}
				<a href="{view}$URL_DEFAULT{/view}seo">{view}$textos_layout[61]{/view}</a>
			{view}/if{/view}
		</form>
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}