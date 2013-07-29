<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ftp_backupHelper
 * 
 * Faz backup do ftp no formato zip 
 * 
 * @package admin\system\helpers\ftp_backupHelper
 * @author Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 * 
 */
class ftp_backupHelper {

    /**
     * Metodo apagar_diretorio
     * 
     * Apaga um diretorio passado por parametro
     * 
     * @param string $dir
     * 
     * @return boolean
     */
    private function apagar_diretorio($dir) {
        if (is_dir($dir)) {
            if ($handle = opendir($dir)) {
                while (false !== ($file = readdir($handle))) {
                    if (($file == ".") or ($file == "..")) {
                        continue;
                    }
                    if (is_dir($dir . $file)) {
                        $this->apagar_diretorio($dir . $file . "/");
                    } else {
                        unlink($dir . $file);
                    }
                }
            } else {
                print("nao foi possivel abrir o arquivo.");
                return false;
            }

            // fecha a pasta aberta
            closedir($handle);

            // apaga a pasta, que agora esta vazia
            rmdir($dir);
        } else {
            print("diretorio informado invalido");
            return false;
        }
    }
    
    /**
     * Metodo copy_r
     * 
     * Copia para um determinado destino
     * 
     * @param string $path
     * @param string $dest
     * 
     * @return boolean
     */
    public function copy_r($path, $dest) {

        if (is_dir($path)) {
            @mkdir($dest);
            $objects = scandir($path);
            if (sizeof($objects) > 0) {
                foreach ($objects as $file) {

                    if (!($file == "bkp-db" || $file == "bkp-ftp")) {

                        if ($file == "." || $file == "..")
                            continue;
                        // go on
                        if (is_dir($path . "/" . $file)) {
                            $this->copy_r($path . "/" . $file, $dest . "/" . $file);
                        } else {
                            copy($path . "/" . $file, $dest . "/" . $file);
                        }
                    }
                }
            }

            //Compactando o Diretório
            $this->CompactarDiretorio($dest);


            return true;
        } elseif (is_file($path)) {
            return copy($path, $dest);
        } else {
            return false;
        }
    }
    
     /**
     * Metodo CompactarDiretorio
     * 
     * Compacta um determinado diretorio
     * 
     * @param string $dest
     * 
     */
    public function CompactarDiretorio($dest) {
        //Zipando o Arquivo
        $zip = new ZipArchive();
        if ($zip->open($dest . '.zip', ZipArchive::OVERWRITE)) {
            foreach (glob($dest . "/*.*") as $current)
                $zip->addFile($current, basename($current));

            $zip->close();
        }

        //Elimina o diretório não compactado
        $this->apagar_diretorio($dest . "/");
    }
    
     /**
     * Metodo GravaBackupBanco
     * 
     * Insere no banco os dados deste backup
     * 
     */
    public function GravaBackupBanco() {
        $this->update(array("ultimo_backup" => date("Y-m-d"), "proximo_backup" => $this->getDataProximoBackup()));
    }
    
     /**
     * Metodo getDataProximoBackup
     * 
     * Pega as datas e calcula o tempo do ultimo backup
     * 
     * @return timestamp
     */
    public function getDataProximoBackup() {
       
        $nova_data = date("Y-m-d");
        $calcula_intervalo = strtotime($nova_data . "+30 days"); //Aqui vc especifica intervalo entre o Backup
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

        $recordset = $this->read(null, null, null, '1');
        //Data do Próximo Backup
        $data_proximo_backup = $recordset[0]['proximo_backup'];

        if ($data_proximo_backup == date("Y-m-d")) {
            return true;
        } else {
            return false;
        }
    }

}