<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table UsuariosStatus
 *
 * A tabela  UsuariosStatus foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\UsuariosStatus
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class UsuariosStatus extends BaseUsuariosStatus {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela UsuariosStatus. Para isso utilize o elias us.
     * 
     * @var string $table_alias
     */
    private $table_alias = "usuariosStatus us";
    
    /**
     * Metodo getStatus
     * 
     * Seleciona todos os dados da tabela UsuariosStatus.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[] 
     */
    public function getStatus() {
        try {
            $query = Doctrine_Query::create()
                    ->select('us.*')
                    ->from($this->table_alias)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo getStatus
     * 
     * Seleciona todos os dados da tabela UsuariosStatus.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[] 
     */
    public function SelectStatus() {
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