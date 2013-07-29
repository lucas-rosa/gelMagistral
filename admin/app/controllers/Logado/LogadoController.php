<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe LogadoController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Logado
 * 
 * @package admin\app\controllers\Logado\LogadoController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class LogadoController extends ControllerBase {

    /**
     * Metodo LogadoController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function LogadoController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
     /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Logado
     * mandando para o model ConcreteLogado chamando o metodo SelectWebsiteStatus
     * e armazenando o resultado na variavel $dados. Apos estancia os helpers e
     * armazena na variavel $helper. Envia o helper para a view e depois a variavel 
     * com os dados. 
     * 
     * @param string $parametros
     * 
     * @return array
     */
    private function index_action($parametros = null) {

        //Solicita os dados
        $dados = $this->Delegator('ConcreteLogado', 'SelectWebsiteStatus');

        $helper = HelperFactory::getInstance();

        //Leva os dados para a view
        $this->View()->assign('helper', $helper);

        //Leva os dados para a view
        $this->View()->assign('dados', array_reverse($dados));

        //Exibe a view inicial
        $this->View()->display('index.php');
    }

}