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
 * @package admin\app\tables\LogsAlteracoes
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class LogsAlteracoes extends BaseLogsAlteracoes {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela LogsAlteracoes. Para isso utilize o elias la.
     * 
     * @var string $table_alias
     */
    private $table_alias = "logsAlteracoes la";
    
     /**
     * Metodo logAlteracoes
     * 
     * Seleciona os dados da tabela LogsAlteracoes conforme os dados
     * passados por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $txt_tabela
     * @param integer $cod_registro
     * @param string $cha_acao
     * @return boolean
     */
    public function logAlteracoes($txt_tabela, $cod_registro, $cha_acao) {
        try {
            //Recebe os dados
            $this->txt_tabela = $txt_tabela;
            $this->txt_nome = $_SESSION['UserName'];
            $this->cod_registro = $cod_registro;
            $this->cha_acao = $cha_acao;
            $this->cod_usuario = $_SESSION['UserId'];
            $this->dat_data = date('Y-m-d H:i:s');
            $this->num_ip = $_SERVER['REMOTE_ADDR'];
            $this->save();

            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelecionarLogsalteracoes
     * 
     * Seleciona os dados da tabela LogsAlteracoes 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelecionarLogsalteracoes() {
        try {
            $query = Doctrine_Query::create()
                    ->select("la.*, DATE_FORMAT(la.dat_data, '%d/%m/%Y') dat_data, DATE_FORMAT(la.dat_data, '%H:%i:%s') dat_hora, user.txt_nome")
                    ->from($this->table_alias)
                    ->leftJoin("la.Usuarios user")
                    ->orderBy('la.dat_data DESC');

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