<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe LogsalteracoesController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Logsalteracoes
 * 
 * @package admin\app\controllers\Logsalteracoes\LogsalteracoesController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class LogsalteracoesController extends ControllerBase {

    /**
     * Metodo LogsalteracoesController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function LogsalteracoesController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
     /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Logsalteracoes
     * mandando para o model ConcreteLogsalteracoes chamando o metodo SelecionarLogsalteracoes
     * e armazenando o resultado na variavel $dados_logs_alteracoes. 
     * 
     * @return array
     */
    private function index_action() {
        //Solicita os dados da tabela LogsAlteracoes
        $dados_logs_alteracoes = $this->Delegator('ConcreteLogsalteracoes', 'SelecionarLogsalteracoes');

        //Leva os dados para a view
        $this->View()->assign('dados_logs_alteracoes', $dados_logs_alteracoes);

        //Exibe a view
        $this->View()->display('index.php');
    }

}