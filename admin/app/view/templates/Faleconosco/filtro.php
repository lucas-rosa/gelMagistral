<table class="datatable">
	<thead>
		<tr>
			<th width="10%">Data</th>
			<th width="10%">Hora</th>
			<th width="20%">Nome</th>
			<th width="40%">E-mail</th>
			<th width="20%">Assunto</th>
		</tr>
	</thead>

	<tbody>
		{view}foreach from=$dados_fale_conosco item=fale_conosco{/view}
			<tr>
				<td>{view}$fale_conosco.data{/view}</td>
				<td>{view}$fale_conosco.hora{/view}</td>
				<td>{view}$fale_conosco.txt_nome{/view}</td>
				<td>{view}$fale_conosco.txt_email{/view}</td>
				<td>{view}$fale_conosco.txt_assunto{/view}</td>
			</tr>
		{view}/foreach{/view}
	</tbody>
</table>