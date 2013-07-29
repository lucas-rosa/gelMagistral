{view}include file="{view}$HEAD{/view}"{/view}
<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				<li class="inativo">{view}$textos_layout[48]{/view}</li>
				<li class="inativo">{view}$textos_layout[41]{/view}</li>
				<li class="inativo">{view}$textos_layout[43]{/view}</li>
				<li class="inativo">{view}$textos_layout[42]{/view}</li>
			</ul>
		</nav>
	</header>
    {view}if isset($params.mensagem_confirmacao){/view}
		<div class="notification success">
			<a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
			<p>{view}$params.mensagem_confirmacao{/view}</p>
		</div>
	{view}/if{/view}
	<div class="tab default-tab" id="tab0">
		<form  name="frm_alterar_senha" id="frm_alterar_senha" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}alterarsenha/alterar', 'frm_alterar_senha', '{view}$URL_DEFAULT{/view}alterarsenha/alterar', new Array('{view}$textos_layout[43]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
		<!-- <form  name="frm_alterar_senha" id="frm_alterar_senha" method="post" action="{view}$URL_DEFAULT{/view}alterarsenha">-->
			<fieldset>
				<legend><strong>Alterar Senha</strong></legend>
				<dl>
					<dt><label><strong>Digite a nova senha</strong></label></dt>
					<dd>
						<input type="password" id="txt_senha" name="txt_senha"  />
						<div class="msg_erro" id="msg_txt_senha"></div>
					</dd>
					
					<dt><label><strong>Confirme a nova senha</strong></label></dt>
					<dd>
						<input type="password" id="txt_senha_confirmacao" name="txt_senha_confirmacao"  />
						<div class="msg_erro" id="msg_txt_senha_confirmacao"></div>
					</dd>
				</dl>
				<input type="hidden" id="id_usuario" name="id_usuario" value="{view}$id_usuario{/view}"/>
			</fieldset>
		    <button type="submit" id="btn_enviar" name="btn_enviar">{view}$textos_layout[2]{/view}</button>
			<a href="{view}$URL_DEFAULT{/view}logado">{view}$textos_layout[61]{/view}</a>
		</form>
	</div>

{view}include file="{view}$FOOTER{/view}"{/view}