<?php /* Smarty version Smarty-3.1.1, created on 2013-07-26 09:05:20
         compiled from "app/view/templates/Dicasdesaude/detalhes.php" */ ?>
<?php /*%%SmartyHeaderCode:203924060151f2660133af57-71157155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8249bf189399739aaaed307509d280e4bd2088c' => 
    array (
      0 => 'app/view/templates/Dicasdesaude/detalhes.php',
      1 => 1374840300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203924060151f2660133af57-71157155',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'dados_dicas' => 0,
    'ARQ_DIN' => 0,
    'URL_DEFAULT' => 0,
    'dados_outras_dicas' => 0,
    'outras_dicas' => 0,
    'textos_site' => 0,
    'textos_layout' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_51f2660149781',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f2660149781')) {function content_51f2660149781($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['HEAD']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
  

<!-- SLIDER -->
<div class="banner-dicas">
    
    <div class="content-wrap clearfix">
        <span class="logo-aba">
        </span>
        <h1>DICAS DE SA&Uacute;DE</h1>
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

        <div class="dica-full">
            
            <h1><?php echo $_smarty_tpl->tpl_vars['dados_dicas']->value['txt_titulo'];?>
</h1>
            
            <?php if ($_smarty_tpl->tpl_vars['dados_dicas']->value['img_cropada']){?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['dados_dicas']->value['img_cropada'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['dados_dicas']->value['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['dados_dicas']->value['txt_titulo'];?>
" />
            <?php }?>
            
            <p><?php echo $_smarty_tpl->tpl_vars['dados_dicas']->value['txt_texto'];?>
</p>
            <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
dicasdesaude">< VOLTAR</a>
        </div>

        <div class="dicas-slider-det">
            
            <h1>Veja algumas dicas</h1>
            
            <?php  $_smarty_tpl->tpl_vars['outras_dicas'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['outras_dicas']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dados_outras_dicas']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['outras_dicas']->key => $_smarty_tpl->tpl_vars['outras_dicas']->value){
$_smarty_tpl->tpl_vars['outras_dicas']->_loop = true;
?>
            <div class="dica-left"> 
                <h1><?php echo $_smarty_tpl->tpl_vars['outras_dicas']->value['txt_titulo'];?>
</h1>
                <?php if ($_smarty_tpl->tpl_vars['outras_dicas']->value['img_cropada']){?>
                <img src="<?php echo $_smarty_tpl->tpl_vars['ARQ_DIN']->value;?>
<?php echo $_smarty_tpl->tpl_vars['outras_dicas']->value['img_cropada'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['outras_dicas']->value['txt_titulo'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['outras_dicas']->value['txt_titulo'];?>
" />
                <?php }?>
                <p><?php echo $_smarty_tpl->tpl_vars['outras_dicas']->value['txt_texto'];?>
</p>
                <a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
dicasdesaude/detalhes/<?php echo $_smarty_tpl->tpl_vars['outras_dicas']->value['txt_permalink'];?>
" target="_blank">+ LER MAIS</a>
            </div>
            <?php } ?>
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

<script type="text/javascript">
    $(document).ready(youtubeGallery('#youtube-gallery','billabongprobr', 20));
</script>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['FOOTER']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>