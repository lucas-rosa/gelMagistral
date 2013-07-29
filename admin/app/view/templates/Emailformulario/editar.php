{view}include file="{view}$HEAD{/view}"{/view}
	<header>
	<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[58]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}emailformulario')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[59]){/view}
                                        <li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}emailformulario/detalhes/cod_id/{view}$dados_emailformulario.cod_id{/view}')" href="" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[60]){/view}	
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_emailformulario !== false && isset($dados_emailformulario){/view}
			<form name="frm_email" id="frm_email" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}emailformulario/editar', 'frm_email', '{view}$URL_DEFAULT{/view}emailformulario', new Array('{view}$textos_layout[51]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
			<!--<form name="frm_email" id="frm_email" method="post" action="{view}$URL_DEFAULT{/view}emailformulario/editar">-->
				<fieldset>
					<legend>Dados do E-mail</legend>
					<dl>
						<dt>
							<label>E-mail</label>
						</dt>
		
						<dd>
							<input type="text" name="txt_email" id="txt_email" value="{view}$dados_emailformulario.txt_email{/view}" class="small" />
							<div id="msg_txt_email" class="msg_erro"></div>
							<p>Preenchimento obrigat&oacute;rio.</p>
						</dd>
		
						<dt>
							<label>Formulário</label>
						</dt>
						<dd>
							<input type="text" name="txt_formulario" id="txt_formulario" value="{view}$dados_emailformulario.txt_formulario{/view}" class="small" />
							<div id="msg_txt_formulario" class="msg_erro"></div>
						</dd>
						
						<dt>
							<label>Conversão</label>
						</dt>
						<dd>
							<textarea type="text" name="txt_conversao" id="txt_conversao">{view}$dados_emailformulario.txt_conversao{/view}</textarea>
						</dd>
					</dl>
				</fieldset>
				
				<input type="hidden" name="cod_id" id="cod_id" value="{view}$dados_emailformulario.cod_id{/view}" />
				
				<button type="submit" id="btn_enviar" class="blue" />{view}$textos_layout[51]{/view}</button>
				&nbsp;ou&nbsp;
				
				{view}if isset($smarty.session.UserPermissoes[58]){/view}
					<a href="{view}$URL_DEFAULT{/view}emailformulario" />{view}$textos_layout[61]{/view}</a>
				{view}/if{/view}
			</form>
		{view}else{/view}
			<div class="notification error">
				{view}$textos_layout[45]{/view}
			</div>
			{view}if isset($smarty.session.UserPermissoes[58]){/view}
				<button class="gray" onclick="document.location.replace('{view}$URL_DEFAULT{/view}emailformulario')" />{view}$textos_layout[52]{/view}</button>
			{view}/if{/view}
		{view}/if{/view}
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}