<?php
class DesbloqueioController extends ControllerBase
{
	/* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
	 * Params String Action -> Ação a ser Executada Pelo Controller
	 * Atenção Demais Métodos do Controller Devem ser Privados
	 */
	public function DesbloqueioController($controller,$action,$urlparams)
	{	
		//Inicializa os parâmetros da SuperClasse
		parent::ControllerBase($controller, $action,$urlparams);
		//Envia o Controller para a action solicitada
		$this->$action();
	}

	private function usuario()
	{	
		//Verifica se a sessão existe
		if(isset($_SESSION))
		{
			//Verifica se o usuário é administrador e se o mesmo tem permissão de acesso
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