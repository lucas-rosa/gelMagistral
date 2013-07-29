<?php /* Smarty version Smarty-3.1.1, created on 2013-01-23 15:45:00
         compiled from "app/view/templates/Logado/index.php" */ ?>
<?php /*%%SmartyHeaderCode:12584742075100219c653633-43281997%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19cd48c4f2793685ff7751e8aad4e50d8b79b014' => 
    array (
      0 => 'app/view/templates/Logado/index.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12584742075100219c653633-43281997',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'dados' => 0,
    'dado' => 0,
    'helper' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5100219c7438e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5100219c7438e')) {function content_5100219c7438e($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
  

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
					<?php  $_smarty_tpl->tpl_vars['dado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dado']->key => $_smarty_tpl->tpl_vars['dado']->value){
$_smarty_tpl->tpl_vars['dado']->_loop = true;
?>
						<th scope="col"><?php echo $_smarty_tpl->tpl_vars['helper']->value->mesPorExtenso($_smarty_tpl->tpl_vars['dado']->value['mes']);?>
/<?php echo $_smarty_tpl->tpl_vars['dado']->value['ano'];?>
</th>
					<?php } ?>
				</tr>
			</thead>
			
			<tbody>
				<tr>
					<th scope="row">Visitantes</th>
					<?php  $_smarty_tpl->tpl_vars['dado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dado']->key => $_smarty_tpl->tpl_vars['dado']->value){
$_smarty_tpl->tpl_vars['dado']->_loop = true;
?>
						<td><?php echo $_smarty_tpl->tpl_vars['dado']->value['num_visitantes'];?>
</td>
					<?php } ?>
				</tr>
			
				<tr>
					<th scope="row">Visitas</th>
					<?php  $_smarty_tpl->tpl_vars['dado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dado']->key => $_smarty_tpl->tpl_vars['dado']->value){
$_smarty_tpl->tpl_vars['dado']->_loop = true;
?>
						<td><?php echo $_smarty_tpl->tpl_vars['dado']->value['num_visitas'];?>
</td>
					<?php } ?>
				</tr>
				
				<tr>
					<th scope="row">Visualiza&ccedil;&atilde;o de p&aacute;ginas</th>
					<?php  $_smarty_tpl->tpl_vars['dado'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dado']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dado']->key => $_smarty_tpl->tpl_vars['dado']->value){
$_smarty_tpl->tpl_vars['dado']->_loop = true;
?>
						<td><?php echo $_smarty_tpl->tpl_vars['dado']->value['page_views'];?>
</td>
					<?php } ?>
				</tr>	
			</tbody>
		</table>
	</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>