{view}include file="{view}$HEAD{/view}"{/view}  

    <header>
        <h2>Painel de Controle</h2>
    </header>

	<section>

	<div class="tab default-tab" id="tab0">
		<h3>Estat&iacute;sticas de visita&ccedil;&atilde;o do website</h3>
		<br />
		<table class="data" data-chart="line">
			<thead>
				<tr>
					<td></td>
					{view}foreach from=$dados item=dado{/view}
						<th scope="col">{view}$helper->mesPorExtenso($dado.mes){/view}/{view}$dado.ano{/view}</th>
					{view}/foreach{/view}
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<th scope="row">Visitantes</th>
					{view}foreach from=$dados item=dado{/view}
						<td>{view}$dado.num_visitantes{/view}</td>
					{view}/foreach{/view}
				</tr>
			
				<tr>
					<th scope="row">Visitas</th>
					{view}foreach from=$dados item=dado{/view}
						<td>{view}$dado.num_visitas{/view}</td>
					{view}/foreach{/view}
				</tr>
				
				<tr>
					<th scope="row">Visualiza&ccedil;&atilde;o de p&aacute;ginas</th>
					{view}foreach from=$dados item=dado{/view}
						<td>{view}$dado.page_views{/view}</td>
					{view}/foreach{/view}
				</tr>	
			</tbody>
		</table>
	</div>

{view}include file="{view}$FOOTER{/view}"{/view}