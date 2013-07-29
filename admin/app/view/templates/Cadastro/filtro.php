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