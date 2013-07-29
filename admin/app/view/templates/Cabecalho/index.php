<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" lang="pt" charset="iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{view}$CSS{/view}style.css">
<link rel="stylesheet" href="{view}$CSS{/view}colors.css">
<link rel="stylesheet" href="{view}$CSS{/view}jquery.tipsy.css">
<link rel="stylesheet" href="{view}$CSS{/view}jquery.wysiwyg.css">
<link rel="stylesheet" href="{view}$CSS{/view}jquery.datatables.css">
<link rel="stylesheet" href="{view}$CSS{/view}jquery.nyromodal.css">
<link rel="stylesheet" href="{view}$CSS{/view}jquery.datepicker.css">
<link rel="stylesheet" href="{view}$CSS{/view}jquery.fileinput.css">
<link rel="stylesheet" href="{view}$CSS{/view}jquery.fullcalendar.css">
<link rel="stylesheet" href="{view}$CSS{/view}jquery.visualize.css">

<script type="text/javascript" src="{view}$JS{/view}jquery1.7.2.min.js"></script>
<script type="text/javascript" src="{view}$JS{/view}json_functions.js"></script>
<script type="text/javascript" src="{view}$JS{/view}mascara.js"></script>
<script type="text/javascript" src="{view}$JS{/view}jquery_ui.js" ></script>
<script type="text/javascript" src="{view}$JS{/view}libs/modernizr-1.7.min.js"></script>
<script type="text/javascript" src="{view}$JS{/view}jquery.imgareaselect.min.js"></script>
<script type="text/javascript" src="{view}$JS{/view}ajaxupload.js"></script>


<link href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css'>

<!-- favicon -->
<link rel="icon" href="{view}$URL_DEFAULT{/view}favicon.ico" type="image/x-icon" />

<title>{view}$textos_layout[38]{/view}</title>

</head>
<body>

<div class="fixed-wraper">
	<section role="navigation">
		<header>
			<a href="{view}$URL_DEFAULT{/view}"><img src="{view}$URL_DEFAULT{/view}web_files/img/marca-cliente.png" height="120" alt="" title="" /></a>
            <br /><br /><br />
			<h2>{view}$textos_layout[39]{/view}</h2>
		</header>
        
		<section id="user-info">
			<div style="width:180px;">
				<strong>{view}$txt_usuario{/view}</strong> <em>({view}$txt_perfil{/view})</em><br />
				{view}if $txt_ultimo_acesso != ""{/view}
					<em>{view}$textos_layout[40]{/view}: {view}$txt_ultimo_acesso{/view}</em>
				{view}/if{/view}              
				<ul>
					<li><a class="button-link" href="http://www.lineacom.com.br" title="ir para o website" rel="tooltip" target="_blank">website</a></li>
					<li><a class="button-link" href="{view}$URL_DEFAULT{/view}index/logoff" title="sair" rel="tooltip">logout</a></li>
				</ul>
			</div>
		</section>
		
		<nav id="main-nav">
			<ul>
				<li {view}if $CONTROLLER_ATUAL eq 'Logado'{/view} class="current" {view}/if{/view} ><a href="{view}$URL_DEFAULT{/view}logado" title="" class="dashboard no-submenu current">Painel de Controle</a></li>
				
				{view}if isset($smarty.session.UserPermissoes[12]) || isset($smarty.session.UserPermissoes[68]) || isset($smarty.session.UserPermissoes[20]) || isset($smarty.session.UserPermissoes[1]) || isset($smarty.session.UserPermissoes[28]){/view}
					<li {view}if in_array($CONTROLLER_ATUAL,array('Contatos', 'Downloads','Noticias','Textoslayout','Textos')){/view} class="current" {view}/if{/view} ><a title="Conte&uacute;dos do site" class="projects">Conte&uacute;dos do site</a>
						<ul>
							{view}if isset($smarty.session.UserPermissoes[12]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Contatos'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}contatos/detalhes/cod_relacao_idioma/1" title="Contatos">Contatos</a></li>
							{view}/if{/view}
							
							{view}if isset($smarty.session.UserPermissoes[68]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Downloads'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}downloads" title="Download">Downloads</a></li>
		                    {view}/if{/view}
		                    
		                    {view}if isset($smarty.session.UserPermissoes[20]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Novidades'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}novidades" title="Novidades">Novidades</a></li>
		                    {view}/if{/view}
                                    
                                    {view}if isset($smarty.session.UserPermissoes[20]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Dicas'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}dicas" title="Dicas">Dicas</a></li>
		                    {view}/if{/view}
		                    
		                    {view}if isset($smarty.session.UserPermissoes[1]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Textoslayout'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}textoslayout" title="Textos de layout">Textos de layout</a></li>
		                    {view}/if{/view}
		                    
		                    {view}if isset($smarty.session.UserPermissoes[28]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Textos'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}textos" title="Textos">Textos</a></li>
		                    {view}/if{/view}
						</ul>
					</li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[58]) || isset($smarty.session.UserPermissoes[43]) || isset($smarty.session.UserPermissoes[51]){/view}
					<li {view}if in_array($CONTROLLER_ATUAL,array('Emailformulario','Cadastro','Faleconosco')){/view} class="current" {view}/if{/view}><a title="Formulários" class="settings">Formulários</a>
						<ul>
							{view}if isset($smarty.session.UserPermissoes[58]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Emailformulario'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}emailformulario" title="E-mail formulário">Destinatário de formulários</a></li>
		                    {view}/if{/view}
		                    
		                    {view}if isset($smarty.session.UserPermissoes[43]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Cadastro'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}cadastro" title="Cadastro">Cadastros</a></li>
							{view}/if{/view}
							
						    {view}if isset($smarty.session.UserPermissoes[51]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Faleconosco'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}faleconosco" title="Fale conosco">Fale conosco</a></li>
		                    {view}/if{/view}
		
						</ul>
					</li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[4]) || isset($smarty.session.UserPermissoes[14]) || isset($smarty.session.UserPermissoes[5]){/view}
					<li {view}if in_array($CONTROLLER_ATUAL,array('Configuracoes','Seo','Idiomas')){/view} class="current" {view}/if{/view}><a title="Configurações" class="settings">Configurações</a>
						<ul>
		                    {view}if isset($smarty.session.UserPermissoes[4]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Configuracoes'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}configuracoes/detalhes/cod_id/1" title="Configura&ccedil;&otilde;es b&aacute;sicas">Configura&ccedil;&otilde;es b&aacute;sicas</a></li>
		                    {view}/if{/view}
		                                            
		                    {view}if isset($smarty.session.UserPermissoes[14]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Seo'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}seo" title="SEO">SEO</a></li>
		                    {view}/if{/view}
		                      
		                    {view}if isset($smarty.session.UserPermissoes[5]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Idiomas'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}idiomas" title="Idiomas">Idiomas</a></li>
		                    {view}/if{/view}                        
		                    
						</ul>
					</li>
				{view}/if{/view}
				
				{view}if isset($smarty.session.UserPermissoes[62]) || isset($smarty.session.UserPermissoes[63]){/view}
		  			<li {view}if in_array($CONTROLLER_ATUAL,array('Logslogin','Logsalteracoes')){/view} class="current" {view}/if{/view}><a title="Logs" class="settings">Logs</a>
						<ul>
		                    {view}if isset($smarty.session.UserPermissoes[62]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Logslogin'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}logslogin" title="Logs login">Logs login</a></li>
		                    {view}/if{/view}
		                    
		                    {view}if isset($smarty.session.UserPermissoes[63]){/view}
								<li {view}if $CONTROLLER_ATUAL eq 'Logsalteracoes'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}logsalteracoes" title="Logs alterações">Logs alterações</a></li>
		                    {view}/if{/view}
		
						</ul>
					</li>
				{view}/if{/view}

				{view}if isset($smarty.session.UserPermissoes[8]) || isset($smarty.session.UserPermissoes[34]){/view}
				<li {view}if in_array($CONTROLLER_ATUAL,array('Alterarsenha','Perfis', 'Usuarios')){/view} class="current" {view}/if{/view}><a title="Usuários" class="users">Usuários</a>
					<ul>
					{view}if isset($smarty.session.UserPermissoes[85]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Alterarsenha'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}alterarsenha/alterar" title="Alterar minha senha">Alterar minha senha</a></li>
                    {view}/if{/view}
                                   
                    {view}if isset($smarty.session.UserPermissoes[8]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Perfis'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}perfis" title="Perfis">Perfis de usuários</a></li>
                    {view}/if{/view}
                    
                    {view}if isset($smarty.session.UserPermissoes[34]){/view}
						<li {view}if $CONTROLLER_ATUAL eq 'Usuarios'{/view} class="sub_menu" {view}/if{/view}><a href="{view}$URL_DEFAULT{/view}usuarios" title="Usu&aacute;rios">Usu&aacute;rios</a></li>
                    {view}/if{/view}

					</ul>
				</li>
				{view}/if{/view}
                
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
			<li><a href="{view}$URL_DEFAULT{/view}" title="Painel de Controle">Painel de Controle</a></li>
            <li><a href="{view}$URL_DEFAULT{/view}{view}$CONTROLLER_ATUAL{/view}">{view}$CONTROLLER_DADOS['txt_nome_amigavel']{/view}</a></li>
            <li>{view}$ACTION_DADOS['txt_nome_amigavel']{/view}</li>
		</ul>
        
		<article class="full-block clearfix">
			<div class="article-container">