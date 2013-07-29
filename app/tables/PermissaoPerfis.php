<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table PermissaoPerfis
 *
 * A tabela PermissaoPerfis foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\PermissaoPerfis
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class PermissaoPerfis extends BasePermissaoPerfis {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela permissaoPerfis. Para isso utilize o elias pp.
     * 
     * @var string $table_alias
     */
    private $table_alias = "permissaoPerfis pp";

    /**
     * Metodo MontaComboPerfisUsuarios
     * 
     * Retorna todos os dados cadastrados na tabela permissaoPerfis 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function MontaComboPerfisUsuarios() {
        try {
            return $this->getTable($this->table_alias)->findAll();
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo getPerfilById
     * 
     * Retorna o perfil conforme o id passado por parametro
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param integer $id 
     * @return string[]
     */
    public function getPerfilById($id) {
        //Retorna os dados do perfil
        return $this->getTable($this->table_alias)->find($id);
    }

}