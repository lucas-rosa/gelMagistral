<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table WebsitePages
 *
 * A tabela WebsitePages foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\WebsitePages
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class WebsitePages extends BaseWebsitePages {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela websitePages.
     * 
     * @var string $table
     */
    private $table = "websitePages";
    
    /**
     * Metodo getPageInfo
     * 
     * Seleciona os dados da tabela WebsiteInfo conforme o request passado por parametro
     * 
     * @param string[] $request
     * @return string[]
     */
    public function getPageInfo($request) {
        try {
            //Retorna os dados da tabela
            return $this->getTable($this->table)->findByurl_caminho($request);
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}