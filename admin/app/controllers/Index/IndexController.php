<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe IndexController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Index
 * 
 * @package admin\app\controllers\Index\IndexController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class IndexController extends ControllerBase {

    /**
     * Metodo IndexController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
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
     * O metodo index_action faz as chamadas iniciais ao entrar em Index chamando
     * a view  
     * 
     */
    private function index_action() {
        //Exibe a tela de login
        $this->View()->display('index.php');
    }
    
    /**
     * Metodo login
     * 
     * O metodo login Solicita a Autenticacao do Usuario. Verififca se os dados 
     * foram enviados por POST. Caso se confirme o envio por POST chama o model
     * ConcreteIndex e o metodo Login aramzenando os dados na variavel $login  
     * 
     */
    private function login() {
        //Verifica se o usuário enviou o formulário
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $login = $this->Delegator('ConcreteIndex', 'Login', $this->getPost());
        }
    }
    
    /**
     * Metodo desbloqueio
     * 
     * O metodo desbloqueio Solicita o Desbloqueio do usuario. Verififca se a  
     * sessao existe. Caso exista chama o model ConcreteIndex e o metodo desbloquear
     * passando o id em um array e armazenado o resultado na variavel $resultado_desbloqueio.
     * Apos isso faz uma verificacao para ver se a variavel $resultado_desbloqueio existe
     * e exibe uma mensagem conforme o resultado. 
     * 
     */
    private function desbloqueio() {
        //Verifica se a sessão existe
        if (isset($_SESSION)) {
            //Verifica se o usuário é administrador e se o mesmo tem permissão de acesso
            if (isset($_SESSION['UserPerfil']) && $_SESSION['UserPerfil'] == "1") {
                //Valida o id do usuario
                if ($this->getParam('usuario') != false && is_numeric($this->getParam('usuario'))) {
                    //Cria um objeto para armazenar os dados
                    //$Object = $this->CreateObject();
                    //Pega o id do usuário
                    //$Object->id = $this->getParam('usuario');
                    //Efetua o desbloqueio do Usuário
                    $resultado_desbloqueio = $this->Delegator("ConcreteIndex", "desbloquear", array("id" => $this->getParam('usuario')));

                    if ($resultado_desbloqueio) {
                        echo "Usuario desbloqueado com Sucesso";
                        exit();
                    } else {
                        echo "Ocorreu um erro ao desbloquear o usuario";
                        exit();
                    }
                }
            }
        }
    }
    
     /**
     * Metodo logoff
     * 
     * O metodo logoff Destroi a sessao do usuario. Verififca se a  
     * sessao existe. Caso exista chama o Helper auth e armazena na variavel
     * $AuthHelper. Apos chama o metodo logout do helper armazenado na variavel 
     * 
     */
    private function logoff() {
        //Verifica se a sessão existe
        if (isset($_SESSION)) {
            //Invoca o Helper de Autenticação
            $AuthHelper = HelperFactory::getInstance('auth');

            //Destrói a sessão
            $AuthHelper->logout();
        }
    }

}