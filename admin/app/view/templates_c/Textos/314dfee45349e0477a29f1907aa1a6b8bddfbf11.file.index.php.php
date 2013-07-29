<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 15:21:31
         compiled from "app/view/templates/Textos/index.php" */ ?>
<?php /*%%SmartyHeaderCode:90497354450feca9b190013-23280666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '314dfee45349e0477a29f1907aa1a6b8bddfbf11' => 
    array (
      0 => 'app/view/templates/Textos/index.php',
      1 => 1355326181,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '90497354450feca9b190013-23280666',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_textos' => 0,
    'params' => 0,
    'texto' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50feca9b35af9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50feca9b35af9')) {function content_50feca9b35af9($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][28])){?>
					<li><a class="default-tab" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][29])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][31])){?>
					<li class="inativo"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</li>
				<?php }?>
			</ul>
		</nav>
	</header>
	
	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_textos']->value!==false){?>
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
						<th width="10%">Idioma</th>
						<th width="75%">Texto</th>
						<th width="10%">&nbsp;</th>
					</tr>
				</thead>
				
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['texto'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['texto']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_textos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['texto']->key => $_smarty_tpl->tpl_vars['texto']->value){
$_smarty_tpl->tpl_vars['texto']->_loop = true;
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['texto']->value['WebsiteIdiomas']['txt_idioma'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['texto']->value['txt_titulo'];?>
</td>
                            <td>
                            	<ul class="actions">
                            		<?php if (isset($_SESSION['UserPermissoes'][29])){?>
                            			<li><a class="view" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/detalhes/cod_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['texto']->value['cod_relacao_idioma'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
                            		<?php }?>	
                            			
                            		<?php if (isset($_SESSION['UserPermissoes'][31])){?>
                            			<li><a class="edit" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos/editar/cod_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['texto']->value['cod_relacao_idioma'];?>
" rel="tooltip" original-title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
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