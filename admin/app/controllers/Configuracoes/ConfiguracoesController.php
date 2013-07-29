<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConfiguracoesController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Configuracoes.
 * 
 * @package admin\app\controllers\Configuracoes\ConfiguracoesController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConfiguracoesController extends ControllerBase {

    /**
     * Metodo ConfiguracoesController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action -> Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function ConfiguracoesController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    /**
     * Metodo detalhes
     *
     * O metodo detalhes envia os dados para o model ConcreteConfiguracoes e chama
     * o metodo SelectConfiguracoes armazenando os dados na variavel $dados_configuracao
     *
     * @param string $params
     */
    private function detalhes($params = null) {
        //verifica se passou o id e se é numérico
        if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id'))) {
            //Seleciona os dados da tabela WebsiteInfo
            $dados_configuracao = $this->Delegator('ConcreteConfiguracoes', 'SelectConfiguracoes', $this->getParam());

            //joga o $dados_configuracao na view
            $this->View()->assign('dados_configuracao', $dados_configuracao);

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

            //mostra a view
            $this->View()->display('detalhes.php');
        }
    }
    
    /**
     * Metodo editar
     *
     * O metodo editar verifica se os dados enviados pelo formulario vieram via
     * POST. Caso isso se confirme ele envia os dados para o model ConcreteConfiguracoes
     * chamando o metodo EditaConfiguracoes. Senao envia para o o model ConcreteConfiguracoes 
     * chamando o metodo SelectConfiguracoes e armazena os dados na variavel $dados_configuracao
     *
     */
    private function editar() {
        //Verifica se o formulário foi postado
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Solicita o cadastramento do Contato
            $this->Delegator('ConcreteConfiguracoes', 'EditaConfiguracoes', $this->getPost());
        } else {
            //Valida o cod_id
            if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id'))) {
                //Busca os idiomas
                $this->getIdiomas();

                //Busca os dados da tabela websiteInfo
                $dados_configuracao = $this->Delegator('ConcreteConfiguracoes', 'SelectConfiguracoes', $this->getParam());

                //Leva os dados para a view
                $this->View()->assign('dados_configuracao', $dados_configuracao);
            }

            //Exibe a view
            $this->View()->display('editar.php');
        }
    }
    
     /**
     * Metodo getIdiomas
     *
     * O metodo getIdiomas envia os dados para o model ConcreteConfiguracoes
     * chamando o metodo SelectIdiomas e armazena os dados na variavel $dados_idioma
     *
     */
    private function getIdiomas() {
        //Busca os dados da tabela websiteIdioma
        $dados_idioma = $this->Delegator('ConcreteConfiguracoes', 'SelectIdiomas');

        //Associa os dados na view
        $this->View()->assign('idiomas', $dados_idioma);
    }

}