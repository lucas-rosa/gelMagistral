<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Dicas
 *
 * A tabela Dicas foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\Dicas
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class Dicas extends BaseDicas {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela Dicas. Para isso utilize o elias di.
     * 
     * @var string $table_alias
     */
    private $table_alias = 'dicas di';

    /**
     * Metodo SelectDicas
     * 
     * Seleciona todos os dados cadastrados na tabela Dicas.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function SelectDicas($parametros) {
        try {
            
            if($parametros['page'] == 1 || $parametros['page'] == "" ) {
                $offset = 0;
            }    
            else{
                $offset = $parametros['page'];
            }
            
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where("di.cod_idioma = ?", LANGUAGE)
                    ->orderBy('di.dat_date')
                    ->offset($offset)
                    ->limit($parametros['qtd'])
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectDicasId
     * 
     * Seleciona os dados cadastrados na tabela dicas conforme o cod_id.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param $parametros
     * @return string[]
     */
    public function SelectDicasId($parametros) {
        try {
            
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where("di.cod_idioma = ?", LANGUAGE)
                    ->andWhere("di.cod_id = ?", $parametros['cod_id'])
                    ->execute()
                    ->toArray();

            return $query[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectOutrasDicas
     * 
     * Seleciona os dados cadastrados na tabela dicas.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param $parametros
     * @return string[]
     */
    public function SelectOutrasDicas($parametros) {
        try {
            
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where("di.cod_idioma = ?", LANGUAGE)
                    ->andWhere("di.cod_id NOT IN ($parametros[cod_id])")
                    ->limit(2)
                    ->orderBy("di.dat_date DESC")
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectDicas
     * 
     * Retorna o total de dados cadastrados na tabela dicas.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function CountDicas() {
        try {
            
            $query = Doctrine_Query::create()
                    ->select('count(*) total')
                    ->from($this->table_alias)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}