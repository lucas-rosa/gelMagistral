<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table WebsiteInfo
 *
 * A tabela WebsiteInfo foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\WebsiteInfo
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class WebsiteInfo extends BaseWebsiteInfo {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela WebsiteInfo. Para isso utilize o elias w.
     * 
     * @var string $table_alias
     */
    private $table_alias = "websiteInfo as w";

    /**
     * Metodo getWebSiteInfo
     * 
     * Seleciona os dados da tabela WebsiteInfo
     * 
     * @return string[]
     */
    public function getWebSiteInfo() {
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->execute()
                    ->toArray();

            return $query[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}