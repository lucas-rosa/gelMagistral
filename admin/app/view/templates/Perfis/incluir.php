{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[34]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}perfis')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[35]){/view}
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[33]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}perfis/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[36]){/view}
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<form name="frm_perfis" id="frm_perfis" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}perfis/incluir', 'frm_perfis', '{view}$URL_DEFAULT{/view}perfis', new Array('{view}$textos_layout[43]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')" >
		<!--<form name="frm_perfis" id="frm_perfis" method="post" action="{view}$URL_DEFAULT{/view}perfis/incluir" >-->
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Controler e Ação</label>
					</dt>
					
					<!--<dd>
						{view}foreach from=$controller_acao item=contr{/view}
							<input type="checkbox" name="controller_acao[]" id="controller_acao" value="{view}$contr.cod_id{/view}" />
							<b>Controller:</b> {view}$contr.FrameworkControllers.txt_nome_amigavel{/view} <b>Ação:</b> {view}$contr.FrameworkAcoes.txt_nome_amigavel{/view}
							<br/>
						{view}/foreach{/view}
					</dd>-->
					
					<dd>
						{view}$html{/view}
					</dd>
					
					<dt>
						<label>Nome do perfil</label>
					</dt>
					
					<dd>
						<input type="text" name="txt_perfil" id="txt_perfil" onchange="verificaLogin('{view}$URL_DEFAULT{/view}perfis/verificalogin', 'txt_perfil', 'msg_txt_perfil', $(this).val())" />
						<div id="msg_txt_perfil" class="msg_erro"></div>
						<p>Preenchimento obrigat&oacute;rio.</p>
					</dd>
				</dl>
			</fieldset>

			<button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[43]{/view}</button>
			&nbsp;ou&nbsp;
			{view}if isset($smarty.session.UserPermissoes[34]){/view}
				<a href="{view}$URL_DEFAULT{/view}perfis" />{view}$textos_layout[61]{/view}</a>
			{view}/if{/view}	
		</form>
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}