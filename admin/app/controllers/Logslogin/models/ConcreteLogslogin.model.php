<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteLogslogin
 *
 * Esta classe e responsavel por todas as requisicoes a tabela Logslogin
 * 
 * @package admin\app\controllers\Logslogin\models\ConcreteLogslogin
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteLogslogin
{
    /**
     * Metodo SelecionarLogsLogin
     * 
     * Seleciona todos os dados cadastrados na tabela SelecionarLogsLogin.
     * Faz uma requisicao a tabela LogsLogin chamando o metodo SelecionarLogsLogin
     * 
     * @return string[]
     * 
     */
    public function SelecionarLogsLogin()
    {
        return TableFactory::getInstance('LogsLogin')->SelecionarLogsLogin();
    }
}

?>