<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table CepCidades
 *
 * A tabela CepCidades foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\CepCidades
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class CepCidades extends BaseCepCidades 
{
    /**
     * Metodo getCidades
     * 
     * Este metodo faz um select no natabela CepCidades conforme o cod_uf
     * passado por parametro. Select no padrao do ORM Doctrini.  
     * 
     * @param string[] $cod_uf 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return boolean
     */
    public function getCidades($cod_uf)
    {
        try
        {
            //Prepara a query
            $query = DOCTRINE_QUERY::create()
                    ->select('*')
                    ->from('cepCidades')
                    ->where('cod_uf = ?', $cod_uf)
                    ->orderBy('txt_cidade ASC')
                    ->execute()
                    ->toArray();

            //Retorna os dados conforme o idioma
            return $query;
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
        }
    }
}