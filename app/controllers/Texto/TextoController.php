<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe TextoController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do TextoController.
 * 
 * @package app\controllers\Texto\TextoController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class TextoController extends ControllerBase {
    
     /**
     * Metodo TextoController
     * 
     * Metodo Construtor do Controller(Obrigatorio Conter em Todos os Controllers)
     * Params String Action -> Acao a ser Executada Pelo Controller
     * Atencao Demais Metodos do Controller Devem ser Privados
     * 
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     * 
     */
    public function TextoController($controller, $action, $urlparams) {

        //Inicializa os parametros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }

   /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar no TextoController.
     * 
     */
    private function index_action() {

        //Apresenta a view
        $this->View()->display('index.php');
    }

}

?>