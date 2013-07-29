{view}include file="{view}$HEAD{/view}"{/view}
	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[34]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}perfis')" href="" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[35]){/view}
					<li><a class="default-tab" href="#" rel="tooltip" title="{view}$textos_layout[41]{/view}">{view}$textos_layout[41]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[33]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}perfis/incluir')" href="" rel="tooltip" title="{view}$textos_layout[43]{/view}">{view}$textos_layout[43]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[36]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}perfis/editar/cod_tipo/{view}$cod_tipo{/view}')" href="" rel="tooltip" title="{view}$textos_layout[42]{/view}">{view}$textos_layout[42]{/view}</a></li>
				{view}/if{/view}
				
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		{view}if $controller_acao !== false{/view}
			<fieldset>
				<legend>Dados do registro</legend>
				<dl>					
					<dd>
						{view}$html{/view}
					</dd>
					
					<dd>
						<a href="{view}$URL_DEFAULT{/view}perfis" />{view}$textos_layout[61]{/view}</a>
						&nbsp;&nbsp;&nbsp;
						{view}if isset($smarty.session.UserPermissoes[36]){/view}
							<button class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}perfis/editar/cod_tipo/{view}$cod_tipo{/view}')">{view}$textos_layout[42]{/view}</button>
						{view}/if{/view}
					</dd>
				</dl>
			</fieldset>
		{view}else{/view}
			<div class="notification error">
				<p>
					<strong>{view}$textos_layout[45]{/view}</strong>
				</p>
			</div>
			{view}if isset($smarty.session.UserPermissoes[34]){/view}
				<button type="button" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}perfis')">{view}$textos_layout[52]{/view}</button>
			{view}/if{/view}
		{view}/if{/view}
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}