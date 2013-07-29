<?php /* Smarty version Smarty-3.1.1, created on 2013-01-23 15:44:51
         compiled from "app/view/templates/Index/index.php" */ ?>
<?php /*%%SmartyHeaderCode:28534486651002193545085-89726749%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd036f6045cc7828d3f249adef41505c2566cc504' => 
    array (
      0 => 'app/view/templates/Index/index.php',
      1 => 1358265103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28534486651002193545085-89726749',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL_DEFAULT' => 0,
    'textos_layout' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_510021936170f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_510021936170f')) {function content_510021936170f($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" lang="pt" charset="iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/style.css">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/css/colors.css">

<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/json_functions.js"></script>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/js/jquery1.7.2.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=PT+Sans:regular,italic,bold,bolditalic' rel='stylesheet' type='text/css'>

<title>Linea demo - Gestão de Conteúdos e Dados</title>

</head>
	
<body class="login">
	<section role="main">
	
		<a href="/" title="Voltar ao website"></a>
	
		<!-- Login box -->
		<article id="login-box">
		
			<div class="article-container">
			<h1>Bem Vindo!</h1>
				<p>Esta é a área restrita de acesso ao conteúdo e gestão de dados do website </strong>Linea demo</strong>. O acesso a esta seção é restrito a usuários autorizados. </p><br />
                <p><strong>Digite seu login e senha para acessar.</strong></p>
                
                <div id="msg_erro_login" class="msg_erro"></div>
                <div id="msg_erro_senha" class="msg_erro"></div>
			
				<form id="form_login" name="form_login" method="post" autocomplete="off" action="javascript:acao('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
index/login', 'form_login', '<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
logado', new Array('<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[2];?>
', '<?php echo $_smarty_tpl->tpl_vars['textos_layout']->value[1];?>
'), 'btn_enviar', 'msg_erro')">
					<fieldset>
						<dl>
							<dt>
								<label>Login</label>
							</dt>
							<dd>
								<input type="text" class="large" name="txt_login" id="txt_login" maxlength="20"><br/>
							</dd>
							
							<dt>
								<label>Senha</label>
							</dt>
							<dd>
								<input type="password" class="large" name="txt_senha" id="txt_senha" maxlength="20"><br/>
								
							</dd>
						</dl>
					</fieldset>
					<button type="submit" id="btn_enviar" class="right">Enviar</button>
				</form>
			</div>
		
		</article>
		<!-- /Login box -->
		<ul class="login-links">
			<li><a href="#">Esqueceu sua senha?</a></li>
			<li><a href="/">Voltar para o website</a></li>
		</ul>
		
	</section>
	</body>
</html><?php }} ?>