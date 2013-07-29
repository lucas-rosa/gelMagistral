<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table LogsLogin
 *
 * A tabela LogsLogin foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\LogsLogin
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class LogsLogin extends BaseLogsLogin {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela LogsLogin. Para isso utilize o elias log.
     * 
     * @var string $table_alias
     */
    private $table_alias = "logsLogin as log";
    
    /**
     * Metodo SalvaLog
     * 
     * Este metodo inseri na tabela LogsLogin os dados enviados por parametro
     * 
     * @param integer $id_usuario
     * @param string $data_hora 
     * @param integer $ip_maquina
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return boolean
     */
    public function SalvaLog($id_usuario, $data_hora, $ip_maquina) {
        try {
            //Recebe os dados
            $this->cod_user = $id_usuario;
            $this->dat_login = $data_hora;
            $this->num_ip = $ip_maquina;

            //Salva o log no banco de dados
            $this->save();
            //Retorna verdadeiro em caso de sucesso
            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}