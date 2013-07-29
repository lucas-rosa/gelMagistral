<?php /* Smarty version Smarty-3.1.1, created on 2012-11-14 09:02:29
         compiled from "app/view/templates/Emailformulario/exportar.php" */ ?>
<?php /*%%SmartyHeaderCode:48193285050a37a4602a636-87775578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a7085b4957995800c53e36a2b4e43e618f45780' => 
    array (
      0 => 'app/view/templates/Emailformulario/exportar.php',
      1 => 1352820991,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48193285050a37a4602a636-87775578',
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
    'array_cadastro' => 0,
    'cadas' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50a37a4619228',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a37a4619228')) {function content_50a37a4619228($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script type="text/javascript">
function replaceAll(string, token, newtoken)
{
	while (string.indexOf(token) != -1)
	{
 		string = string.replace(token, newtoken);
	}
	return string;
}
</script>

<script type="text/javascript">

$(function()
{
	$('#data_de,#data_ate').datepick({ 
	    onSelect: customRange}); 
});

function customRange(dates) { 
    if (this.id == 'data_de') { 
        $('#data_ate').datepick('option', 'minDate', dates[0] || null); 
        
    } 
    else { 
        $('#data_de').datepick('option', 'maxDate', dates[0] || null); 
    } 
}
</script>

<header>
	<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
	<nav>
		<ul class="tab-switch">
			<?php if (isset($_SESSION['UserPermissoes'][58])){?>
				<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
			<?php }?>
				
			<?php if (isset($_SESSION['UserPermissoes'][64])){?>
				<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/exportar')" href="" rel="tooltip" title="Exportar cadastros">Exportar cadastros</a></li>
			<?php }?>
				
			<?php if (isset($_SESSION['UserPermissoes'][59])){?>
				<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
			<?php }?>
		</ul>
	</nav>
</header>

	<div class="tab default-tab" id="tab0">
		<form name="frm_filtrar" id="frm_filtrar" action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/exportar_filtro" method="post">
			<table>
				<tr>
					<td>
						De: <input type="text" name="data_de" id="data_de" maxlength="10" class="datepicker medium" onkeyup="mascara(this,soData)" value="<?php echo $_smarty_tpl->tpl_vars['de']->value;?>
"><br />
						<span id="msg_data_de"></span>
					</td>

					<td>
						At&eacute;: <input type="text" name="data_ate" id="data_ate" maxlength="10" class="datepicker medium" onkeyup="mascara(this,soData)" value="<?php echo $_smarty_tpl->tpl_vars['ate']->value;?>
"><br />
						<span id="msg_data_ate"></span>
					</td>

					<td>
						<button name="btn_filtrar" id="btn_filtrar" type="submit" class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/exportar_filtro')">Filtrar</button>
					</td>
				
					<?php if ($_smarty_tpl->tpl_vars['de']->value!=''&&$_smarty_tpl->tpl_vars['ate']->value!=''){?>
					<td>
						<button name="btn_exportar_periodo" id="btn_exportar_periodo" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/exportar/de/'+(replaceAll(document.getElementById('data_de').value, '/', '_'))+'/ate/'+(replaceAll(document.getElementById('data_ate').value, '/', '_')))" class="gray">Exportar registros do per&iacute;odo selecionado</button>
					</td>
	
					<td>
						<button name="btn_mostrar_todos" id="btn_mostrar_todos" class="gray" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/exportar')">Voltar a mostrar todos</button>
					</td>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['de']->value==''&&$_smarty_tpl->tpl_vars['ate']->value==''){?>
					<td>
						<button name="btn_exportar_todos" id="btn_exportar_todos" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/exportar_filtro')" class="gray">Exportar todos os registros</button>
					</td>
					<?php }?>
				</tr>
			</table>
		</form>

		<table class="datatable">
			<thead>
				<tr>
					<th width="20%">Data / Hora</th>
					<th width="40%">Nome</th>                                
                    <th width="10%">E-mail</th>
                    <th width="30%">Comentário</th>
				</tr>
			</thead>

			<tbody>
				<?php  $_smarty_tpl->tpl_vars['cadas'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cadas']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['array_cadastro']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cadas']->key => $_smarty_tpl->tpl_vars['cadas']->value){
$_smarty_tpl->tpl_vars['cadas']->_loop = true;
?>
					<tr>
						<td width="20%"><?php echo $_smarty_tpl->tpl_vars['cadas']->value['dat_cadastro'];?>
</td>
						<td width="15%"><?php echo $_smarty_tpl->tpl_vars['cadas']->value['txt_nome'];?>
</td>
						<td width="15%"><?php echo $_smarty_tpl->tpl_vars['cadas']->value['txt_email'];?>
</td>
						<td width="15%"><?php echo $_smarty_tpl->tpl_vars['cadas']->value['txt_comentario'];?>
</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>