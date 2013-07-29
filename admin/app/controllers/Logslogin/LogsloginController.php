<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe LogsloginController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Logslogin
 * 
 * @package admin\app\controllers\Logslogin\LogsloginController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class LogsloginController extends ControllerBase
{
    /**
     * Metodo LogsloginController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function LogsloginController($controller, $action, $urlparams)
    {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
     /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Logslogin
     * mandando para o model ConcreteLogslogin chamando o metodo SelecionarLogsLogin
     * e armazenando o resultado na variavel $dados_logs_login.
     * 
     * @return array
     */
    private function index_action()
    {
        //Solicita os dados da tabela LogsLogin
        $dados_logs_login = $this->Delegator('ConcreteLogslogin', 'SelecionarLogsLogin');

        //Leva os dados para a view
        $this->View()->assign('dados_logs_login', $dados_logs_login);
        
        //Exibe a view
        $this->View()->display('index.php');
    }

}