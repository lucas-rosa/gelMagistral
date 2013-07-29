{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				<li class="inativo">{view}$textos_layout[41]{/view}</li>
				<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}permissoes/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				<li class="inativo">{view}$textos_layout[42]{/view}</li>
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<form name="frm_permissoes" id="frm_permissoes" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}permissoes/incluir', 'frm_permissoes', '{view}$URL_DEFAULT{/view}permissoes', new Array('{view}$textos_layout[43]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')" >
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>
					<dt>
						<label>Controler e Ação</label>
					</dt>
					
					<dd>
						{view}foreach from=$controller_acao item=contr{/view}
							<input type="checkbox" name="controller_acao[]" id="controller_acao" value="{view}$contr.cod_id{/view}" />
							<b>Controller:</b> {view}$contr.FrameworkControllers.txt_nome_amigavel{/view} <b>Ação:</b> {view}$contr.FrameworkAcoes.txt_nome_amigavel{/view}
							<br/>
						{view}/foreach{/view}
						
					</dd>
					
					<dt>
						<label>Nome do perfil</label>
					</dt>
					
					<dd>
						<input type="text" name="txt_perfil" id="txt_perfil" />
						<div id="msg_txt_perfil" class="msg_erro"></div>
					</dd>
				</dl>
			</fieldset>

			<button type="submit" id="btn_enviar" class="gray" />{view}$textos_layout[43]{/view}</button>
			&nbsp;ou&nbsp;
			<a href="{view}$URL_DEFAULT{/view}permissoes" />{view}$textos_layout[61]{/view}</a>
		</form>
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}