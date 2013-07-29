<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" lang="pt" charset="iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/style.css">
<link rel="stylesheet" href="{view}$URL_DEFAULT{/view}web_files/css/colors.css">

<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/json_functions.js"></script>
<script type="text/javascript" src="{view}$URL_DEFAULT{/view}web_files/js/jquery1.7.2.min.js"></script>

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
                
                <div id="msg_erro_login"></div>
                <div id="msg_erro_senha"></div>
			
				<form id="form_login" name="form_login" method="post" autocomplete="off" action="javascript:acao('{view}$URL_DEFAULT{/view}index/login', 'form_login', '{view}$URL_DEFAULT{/view}logado', new Array('{view}$textos_layout[2]{/view}', '{view}$textos_layout[1]{/view}'), 'btn_enviar', 'notification error')">
					<fieldset>
						<dl>
							<dt>
								<label>Login</label>
							</dt>
							<dd>
								<input type="text" class="large" name="txt_login" id="txt_login" maxlength="20"/><br/>
							</dd>
							
							<dt>
								<label>Senha</label>
							</dt>
							<dd>
								<input type="password" class="large" name="txt_senha" id="txt_senha" maxlength="20"/><br/>
								
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
</html>