<?php /* Smarty version Smarty-3.1.1, created on 2013-07-26 09:07:36
         compiled from "app/view/templates/Novidades/index.php" */ ?>
<?php /*%%SmartyHeaderCode:123736149051f26688e90b13-59709087%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcbf53c115e10f7142cc0f7af6146ec4a1457767' => 
    array (
      0 => 'app/view/templates/Novidades/index.php',
      1 => 1374784452,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123736149051f26688e90b13-59709087',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'dados_novidades' => 0,
    'novidades' => 0,
    'ARQ_DIN' => 0,
    'Helper' => 0,
    'URL_DEFAULT' => 0,
    'paginacao' => 0,
    'pag' => 0,
    'textos_site' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_51f266890f54b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f266890f54b')) {function content_51f266890f54b($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

<!-- SLIDER -->
<div class="banner-dicas">
    
    <div class="content-wrap clearfix">
        <span class="logo-aba">
        </span>
        <h1 class="novidades-title">NOVIDADES</h1>
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
        

        <div class="dicas-slider">
            <?php  $_smarty_tpl->tpl_vars['novidades'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['novidades']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_novidades']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['novidades']->key => $_smarty_tpl->tpl_vars['novidades']->value){
$_smarty_tpl->tpl_vars['novidades']->_loop = true;
?>
                <div class="dica-left">
                    <h1><?php echo $_smarty_tpl->tpl_vars['novidades']->value['txt_titulo'];?>
</h1>
                    
                    <?php if ($_smarty_tpl->tpl_vars['novidades']->value['txt_titulo']){?>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['novidades']->value['img_cropada'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['novidades']->value['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['novidades']->value['txt_titulo'];?>
" />
                    <?php }?>
                    
                    <p><?php echo $_smarty_tpl->tpl_vars['Helper']->value->reduzir_string($_smarty_tpl->tpl_vars['novidades']->value['txt_texto'],200);?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['novidades']->value['dat_data'];?>
</p>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
novidades/detalhes/<?php echo $_smarty_tpl->tpl_vars['novidades']->value['txt_permalink'];?>
" target="_blank">+ LER MAIS</a>
                </div>
            <?php } ?>
        </div>
        
        <!-- Inicio da paginacao -->
        <?php  $_smarty_tpl->tpl_vars['pag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['paginacao']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pag']->key => $_smarty_tpl->tpl_vars['pag']->value){
$_smarty_tpl->tpl_vars['pag']->_loop = true;
?>
                <?php echo $_smarty_tpl->tpl_vars['pag']->value;?>

        <?php } ?>
        <!-- Fim da paginacao -->
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