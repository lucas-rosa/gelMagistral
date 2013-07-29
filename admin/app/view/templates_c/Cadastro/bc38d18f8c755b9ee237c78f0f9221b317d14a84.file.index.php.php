<?php /* Smarty version Smarty-3.1.1, created on 2013-01-23 15:57:20
         compiled from "app/view/templates/Cabecalho/index.php" */ ?>
<?php /*%%SmartyHeaderCode:104343170451002480cac568-75947103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc38d18f8c755b9ee237c78f0f9221b317d14a84' => 
    array (
      0 => 'app/view/templates/Cabecalho/index.php',
      1 => 1358181403,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104343170451002480cac568-75947103',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CSS' => 0,
    'JS' => 0,
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
    'txt_usuario' => 0,
    'txt_perfil' => 0,
    'txt_ultimo_acesso' => 0,
    'CONTROLLER_ATUAL' => 0,
    'CONTROLLER_DADOS' => 0,
    'ACTION_DADOS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_510024811353c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510024811353c')) {function content_510024811353c($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" lang="pt" charset="iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
style.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
colors.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
jquery.tipsy.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
jquery.wysiwyg.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
jquery.datatables.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
jquery.nyromodal.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
jquery.datepicker.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
jquery.fileinput.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
jquery.fullcalendar.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['CSS']->value;?>
jquery.visualize.css">

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
jquery1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
json_functions.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
mascara.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
jquery_ui.js" ></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
libs/modernizr-1.7.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS']->value;?>
ajaxupload.js"></script>


<link href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css'>

<!-- favicon -->
<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
favicon.ico" type="image/x-icon" />

<title><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[38];?>
</title>

</head>
<body>

<div class="fixed-wraper">
	<section role="navigation">
		<header>
			<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/img/marca-cliente.png" height="120" alt="" title="" /></a>
            <br /><br /><br />
			<h2><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[39];?>
</h2>
		</header>
        
		<section id="user-info">
			<div style="width:180px;">
				<strong><?php echo $_smarty_tpl->tpl_vars['txt_usuario']->value;?>
</strong> <em>(<?php echo $_smarty_tpl->tpl_vars['txt_perfil']->value;?>
)</em><br />
				<?php if ($_smarty_tpl->tpl_vars['txt_ultimo_acesso']->value!=''){?>
					<em><?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[40];?>
: <?php echo $_smarty_tpl->tpl_vars['txt_ultimo_acesso']->value;?>
</em>
				<?php }?>              
				<ul>
					<li><a class="button-link" href="http://www.lineacom.com.br" title="ir para o website" rel="tooltip" target="_blank">website</a></li>
					<li><a class="button-link" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
index/logoff" title="sair" rel="tooltip">logout</a></li>
				</ul>
			</div>
		</section>
		
		<nav id="main-nav">
		<!--  	<?php echo print_r($_SESSION['UserPermissoes']);?>
-->
			<ul>
				<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Logado'){?> class="current" <?php }?> ><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
logado" title="" class="dashboard no-submenu current">Painel de Controle</a></li>

				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Cadastro','Contatos','Noticias','Textos','Textoslayout','Faleconosco','Emailformulario','Downloads'))){?> class="current" <?php }?> ><a title="Conte&uacute;dos do site" class="projects">Conte&uacute;dos do site</a>
					<ul>
						<?php if (isset($_SESSION['UserPermissoes'][43])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Cadastro'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
cadastro" title="Cadastro">Cadastro</a></li>
						<?php }?>
						
						<?php if (isset($_SESSION['UserPermissoes'][12])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Contatos'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
contatos/detalhes/cod_relacao_idioma/1" title="Contatos">Contatos</a></li>
						<?php }?>
					
	                    <?php if (isset($_SESSION['UserPermissoes'][20])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Noticias'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
noticias" title="Not&iacute;cias">Not&iacute;cias</a></li>
	                    <?php }?>
                    
	                    <?php if (isset($_SESSION['UserPermissoes'][28])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Textos'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textos" title="Textos">Textos</a></li>
	                    <?php }?>
	                                            
	                    <?php if (isset($_SESSION['UserPermissoes'][1])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Textoslayout'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
textoslayout" title="Textos de layout">Textos de layout</a></li>
	                    <?php }?>
	                    
	                    <?php if (isset($_SESSION['UserPermissoes'][51])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Faleconosco'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
faleconosco" title="Fale conosco">Fale conosco</a></li>
	                    <?php }?>
	                    
	                    <?php if (isset($_SESSION['UserPermissoes'][58])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Emailformulario'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
emailformulario" title="E-mail formulário">E-mail formulário</a></li>
	                    <?php }?>
	                     <?php if (isset($_SESSION['UserPermissoes'][68])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Downloads'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
downloads" title="Download">Download</a></li>
	                    <?php }?>
					</ul>
				</li>

				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Configuracoes','Seo','Idiomas','Logslogin','Logsalteracoes'))){?> class="current" <?php }?>><a title="Configurações" class="settings">Configurações</a>
					<ul>
	                    <?php if (isset($_SESSION['UserPermissoes'][4])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Configuracoes'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
configuracoes/detalhes/cod_id/1" title="Configura&ccedil;&otilde;es b&aacute;sicas">Configura&ccedil;&otilde;es b&aacute;sicas</a></li>
	                    <?php }?>
	                                            
	                    <?php if (isset($_SESSION['UserPermissoes'][5])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Idiomas'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
idiomas" title="Idiomas">Idiomas</a></li>
	                    <?php }?>                        
	                    
	                    <?php if (isset($_SESSION['UserPermissoes'][14])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Seo'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
seo" title="SEO">SEO</a></li>
	                    <?php }?>
	                    
	                    <?php if (isset($_SESSION['UserPermissoes'][62])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Logslogin'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
logslogin" title="Logs login">Logs login</a></li>
	                    <?php }?>
	                    
	                    <?php if (isset($_SESSION['UserPermissoes'][63])){?>
							<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Logsalteracoes'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
logsalteracoes" title="Logs alterações">Logs alterações</a></li>
	                    <?php }?>
					</ul>
				</li>

				<li <?php if (in_array($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value,array('Usuarios','Perfis'))){?> class="current" <?php }?>><a title="Usuários" class="users">Usuários</a>
					<ul>

                    <?php if (isset($_SESSION['UserPermissoes'][8])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Perfis'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
perfis" title="Perfis">Perfis</a></li>
                    <?php }?>
                    
                    <?php if (isset($_SESSION['UserPermissoes'][34])){?>
						<li <?php if ($_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value=='Usuarios'){?> class="sub_menu" <?php }?>><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
usuarios" title="Usu&aacute;rios">Usu&aacute;rios</a></li>
                    <?php }?>

					</ul>
				</li>
                
			</ul>

        <br /><br /><br /><br /><br /><br />
        <section class="sidebar nested">
        <em>
        desenvolvido por: <a href="http://www.lineacom.com.br" target="_blank">Linea Comunica&ccedil;&atilde;o</a>
        </em>
        </section>
		</nav>
	</section>

	<section role="main">
		<ul id="breadcrumbs">        	
			<li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
" title="Painel de Controle">Painel de Controle</a></li>
            <li><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
<?php echo $_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['CONTROLLER_DADOS']->value['txt_nome_amigavel'];?>
</a></li>
            <li><?php echo $_smarty_tpl->tpl_vars['ACTION_DADOS']->value['txt_nome_amigavel'];?>
</li>
		</ul>
        
		<article class="full-block clearfix">
			<div class="article-container"><?php }} ?>