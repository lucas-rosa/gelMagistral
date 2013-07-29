<?php /* Smarty version Smarty-3.1.1, created on 2013-07-25 17:00:05
         compiled from "app/view/templates/Pedido/index.php" */ ?>
<?php /*%%SmartyHeaderCode:171476739551f183c62d0062-07506057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1fa799193e5ef91cbec60452a06de19d0c2674da' => 
    array (
      0 => 'app/view/templates/Pedido/index.php',
      1 => 1374782276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171476739551f183c62d0062-07506057',
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
  'unifunc' => 'content_51f183c63f341',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f183c63f341')) {function content_51f183c63f341($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

<!-- SLIDER -->
<div class="banner-pedido">
    
    <div class="content-wrap clearfix">
        <span class="logo-aba">
        </span>
        <h1>PEDIDO ONLINE</h1>
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
        <div class="description pedido-desc">
            <h1>FA&ccedil;a sua solicita&ccedil;&atilde;o sem sair de casa.</h1>
            <p>Entre em contato pelo formul&aacute;rio abaixo, anexe uma c&oacute;pia digital da sua receita m&eacute;dica. Pedidos realizados para a cidade de Vacaria ou Bom Jesus.</p>
        </div>

        <form class="form-pedido">
            <div class="form-pedido-border">
                <h1>FORMUL&Aacute;RIO</h1>
                <p>Se preferir, entre em contato atrav&eacute;s do e-mail: pedidoonline@gelmagistral.com.br</p>
                <div class="left">
                    <input type="text" name="" value="Nome*" onfocus="this.value='';" onblur="this.value=this.value==''?'Nome*':this.value;" />
                    <input type="text" name="" value="Email*" onfocus="this.value='';" onblur="this.value=this.value==''?'Email*':this.value;" />
                    <input type="text" name="" value="Telefone*" onfocus="this.value='';" onblur="this.value=this.value==''?'Telefone*':this.value;" />
                    <input type="text" name="" value="Endereco*" onfocus="this.value='';" onblur="this.value=this.value==''?'Endereco*':this.value;" />
                    <input type="text" name="" value="Cidade*" onfocus="this.value='';" onblur="this.value=this.value==''?'Cidade*':this.value;" />
                </div>
                <div class="right">                    
                    <input type="text" name="" value="CPF*" onfocus="this.value='';" onblur="this.value=this.value==''?'CPF*':this.value;" />                    
                    <input type="file" name="" />
                    <textarea onfocus="this.value='';" onblur="this.value=this.value==''?'Nome*':this.value;">Descri&ccedil;&atilde;o</textarea>
                    <button>> ENVIAR</button>
                    <p class="obs">*Preenchimento obrigat&oacute;rio</p>
                </div>
            </div>

        </form>

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