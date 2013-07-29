<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteEmailformulario
 *
 * Esta classe e responsavel por todas as requisicoes a tabela EmailsFormularios.
 * 
 * @package admin\app\controllers\Emailformulario\models\ConcreteEmailformulario
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteEmailformulario {

    /**
     * Metodo SelectEmailFormulario
     * 
     * Seleciona todos os dados cadastrados na tabela EmailsFormularios.
     * Faz uma requisicao a tabela EmailsFormularios chamando o metodo SelectEmailFormulario
     * 
     * @return string[]
     * 
     */
    public function SelectEmailFormulario() {
        //Retorna os dados ao Controller
        return TableFactory::getInstance('EmailsFormularios')->SelectEmailFormulario();
    }
    
    /**
     * Metodo SelectEmailFormularioId
     * 
     * Seleciona todos os dados cadastrados na tabela SelectEmailFormulario conforme o Id.
     * Faz uma requisicao a tabela EmailsFormularios chamando o metodo SelectEmailFormularioId
     * passando o Id por parametro.
     * 
     * @param string[] $parametros
     * 
     * @return string[]
     * 
     */
    public function SelectEmailFormularioId($parametros) {
        //Retorna os dados ao Controller
        return TableFactory::getInstance('EmailsFormularios')->SelectEmailFormularioId($parametros);
    }
    
    /**
     * Metodo EditaEmailFormulario
     * 
     * Edita os dados cadastrados na tabela SelectEmailFormulario conforme o Id.
     * Faz uma requisicao a tabela EmailsFormularios chamando o metodo EditaEmailFormulario
     * passando o Id por parametro.
     * 
     * @param string[] $parametros
     * 
     * @return string[]
     * 
     */
    public function EditaEmailFormulario($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia o componente de validaчуo
        $ComponenteValidacao = getComponent('validacoes/emailformulario.validacao', 'EmailValidacao');

        //Executa a Validaчуo
        $resultado_validacao = $ComponenteValidacao->ValidarFormulario($parametros);

        //Verifica o resultado da validaчуo
        if (count($resultado_validacao) == 0) {
            //Busca os textos da tabela TextoLayoutAdmin
            $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

            //Trata os dados antes de gravar no banco de dados
            $parametros = HelperFactory::getInstance()->TrataValor($parametros, null, null, null, true);

            if (TableFactory::getInstance('EmailsFormularios')->EditaEmailFormulario($parametros) === true) {
                //Mensagem de confirmaчуo
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35], 'sucesso' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
            } else {
                //Mensagem de confirmaчуo
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[58], 'erro' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
            }
        } else {
            //Retorna os erros da validaчуo
            echo Zend_Json::encode($resultado_validacao);
        }
    }

}

?>