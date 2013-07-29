<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe PedidoController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Pedido.
 * 
 * @package app\controllers\Listacomum\ListacomumController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class PedidoController extends ControllerBase {

    /**
     * Metodo ListacomumController
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
    public function PedidoController($controller, $action, $urlparams) {
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
        //Solicita os dados
        $dados_textos = $this->Delegator('ConcretePedido', 'SelectTextos');

        //Coloca o Helper na View
        $this->View()->assign('Helper', HelperFactory::getInstance());

        //Leva os dados para a view
        $this->View()->assign('dados_textos', $dados_textos);

        //Exibe a view
        $this->View()->display('index.php');
    }

    /**
     * Metodo detalhes
     * 
     * Encaminha para o ConcretePedido e solicita a acao SelectTextosId pasando
     * junto em um array o cod_relacao_idioma e armazena o resultado na variavel $dados_lista_comum
     * 
     * @return array 
     *
     */
    private function detalhes() {
        //pega o id do permalink
        $id = HelperFactory::getInstance()->getPermalink();

        //Valida o id verificando se ele é numérico e se tem algo no id
        if ($id !== false && is_numeric($id)) {
            //Seleciona os dados do id
            $dados_lista_comum = $this->Delegator('ConcretePedido', 'SelectTextosId', array('cod_relacao_idioma' => $id));

            //Coloca os dados na view
            $this->View()->assign('dados_lista_comum', $dados_lista_comum);
        }

        //Exibe a view
        $this->View()->display('detalhes.php');
    }

}