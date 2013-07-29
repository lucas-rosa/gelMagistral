{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[4]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}configuracoes/detalhes/cod_id/{view}$dados_configuracao.cod_id{/view}')" href="" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[3]){/view}
					<li><a class="default-tab" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		{view}if $dados_configuracao !== false && isset($dados_configuracao){/view}
			<form name="frm_configuracoes" id="frm_configuracoes" method="post" action="javascript:acao('{view}$URL_DEFAULT{/view}configuracoes/editar', 'frm_configuracoes','{view}$URL_DEFAULT{/view}configuracoes/detalhes/cod_id/{view}$dados_configuracao.cod_id{/view}', new Array('{view}$textos_layout[51]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'msg_erro')">
			<!--<form name="frm_configuracoes" id="frm_configuracoes" method="post" action="{view}$URL_DEFAULT{/view}configuracoes/editar">-->
				<fieldset>
					<legend>Configura&ccedil;&otilde;es gerais</legend>                
					<dl>
						<dt>
							<label>T&iacute;tulo padr&atilde;o do website</label>
	                    </dt>
	                    
	                    <dd>
	                    	<input type="text" name="txt_default_title" id="txt_default_title" value="{view}$dados_configuracao.txt_default_title{/view}" class="medium" maxlength="255"/>
	                    	<div id="msg_txt_default_title" class="msg_erro"></div>
	                    	<p>Recomenda-se o t&iacute;tulo ter de 10 a 70 caracteres</p>
	                    	<p>{view}$textos_layout[47]{/view}</p>
	                    </dd>
					</dl>
					
					<dl>
						<dt>
							<label>Idioma padr&atilde;o</label>
						</dt>
	                        
	                    <dd>
	                    	<select name="cod_idioma_default" id="cod_idioma_default" class="small">
	                    		<option value="">--{view}$textos_layout[46]{/view}--</option>
	                    		{view}foreach from=$idiomas item=idioma{/view}
	                    			<option value="{view}$idioma.cod_id{/view}" {view}if $dados_configuracao.cod_idioma_default == $idioma.cod_id{/view} selected="selected" {view}/if{/view}>{view}$idioma.txt_idioma{/view}</option>
	                    		{view}/foreach{/view}
	                        </select>
	                        <div id="msg_cod_idioma_default" class="msg_erro"></div>
	            			<p>{view}$textos_layout[47]{/view}</p>
	            		</dd>
					</dl>
					
					<dl>
						<dt>
							<label>Palavras-chave padr&atilde;o do website</label>
	                    </dt>
	                        
	                    <dd>
	                    	<textarea name="txt_default_key" id="txt_default_key" class="medium">{view}$dados_configuracao.txt_default_key{/view}</textarea>
	                    	<div id="msg_txt_default_key" class="msg_erro"></div>
	                    	<p>Recomenda-se o uso de no m&aacute;ximo 15 palavras-chave. Os termos devem ser separados por v&iacute;rgulas.</p>
	                    	<p>{view}$textos_layout[47]{/view}</p>
	                    </dd>
					</dl>
					
					<dl>
						<dt>
							<label>Descri&ccedil;&atilde;o padr&atilde;o do website</label>
	                    </dt>
	                        
	                    <dd>
	                    	<textarea name="txt_default_desc" id="txt_default_desc" class="medium">{view}$dados_configuracao.txt_default_desc{/view}</textarea>
	                        <div id="msg_txt_default_desc" class="msg_erro"></div>
	                        <p>Recomenda-se a descri&ccedil;&atilde;o ter de 70 a 160 caracteres</p>
	                        <p>{view}$textos_layout[47]{/view}</p>
	                    </dd>
					</dl>
					
					<dl>
						<dt>
							<label>E-mail (webmaster)</label>
	                    </dt>                       
	                    <dd>
	                    	<input type="text" name="txt_email_webmaster" id="txt_email_webmaster" value="{view}$dados_configuracao.txt_email_webmaster{/view}" class="medium" maxlength="255"/>
	                    	<div id="msg_txt_email_webmaster" class="msg_erro"></div>
	                        <p>{view}$textos_layout[47]{/view}</p>
	                    </dd>
	                </dl>
	            </fieldset>
	                
	            <button type="submit" id="btn_enviar" class="blue">{view}$textos_layout[51]{/view}</button>
	            &nbsp;ou&nbsp; 
	            {view}if isset($smarty.session.UserPermissoes[4]){/view}
	           	 	<a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/cod_id/{view}$dados_configuracao.cod_id{/view}">{view}$textos_layout[61]{/view}</a>
	            {view}/if{/view}
	           	<input type="hidden" name="cod_id" id="cod_id" value="{view}$dados_configuracao.cod_id{/view}" />
	           	
	        </form>
	    {view}else{/view}
	    	<div class="notification error">
				{view}$textos_layout[45]{/view}
			</div>
			 {view}if isset($smarty.session.UserPermissoes[4]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}configuracoes/detalhes/cod_id/{view}$dados_configuracao.cod_id{/view}')">{view}$textos_layout[52]{/view}</button>
	    	{view}/if{/view}
	    {view}/if{/view}
    </div>   	
{view}include file="{view}$FOOTER{/view}"{/view}