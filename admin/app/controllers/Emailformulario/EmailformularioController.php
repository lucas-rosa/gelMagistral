<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe EmailformularioController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do EmailformularioController.
 * 
 * @package admin\app\controllers\Emailformulario\EmailformularioController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class EmailformularioController extends ControllerBase {

    /**
     * Metodo EmailformularioController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function EmailformularioController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Emailformulario
     * mandando para o model ConcreteEmailformulario chamando o metodo SelectEmailFormulario
     * e armazenando o resultado na variavel $dados_email_formulario
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action($params = null) {
        //Solicita os dados dos textos
        $dados_email_formulario = $this->Delegator('ConcreteEmailformulario', 'SelectEmailFormulario');

        //Leva os dados para a view
        $this->View()->assign('dados_email_formulario', $dados_email_formulario);

        //Verifica se há dados extras a serem adicionados na view(via parametro)
        if (!is_null($params)) {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $params);
        }
        //Verifica se há dados extras a serem adicionados na view(via SESSÃO)
        else if (isset($_SESSION['view_data'])) {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $_SESSION['view_data']);
            //Elimina a sessão
            unset($_SESSION['view_data']);
        }
        //Exibe a view
        $this->View()->display('index.php');
    }
    
     /**
     * Metodo editar
     * 
     * O metodo editar verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita o cadastro do texto mandando para o model ConcreteEmailformulario chamando
     * o metodo EditaEmailFormulario e armazenando o resultado na variavel $resultado. 
     * Caso os dados nao sejam enviados por POST, seleciona tudo de acordo com o id 
     * enviando para o model ConcreteEmailformulario chamando o metodo SelectEmailFormularioId   
     * 
     * @return array
     */
    private function editar() {
        //Verifica se o usuário postou o formulário
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Solicita o cadastramento do texto
            $resultado = $this->Delegator('ConcreteEmailformulario', 'EditaEmailFormulario', $this->getPost());
        } else {
            //Valida o id do Conteudo
            if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id'))) {
                //seleciona tudo
                $dados_emailformulario = $this->Delegator("ConcreteEmailformulario", "SelectEmailFormularioId", $this->getParam());

                //Coloca os dados da vaga na View
                $this->View()->assign('dados_emailformulario', $dados_emailformulario);
            }
            //Exibe a view
            $this->View()->display('editar.php');
        }
    }
    
    /**
     * Metodo detalhes
     *
     * O metodo detalhes envia os dados para o model ConcreteEmailformulario e chama
     * o metodo SelectEmailFormularioId armazenando os dados na variavel $dados_email_formulario
     * e armazenando na variavel $dados_email_formulario
     *
     * @return array
     */
    private function detalhes() {
        //Valida o id do texto
        if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id'))) {
            //Busca os dados do texto
            $dados_email_formulario = $this->Delegator('ConcreteEmailformulario', 'SelectEmailFormularioId', $this->getParam());

            //Leva os dados para a view
            $this->View()->assign('dados_email_formulario', $dados_email_formulario);
        }

        //Apresenta a view
        $this->View()->display('detalhes.php');
    }

}