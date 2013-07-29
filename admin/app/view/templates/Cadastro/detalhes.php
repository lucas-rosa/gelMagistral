{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[43]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[44]){/view}
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[45]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro/editar/cod_id/{view}$dados_cadastro.cod_id{/view}')" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}	
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $dados_cadastro !== false && isset($dados_cadastro){/view}
			<article class="half-block">
				<div class="article-container">
					<section>
						<table>
							<tr>
								<td>
									<button class="blue" onclick="window.open('{view}$URL_DEFAULT{/view}cadastro/imprimir/cod_id/{view}$dados_cadastro.cod_id{/view}')" />Imprimir informa&ccedil;&otilde;es</button>
								</td>
							</tr>
	                    	<tr>
								<td class="detalhes">
									<strong>Data de cadastro</strong><br />
									{view}$dados_cadastro.dat_cadastro{/view}
								</td>
	                        </tr>
	                        
	                        <tr>
								<td class="detalhes">
									<strong>Nome</strong><br />
									{view}$dados_cadastro.txt_nome{/view}
								</td>
	                        </tr>
	                        
	                        <tr>
								<td class="detalhes">
									<strong>Sexo</strong><br />
									{view}if $dados_cadastro.cod_sexo == 1{/view}Masculino{view}else{/view}Feminino{view}/if{/view}
								</td>
	                        </tr>
	                        
	                        <tr>
								<td class="detalhes">
									<strong>Profissão</strong><br />
									{view}$dados_cadastro.txt_profissao{/view}
								</td>
	                        </tr>
	                        
	                        <tr>
								<td class="detalhes">
									<strong>Data de nascimento</strong><br />
									{view}$dados_cadastro.dat_nascimento{/view}
								</td>
	                        </tr>
	                        
	                        <tr>
								<td class="detalhes">
									<strong>CEP</strong><br />
									{view}$dados_cadastro.txt_cep{/view}
								</td>
	                        </tr>
	                    </table>
	                </section>
	            </div>
	        </article>
		    
		    <div class="clearfix"></div>
			
			{view}if isset($smarty.session.UserPermissoes[43]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro')">{view}$textos_layout[52]{/view}</button>
	            &nbsp;&nbsp;&nbsp;
            {view}/if{/view}
          
           {view}if isset($smarty.session.UserPermissoes[45]){/view}
           		<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro/editar/cod_id/{view}$dados_cadastro.cod_id{/view}')">{view}$textos_layout[42]{/view}</button>
            {view}/if{/view}    
		{view}else{/view}
			<div class="notification error">
				{view}$textos_layout[45]{/view}
			</div>
			{view}if isset($smarty.session.UserPermissoes[43]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro')">{view}$textos_layout[52]{/view}</button>
			{view}/if{/view}
		{view}/if{/view}
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}
