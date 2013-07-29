<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 16:34:03
         compiled from "app/view/templates/Faleconosco/exportar.php" */ ?>
<?php /*%%SmartyHeaderCode:142942827050fedb9b225a57-28010167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b868f8d8df643a96c618c22a0d765ef6cad319c5' => 
    array (
      0 => 'app/view/templates/Faleconosco/exportar.php',
      1 => 1358878517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142942827050fedb9b225a57-28010167',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'de' => 0,
    'ate' => 0,
    'dados_fale_conosco' => 0,
    'fale_conosco' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fedb9b3c634',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fedb9b3c634')) {function content_50fedb9b3c634($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][51])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][53])){?>
					<li><a class="default-tab" href="#" rel="tooltip" title="Exportar cadastros">Exportar cadastros</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][52])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<table>
			<tr>
				<form name="frm_filtrar" id="frm_filtrar" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/exportar_filtro" method="post">
					<td>
						De: <input type="text" name="data_de" id="data_de" maxlength="10" class="datepicker medium data" value="<?php echo $_smarty_tpl->tpl_vars['de']->value;?>
"><br />
						<div id="msg_data_de" class="msg_erro"></div>
					</td>

					<td>
						At&eacute;: <input type="text" name="data_ate" id="data_ate" maxlength="10" class="datepicker medium data" value="<?php echo $_smarty_tpl->tpl_vars['ate']->value;?>
"><br />
						<div id="msg_data_ate" class="msg_erro"></div>
					</td>

					<td>
						<button type="button" name="btn_filtrar" id="btn_filtrar" class="blue" onclick="filtrar('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/exportar_filtro')">Filtrar</button>
					</td>
				</form>
				
				<td>
					<div id="div_exportar_todos">
						<button name="btn_exportar_todos" id="btn_exportar_todos" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/exportar_todos')">Exportar todos os registros</button>
					</div>
					
					<div id="div_exportar_filtrado" style="display: none;">
						<button type="button" name="btn_exportar_filtrado" id="btn_exportar_filtrado" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/exportar_filtrado/data_de/'+(replaceAll($('#data_de').val(), '/', '-'))+'/data_ate/'+(replaceAll($('#data_ate').val(), '/', '-')))">Exportar filtrado</button>
					</div>
				</td>
			</tr>
		</table>

		<div id="div_filtro">
			<table class="datatable" id="first-desc">
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
					<?php  $_smarty_tpl->tpl_vars['fale_conosco'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['fale_conosco']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_fale_conosco']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['fale_conosco']->key => $_smarty_tpl->tpl_vars['fale_conosco']->value){
$_smarty_tpl->tpl_vars['fale_conosco']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['data'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['hora'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['txt_nome'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['txt_email'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['txt_assunto'];?>
</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>