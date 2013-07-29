<?php /* Smarty version Smarty-3.1.1, created on 2013-07-24 16:25:27
         compiled from "app/view/templates/Manipulacao/index.php" */ ?>
<?php /*%%SmartyHeaderCode:33075915551f02a279a3ed6-10172946%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db5f35e17c6287c057fa688fb49b60c7c21be440' => 
    array (
      0 => 'app/view/templates/Manipulacao/index.php',
      1 => 1374693472,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33075915551f02a279a3ed6-10172946',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'textos_site' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_51f02a27a89ae',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f02a27a89ae')) {function content_51f02a27a89ae($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

<!-- SLIDER -->
<div class="banner-manipulacao">
    
    <div class="content-wrap clearfix">
        <span class="logo-aba">
        </span>
        <h1>MANIPULA&Ccedil;&Atilde;O</h1>
    </div>
</div>
<!-- FIM DO SLIDER -->

<div class="content-wrap clearfix">

    <div class="vejamais-side">
        <h1>VEJA TAMB&Eacute;M</h1>
        <div class="pedido">
            <a href="#">PEDIDO ONLINE
            <p>Envie suas receitas e manipule seus produtos sem precisar sair de casa.</p></a>

        </div>
        <div class="divider-side"></div>
        <div class="manipulacao">
            <a href="#">MANIPULA&Ccedil;&Atilde;O
            <p>Saiba mais sobre o processo e as vantagens de produtos manipulados.</p></a>
        </div>
        <div class="divider-side"></div>
        <div class="dicas-de-saude">
            <a href="#">DICAS DE SA&Uacute;DE
            <p>Confira dicas que podem fazer a diferença no seu dia a dia.</p></a>

        </div>
    </div>

    <div class="quemsomos-content">
        <div class="description-manipulacao">
            <h1>Qualidade Comprovada</h1>
            <p>A qualidade dos manipulados vai da compra de mat&eacute;ria-prima &agrave; entrega do produto final. A cada mat&eacute;ria-prima e embalagem adquiridas, s&atilde;o realizados testes de qualidade e identifica&ccedil;&atilde;o no Laborat&oacute;rio de Controle de Qualidade da Manipula&ccedil;&atilde;o. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            A receita passa por uma avalia&ccedil;&atilde;o farmac&ecirc;utica antes da manipula&ccedil;&atilde;o, e , em caso de d&uacute;vida, o m&eacute;dico &eacute; sempre consultado. Com a formula&ccedil;&atilde;o j&aacute; analisada, a prescri&ccedil;&atilde;o &eacute; manipulada por profissionais treinados e qualificados, tudo acompanhado por um farmac&ecirc;utico.</p>
        </div>

        <div class="description-manipulados">
            <div class="description-manipulados-border">
                <h1>MANIPULADOS</h1>
                <p>O laborat&oacute;rio da Gel Magistral trabalha com os seguintes produtos manipulados:</p>
                <ul>
                    <li>C&aacute;psulas</li>
                    <li>Fitoter&aacute;picos</li>
                    <li>Cosmec&ecirc;uticos</li>
                    <li>Cremes</li>
                    <li>Lo&ccedil;&otilde;es</li>
                    <li>G&eacute;is</li>
                </ul>
                <ul>
                    <li>Xampus</li>
                    <li>Florais</li>
                    <li>Homeopatia</li>
                    <li>Linha Odontol&oacute;gica</li>
                    <li>Nutrac&ecirc;utico</li>
                    <li>Hortomolecular</li>
                </ul>
            </div>
        </div>


    </div>


	<!--
	Teste de t&iacute;tulo/texto from table "textos"<br />
	<h1><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['txt_titulo'];?>
</h1>
	<?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['texto'];?>
<br />

	<br /><br />
	Teste de texto from table "textosLayout"<br />
	<h2><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
</h2>
	-->

</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>