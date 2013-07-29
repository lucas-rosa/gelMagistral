<?php

/**
 * phpDocumentor
 *
 *  
 * PHP Version 5.3
 *
 */

/**
 * Classe IndexController.
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do index.
 * 
 * @package app\controllers\Index\IndexController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class IndexController extends ControllerBase {

    /**
     * Metodo IndexController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action -> Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function IndexController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }

    /**
     * Metodo index_action
     * 
     * Acoes Iniciais ao Entrar na Index deste Controller
     *
     */
    private function index_action() {

        //Apresenta a view
        $this->View()->display('index.php');
    }

}
