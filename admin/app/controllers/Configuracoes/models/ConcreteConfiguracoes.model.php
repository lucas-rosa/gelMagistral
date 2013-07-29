<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteConfiguracoes
 *
 * Esta classe e responsavel por todas as requisicoes para ConcreteConfiguracoes.
 * 
 * @package admin\app\controllers\Configuracoes\models\Configuracoes
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteConfiguracoes {

    /**
     * Metodo SelectConfiguracoes
     * 
     * Retorna todos os dados cadastrados ate o momento na tabela WebsiteInfo.
     * Faz uma requisicao a tabela WebsiteInfo chamando o metodo SelectConfiguracoes
     * 
     * @param string $parametros
     * 
     * @return string[]
     * 
     */
    public function SelectConfiguracoes($parametros) {
        return TableFactory::getInstance('WebsiteInfo')->SelectConfiguracoes($parametros);
    }
    
    /**
     * Metodo EditaConfiguracoes
     * 
     * Edita as configuracoes conforme os parametros passados.
     * Chama o a tabela WebsiteInfo e o metodo ExecuteEditaConfiguracoes. 
     * 
     * @param string $parametros
     * 
     * @param string[] $parametros
     * 
     */
    public function EditaConfiguracoes($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia o componente de validaчуo
        $ComponenteValidacao = getComponent('validacoes/configuracoes.validacao', 'ConfiguracoesValidacao');

        //Executa a Validaчуo
        $resultado_validacao = $ComponenteValidacao->Validar($parametros);

        //Verifica o resultado da validaчуo
        if (count($resultado_validacao) == 0) {
            //Trata os dados antes de gravar no banco de dados
            $parametros = HelperFactory::getInstance()->TrataValor($parametros, null, null, null, true);

            //Instanciando a tabela de TextosLayouAdmin
            $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

            //Edita as configuraчѕes
            if (TableFactory::getInstance('WebsiteInfo')->ExecuteEditaConfiguracoes($parametros) === true) {
                //Mensagem de confirmaчуo
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35], 'sucesso' => true);

                //Retorna true em caso de sucesso
                echo Zend_Json::encode(array("1"));
            } else {
                //Mensagem de erro
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[58], 'erro' => true);

                //Retorna true em caso de sucesso
                echo Zend_Json::encode(array("1"));
            }
        } else {
            //Resposta do JSON
            echo Zend_Json::encode($resultado_validacao);
        }
    }
    
     /**
     * Metodo SelectIdiomas
     * 
     * seleciona os idiomas disponiveis na tabela WebsiteIdiomas.
     * Chama a tabela WebsiteIdiomas e o metodo getIdiomas. 
     * 
     * @return string[]
     */
    public function SelectIdiomas() {
        //Retorna os dados dos Contatoss
        return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
    }

}

?>