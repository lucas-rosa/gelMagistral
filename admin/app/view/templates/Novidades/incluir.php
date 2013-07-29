{view}include file="{view}$HEAD{/view}"{/view}
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/plugin_crop.js"></script>
<script type="text/javascript">
var image_handling_file  = "{view}$URL_DEFAULT{/view}novidades/imagem";
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
				{view}if isset($smarty.session.UserPermissoes[20]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}novidades')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[22]){/view}
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[25]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}novidades/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[24]){/view}
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<form  enctype="multipart/form-data" name="frm_novidade" id="frm_novidade" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}novidades/incluir', 'frm_novidade', '{view}$URL_DEFAULT{/view}novidades', new Array('{view}$textos_layout[43]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
		<!--<form name="frm_novidade" id="frm_novidade" method="post" action='{view}$URL_DEFAULT{/view}novidades/incluir'>-->
			{view}foreach from=$idiomas item=idioma name=idi{/view}
				<fieldset>
					<legend><strong>{view}$idioma.txt_idioma{/view}</strong></legend>
					<fieldset>
						<legend>Dados de publica&ccedil;&atilde;o</legend>
						<dl>
							<dt>
								<label>Publicado</label>
							</dt>
							<dd>
								<input type="radio" name="cod_publicado{view}$smarty.foreach.idi.iteration{/view}" id="radio" value="1" checked /> Sim
								&nbsp;&nbsp;&nbsp;&nbsp;
								<input type="radio" name="cod_publicado{view}$smarty.foreach.idi.iteration{/view}" id="radio2" value="0" /> N&atilde;o
								<div id="msg_cod_publicado{view}$smarty.foreach.idi.iteration{/view}" class="msg_erro"></div>
								<p>
									Ao escolher "sim", o conte&uacute;do que est&aacute; sendo
									inclu&iacute;do passa a aparecer no website depois de salvo.<br />
									Ao escolher "n&atilde;o", o conte&uacute;do &eacute; salvo,
									por&eacute;m segue sem aparecer no website.
								</p>
							</dd>
							
							<dt>
								<label>Data de In&iacute;cio da Publica&ccedil;&atilde;o</label>
							</dt>
							<dd>
								<input type="text" name="dat_inicio_publicacao{view}$smarty.foreach.idi.iteration{/view}" id="dat_inicio_publicacao{view}$smarty.foreach.idi.iteration{/view}" class="datepicker small dataHora" maxlength="19" value="{view}$data_hora_atual{/view}" />
								<div id="msg_dat_inicio_publicacao{view}$smarty.foreach.idi.iteration{/view}" class="msg_erro"></div>
								<p>{view}$textos_layout[47]{/view}</p>
								<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
								<p>Marque a data e hora na qual voc&ecirc; quer que este
									conte&uacute;do passe a aparecer no website.</p>
							</dd>
							
							<dt>
								<label>Data de T&eacute;rmino da Publica&ccedil;&atilde;o</label>
							</dt>
							<dd>
								<input type="text" name="dat_termino_publicacao{view}$smarty.foreach.idi.iteration{/view}" id="dat_termino_publicacao{view}$smarty.foreach.idi.iteration{/view}" class="datepicker small dataHora" maxlength="19" value="{view}$data_hora_termino{/view}" />
								<div id="msg_dat_termino_publicacao{view}$smarty.foreach.idi.iteration{/view}" class="msg_erro"></div>
								<p>{view}$textos_layout[47]{/view}</p>
								<p>Formato correto: dd/mm/aaaa hh:mm:ss.</p>
								<p>Marque a data e hora na qual voc&ecirc; quer que este
									conte&uacute;do deixe aparecer no website.</p>
							</dd>
						</dl>
					</fieldset>

					<fieldset>
						<legend>Dados do registro</legend>
						<dl>
							<dt>
								<label>Data</label>
							</dt>
							<dd>
								<input type="text" name="dat_data{view}$smarty.foreach.idi.iteration{/view}" id="dat_data{view}$smarty.foreach.idi.iteration{/view}" class="datepicker small data" />
								<div id="msg_dat_data{view}$smarty.foreach.idi.iteration{/view}" class="msg_erro"></div>
								<p>{view}$textos_layout[47]{/view}</p>
								<p>Formato correto: dd/mm/aaaa.</p>
								<p>Esta &eacute; a data que aparece junto ao conte&uacute;do no website.</p>
							</dd>

							<dt>
								<label>Imagem</label>
							</dt>
							<dd>
								<!-- INICIO DO HTML DO PLUGIN -->
								<input type="hidden" name="nome_img{view}$smarty.foreach.idi.iteration{/view}" value="" id="nome_img{view}$smarty.foreach.idi.iteration{/view}" /> 
								<input type="hidden" name="nome_img_cropada{view}$smarty.foreach.idi.iteration{/view}" value="" id="nome_img_cropada{view}$smarty.foreach.idi.iteration{/view}" /> 
								<div id="upload_status{view}$smarty.foreach.idi.iteration{/view}" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
								<p>
									<button type="button" id="upload_link{view}$smarty.foreach.idi.iteration{/view}" class="blue">Escolher Imagem</button>
									<button type="button" id="cancelar_upload{view}$smarty.foreach.idi.iteration{/view}" class="blue">Cancelar</button>
								</p>
								
								<div id="todo_conteudo{view}$smarty.foreach.idi.iteration{/view}">
									<span id="loader{view}$smarty.foreach.idi.iteration{/view}" style="display: none;">
										<img src="loader.gif" alt="Carregando..." />
									</span>
									
									<span id="progress{view}$smarty.foreach.idi.iteration{/view}"></span> <br />
									<div id="uploaded_image{view}$smarty.foreach.idi.iteration{/view}"></div>
									<div id="thumbnail_form{view}$smarty.foreach.idi.iteration{/view}" style="display: none;">
										<input type="hidden" name="x1" value="" id="x1{view}$smarty.foreach.idi.iteration{/view}" />
										<input type="hidden" name="y1" value="" id="y1{view}$smarty.foreach.idi.iteration{/view}" />
										<input type="hidden" name="x2" value="" id="x2{view}$smarty.foreach.idi.iteration{/view}" />
										<input type="hidden" name="y2" value="" id="y2{view}$smarty.foreach.idi.iteration{/view}" />
										<input type="hidden" name="w" value="" id="w{view}$smarty.foreach.idi.iteration{/view}" />
										<input type="hidden" name="h" value="" id="h{view}$smarty.foreach.idi.iteration{/view}" />
										<input type="hidden" name="flag" id="flag" value="inclusao">
										<button type="button" name="save_thumb{view}$smarty.foreach.idi.iteration{/view}" id="save_thumb{view}$smarty.foreach.idi.iteration{/view}" class="blue"> Salvar </button>
									</div>
								</div>
	    						<!-- FIM DO HTML DO PLUGIN -->
							</dd>

							<dt>
								<label>T&iacute;tulo</label>
							</dt>
							
							<dd>
								<input type="text" name="txt_titulo{view}$smarty.foreach.idi.iteration{/view}" id="txt_titulo{view}$smarty.foreach.idi.iteration{/view}" maxlength="255" class="medium" />
								<div id="msg_txt_titulo{view}$smarty.foreach.idi.iteration{/view}" class="msg_erro"></div>
								<p>{view}$textos_layout[47]{/view}</p>
							</dd>
							
							<dt>
								<label>Texto</label>
							</dt>
							
							<dd>
								<textarea name="txt_texto{view}$smarty.foreach.idi.iteration{/view}" id="txt_texto{view}$smarty.foreach.idi.iteration{/view}" class="wysiwyg large" ></textarea>
								<div id="msg_txt_texto{view}$smarty.foreach.idi.iteration{/view}" class="msg_erro"></div>
								<p>{view}$textos_layout[47]{/view}</p>
							</dd>
						</dl>
						
						<input type="hidden" name="cod_idioma{view}$smarty.foreach.idi.iteration{/view}" id="{view}$smarty.foreach.idi.iteration{/view}" value="{view}$idioma.cod_id{/view}">
					</fieldset>
				</fieldset>
			{view}/foreach{/view}
			
			<button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[43]{/view}</button>
			&nbsp;ou&nbsp;
			{view}if isset($smarty.session.UserPermissoes[20]){/view}
				<a href="{view}$URL_DEFAULT{/view}novidades">{view}$textos_layout[61]{/view}</a>
			{view}/if{/view}	
		</form>
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}