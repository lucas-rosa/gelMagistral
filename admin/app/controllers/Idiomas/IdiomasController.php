<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe IdiomasController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Idiomas
 * 
 * @package admin\app\controllers\Idiomas\IdiomasController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class IdiomasController extends ControllerBase {

    /**
     * Metodo IdiomasController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function IdiomasController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Idiomas
     * mandando para o model ConcreteIdiomas chamando o metodo SelecionaIdioma
     * e armazenando o resultado na variavel $dados_idioma
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action($params = null) {
        //Seleciona os idiomas
        $dados_idioma = $this->Delegator('ConcreteIdiomas', 'SelecionaIdioma');

        //Associa os dados das especificações na view
        $this->View()->assign('dados_idioma', $dados_idioma);

        //Verifica se há dados extras a serem adicionados na view(via parametro)
        if (!is_null($params)) {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $params);
        }
        //Verifica se há dados extras a serem adicionados na view(via SESSÃO)
        elseif (isset($_SESSION['view_data'])) {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $_SESSION['view_data']);
            //Elimina a sessão
            unset($_SESSION['view_data']);
        }
        //Exibe a index
        $this->View()->display('index.php');
    }
    
    /**
     * Metodo incluir
     * 
     * O metodo incluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita a inclusao chamando o model ConcreteIdiomas e o
     * metodo Incluir passando os dados enviados via POST. Caso os dados nao sejam enviados por POST 
     * retorna para a view
     * 
     */
    private function incluir() {
        //Verifica se o usuário enviou uma requisição POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Solicita a inclusão do registro
            $this->Delegator('ConcreteIdiomas', 'Incluir', $this->getPost());
        } else {
            //Exibe a view
            $this->View()->display('incluir.php');
        }
    }
    
     /**
     * Metodo editar
     * 
     * O metodo editar verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita o cadastro do registro mandando para o model ConcreteIdiomas chamando
     * o metodo EditarIdioma. Caso os dados nao sejam enviados por POST chama o model
     * ConcreteIdiomas e o metodo SelectIdiomaId passando o id por parametro e armazena 
     * o resultado na variavel $dados_idioma. 
     * 
     * @return array
     */
    private function editar() {
        //Verifica se o usuário enviou uma requisição POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Solicita a inclusão do registro
            $this->Delegator('ConcreteIdiomas', 'EditarIdioma', $this->getPost());
        } else {
            //Valida o id informado
            if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id'))) {
                //Solicita os dados da tabela websiteIdiomas
                $dados_idioma = $this->Delegator('ConcreteIdiomas', 'SelectIdiomaId', $this->getParam());

                //Envia os dados recuperados para a view
                $this->View()->assign('dados_idioma', $dados_idioma);

                //Exibe a view
                $this->View()->display('editar.php');
            }
        }
    }
    
    /**
     * Metodo excluir
     * 
     * O metodo excluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita a exclusao do registro mandando para o model ConcreteIdiomas chamando
     * o metodo ExcluirIdioma.
     * 
     */
    private function excluir() {
        //Verifica se o usuário enviou uma requisição POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Exclui os dados
            $this->Delegator('ConcreteIdiomas', 'ExcluirIdioma', $this->getParam());
        }
    }

}