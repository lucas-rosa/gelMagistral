<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table LogsAlteracoes
 *
 * A tabela LogsAlteracoes foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\LogsAlteracoes
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class LogsAlteracoes extends BaseLogsAlteracoes {

    /**
     * Metodo logAlteracoes
     * 
     * Este metodo inseri na tabela logAlteracoes os dados enviados por parametro
     * 
     * @param string $txt_tabela
     * @param string $cod_registro
     * @param string $cha_acao
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return boolean
     */
    public function logAlteracoes($txt_tabela, $cod_registro, $cha_acao) {
        try {
            //Recebe os dados
            $this->txt_tabela = $txt_tabela;
            $this->cod_registro = $cod_registro;
            $this->cha_acao = $cha_acao;
            $this->cod_usuario = $_SESSION['UserId'];
            $this->dat_data = date('Y-m-d H:i:s');
            $this->num_ip = $_SERVER['REMOTE_ADDR'];

            //Salva o log no banco de dados
            $this->save();

            //Retorna verdadeiro em caso de sucesso
            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}