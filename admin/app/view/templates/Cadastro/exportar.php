{view}include file="{view}$HEAD{/view}"{/view}
	<script type="text/javascript">
	function replaceAll(string, token, newtoken)
	{
		while (string.indexOf(token) != -1)
		{
	 		string = string.replace(token, newtoken);
		}
		return string;
	}
	
	function filtrar(url)
	{
		//seta a url e os parâmetros a serem usamos pelo PHP    
		var pars = "/rnd/" + Math.random() * 4;
	
		//Requisição Ajax
		$.ajax({
			url : url + pars, //URL de destino
			contentType : 'application/x-www-form-urlencoded; charset=UTF-8',
			data : '&data_de='+$('#data_de').val()+'&data_ate='+$('#data_ate').val(),
			type : 'post',
			dataType : "html", //Tipo de Retorno
			success : function(html)
			{
				$('#div_filtro').empty();
				$('#div_filtro').html(html);
				$('#div_exportar_todos').hide();
				$('#div_exportar_filtrado').show();
			}
		});
	}
	</script>

	<header>
		<h2>{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</h2>
		<nav>
			<ul class="tab-switch">
				{view}if isset($smarty.session.UserPermissoes[43]){/view}
					<li><a onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro')" rel="tooltip" title="{view}$textos_layout[48]{/view}">{view}$textos_layout[48]{/view}</a></li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[44]){/view}
					<li class="inativo">{view}$textos_layout[41]{/view}</li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[56]){/view}
					<li><a class="default-tab" onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro/exportar')" href="" rel="tooltip" title="Exportar orçamentos">{view}$textos_layout[53]{/view}</a></li>
				{view}/if{/view}
					
				{view}if isset($smarty.session.UserPermissoes[45]){/view}
					<li class="inativo">{view}$textos_layout[42]{/view}</li>
				{view}/if{/view}
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<table>
			<tr>
				<form name="frm_filtrar" id="frm_filtrar" action="{view}$URL_DEFAULT{/view}cadastro/exportar_filtro" method="post">
					<td>
						De: <input type="text" name="data_de" id="data_de" maxlength="10" class="datepicker medium data" value="{view}$de{/view}"><br />
						<div id="msg_data_de" class="msg_erro"></div>
					</td>

					<td>
						At&eacute;: <input type="text" name="data_ate" id="data_ate" maxlength="10" class="datepicker medium data" value="{view}$ate{/view}"><br />
						<div id="msg_data_ate" class="msg_erro"></div>
					</td>

					<td>
						<button type="button" name="btn_filtrar" id="btn_filtrar" class="blue" onclick="filtrar('{view}$URL_DEFAULT{/view}cadastro/exportar_filtro')">Filtrar</button>
					</td>
				</form>
				
				<td>
					<div id="div_exportar_todos">
						<button name="btn_exportar_todos" id="btn_exportar_todos" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro/exportar_todos')">Exportar todos os registros</button>
					</div>
					
					<div id="div_exportar_filtrado" style="display: none;">
						<button type="button" name="btn_exportar_filtrado" id="btn_exportar_filtrado" class="blue" onclick="document.location.replace('{view}$URL_DEFAULT{/view}cadastro/exportar_filtrado/data_de/'+(replaceAll($('#data_de').val(), '/', '-'))+'/data_ate/'+(replaceAll($('#data_ate').val(), '/', '-')))">Exportar filtrado</button>
					</div>
				</td>
			</tr>
		</table>

		<div id="div_filtro">
			<table class="datatable">
				<thead>
					<tr>
						<th width="20%">Data</th>
						<th width="20%">Hora</th>
						<th width="40%">Nome</th>
						<th width="20%">E-mail</th>
					</tr>
				</thead>
		
				<tbody>
					{view}foreach from=$dados_cadastro item=cadastro{/view}
						<tr>
							<td>{view}$cadastro.dat_cadastro{/view}</td>
							<td>{view}$cadastro.hora_cadastro{/view}</td>
							<td>{view}$cadastro.txt_nome{/view}</td>
							<td>{view}$cadastro.txt_email{/view}</td>
						</tr>
					{view}/foreach{/view}
				</tbody>
			</table>
		</div>
	</div>
{view}include file="{view}$FOOTER{/view}"{/view}