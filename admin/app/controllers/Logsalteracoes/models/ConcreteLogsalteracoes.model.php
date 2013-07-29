<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteLogsalteracoes
 *
 * Esta classe e responsavel por todas as requisicoes a tabela LogsAlteracoes
 * 
 * @package admin\app\controllers\Logsalteracoes\models\ConcreteLogsalteracoes
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteLogsalteracoes {

    /**
     * Metodo SelectWebsiteStatus
     * 
     * Seleciona todos os dados cadastrados na tabela LogsAlteracoes.
     * Faz uma requisicao a tabela LogsAlteracoes chamando o metodo SelecionarLogsalteracoes
     * 
     * @return string[]
     * 
     */
    public function SelecionarLogsalteracoes() {
        return TableFactory::getInstance('LogsAlteracoes')->SelecionarLogsalteracoes();
    }

}

?>