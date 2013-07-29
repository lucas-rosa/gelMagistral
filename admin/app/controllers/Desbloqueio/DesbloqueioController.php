<?php
class DesbloqueioController extends ControllerBase
{
	/* M�todo Construtor do Controller(Obrigat�rio Conter em Todos os Controllers)
	 * Params String Action -> A��o a ser Executada Pelo Controller
	 * Aten��o Demais M�todos do Controller Devem ser Privados
	 */
	public function DesbloqueioController($controller,$action,$urlparams)
	{	
		//Inicializa os par�metros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	private function usuario()
	{	
		//Verifica se a sess�o existe
		if(isset($_SESSION))
		{
			//Verifica se o usu�rio � administrador e se o mesmo tem permiss�o de acesso
			if(isset($_SESSION['UserPerfil']) && $_SESSION['UserPerfil'] == "1")
			{
				//pega o id do permalink
				$id = HelperFactory::getInstance()->getPermalink();
				
				$resultado_desbloqueio = $this->Delegator("ConcreteDesbloqueio", "Desbloquear", array("id"=> $id));

				if($resultado_desbloqueio)
				{
					echo "Usuario desbloqueado com Sucesso";
					exit();
				}
				else
				{
					echo "Ocorreu um erro ao desbloquear o usuario";
					exit();
				}
			}
		}
		
		print_r($_SESSION);
		exit();
		$this->Delegator('ConcreteDesbloqueio', 'Usuario', $this->getPost());
	}
}