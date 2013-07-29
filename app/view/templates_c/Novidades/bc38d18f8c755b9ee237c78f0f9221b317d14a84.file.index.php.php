<?php /* Smarty version Smarty-3.1.1, created on 2013-07-26 09:53:59
         compiled from "app/view/templates/Cabecalho/index.php" */ ?>
<?php /*%%SmartyHeaderCode:136027053551f271679c9150-53058199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc38d18f8c755b9ee237c78f0f9221b317d14a84' => 
    array (
      0 => 'app/view/templates/Cabecalho/index.php',
      1 => 1374685003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '136027053551f271679c9150-53058199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TXT_META' => 0,
    'URL_DEFAULT' => 0,
    'TXT_TITLE' => 0,
    'TXT_DESCRIPTION' => 0,
    'TXT_KEYWORDS' => 0,
    'CSS' => 0,
    'TIME' => 0,
    'JS' => 0,
    'textos_layout' => 0,
    'IMG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_51f27167ad9ed',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51f27167ad9ed')) {function content_51f27167ad9ed($_smarty_tpl) {?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['TXT_META']->value;?>
">
<head>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no">    
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<!-- favicon -->
<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
favicon.png" />

<!-- seo tags -->
<title><?php echo $_smarty_tpl->tpl_vars['TXT_TITLE']->value;?>
</title>

<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['TXT_DESCRIPTION']->value;?>
" />
<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['TXT_KEYWORDS']->value;?>
" />

<!-- geoURL -->
<!-- <meta name="ICBM" content="XXX.XXXXX, XXX.XXXXX"> -->

<!-- document -->
<meta name="rating" content="general" />
<meta name="robots" content="ALL" />

<link rel="canonical" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
" />

<!-- css -->
<link href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
style.css?<?php echo $_smarty_tpl->tpl_vars['TIME']->value;?>
" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
normalize.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
youtube-gallery.css" rel="stylesheet" type="text/css" />

<link href="http://fonts.googleapis.com/css?family=Oxygen:400,300,700" rel="stylesheet" type="text/css" />

<!-- JS -->
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
html5gallery.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
jquery.asyncslider.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
custom.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
mascara.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
json_functions.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
bjqs-1.3.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
carousel.js"></script>


<script type="text/javascript">
function add_bookmark()
{
	var browsName = navigator.appName;
	if (browsName == "Microsoft Internet Explorer")
	{
		window.external.AddFavorite('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
','<?php echo $_smarty_tpl->tpl_vars['TXT_TITLE']->value;?>
' );
	}
	else if (browsName == "Netscape")
	{
		alert ("<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
");
	}
}

var $buoop = {} 
$buoop.ol = window.onload; 
window.onload=function()
{ 
	try {if ($buoop.ol) $buoop.ol();}catch (e) {} 
	var e = document.createElement("script"); 
	e.setAttribute("type", "text/javascript"); 
	e.setAttribute("src", "http://browser-update.org/update.js"); 
	document.body.appendChild(e); 
}

jQuery(document).ready(function($) {
  jQuery('#slider-grid').bjqs({
	animtype      : 'slide',
	height        : 370,
	width         : 350,
	responsive    : false,
	randomstart   : true,
	usecaptions   : false,
	centercontrols: false
  });
  
}); 

</script>
</head>

<body>

<header>

<div class="content-wrap">

	<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['IMG']->value;?>
logo.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['TXT_TITLE']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['TXT_TITLE']->value;?>
" width="237" height="156" class="logo" /></a>

	<nav class="nav-topo clearfix">
	    <ul>
	    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">NOSSAS LOJAS</a></li>
	    	<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">TRABALHE CONOSCO</a></li>
	    	<li class="contato"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">CONTATO</a></li>
	    	<li class="search"><input type="text" name="" value="Pesquisar" class="search-input" /></li>
	    	<li class="phone">51 3311.4523</li>
	    </ul>
	</nav>
	<nav class="nav-green clearfix">
	    <ul>
	    	<li class="quem-somos"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">QUEM SOMOS</a></li>
	    	<li class="manipulacao"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">MANIPULAÇÃO</a></li>
	    	<li class="loja"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">LOJA VIRTUAL</a></li>
	    	<li class="dicas"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">DICAS DE SAÚDE</a></li>
	    	<li class="novidades"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">NOVIDADES</a></li>
	    	<li class="pedido"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
">PEDIDO ONLINE</a></li>
	    </ul>
	</nav>

</div>

</header><?php }} ?>