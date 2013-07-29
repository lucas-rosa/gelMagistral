<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 15:55:39
         compiled from "app/view/templates/Faleconosco/index.php" */ ?>
<?php /*%%SmartyHeaderCode:187153964650fed29b33c075-23801874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2de8e7ae00f3bb29b129b751beb5dc57b0eb1304' => 
    array (
      0 => 'app/view/templates/Faleconosco/index.php',
      1 => 1358765833,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187153964650fed29b33c075-23801874',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_faleConosco' => 0,
    'params' => 0,
    'dados_fale_conosco' => 0,
    'fale_conosco' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fed29b4e3cf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fed29b4e3cf')) {function content_50fed29b4e3cf($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][51])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][53])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/exportar')" href="" rel="tooltip" title="Exportar cadastros">Exportar cadastros</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][52])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_faleConosco']->value!==false){?>
			<?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])&&$_smarty_tpl->tpl_vars['params']->value['sucesso']==true){?>
				<div class="notification success">
					<a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
					<p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
				</div>
			<?php }?>
			
			<?php if (isset($_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'])&&$_smarty_tpl->tpl_vars['params']->value['erro']==true){?>
				<div class="notification error">
					<a href="#" class="close-notification" title="Fechar notifica&ccedil;&atilde;o" rel="tooltip">x</a>
					<p><?php echo $_smarty_tpl->tpl_vars['params']->value['mensagem_confirmacao'];?>
</p>
				</div>
			<?php }?>
			
			<table class="datatable">
				<thead>
					<tr>
						<th width="10%">Data</th>
						<th width="10%">Hora</th>
						<th width="30%">Nome</th>
						<th width="10%">E-mail</th>
						<th width="30%">Assunto</th>
						<th width="10%">&nbsp;</th>
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
                            <td>
                            	<ul class="actions">
                            		<?php if (isset($_SESSION['UserPermissoes'][52])){?>
                            			<li><a class="view" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco/detalhes/cod_id/<?php echo $_smarty_tpl->tpl_vars['fale_conosco']->value['cod_id'];?>
" rel="tooltip" original-title="Ver detalhes">ver</a></li>
                            		<?php }?>
                            	</ul>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php }else{ ?>
           	<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[24];?>

        <?php }?>
    </div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>