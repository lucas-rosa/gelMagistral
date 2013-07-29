{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[12]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}contatos/detalhes/cod_relacao_idioma/{view}$dados_contatos.0.cod_relacao_idioma{/view}')" href="" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[13]){/view}
					<li><a class="default-tab" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		{view}if $dados_contatos[0]['cod_id'] != ''{/view}
			
			<form name="frm_contatos" id="frm_contatos" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}contatos/editar', 'frm_contatos','{view}$URL_DEFAULT{/view}contatos/detalhes/cod_relacao_idioma/{view}$cod_relacao_idioma{/view}', new Array('{view}$textos_layout[51]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
			<!--
			<form name="frm_contatos" id="frm_contatos" method="post" action="{view}$URL_DEFAULT{/view}contatos/editar">
			-->	
				{view}foreach from=$dados_contatos item=contatos name=con{/view}
					<fieldset>
						<legend><strong>{view}$contatos.txt_idioma{/view}</strong></legend>
						<fieldset>
							<legend>Dados do registro</legend>
							<fieldset>
								<dl>
			            			<dt>
										<label>Raz&atilde;o Social</label>
			                        </dt>
			                        
			                        <dd>
			                        	<input type="text" name="txt_razao_social{view}$smarty.foreach.con.iteration{/view}" id="txt_razao_social{view}$smarty.foreach.con.iteration{/view}" onkeyup="mascara(this,soLetras)" maxlength="255" value="{view}$contatos.txt_razao_social{/view}" class="medium" />
			                        </dd>
		
			                        <dt>
										<label>CNPJ</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_cnpj{view}$smarty.foreach.con.iteration{/view}" id="txt_cnpj{view}$smarty.foreach.con.iteration{/view}" maxlength="18" value="{view}$contatos.txt_cnpj{/view}" class="medium cnpj"/>
			                        </dd>
		
			                        <dt>
										<label>N&uacute;mero</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_numero{view}$smarty.foreach.con.iteration{/view}" id="txt_numero{view}$smarty.foreach.con.iteration{/view}" onkeyup="mascara(this,soNumero)" maxlength="255" value="{view}$contatos.txt_numero{/view}"class="small" />
			                        	<div id="msg_erro_txt_numero{view}$smarty.foreach.con.iteration{/view}" class="msg_erro"></div>
			                        	<p>{view}$textos_layout[47]{/view}</p>
			                        </dd>
		
			                        <dt>
										<label>Complemento</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_complemento{view}$smarty.foreach.con.iteration{/view}" id="txt_complemento{view}$smarty.foreach.con.iteration{/view}" maxlength="255" value="{view}$contatos.txt_complemento{/view}" class="small"/>
			                        </dd>
		
			                        <dt>
										<label>CEP</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_cep{view}$smarty.foreach.con.iteration{/view}" id="txt_cep{view}$smarty.foreach.con.iteration{/view}" maxlength="9" value="{view}$contatos.txt_cep{/view}" class="small cep" onkeyup="getCep('{view}$URL_DEFAULT{/view}contatos/carregaEndereco','{view}$URL_DEFAULT{/view}contatos/buscaCidades', $('#txt_cep{view}$smarty.foreach.con.iteration{/view}').val(), 'msg_erro_txt_cep{view}$smarty.foreach.con.iteration{/view}', 'txt_endereco{view}$smarty.foreach.con.iteration{/view}', 'txt_bairro{view}$smarty.foreach.con.iteration{/view}', 'cod_estado{view}$smarty.foreach.con.iteration{/view}', 'cod_cidade{view}$smarty.foreach.con.iteration{/view}', 'combo_cidade{view}$smarty.foreach.con.iteration{/view}')"/>
			                        	<div id="msg_erro_txt_cep{view}$smarty.foreach.con.iteration{/view}" class="msg_erro"></div>
			                        	<p>{view}$textos_layout[47]{/view}</p>
			                        </dd>
			                        
			                        <dt>
										<label>Endere&ccedil;o</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_endereco{view}$smarty.foreach.con.iteration{/view}" id="txt_endereco{view}$smarty.foreach.con.iteration{/view}" onkeyup="mascara(this,soLetras)" maxlength="255" value="{view}$contatos.txt_endereco{/view}" class="medium"/>
			                        	<div id="msg_erro_txt_endereco{view}$smarty.foreach.con.iteration{/view}" class="msg_erro"></div>
			                        	<p>{view}$textos_layout[47]{/view}</p>
			                        </dd>
		
			                        <dt>
										<label>Bairro</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_bairro{view}$smarty.foreach.con.iteration{/view}" id="txt_bairro{view}$smarty.foreach.con.iteration{/view}" onkeyup="mascara(this,soLetras)" maxlength="255" value="{view}$contatos.txt_bairro{/view}"class="medium"/>
			                        	<div id="msg_erro_txt_bairro{view}$smarty.foreach.con.iteration{/view}" class="msg_erro"></div>
			                        	<p>{view}$textos_layout[47]{/view}</p>
			                        </dd>
		
			                        <dt>
										<label>Estado</label>
			                        </dt>
			                        <dd>
			                        	<select name="cod_estado{view}$smarty.foreach.con.iteration{/view}" id="cod_estado{view}$smarty.foreach.con.iteration{/view}" onchange="getCidade('{view}$URL_DEFAULT{/view}contatos/buscaCidades',$(this).val(),'cod_cidade{view}$smarty.foreach.con.iteration{/view}','combo_cidade{view}$smarty.foreach.con.iteration{/view}')">
			                            	<option value="">--{view}$textos_layout[46]{/view}--</option>
			                            	{view}foreach from=$estados item=estado{/view}
			                            		<option value="{view}$estado.cod_id{/view}" {view}if $contatos.cod_estado == $estado.cod_id{/view} selected="selected" {view}/if{/view}>{view}$estado.txt_uf{/view}</option>
			                            	{view}/foreach{/view}
			                            </select>
			                        	<div id="msg_erro_cod_estado{view}$smarty.foreach.con.iteration{/view}" class="msg_erro"></div>
			                        	<p>{view}$textos_layout[47]{/view}</p>
			                        </dd>
		
			                        <dt>
										<label>Cidade</label>
			                        </dt>
			                        <dd>
			                        	<div id="combo_cidade{view}$smarty.foreach.con.iteration{/view}">
											<select name="cod_cidade{view}$smarty.foreach.con.iteration{/view}" id="cod_cidade{view}$smarty.foreach.con.iteration{/view}" >
												<option value="">--{view}$textos_layout[46]{/view}--</option>
												
												{view}foreach from=$contatos.cidades item=cidade{/view}
				                            		<option value="{view}$cidade.cod_id{/view}" {view}if $cidade.cod_id == $contatos.cod_cidade{/view} selected="selected" {view}/if{/view}>{view}$cidade.txt_cidade{/view}</option>
				                            	{view}/foreach{/view}
				                            	
											</select>
										</div>
			                        	<div id="msg_erro_cod_cidade{view}$smarty.foreach.con.iteration{/view}" class="msg_erro"></div>
			                        	<p>{view}$textos_layout[47]{/view}</p>
			                        </dd>
								
			                        <dt>
										<label>Telefone</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_telefone{view}$smarty.foreach.con.iteration{/view}" id="txt_telefone{view}$smarty.foreach.con.iteration{/view}" maxlength="14" value="{view}$contatos.txt_telefone{/view}" class="small telefone"/>
			                        	<div id="msg_erro_txt_telefone{view}$smarty.foreach.con.iteration{/view}" class="msg_erro"></div>
			                        	<p>{view}$textos_layout[47]{/view}</p>
			                        </dd>
		
			                        <dt>
										<label>Pa&iacute;s</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="txt_pais{view}$smarty.foreach.con.iteration{/view}" id="txt_pais{view}$smarty.foreach.con.iteration{/view}" onkeyup="mascara(this,soLetras)" maxlenght="100" value="{view}$contatos.txt_pais{/view}" class="medium"/>
			                        	<div id="msg_erro_txt_pais{view}$smarty.foreach.con.iteration{/view}" class="msg_erro"></div>
			                        	<p>{view}$textos_layout[47]{/view}</p>
			                        </dd>
			                    </dl>
			                </fieldset>
					
							<fieldset>
								<legend>Dados para Google Maps</legend>
								<dl>
			                        <dt>
										<label>Latitude</label>
			                        </dt>
			                        <dd>
			                        	<input type="text" name="cod_latitude{view}$smarty.foreach.con.iteration{/view}" id="cod_latitude{view}$smarty.foreach.con.iteration{/view}" maxlength="255" value="{view}$contatos.cod_latitude{/view}" class="small"/>
			                        	<div id="msg_erro_latitude{view}$smarty.foreach.con.iteration{/view}" class="msg_erro"></div>
			                        	<p>{view}$textos_layout[47]{/view}</p>
			                        </dd>
		
			                        <dt>
										<label>Longitude</label>
			                        </dt>
			                        
			                        <dd>
			                        	<input type="text" name="cod_longitude{view}$smarty.foreach.con.iteration{/view}" id="cod_longitude{view}$smarty.foreach.con.iteration{/view}" maxlength="255" value="{view}$contatos.cod_longitude{/view}" class="small"/>
			                        	<div id="msg_erro_longitude{view}$smarty.foreach.con.iteration{/view}" class="msg_erro"></div>
			                        	<p>{view}$textos_layout[47]{/view}</p>
			                        </dd>
			                        
			                        <dd>
			                        	<input type="hidden" name="cod_id{view}$smarty.foreach.con.iteration{/view}" id="cod_id{view}$smarty.foreach.con.iteration{/view}" value="{view}$contatos.cod_id{/view}">
			                        	<input type="hidden" name="cod_relacao_idioma{view}$smarty.foreach.con.iteration{/view}" id="cod_relacao_idioma{view}$smarty.foreach.con.iteration{/view}" value="{view}$contatos.cod_relacao_idioma{/view}" />
			                        	<input type="hidden" name="cod_idioma{view}$smarty.foreach.con.iteration{/view}" id="cod_idioma{view}$smarty.foreach.con.iteration{/view}" value="{view}$contatos.cod_idioma{/view}" />
			                        </dd>
			                    </dl>
			                </fieldset>
				        </fieldset>
				    </fieldset>
				{view}/foreach{/view}
	                
	            <button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[51]{/view}</button>
	            &nbsp;ou&nbsp; 
	            <a href="{view}$URL_DEFAULT{/view}contatos/detalhes/cod_relacao_idioma/{view}$dados_contatos.0.cod_relacao_idioma{/view}" />{view}$textos_layout[61]{/view}</a>
	        </form>
	    {view}else{/view}
	    	<div class="notification error">
						<p>
							<strong>{view}$textos_layout[45]{/view}</strong>
						</p>
					</div>
	    {view}/if{/view}
    </div>
{view}include file="{view}$FOOTER{/view}"{/view}