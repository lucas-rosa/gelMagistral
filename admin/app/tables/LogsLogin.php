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
 * @package admin\app\tables\LogsLogin
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class LogsLogin extends BaseLogsLogin {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela LogsLogin. Para isso utilize o elias log.
     * 
     * @var string $table_alias
     */
    private $table_alias = "logsLogin log";
    
     /**
     * Metodo SalvaLog
     * 
     * Salva os dados passados por parametro na tabela LogsLogin 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $id_usuario
     * @param string $data_hora
     * @param integer $ip_maquina
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
    
     /**
     * Metodo ExibirUltimoLogin
     * 
     * Seleciona o ultimo login cadastrado na tabela LogsLogin 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function ExibirUltimoLogin() {
        try {
            $query = Doctrine_Query::create()
                    ->select("DATE_FORMAT(log.dat_login, '%d/%m/%Y às %H:%i') as dat_login")
                    ->from('LogsLogin log')
                    ->where('log.cod_user = ?', $_SESSION['UserId'])
                    ->orderBy('log.cod_int DESC')
                    ->offset(1)
                    ->limit(1);

            $recordset = $query->execute();

            //Retorna verdadeiro em caso de sucesso
            return $recordset[0]['dat_login'];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectUltimosVinteAcessos
     * 
     * Seleciona os ultimos 20 acesso cadastrados na tabela LogsLogin 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelectUltimosVinteAcessos() {
        try {
            $query = Doctrine_Query::create()
                    ->select("*, DATE_FORMAT(log.dat_login, '%d/%m/%Y às %H:%i') as dat_login, user.txt_nome, per.txt_perfil")
                    ->from($this->table_alias)
                    ->innerJoin("log.Usuarios user")
                    ->innerJoin("user.PermissaoPerfis per")
                    ->orderBy('log.dat_login DESC')
                    ->offset(1)
                    ->limit(20)
                    ->execute()
                    ->toArray();

            //Retorna verdadeiro em caso de sucesso
            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelecionarLogsLogin
     * 
     * Seleciona os logs de logins feitos
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelecionarLogsLogin() {
        try {
            $query = Doctrine_Query::create()
                    ->select("log.*, DATE_FORMAT(log.dat_login, '%d/%m/%Y') data_login, DATE_FORMAT(log.dat_login, '%H:%i:%s') hora_login, user.txt_nome")
                    ->from($this->table_alias)
                    ->leftJoin("log.Usuarios user")
                    ->orderBy('log.dat_login DESC');

            if ($query->count() > 0) {
                $dados = $query->execute()->toArray();
                return $dados;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}