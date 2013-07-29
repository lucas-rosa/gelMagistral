<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table CepUf
 *
 * A tabela CepUf foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\CepUf
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class CepUf extends BaseCepUf 
{
    /**
     * Metodo getEstados
     * 
     * Este metodo seleciona todos os estados cadastrados na tabela cepUf
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function getEstados() {
        try {

            //Prepara a query
            $query = DOCTRINE_QUERY::create()
                    ->from('cepUf');

            //Executa a query
            $recordset = $query->execute();

            //Retorna os dados conforme o idioma
            return $recordset;
        } catch (Doctrine_Exception $e) {

            echo $e->getMessage();
        }
    }

}