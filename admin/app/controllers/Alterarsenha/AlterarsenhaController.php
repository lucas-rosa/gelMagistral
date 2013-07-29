<?php
	
/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConfiguracoesController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Configuracoes.
 * 
 * @package admin\app\controllers\Alterarsenha\Alterarsenha
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class AlterarsenhaController extends ControllerBase{
	
    /**
     * Metodo ConfiguracoesController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action -> Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    
	public function AlterarsenhaController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    private function alterar(){
    	
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$this->Delegator('ConcreteAlterarsenha', 'alterar', $this->getPost());	
    		
    	}else{
    		
    		if(isset($_SESSION['view_data'])){
    			$this->View()->assign('params', $_SESSION['view_data']);
    			unset($_SESSION['view_data']);
    		}
    		
    		//joga o id do usuario na view
    		$this->View()->assign('id_usuario', $_SESSION['UserId']);

    		//Redireciona para view
    		$this->View()->display('index.php');
    		
    	}
    	
    	
    }
}