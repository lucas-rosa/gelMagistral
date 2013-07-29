<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Videos
 *
 * A tabela Videos foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\Videos
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class Videos extends BaseVideos
{
    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela Dicas. Para isso utilize o elias vi.
     * 
     * @var string $table_alias
     */
    private $table_alias = 'videos vi';
    
    /**
     * Metodo SelectVideos
     * 
     * Seleciona todos os dados cadastrados na tabela Videos.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function SelectVideos() {
        try {
            
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
}