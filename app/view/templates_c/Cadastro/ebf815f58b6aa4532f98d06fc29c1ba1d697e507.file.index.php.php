<?php /* Smarty version Smarty-3.1.1, created on 2013-07-24 05:09:03
         compiled from "app/view/templates/Rodape/index.php" */ ?>
<?php /*%%SmartyHeaderCode:189007882251ef8ba02738b6-36772733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ebf815f58b6aa4532f98d06fc29c1ba1d697e507' => 
    array (
      0 => 'app/view/templates/Rodape/index.php',
      1 => 1374604841,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189007882251ef8ba02738b6-36772733',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL_DEFAULT' => 0,
    'IMG' => 0,
    'DADOS_ENDERECO' => 0,
    'TXT_GANALYTICS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_51ef8ba02ee06',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51ef8ba02ee06')) {function content_51ef8ba02ee06($_smarty_tpl) {?><footer class="clearfix">

    <div class="content-wrap">

	<nav class="nav-topo">
		<ul>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">NOSSAS LOJAS</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro">FALE CONOSCO</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco">TRABALHE CONOSCO</a></li>
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco">CADASTRE-SE</a></li>
			<li class="copyright"><div><p>Copyright © 2012 - Gel Magistral.<br/>Todos os direitos reservados.<br/></p></div></li>
			<li class="social"><a href="http://www.facebook.com/gel.magistral" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
icon-face.jpg" alt="Facebook" title="Facebook" /></a></li> 
			<li class="social"><a href="javascript: void(0)" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
icon-twitt.jpg" alt="Twitter" title="Twitter" /></a></li>			
	    </ul>
	</nav>

	<div class="footer-little">
		<p>Magistral S/A Distribuidora de Medicamentos | Gel Magistral Farmácias | CNPJ 99.444.333/0001-77 | Rua Endereço, 100, Bairro | Porto Alegre-RS | CEP: 90000-000 | Horário de funcionamento: 24 horas</p>
	</div>

	<div class="footer-little">
		<p>Os preços, as promoções, o frete e as condições de pagamento são válidos apenas para compras via Internet. Imagens são meramente ilustrativas.</p>
	</div>


    <!--
	Endereço: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_endereco'];?>
, <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_numero'];?>

	<?php if ($_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_complemento']!=''){?> <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_complemento'];?>
<?php }else{ ?> <?php }?>
	<?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_bairro'];?>
<br />
	CEP: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_cep'];?>
<br />

	<?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['CepCidades']['txt_cidade'];?>
 / <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['CepUf']['txt_uf'];?>
 / <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['CepUf']['cha_sigla'];?>
<br /><br />
	Telefone: <?php echo $_smarty_tpl->tpl_vars['DADOS_ENDERECO']->value['txt_telefone'];?>
<br />
    -->

    </div>

</footer>

<?php echo $_smarty_tpl->tpl_vars['TXT_GANALYTICS']->value;?>


</body>
</html><?php }} ?>