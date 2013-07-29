<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table WebsiteIdiomas
 *
 * A tabela WebsiteIdiomas foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\WebsiteIdiomas
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class WebsiteIdiomas extends BaseWebsiteIdiomas {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela WebsiteIdiomas. Para isso utilize o elias wi.
     * 
     * @var string $table_alias
     */
    private $table_alias = "websiteIdiomas wi";

    /**
     * Metodo VerificarIdioma
     * 
     * Seleciona o idioma conforme o txt_meta passado por parametro
     * 
     * @param string $txt_meta
     * @return boolean
     */
    public function VerificarIdioma($txt_meta) {
        try {
            $query = Doctrine_Query::create()
                    ->select('cod_id,txt_meta')
                    ->from($this->table_alias)
                    ->where('wi.txt_meta = ?', strtolower(trim($txt_meta)))
                    ->limit('1')
                    ->execute();

            //Verifica se houve resultado
            if ($query->count() > 0) {
                //Troca de idioma na sessão
                $_SESSION['language'] = $query[0]['cod_id'];
                //Sigla do Idioma
                $_SESSION['language_txt_meta'] = $query[0]['txt_meta'];
                //Retorna true
                return true;
            } else {
                //Não foi encontrado - retorna false
                return false;
            }

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Metodo getMeta
     * 
     * Seleciona o idioma conforme o cod_id passado por parametro
     * 
     * @param string $cod_id
     * @return string[]
     */
    public function getMeta($cod_id) {
        try {
            $query = Doctrine_Query::create()
                    ->select('wi.txt_meta')
                    ->from($this->table_alias)
                    ->where('wi.cod_id = ?', $cod_id)
                    ->limit('1')
                    ->execute();

            //Verifica se houve resultado
            if ($query->count() > 0) {
                //Retorna o txt_meta do idioma
                return $query[0]['txt_meta'];
            } else {
                //Não foi encontrado - retorna false
                return false;
            }

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectIdioma
     * 
     * Seleciona o idioma
     * 
     * @return string[]
     */
    public function SelectIdioma() {
        try {
            $query = Doctrine_Query::create()
                    ->select('wi.*')
                    ->from($this->table_alias)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}