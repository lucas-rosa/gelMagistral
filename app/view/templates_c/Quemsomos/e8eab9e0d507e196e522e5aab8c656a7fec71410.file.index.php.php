<?php /* Smarty version Smarty-3.1.1, created on 2013-07-24 16:17:57
         compiled from "app/view/templates/Quemsomos/index.php" */ ?>
<?php /*%%SmartyHeaderCode:19916532851f02865557344-38052057%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8eab9e0d507e196e522e5aab8c656a7fec71410' => 
    array (
      0 => 'app/view/templates/Quemsomos/index.php',
      1 => 1374530492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19916532851f02865557344-38052057',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'textos_site' => 0,
    'IMG' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_51f0286598114',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f0286598114')) {function content_51f0286598114($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
	

<!-- SLIDER -->
<div class="banner-quemsomos">
    
    <div class="content-wrap clearfix">
        <span class="logo-aba">
        </span>
        <h1>QUEM SOMOS</h1>
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
        <div class="description">
            <h1><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['txt_titulo'];?>
</h1>
           <?php echo $_smarty_tpl->tpl_vars['textos_site']->value[1]['texto'];?>

        </div>

        <div class="destaques">
        <div class="destaques-border clearfix">
            <h1>EM DESTAQUE</h1>
            <div class="half">
                <img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
sacolas-reciclaveis.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['textos_site']->value[5]['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['textos_site']->value[5]['txt_titulo'];?>
" width="254" height="90" />
                <?php echo $_smarty_tpl->tpl_vars['textos_site']->value[5]['texto'];?>

            </div>
            <div class="half">
                <img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
embalagens-plasticas.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['textos_site']->value[6]['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['textos_site']->value[6]['txt_titulo'];?>
" width="254" height="90" />
               <?php echo $_smarty_tpl->tpl_vars['textos_site']->value[6]['texto'];?>

            </div>
        </div>
        </div>
        
        <div class="description">
            <h1><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[2]['txt_titulo'];?>
</h1>
           <?php echo $_smarty_tpl->tpl_vars['textos_site']->value[2]['texto'];?>

        </div>

        <div class="description">
            <h1><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[3]['txt_titulo'];?>
</h1>
           <?php echo $_smarty_tpl->tpl_vars['textos_site']->value[3]['texto'];?>

        </div>

        <div class="description">
            <h1><?php echo $_smarty_tpl->tpl_vars['textos_site']->value[4]['txt_titulo'];?>
</h1>
           <?php echo $_smarty_tpl->tpl_vars['textos_site']->value[4]['texto'];?>

        </div>
        
    </div>



</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>