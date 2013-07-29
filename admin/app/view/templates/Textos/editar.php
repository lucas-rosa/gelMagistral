{view}include file="{view}$HEAD{/view}"{/view}
	<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/plugin_crop.js"></script>
	<script type="text/javascript">
		var image_handling_file  = "{view}$URL_DEFAULT{/view}textos/imagem";	
		var url_padrao = "{view}$URL_DEFAULT{/view}";
		var arq_din = "{view}$ARQ_DIN{/view}";
		var altura_crop = '{view}$altura_crop{/view}';
		var largura_crop = '{view}$largura_crop{/view}';
		var altura_cropada = '{view}$altura_cropada{/view}';
		var largura_cropada =  '{view}$largura_cropada{/view}';
		var imagem_edicao = "{view}$URL_DEFAULT{/view}textos/imagemEdicao";
	</script>

	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[28]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}textos')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[29]){/view}
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[31]){/view}
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<form name="frm_textos" id="frm_textos" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}textos/editar', 'frm_textos', '{view}$URL_DEFAULT{/view}textos', new Array('{view}$textos_layout[51]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
		<!--
		<form name="frm_textos" id="frm_textos" method="post" action="{view}$URL_DEFAULT{/view}textos/editar">
			-->
				<fieldset>	
					<legend>Imagem</legend>
					<!-- INICIO DO HTML DO PLUGIN -->
					<div id="imagem_cropada_ftp1" name="imagem_cropada_ftp1"></div>								  
					<button type="button" id="deletar1" name="deletar" class="blue">Deletar imagem atual</button>
					<button type="button" id="editar1" name="editar_imagem" class="blue" >Editar imagem</button>
					<button type="button" id="nova_imagem1" class="blue">Inserir imagem</button>
				    <button type="button" id="cancelar_recropagem1" class="blue">Cancelar recropagem</button>										    
				    <button type="button" id="cancelar_upload1" class="blue">Cancelar</button>
				    
				    <div id="todo_conteudo1">
				    	<div id="upload_status1" style="font-size: 12px; width: 80%; margin: 10px; padding: 5px; display: none; border: 1px #999 dotted; background: #eee;"></div>
						<input type="hidden" name="nome_img1" id="nome_img1" value='{view}$dados_texto.0.img_texto{/view}'  />
					    <input type="hidden" name="nome_img_cropada1" id="nome_img_cropada1" value="{view}$dados_texto.0.img_texto_cropado{/view}"  /> 						
						<div id="uploaded_image1"></div>
						<div id="thumbnail_form1" style="display: none;">
							<input  type="hidden" name="x1" value="" id="x11" />
							<input  type="hidden" name="y1" value="" id="y11" />
							<input  type="hidden" name="x2" value="" id="x21" />
							<input  type="hidden" name="y2" value="" id="y21" />
							<input  type="hidden" name="w" value="" id="w1" />
							<input  type="hidden" name="h" value="" id="h1" />
							<button type="button" name="save_thumb1" id="save_thumb1" class="blue" >Salvar</button>
							<button type="button" name="salvar_recropagem1" id="salvar_recropagem1" class="blue" >Salvar Recropagem</button>
							<input  type="hidden" name="flag" id="flag" value="edicao">
							<input  type="hidden" name="id_idioma1" id="id_idioma1" value="1">
							<input  type="hidden" value="1" id="1">
							<input  type="hidden" value="{view}$dados_texto.0.cod_id{/view}" id="id1" name="id1" />
						</div>
					</div>
					<!-- FIM DO HTML DO PLUGIN -->
				</fieldset>
				
				{view}foreach from=$dados_texto item=dados name=dad{/view}
					<fieldset>
						<legend>{view}$dados.txt_idioma{/view}</legend>
						<fieldset>
							<legend>Dados do registro</legend>
							<dl>
								<dt>
									<label>T&iacute;tulo</label>
								</dt>
								<dd>
									<input type="text" name="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" id="txt_titulo{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.txt_titulo{/view}" class="small" />
									<div id="msg_txt_titulo{view}$smarty.foreach.dad.iteration{/view}" class="msg_erro"></div>
									<p>Preenchimento obrigat&oacute;rio.</p>
								</dd>
			
								<dt>
									<label>Texto</label>
								</dt>
								<dd>
									<textarea name="txt_texto{view}$smarty.foreach.dad.iteration{/view}" id="txt_texto{view}$smarty.foreach.dad.iteration{/view}" class="wysiwyg large">{view}$dados.txt_texto{/view}</textarea>
									<div id="msg_txt_texto{view}$smarty.foreach.dad.iteration{/view}" class="msg_erro"></div>
			
									<p>Preenchimento obrigat&oacute;rio.</p>
								</dd>
	
							</dl>
						</fieldset>
					</fieldset>
					<input type="hidden" name="cod_id{view}$smarty.foreach.dad.iteration{/view}" id="cod_id{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.cod_id{/view}" />
					<input type="hidden" name="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" id="cod_idioma{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.cod_idioma{/view}" />
					<input type="hidden" name="cod_relacao_idioma{view}$smarty.foreach.dad.iteration{/view}" id="cod_relacao_idioma{view}$smarty.foreach.dad.iteration{/view}" value="{view}$dados.cod_relacao_idioma{/view}" />
					
				{view}/foreach{/view}
				
				<button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[51]{/view}</button>
				&nbsp;ou&nbsp;
				
				{view}if isset($smarty.session.UserPermissoes[28]){/view}
					<a href="{view}$URL_DEFAULT{/view}textos">{view}$textos_layout[61]{/view}</a>
				{view}/if{/view}
			</form>
		</div>
{view}include file="{view}$FOOTER{/view}"{/view}