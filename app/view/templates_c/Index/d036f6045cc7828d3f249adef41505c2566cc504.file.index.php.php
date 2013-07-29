<?php /* Smarty version Smarty-3.1.1, created on 2013-07-26 08:44:14
         compiled from "app/view/templates/Index/index.php" */ ?>
<?php /*%%SmartyHeaderCode:93556724951f2610f0a4d88-42832212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd036f6045cc7828d3f249adef41505c2566cc504' => 
    array (
      0 => 'app/view/templates/Index/index.php',
      1 => 1374779528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93556724951f2610f0a4d88-42832212',
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
  'unifunc' => 'content_51f2610f1fca3',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f2610f1fca3')) {function content_51f2610f1fca3($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

<!-- SLIDER -->
<div class="slider">

    <div class="my_asyncslider">

        <div id="slide-01" class="slide">
            <div class="content-wrap clearfix">
                <div class="tittle">
                    <h1>DICAS</h1>
                    <h2>DE BEM ESTAR E SA&Uacute;DE</h2>
                </div>
                <div class="description">
                    <p>Prestar aten&ccedil;&atilde;o no corpo &eacute; uma atitude simples, mas importante para ajudar a prevenir o c&acirc;ncer de pele. Descubra aqui algumas dicas de como prevenir ese tipo de doen&ccedil;a.</p>
                    <button>> LER MAIS</button>
                </div>
            </div>
        </div>

        <div id="slide-02" class="slide">
            <div class="content-wrap clearfix">
                <div class="tittle">
                    <h1>DICAS</h1>
                    <h2>DE BEM ESTAR E SA&Uacute;DE</h2>
                </div>
                <div class="description">
                    <p>Prestar aten&ccedil;&atilde;o no corpo &eacute; uma atitude simples, mas importante para ajudar a prevenir o c&acirc;ncer de pele. Descubra aqui algumas dicas de como prevenir ese tipo de doen&ccedil;a.</p>
                    <button>> LER MAIS</button>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- FIM DO SLIDER -->

<div class="content-wrap clearfix">

	<div class="grid-tres pattern">

        <div class="pedido">

            <a href="#">PEDIDO ONLINE
            <p>Fa&ccedil;a seu pedido sem sair do conforto da sua casa.</p></a>

        </div>

        <div class="manipulacao">

            <a href="#">MANIPULA&Ccedil;&Atilde;O
            <p>Descubra as vantagens do produto manipulado.</p></a>

        </div>

        <div class="dicas-de-saude">

            <a href="#">DICAS DE SA&Uacute;DE
            <p>Descubra dicas de sa&uacute;de e bem-estar que far&atilde;o a diferen&ccedil;a para sua vida.</p></a>            

        </div>

	</div>

	<div class="grid-tres slider" id="slider-grid">  

      <ul class="bjqs">
        <li class="slide-01">

            <h1>Ensure P&oacute; com FOS - Abbott</h1>
            <p>Ensure P&oacute; Abbott, alimento completo e balanceado com adi&ccedil;&atilde;o de FOS. Cont&eacute;m 28 vitaminas e minerais.</p>
            <p><strong>Suplementos alimentares</strong></p>
          
        </li>        
        <li class="slide-01">

            <h1>Ensure P&oacute; com FOS - Abbott</h1>
            <p>Ensure P&oacute; Abbott, alimento completo e balanceado com adi&ccedil;&atilde;o de FOS. Cont&eacute;m 28 vitaminas e minerais.</p>
            <p><strong>Suplementos alimentares</strong></p>
          
        </li>        
        <li class="slide-01">

            <h1>Ensure P&oacute; com FOS - Abbott</h1>
            <p>Ensure P&oacute; Abbott, alimento completo e balanceado com adi&ccedil;&atilde;o de FOS. Cont&eacute;m 28 vitaminas e minerais.</p>
            <p><strong>Suplementos alimentares</strong></p>
          
        </li>         
      </ul>
      
    </div>     


	<div class="grid-tres form">
        <div class="form-border">
            <h1 class="f-left">TIRE SUA D&Uacute;VIDA</h1>
            <p class="f-left">Tire suas d&uacute;vidas atrav&eacute;s desse canal.</p>

            <form class="f-left">
                <input type="text" name="" value="Nome" onfocus="this.value='';" onblur="this.value=this.value==''?'Nome':this.value;" />
                <input type="text" name="" value="Email" onfocus="this.value='';" onblur="this.value=this.value==''?'Email':this.value;" />   
                <textarea value="Pergunta" onfocus="this.value='';" onblur="this.value=this.value==''?'Pergunta':this.value;" />Pergunta</textarea>
                <button type="button">> ENVIAR D&Uacute;VIDA</button>
            </form>

            <h2 class="f-left">CADASTRE-SE</h2>
            <p class="f-left">Receba um conte&uacute;do exclusivo</p>
            <form class="f-left">
                <input type="text" name="" value="Email" onfocus="this.value='';" onblur="this.value=this.value==''?'Email':this.value;" />   
                <button type="button">> CADASTRAR</button>
            </form>
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