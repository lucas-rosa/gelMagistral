<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table EmailsFormularios 
 *
 * A tabela EmailsFormularios foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\EmailsFormularios 
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class EmailsFormularios extends BaseEmailsFormularios {
    
    /**
     * Metodo BuscaDados
     * 
     * Este metodo seleciona todos os dados cadastrados na tabela EmailsFormularios 
     * conforme o id passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param integer $id
     * @return string[]
     */
    public function BuscaDados($id) 
    {


        try {

            //Busca os dados
            $recordset = $this->getTable('emailsFormularios')->find($id);

            //Retorna o registro
            return $recordset;
        } catch (Doctrine_Exception $e) {

            echo $e->getMessage();
        }
    }

}