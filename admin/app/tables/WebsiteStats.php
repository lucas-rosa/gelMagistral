<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table WebsiteStats
 *
 * A tabela WebsiteStats foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\WebsiteStats
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class WebsiteStats extends BaseWebsiteStats {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela WebsiteStats. Para isso utilize o elias ws.
     * 
     * @var string $table_alias
     */
    private $table_alias = "websiteStats ws";
    
    /**
     * Metodo SelecionaTudo
     * 
     * Seleciona todos os dados da tabela WebsiteStats
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelecionaTudo() {
        try {
            //Monta a Query
            $query = Doctrine_Query::create()
                    ->select("ws.*, MONTHNAME(ws.data) mes, YEAR(ws.data) ano")
                    ->from($this->table_alias)
                    ->orderBy("ws.data DESC")
                    ->offset(1)
                    ->limit(6)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelecionaData
     * 
     * Seleciona por data
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $data
     * @return string[]
     */
    public function SelecionaData($data) {
        try {
            $query = HelperFactory::getInstance()->getPDOInstance();
            $sth = $query->prepare("call procedureData('$data')");
            $sth->execute();
            $resultado = $sth->fetchAll();

            return $resultado;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}