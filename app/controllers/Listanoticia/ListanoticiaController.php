<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ListanoticiaController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Listanoticia.
 * 
 * @package app\controllers\Listanoticia\ListanoticiaController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ListanoticiaController extends ControllerBase {

    /**
     * Metodo ListanoticiaController
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
    public function ListanoticiaController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }

    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Listanoticia.
     * 
     */
    private function index_action() {
        //Solicita os dados
        $dados_noticias = $this->Delegator('ConcreteListanoticia', 'SelectNoticias');

        //Coloca o Helper na View
        $this->View()->assign('Helper', HelperFactory::getInstance());

        //Leva os dados para a view
        $this->View()->assign('dados_noticias', $dados_noticias);

        //Exibe a view
        $this->View()->display('index.php');
    }
    
     /**
     * Metodo detalhes
     * 
     * Encaminha para o ConcreteListanoticia e solicita a acao SelectNoticiasId pasando
     * junto em um array o cod_relacao_idioma e armazena o resultado na variavel $dados_noticias
     * 
     * @return array 
     *
     */
    private function detalhes() {
        //pega o id do permalink
        $id = HelperFactory::getInstance()->getPermalink();

        //Valida o id verificando se ele é numérico e se tem algo no id
        if ($id !== false && is_numeric($id)) {
            //Seleciona os dados do cod_relacao_idioma
            $dados_noticias = $this->Delegator('ConcreteListanoticia', 'SelectNoticiasId', array('cod_relacao_idioma' => $id));

            //Verifica se tem dados
            if ($dados_noticias !== false) {
                //Coloca os dados na view
                $this->View()->assign('dados_noticias', $dados_noticias);

                //Seleciona mais cinco dados tirando o já selecionado
                $resultado_mais_dados = $this->Delegator('ConcreteListanoticia', 'SelectMaisNoticias', array('cod_relacao_idioma' => $id));

                //Coloca o Helper na View
                $this->View()->assign('Helper', HelperFactory::getInstance());

                //Coloca os dados na view
                $this->View()->assign('dados_noticias_mais_dados', $resultado_mais_dados);
            }
        }
        //Exibe a view
        $this->View()->display('detalhes.php');
    }

}