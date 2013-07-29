<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe TextoslayoutController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Textoslayot.
 * 
 * @package admin\app\controllers\Textoslayout\TextoslayoutController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class TextoslayoutController extends ControllerBase {

    /**
     * Metodo TextoslayoutController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     * 
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function TextoslayoutController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Textoslayout. 
     * Faz uma chamada para o model ConcreteTextoslayout e o metodo BuscarTextos armazenando
     * os dados em $resultado.
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action($params = null) {
        //Solicita os dados dos textos
        $resultado = $this->Delegator('ConcreteTextoslayout', 'BuscarTextos');

        //Leva os dados para a view
        $this->View()->assign('dados_textos', $resultado);

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
     * solicita o cadastro do registro mandando para o model ConcreteTextoslayout chamando
     * o metodo EditaTexto. Caso os dados nao sejam enviados por POST chama o model
     * ConcreteTextoslayout e o metodo BuscarEdicaoId passando o id por parametro e armazena 
     * o resultado na variavel $dados_texto. 
     * 
     * @return array
     */
    private function editar() {
        //Verifica se o usuário postou o formulário
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Solicita o cadastramento do texto
            $resultado = $this->Delegator('ConcreteTextoslayout', 'EditaTexto', $this->getPost());
        } else {
            //Valida o id do texto
            if ($this->getParam('cod_relacao_idioma') !== false && is_numeric($this->getParam('cod_relacao_idioma'))) {
                //Busca os dados do texto
                $dados_texto = $this->Delegator('ConcreteTextoslayout', 'BuscarEdicaoId', $this->getParam());

                //Leva os dados para a view
                $this->View()->assign('dados_texto', $dados_texto);
            }
            
            //Exibe a view
            $this->View()->display('editar.php');
        }
    }

}