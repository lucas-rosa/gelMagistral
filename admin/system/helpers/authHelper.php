<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/** 
 * Classe authHelper
 * 
 * Classe responsavel por fazer toda a validacao do usuario ao tentar logar no sistema.
 * 
 * 
 * @package admin\system\helpers\authHelper
 * @author Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 * 
 * @property string $sessionHelper Chama o helper de sesao
 * @property string $redirectorHelper Chama o helper de redirecionamento
 * @property string $tablePermissoes Pega o nome da tabela
 * @property string $userColumn Pega as permissoes da tabela
 * @property string $passColumn 
 * @property string $user Recebe o usuario digitado
 * @property string $pass Recebe a senha digitada
 * @property string $loginController 
 * @property string $loginAction
 * @property string $logoutController
 * @property string $logoutAction 
 * @property string $logtable Recebe a tabela de logs
 * @property string $MainHelper Recebe uma instancia do HelperFactory
 * 
 */

class authHelper
{
        /** 
        * Classe authHelper
        * 
        * variaveis globais da classe authHelper
        * 
        */
    
	private $sessionHelper,$redirectorHelper,$tableName,$tablePermissoes ,$userColumn,
	$passColumn,$user,$pass,$loginController = 'index',$loginAction = 'index',
	$logoutController = 'index', $logoutAction = 'index',$logtable = "logs_login",
        $MainHelper;

       /** 
        * Metodo Construtor
        * 
        * Metodo responsavel por iniciar as variaveis globais automaticamente ao
        * entrar na classe. Neste caso esta iniciando 3 sessionHelper,redirectorHelper,MainHelper.
        * 
        */
	public function __construct()
	{
		$this->sessionHelper = HelperFactory::getInstance('session');
		$this->redirectorHelper = HelperFactory::getInstance('redirector');
		$this->MainHelper = HelperFactory::getInstance();
		return $this;
	}
        
        /** 
        * Metodo setTableName
        * 
        * Recebe o nome da tabela passada por parametro e seta a variavel tableName
        *  
        * @param string $table Nome da tabela 
        */
	public function setTableName($table)
	{
		$this->tableName = $table;
		return $this;
	}
        
        /** 
        * Metodo setTablePermissoes
        * 
        * Recebe o nome da tabela passada por parametro e seta a variavel tablePermissoes
        *  
        * @param string $table Nome da tabela 
        */
	public function setTablePermissoes($table)
	{
		$this->tablePermissoes = $table;
		return $this;
	}
        
        /** 
        * Metodo setUserColumn
        * 
        * Recebe o nome da coluna passada por parametro e seta a variavel userColumn
        *  
        * @param string $column Nome da coluna
        */
	public function setUserColumn ($column)
	{
		$this->userColumn = $column;
		return $this;
	}
        
        /** 
        * Metodo setPassColumn
        * 
        * Recebe o nome da coluna passada por parametro e seta a variavel passColumn
        *  
        * @param string $column Nome da coluna
        */
	public function setPassColumn ($column)
	{
		$this->passColumn = $column;
		return $this;
	}
        
        /** 
        * Metodo setUser
        * 
        * Recebe o nome do usuario passado por parametro e seta a variavel user
        *  
        * @param string $user Nome do usuario
        */
	public function setUser ($user)
	{
		$this->user = $user;
		return $this;
	}
        
        /** 
        * Metodo setPass
        * 
        * Recebe a senha passada por parametro e seta a variavel pass
        *  
        * @param string $pass Senha do usuario
        */
	public function setPass($pass)
	{
		$this->pass = $pass;
		return $this;
	}
        
        /** 
        * Metodo setLoginControllerAction
        * 
        * Recebe o controller e a action passada por parametro e seta as variaveis controller e action
        *  
        * @param string $controller 
        * @param string $action 
        */
	public function setLoginControllerAction ($controller,$action)
	{
		$this->loginController = $controller;
		$this->loginAction = $action;
		return $this;
	}
        
        /** 
        * Metodo setLogoutControllerAction
        * 
        * Recebe o controller e a action passada por parametro e seta as variaveis logoutController e logoutAction
        *  
        * @param string $controller 
        * @param string $action 
        */
	public function setLogoutControllerAction ($controller,$action)
	{
		$this->logoutController = $controller;
		$this->logoutAction = $action;
		return $this;
	}
	
	/**
         * Metodo validacao
         * 
	 * Valida se passou os dados no login e exibe uma mensagem de erro e para. Caso contrario 
         * continua no metodo login 
         * 
	 * @param string $usuario
	 * @param string $senha
	 */
	public function validacao($usuario, $senha)
	{
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
		
		$Validation	->set($usuario, "Informe o login",'txt_login','msg_erro_login')->obrigatorio()
					->set($senha, "Informe a senha",'txt_senha','msg_erro_senha')->obrigatorio();
	  
		//Retorna o array de erros
		return $Validation->getErrors();
	}

	/**
         * Metodo Login
         * 
	 * Efetua o login do usuario
         * 
	 * @return boolean  
	 */
	public function login()
	{
		unset($_SESSION['UserPerfil']);
		unset($_SESSION['UserPerfilName']);
		unset($_SESSION['UserId']);
		unset($_SESSION['UserName']);
		unset($_SESSION['UserPermissoes']);
		//instancia o json
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Retorna o resultado da validacao
		$resultado_validacao = $this->validacao($this->user, $this->pass);
		
		//se não der erro
		if(count($resultado_validacao) == 0)
		{
			//Instancia a tabela de login
			$tabela_login = TableFactory::getInstance("Usuarios");		
	
			//Resultado do Login
			$resultado_login = $tabela_login->SelectUsuario($this->user,$this->pass);

			//Valida o Usuário
			if($resultado_login)
			{
				//Instancia a tabela de perfis
				$tabela_permissao_perfis = TableFactory::getInstance('PermissaoPerfis');
					
				//Dados do perfil
				$perfil_usuario = $tabela_permissao_perfis->getPerfilById($resultado_login[0]['cod_perfil']);
													
				//Coloca o nome do perfil na sessão
				$this->sessionHelper->createSession('UserPerfilName',$perfil_usuario['txt_perfil']);
												
				//Instancia a tabela de permissões de Usuário
				$tabela_permissoes_usuario = TableFactory::getInstance('PermissaoUsuario');
				
				//Pega as permissões
				$permissoes_usuario = $tabela_permissoes_usuario->getPermissoesUsuario();
				
				//Coloca o Array de permissões na Sessão
				$this->sessionHelper->PutObjectOnSessionKey($permissoes_usuario,'cod_permissaoGeral','UserPermissoes');
									
				//Salva o log do usuário - passando respectivamente id_usuario , data atual e Endereço IP
				$tabela_login->SalvaLogUsuario($this->sessionHelper->selectSession('UserId'),date("Y-m-d H:i:s"),$_SERVER['REMOTE_ADDR']);
	                			
				echo Zend_Json::encode(array("1"));
			}
			else
			{
				if($tabela_login->SelectUsuarioLogin($this->user))
				{
					//Registramos a tentativa do usuário
					return $this->RegistrarTentativa();
				}
				else
				{
					//instancia a classe de validação
					$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
		
					//Envia os erros ao JSON                    
            		$Validation->setNewError('txt_senha','Usuário e/ou Senha Inválida','msg_erro_senha');
            		echo Zend_Json::encode($Validation->getErrors());
				}
			}
		}
		else
		{
			//Envia os erros ao JSON                    
            echo Zend_Json::encode($resultado_validacao);
		}
	}
	
	/**
         * Metodo RegistrarTentativa
         * 
	 * Registrar as tentativas de acesso frustradas do usuario
         * 
         * @retun string
	 */
	private function RegistrarTentativa()
	{
		//instancia a classe de validação
		$Validation = LibFactory::getInstance('validation',null,'validation/Validation.class.php');
		
	    //Pega o ip da máquina do usuário
	    $ip_usuario = $_SERVER['REMOTE_ADDR'];
		
		//******* Verifica se o ip se encontra na tabela tentativas login *************
		
	    //Instancia a Tabela de Tentativas de Login
		$TabelaTentativasLogin = TableFactory::getInstance('LogsTentativas');
		
		//Verifica na tabela se o IP Recebido existe
		$dados_tentativa = $TabelaTentativasLogin->LocalizarIp($ip_usuario, $this->user);

		//Verifica se o ip foi encontrado
		if($dados_tentativa !== false)
		{
			//Soma uma nova tentativa
			$numero_tentativas = $TabelaTentativasLogin->IncrementarTentativa($dados_tentativa['cod_id']);
   	
			//Verifica qual a tentativa que o usuário se encontra
			switch($numero_tentativas)
			{
				//********************* Caso 2 Tentativas ******************************
				case 2:

					//Envia os erros ao JSON
					$Validation->setNewError('txt_senha','Usuário e/ou Senha Inválida','msg_erro_senha');
						    			
					break;
				//**********************************************************************
						    		
				//********************* Caso 3 Tentativas ******************************
				case 3:
					
					//Envia os erros ao JSON
					$Validation->setNewError('txt_senha','Usuário e/ou Senha Inválida <br/> Esta é sua terceira tentativa de acesso inválida. Se você errar seu usuário ou senha mais duas vezes, seu acesso será bloqueado.','msg_erro_senha');
					 
					break;
				//**********************************************************************
					 
				//********************* Caso 4 Tentativas ******************************
				case 4:
					 
					//Envia os erros ao JSON
					$Validation->setNewError('txt_senha','Usuário e/ou Senha Inválida <br/> Esta é sua quarta tentativa de acesso inválida. Se você errar seu usuário ou senha mais uma vez, seu acesso será bloqueado.','msg_erro_senha');
					 
					break;
				//**********************************************************************
				
				//********************* Caso 5 Tentativas ******************************
				case 5:
		    
					//Instancia a Tabela de Informações do Website
					$dados_website = TableFactory::getInstance('WebsiteInfo')->getWebSiteInfo();
					
					//Bloqueia o Usuário
					if($TabelaTentativasLogin->BloquearUsuario($dados_tentativa['txt_usuario']))
					{
						//Pega os dados do usuario
						$recordset_usuario = $TabelaTentativasLogin->getDadosUsuario('txt_login',$dados_tentativa['txt_usuario']);
	
						//Envia E-mail para o Webmaster
						$this->EnviaEmailWebmaster($recordset_usuario['txt_email'],$recordset_usuario['cod_id'], $recordset_usuario['txt_login']);
					}
					
					//Envia os erros ao JSON
					$Validation->setNewError('txt_senha','Seu acesso está bloqueado pois foram feitas mais de 5 tentativas inválidas de login para este usuário. Uma mensagem foi enviada a '.$dados_website[0]['txt_email_webmaster'].' avisando do bloqueio e somente o responsável poderá desbloquear o seu acesso. Favor contatá-lo.','msg_erro_senha');
					 
					break;
				//**********************************************************************
				
				//********************* Caso Mais de 5 Tentativas ******************************
				default:
					
					//Instancia a Tabela de Informações do Website
					$dados_website = TableFactory::getInstance('WebsiteInfo')->getWebSiteInfo();
					 
					//Bloqueia o Usuário - caso ainda não esteja bloqueado
					if($TabelaTentativasLogin->BloquearUsuario($dados_tentativa['txt_usuario']))
					{
						//Pega os dados do usuario
						$recordset_usuario = $TabelaTentativasLogin->getDadosUsuario('txt_login',$dados_tentativa['txt_usuario']);
			
						//Envia E-mail para o Webmaster
						$this->EnviaEmailWebmaster($recordset_usuario['txt_email'],$recordset_usuario['cod_id'], $recordset_usuario['txt_login']);
					}
					
					//Envia os erros ao JSON
					$Validation->setNewError('txt_senha','Seu acesso está bloqueado pois foram feitas mais de 5 tentativas inválidas de login para este usuário. Uma mensagem foi enviada a '.$dados_website[0]['txt_email_webmaster'].' avisando do bloqueio e somente o responsável poderá desbloquear o seu acesso. Favor contatá-lo.','msg_erro_senha');
					 
					break;
				//******************************************************************************
			}
		}
		else
		{
			//Exclui o registro de tentativa do usuário com data anterior
			$TabelaTentativasLogin->ExcluiTentativaAnterior($this->user);
			
			//Primeira Tentativa então registra ela no banco de dados
			$TabelaTentativasLogin->RegistrarTentativaInicial($this->user,$ip_usuario);
			
			//Envia os erros ao JSON
			$Validation->setNewError('txt_senha','Usuário e/ou Senha Inválida','msg_erro_senha');		    	
		}	
			    
		//Retorna o erro ao usuário
		echo Zend_Json::encode($Validation->getErrors());
	}

	/**
         * Metodo logout
         * 
	 * Elimina a sessao do usuario
         * 
	 */
	public function logout()
	{
		$this->sessionHelper->deleteSession();
		$this->redirectorHelper->goToControllerAction($this->logoutController,$this->logoutAction);
		return $this;
	}
        
        /**
         * Metodo getPermissao
         * 
	 * Busca as permissoes e verifica se o usuario tem permissao de acesso ao controller action
         * 
         * @param string $controller
         * @param string $action
         * 
         * @return boolean
	 */
	public function getPermissao($controller,$action){

		//Instancia as Classes
		$ControllerObj = TableFactory::getInstance('FrameworkControllers');
		$ActionObj = TableFactory::getInstance('FrameworkAcoes');
		$PermissoesObj = TableFactory::getInstance('PermissaoGeral');

		//Busca os dados do Controller
		$Controller_dados = $ControllerObj->getController($controller);
		//Busca os dados da Action
		$Action_dados     = $ActionObj->getAction($action);

		//Busca o id da permissão com base no controller/action
		$permissaoId = $PermissoesObj->getPermissaoId($Controller_dados['cod_id'],$Action_dados['cod_id']);

		//Seta a tabela de Permissoes
		$this->setTablePermissoes('PermissaoUsuario');

		//Verifica se o usuário tem acesso ao controller/Action
		if($this->permissaoDisponivel($permissaoId)){


			return true;
		}else{
				
			return false;
		}
	}
        
        /**
         * Metodo permissaoDisponivel
         * 
	 * Busca as permissoes disponiveis para o usuario
         * 
         * @param integer $permissaoId
         * 
         * @return string
	 */
	private function permissaoDisponivel($permissaoId)
	{
		//Instanciando a tabela de Permissoes
		$tabela_permissoes = TableFactory::getInstance($this->tablePermissoes);

		//Verifica a permissao
		return $tabela_permissoes->PermissaoConcebida($permissaoId);
	}
	
         /**
         * Metodo EnviaEmailWebmaster
         * 
	 * Envia um email de notificacao para o administrador do site
         * 
         * @param string $email_usuario
         * @param integer $id_usuario
         * @param string $txt_login
         * 
         * @return boolean
	 */

	private function EnviaEmailWebmaster($email_usuario,$id_usuario,$txt_login){
		//Instancia a tabela WebSiteInfo
		$WebSiteInfoTable = TableFactory::getInstance('WebsiteInfo');

		//Resgata os dados do Website
		$dados_website = $WebSiteInfoTable->getWebSiteInfo();

		//Instancia o Helper de Email
		$MailHelper = HelperFactory::getInstance('mail');

		//Gera a nova senha do usuário
		$new_password = $this->MainHelper->gerarSenha(9,8);

		//Senha em MD5
		$new_password_md5 = md5($new_password);
			
		//Instancia a Tabela de Usuarios
		$UsuariosTable = TableFactory::getInstance('Usuarios');

		//Atualiza no banco de dados a nova senha do usuário criptografada
		$UsuariosTable->EditarUsuario($new_password_md5, $id_usuario);
			
		//Dados do SMTP
		$MailHelper->IsSMTP();
		$MailHelper->setSMTPAuth(true);
		$MailHelper->setHost(EMAIL_HOST);
		$MailHelper->Port = 587;
		$MailHelper->setUserName(USERNAME_HOST);
		$MailHelper->setPassword(PASSWORD_HOST);
		$MailHelper->setFrom(USERNAME_HOST);
		$MailHelper->setFromName("Linea Demo");
		$MailHelper->setSubject('Bloqueio de usuário por tentativas inválidas de login - Website '.$dados_website[0]['txt_default_title'].' ');
		$MailHelper->setIdioma('br','phpMailer/language/');

		//Monta o corpo do Email
		$mail_body = 'Usuário <b>'.$txt_login.'</b> teve acesso bloqueado em '.date("d/m/Y").' às '.date("H:i").', após 5 tentativas inválidas de login. <br/> <br/>';
		$mail_body .= 'Dados corretos para acesso: <br/>';
		$mail_body .= 'Usuário: <b>'.$txt_login.'</b><br/>';
		//OBS: Senha do usuário não criptografada(para o webmaster visualizar)
		$mail_body .= 'Senha: <b>'.$new_password.'</b><br/>';
		$mail_body .= 'E-mail para contato: <b>'.$email_usuario.'</b><br/> <br/>';
		$mail_body .= '<a href="'.DEFAULT_URL.'desbloqueio/usuario/'.$id_usuario.'">Clique aqui para desbloquear o acesso deste usuário à Ferramenta de Administração de Conteúdo do Website</a>';
		
		//Seta o corpo do E-mail
		$MailHelper->setBody($mail_body);
		
		//$dados_tabela_EmailsFormularios = TableFactory::getInstance('EmailsFormularios')->BuscaDados('3');
	
		//Seta o email
		$MailHelper->setAddress($dados_website[0]['txt_email_webmaster']);

		//Envia o E-mail
		$MailHelper->sendEmail();

		//Retorna true em caso de sucesso
		return true;
	}
}