<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe CadastroController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do cadastro.
 * 
 * @package admin\app\controllers\Cadastro\CadastroController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ArquivoController extends ControllerBase
{
    /**
     * Metodo CadastroController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action -> Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     * 
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function ArquivoController($controller, $action, $urlparams)
    {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
	private function incluir() 
	{
		//Verifica se o usuário enviou uma requisição POST
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
        	//Solicita o cadastro dos dados
            $this->Delegator('ConcreteArquivo', 'Incluir', $this->getPost());
        }
        else
        {
            //Exibe a view
            $this->View()->display('incluir.php');
        }
    }
}