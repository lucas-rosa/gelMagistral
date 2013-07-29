<?php /* Smarty version Smarty-3.1.1, created on 2013-07-25 15:56:42
         compiled from "app/view/templates/Faleconosco/index.php" */ ?>
<?php /*%%SmartyHeaderCode:5099252651f174ea2cd984-78964485%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2de8e7ae00f3bb29b129b751beb5dc57b0eb1304' => 
    array (
      0 => 'app/view/templates/Faleconosco/index.php',
      1 => 1374778572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5099252651f174ea2cd984-78964485',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'ARQ_DIN' => 0,
    'textos_site' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_51f174ea424dd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f174ea424dd')) {function content_51f174ea424dd($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

<!-- SLIDER -->
<div class="banner-trabalhe">
    
    <div class="content-wrap clearfix">
        <span class="logo-aba">
        </span>
        <h1>FALE CONOSCO</h1>
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

    <h1 class="nossas-title f-left">Onde encontrar</h1>

    <div class="half-lojas clear-l">

        <h1>Sede Vacaria</h1>
        <p>Rua Felic&iacute;ssimo de Azevedo, 55, Bairro S&atilde;o Geraldo<br/>
        Vacaria, RS, CEP 90876-203<br/>
        51 3322-1122<br/>
        sedevacaria@gelmagistral.com.br</p>

        <img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
maploja-sample.jpg" alt="" title="" />

        <button>+ AMPLIAR</button>

    </div>

    <div class="half-lojas">

        <h1>Sede Vacaria</h1>
        <p>Rua Felic&iacute;ssimo de Azevedo, 55, Bairro S&atilde;o Geraldo<br/>
        Vacaria, RS, CEP 90876-203<br/>
        51 3322-1122<br/>
        sedevacaria@gelmagistral.com.br</p>

        <img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
maploja-sample.jpg" alt="" title="" />

        <button>+ AMPLIAR</button>

    </div>

    <form class="form-pedido fale">
        <div class="form-pedido-border">
            <h1 class="f-left">FALE CONOSCO</h1>
            <p class="f-left clear-l">Se preferir, entre em contato atrav&eacute;s do e-mail: rh@gelmagistral.com.br</p>
            <div class="left">
                <input type="text" value="" name="" />
                <input type="text" value="" name="" />
                <input type="text" value="" name="" />
                <input type="text" value="" name="" />
                <input type="text" value="" name="" />
            </div>
            <div class="right message f-left">
                <textarea class="trabalhe-msg"></textarea>
                <button>> ENVIAR</button>
                <p class="obs">*Preenchimento obrigat&oacute;rio</p>
            </div>
        </div>
    </form>

    
    

   


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