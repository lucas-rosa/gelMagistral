<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/** 
 * Classe db_backupHelper
 * 
 * Faz backup de determinadas tabelas do banco salvando no formato .sql
 * 
 * @package admin\system\helpers\db_backupHelper
 * @author Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 * 
 */
class db_backupHelper {
    
    /**
     * Metodo getDataProximoBackup
     * 
     * Pega as datas e calcula o tempo do ultimo backup
     * 
     * @return timestamp
     */
    public function getDataProximoBackup() {
        $nova_data = date("Y-m-d");
        $calcula_intervalo = strtotime($nova_data . "+7 days"); //Aqui vc especifica intervalo entre o Backup
        $calcula_timestamp = date('Y-m-d', $calcula_intervalo);

        //Retorna a data do próximo backup(daqui a 1 semana) 
        return $calcula_timestamp;
    }
    
     /**
     * Metodo VerificaUltimoBackup
     * 
     * Busca a data do ultimo backup	
     * 
     * @return boolean
     */
    public function VerificaUltimoBackup() {

        $this->_tabela = $this->backup_date_table;
        $recordset = $this->read(null, null, null, '1');
        //Data do Próximo Backup
        $data_proximo_backup = $recordset[0]['proximo_backup'];

        if ($data_proximo_backup == date("Y-m-d")) {
            return true;
        } else {
            return false;
        }
    }
    
     /**
     * Metodo compress
     * 
     * Pega o conteudo do arquivo
     * 
     * @param string $srcFileName 
     * @param string $dstFileName
      * 
     * @return boolean
     */
    public function compress($srcFileName, $dstFileName) {
        // getting file content
        $fp = fopen($srcFileName, "r");
        $data = fread($fp, filesize($srcFileName));
        fclose($fp);

        // writing compressed file
        $zp = gzopen($dstFileName, "w9");
        gzwrite($zp, $data);
        gzclose($zp);
    }
    
    /**
     * Metodo GerarBackup
     * 
     * Gera o bakup
     *  
     * @return boolean
     */
    public function GerarBackup() {

        //Verifica se é necessário realizar o Backup	
        if (!$this->VerificaUltimoBackup()) {
            return false;
        }

        //Nome do arquivo a ser gerado
        $extensao = ".sql";
        $nome_arquivo_sql = BD_BACKUP . date("dmY_His") . $extensao;

        //Abri um arquivo .sql para gravar no servidor
        $back = fopen($nome_arquivo_sql, "w");

        //Busca as tabelas do banco de dados
        $tables = $this->getTable();

        //Percorre as tabelas do banco de dados
        foreach ($tables as $table) {

            //Busca o Comando Create Table e o nome da Tabela em Questão
            $create_table = $this->getCreateTable($table);

            ///////////////////////#######################///////////////////////////////////
            //Coloca o script para remover as tabelas caso ja existam
            fwrite($back, "DROP TABLE IF EXISTS {$create_table[0]};");
            fwrite($back, "\n\n");
            ///////////////////////#######################///////////////////////////////////
            //Escreve no arquivo o comando Create Table da tabela em questão
            fwrite($back, "$create_table[1];\n\n\n");

            //Busca os dados da tabela em questão
            $this->_tabela = $create_table[0];
            $table_rows = $this->read();

            //Percorre os dados da tabela em questão
            foreach ($table_rows as $row) {
                $sql = "INSERT INTO $create_table[0] VALUES (";

                //Busca o numero de campos da tabela
                $fields = $this->getTable($create_table[0]);

                ############### TRATAMENTO DOS DADOS DA TABELA ######################
                foreach ($fields as $chave => $valor) {

                    if (!isset($row[$chave]))
                        $sql .= " ,";
                    elseif ($row[$chave] != "")
                        $sql .= " '" . addslashes($row[$chave]) . "',"; //os valores devem estar entre aspa simples
                    else
                        $sql .= " '',"; //caso campo vazio insira vazio
                }
                $sql = ereg_replace(",$", "", $sql);
                $sql .= ");\n";
                ######################################################################


                fwrite($back, $sql);
            }

            //Quebra de linha	
            fwrite($back, "\n\n");
        }
        //Fecha o Arquivo
        fclose($back);

        //Zipa o arquivo
        $extensao = ".zip";
        $this->compress($nome_arquivo_sql, $nome_arquivo_sql . $extensao);
        //Elimina o arquivo - ficando apenas o compactado
        unlink($nome_arquivo_sql);

        //Atualiza a data do ultimo backup no banco de dados
        $this->_tabela = $this->backup_date_table;
        $this->update(array("ultimo_backup" => date("Y-m-d"), "proximo_backup" => $this->getDataProximoBackup()));

        //Se ocorreu tudo bem no backup então retornamos Verdadeiro
        return true;
    }

}

?>