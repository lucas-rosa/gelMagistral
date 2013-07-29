<?php
/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe uploadHelper
 * 
 * Plugin para Trabalhar com Upload de Arquivos
 *
 * @package admin\system\helpers\uploadHelper
 * @author  Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 *
 */
class uploadHelper {

    /**
     * Atributos da classe uploadHelper
     * 
     * @var string $path
     * @var string[] $file         
     * @var string[] $fieldname        
     */
            private $path = UPLOAD_PATH, $file = array(), $fieldname = array();

    /**
     * Metodo setPath
     * 
     * Seta o caminho do arquivo
     * 
     * @param unknown_type $path
     */
    public function setPath($path) {
        $this->path = $path;
    }

    /**
     * Metodo addFile
     * 
     * Seta o arquivo
     * este metodo e utilizado apenas em casos em que temos somente um arquivo para realizar upload
     * 
     * @param String $file
     */
    public function addFile($file) {
        $this->file[] = $_FILES[$file];
        $this->fieldname[] = $file;
    }

    /**
     * Metodo getFiles
     * 
     * Pega os campos File de um formulario e passa para um Array
     * para que seja possivel gravar o nome dos arquivos no banco de dados
     * 
     * @param Array $parametros  	  
     */
    public function getFiles($parametros = null) {

        //Verifica se existem arquivos a serem processados
        if (count($this->file) > 0) {

            //Instancia o Helper Principal
            $HelperPrincipal = HelperFactory::getInstance();

            //Percorre os arquivos
            foreach ($this->file as $chave => $valor) {

                //Trata o nome do arquivo
                $this->filename = $HelperPrincipal->RemoverAcentos(str_replace(' ', '_', strtolower(date("dmYHis") . "_" . $this->file[$chave]['name'])));

                //Verifica se o usuario deseja passar os dados para um Array
                if (!is_null($parametros)) {

                    //Verifica se parametros � um Array
                    if (is_array($parametros)) {

                        //Altera a flag de retorno de parametros
                        $flag_parameters_return = true;

                        //Nomeia os arquivos a serem gravados no banco de dados
                        $parametros[$this->fieldname[$chave]] = $this->filename;
                    } else {

                        //Dispara Excess�o
                        die("getFiles -> par�metros inv�lidos");
                    }
                }

                //Nome da saida do arquivo
                $this->file[$chave]['name'] = $this->filename;
            }

            //Verifica se deve retornar os parametros
            if ($flag_parameters_return) {

                return $parametros;
            }
        } else {

            //Nenhum arquivo a ser processado
            return false;
        }
    }

    /**
     * Metodo upload
     * 
     * Executa o upload de arquivo
     * 
     * @return boolean
     */
    public function upload() {

        //Verifica se existem arquivos a serem processados
        if (count($this->file) > 0) {

            //Percorre os arquivos
            foreach ($this->file as $chave => $valor) {

                //Realiza o upload do arquivo
                if (move_uploaded_file($this->file[$chave]['tmp_name'], $this->path . $this->file[$chave]['name'])) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {

            //Nenhum arquivo a ser processado
            return false;
        }
    }

    /**
     * Metodo deleteFile
     * 
     * Remove um arquivo
     * 
     * @param String $filepath
     * 
     * @return boolean
     */
    public function deleteFile($filepath) {
        //Verifica se o arquivo Existe
        if (file_exists($filepath)) {
            //Apaga o arquivo	     	
            unlink($filepath);
            //Retorna True
            return true;
        } else {
            //Retorna Falso		
            return false;
        }
    }

}