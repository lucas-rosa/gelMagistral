<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 15:20:53
         compiled from "app/view/templates/Cadastro/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:8393035050feca752acf04-80718937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '842e3101371dfc6ab602c5750212fd5aff1dbd53' => 
    array (
      0 => 'app/view/templates/Cadastro/detalhes.php',
      1 => 1358851427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8393035050feca752acf04-80718937',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'CONTROLLER_DADOS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'dados_cadastro' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50feca7547f20',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50feca7547f20')) {function content_50feca7547f20($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][43])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[48];?>
</a></li>
				<?php }?>
				
				<?php if (isset($_SESSION['UserPermissoes'][44])){?>
					<li><a class="default-tab" href="#" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][45])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/editar/cod_id/<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['cod_id'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>	
			</ul>
		</nav>
	</header>

	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_cadastro']->value!==false&&isset($_smarty_tpl->tpl_vars['dados_cadastro']->value)){?>
			<article class="half-block">
				<div class="article-container">
					<section>
						<table>
							<tr>
								<td>
									<button class="blue" onclick="window.open('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/imprimir/cod_id/<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['cod_id'];?>
')" />Imprimir informa&ccedil;&otilde;es</button>
								</td>
							</tr>
	                    	<tr>
								<td class="detalhes">
									<strong>Data de cadastro</strong><br />
									<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['dat_cadastro'];?>

								</td>
	                        </tr>
	                        
	                        <tr>
								<td class="detalhes">
									<strong>Nome</strong><br />
									<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_nome'];?>

								</td>
	                        </tr>
	                        
	                        <tr>
								<td class="detalhes">
									<strong>Sexo</strong><br />
									<?php if ($_smarty_tpl->tpl_vars['dados_cadastro']->value['cod_sexo']==1){?>Masculino<?php }else{ ?>Feminino<?php }?>
								</td>
	                        </tr>
	                        
	                        <tr>
								<td class="detalhes">
									<strong>Profissão</strong><br />
									<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_profissao'];?>

								</td>
	                        </tr>
	                        
	                        <tr>
								<td class="detalhes">
									<strong>Data de nascimento</strong><br />
									<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['dat_nascimento'];?>

								</td>
	                        </tr>
	                        
	                        <tr>
								<td class="detalhes">
									<strong>CEP</strong><br />
									<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['txt_cep'];?>

								</td>
	                        </tr>
	                    </table>
	                </section>
	            </div>
	        </article>
		    
		    <div class="clearfix"></div>
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
            &nbsp;&nbsp;&nbsp;
            <button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro/editar/cod_id/<?php echo $_smarty_tpl->tpl_vars['dados_cadastro']->value['cod_id'];?>
')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
                
		<?php }else{ ?>
			<div class="notification error">
				<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>

			</div>
			<button type="button" class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[52];?>
</button>
		<?php }?>
	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>