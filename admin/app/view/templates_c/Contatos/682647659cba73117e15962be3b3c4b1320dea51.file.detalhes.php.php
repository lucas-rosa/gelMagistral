<?php /* Smarty version Smarty-3.1.1, created on 2013-01-22 10:09:00
         compiled from "app/view/templates/Contatos/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:186622264550fe815c597b36-80993461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '682647659cba73117e15962be3b3c4b1320dea51' => 
    array (
      0 => 'app/view/templates/Contatos/detalhes.php',
      1 => 1358447599,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '186622264550fe815c597b36-80993461',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'mapa' => 0,
    'CONTROLLER_DADOS' => 0,
    'textos_layout' => 0,
    'URL_DEFAULT' => 0,
    'dados_contatos' => 0,
    'params' => 0,
    'endereco' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_50fe815c7f94a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fe815c7f94a')) {function content_50fe815c7f94a($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
	
	<script type="text/javascript">
	jQuery(document).ready(function()
			{
				var mapa = "<?php echo $_smarty_tpl->tpl_vars['mapa']->value;?>
";
				var conta = 1;
				var array_mapa = mapa.split("|");
	
				for (i in array_mapa)
				{
					if(array_mapa[i] != "")
					{
						var explodir = array_mapa[i].split("[;]");
						
					    var latlng = new google.maps.LatLng(explodir[0],explodir[1]);
	
					    var myOptions = {
					    	    zoom: 14,
					    	    center: latlng,
					    	    mapTypeId: google.maps.MapTypeId.ROADMAP
					    };
					
					    var map = new google.maps.Map(document.getElementById("map_canvas"+conta), myOptions);
					
					    var marker = new google.maps.Marker({
					        position: latlng, 
					        map: map,
					        title:"Localização"
					    });
					}
					conta++;
				}
			});
	</script>

	<header>
		<h2><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</h2>		
		<nav>
			<ul class="tab-switch">
				<?php if (isset($_SESSION['UserPermissoes'][12])){?>
					<li><a class="default-tab" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[41];?>
</a></li>
				<?php }?>
					
				<?php if (isset($_SESSION['UserPermissoes'][13])){?>
					<li><a onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/editar/cod_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value[0]['cod_relacao_idioma'];?>
')" href="" rel="tooltip" title="<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>
		
	<div class="tab default-tab" id="tab0">
		<?php if ($_smarty_tpl->tpl_vars['dados_contatos']->value!==false){?>
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

	   		<article class="half-block">
				<div class="article-container">
					<?php  $_smarty_tpl->tpl_vars['endereco'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['endereco']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_contatos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['endereco']->key => $_smarty_tpl->tpl_vars['endereco']->value){
$_smarty_tpl->tpl_vars['endereco']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['foo']['iteration']++;
?>
						<header>
							<h2><?php echo $_smarty_tpl->tpl_vars['endereco']->value['WebsiteIdiomas']['txt_idioma'];?>
</h2>
						</header>
							
						<section>		
							<table>
								<tr>
									<td width="50%" class="detalhes"><strong>Raz&atilde;o Social</strong><br />
										<h3><?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_razao_social'];?>
</h3>
									</td>
									
									<td width="50%" class="detalhes"><strong>CNPJ</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_cnpj'];?>

									</td>
								</tr>
								
								<tr>
									<td class="detalhes"><strong>Endere&ccedil;o</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_endereco'];?>

									</td>
									<td class="detalhes"><strong>N&uacute;mero / Complemento</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_numero'];?>
 /
										<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_complemento'];?>

									</td>
								</tr>
								
								<tr>
									<td class="detalhes"><strong>CEP</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_cep'];?>

									</td>
									<td class="detalhes"><strong>Bairro</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_bairro'];?>

									</td>
								</tr>
								
								<tr>
									<td class="detalhes"><strong>Cidade</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['endereco']->value['CepCidades']['txt_cidade'];?>

									</td>
									<td class="detalhes"><strong>UF</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['endereco']->value['CepUf']['txt_uf'];?>

									</td>
								</tr>
								
								<tr>
									<td class="detalhes"><strong>Pa&iacute;s</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_pais'];?>

									</td>
									<td class="detalhes"><strong>Telefone Principal</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['endereco']->value['txt_telefone'];?>

									</td>
								</tr>
								
								<tr>
									<td class="detalhes" colspan="2"><strong>Localiza&ccedil;&atilde;o no Google Maps</strong><br />
										<div id="map_canvas<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['foo']['iteration'];?>
" style="width:100%; height:240px"></div>
									</td>
								</tr>
								
								<tr>
									<td>
										<?php if (isset($_SESSION['UserPermissoes'][13])){?>
											<button class="blue" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/editar/cod_relacao_idioma/<?php echo $_smarty_tpl->tpl_vars['dados_contatos']->value[0]['cod_relacao_idioma'];?>
')"><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[42];?>
</button>
										<?php }?>
									</td>
								</tr>
							</table>					
						</section>
						<br/><br/>
					<?php } ?>
				</div>
			</article>

	        <div class="clearfix"></div>
	        	<?php }else{ ?>
					<div class="notification error">
						<p>
							<strong><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[45];?>
</strong>
						</p>
					</div>
				<?php }?>
			</div>
            
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>