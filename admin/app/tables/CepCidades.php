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
 * @package admin\app\tables\CepCidades
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class CepCidades extends BaseCepCidades {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela CepCidades. Para isso utilize o elias cc.
     * 
     * @var string $table_alias
     */
    private $table_alias = "cepCidades cc";
    
    /**
     * Metodo getCidades
     * 
     * Este metodo seleciona os dados cadastrados na tabela cepCidades conforme o cod_uf
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $cod_uf
     * @return string[]
     */
    public function getCidades($cod_uf) {
        try {
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
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo getCidadesId
     * 
     * Este metodo seleciona os dados cadastrados na tabela cepCidades conforme o cod_id
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $cod_id
     * @return string[]
     */
    public function getCidadeId($cod_id) {
        try {
            $query = DOCTRINE_QUERY::create()
                    ->select('cc.*')
                    ->from($this->table_alias)
                    ->where('cc.cod_id = ?', $cod_id)
                    ->limit(1)
                    ->execute()
                    ->toArray();

            return $query[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}