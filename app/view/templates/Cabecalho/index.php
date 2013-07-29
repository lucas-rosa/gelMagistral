<!DOCTYPE html>
<html lang="{view}$TXT_META{/view}">
<head>

<meta name="viewport" content="initial-scale=1.0, user-scalable=no">    
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<!-- favicon -->
<link rel="icon" href="{view}$URL_DEFAULT{/view}favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="{view}$URL_DEFAULT{/view}favicon.png" />

<!-- seo tags -->
<title>{view}$TXT_TITLE{/view}</title>

<meta name="description" content="{view}$TXT_DESCRIPTION{/view}" />
<meta name="keywords" content="{view}$TXT_KEYWORDS{/view}" />

<!-- geoURL -->
<!-- <meta name="ICBM" content="XXX.XXXXX, XXX.XXXXX"> -->

<!-- document -->
<meta name="rating" content="general" />
<meta name="robots" content="ALL" />

<link rel="canonical" href="{view}$URL_DEFAULT{/view}" />

<!-- css -->
<link href="{view}$CSS{/view}style.css?{view}$TIME{/view}" rel="stylesheet" type="text/css" />
<link href="{view}$CSS{/view}normalize.css" rel="stylesheet" type="text/css" />
<link href="{view}$CSS{/view}youtube-gallery.css" rel="stylesheet" type="text/css" />

<link href="http://fonts.googleapis.com/css?family=Oxygen:400,300,700" rel="stylesheet" type="text/css" />

<!-- JS -->
<script type="text/javascript" src="{view}$JS{/view}jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="{view}$JS{/view}html5gallery.js"></script>
<script type="text/javascript" src="{view}$JS{/view}jquery.easing.1.3.js"></script>
<script type="text/javascript" src="{view}$JS{/view}jquery.asyncslider.js"></script>
<script type="text/javascript" src="{view}$JS{/view}custom.js"></script>
<script type="text/javascript" src="{view}$JS{/view}mascara.js"></script>
<script type="text/javascript" src="{view}$JS{/view}json_functions.js"></script>
<script type="text/javascript" src="{view}$JS{/view}bjqs-1.3.min.js"></script>
<script type="text/javascript" src="{view}$JS{/view}carousel.js"></script>


<script type="text/javascript">
function add_bookmark()
{
	var browsName = navigator.appName;
	if (browsName == "Microsoft Internet Explorer")
	{
		window.external.AddFavorite('{view}$URL_DEFAULT{/view}','{view}$TXT_TITLE{/view}' );
	}
	else if (browsName == "Netscape")
	{
		alert ("{view}$textos_layout[1]{/view}");
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

	<a href="{view}$URL_DEFAULT{/view}"><img src="{view}$IMG{/view}logo.jpg" alt="{view}$TXT_TITLE{/view}" title="{view}$TXT_TITLE{/view}" width="237" height="156" class="logo" /></a>

	<nav class="nav-topo clearfix">
	    <ul>
	    	<li><a href="{view}$URL_DEFAULT{/view}">NOSSAS LOJAS</a></li>
	    	<li><a href="{view}$URL_DEFAULT{/view}">TRABALHE CONOSCO</a></li>
	    	<li class="contato"><a href="{view}$URL_DEFAULT{/view}">CONTATO</a></li>
	    	<li class="search"><input type="text" name="" value="Pesquisar" class="search-input" /></li>
	    	<li class="phone">51 3311.4523</li>
	    </ul>
	</nav>
	<nav class="nav-green clearfix">
	    <ul>
	    	<li class="quem-somos"><a href="{view}$URL_DEFAULT{/view}">QUEM SOMOS</a></li>
	    	<li class="manipulacao"><a href="{view}$URL_DEFAULT{/view}">MANIPULAÇÃO</a></li>
	    	<li class="loja"><a href="{view}$URL_DEFAULT{/view}">LOJA VIRTUAL</a></li>
	    	<li class="dicas"><a href="{view}$URL_DEFAULT{/view}">DICAS DE SAÚDE</a></li>
	    	<li class="novidades"><a href="{view}$URL_DEFAULT{/view}">NOVIDADES</a></li>
	    	<li class="pedido"><a href="{view}$URL_DEFAULT{/view}">PEDIDO ONLINE</a></li>
	    </ul>
	</nav>

</div>

</header>