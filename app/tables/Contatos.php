<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Contatos
 *
 * A tabela Contatos foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\Contatos
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class Contatos extends BaseContatos {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela Contatos. Para isso utilize o elias co.
     * 
     * @var string $table_alias
     */
    private $table_alias = "contatos co";
    
    /**
     * Metodo Buscaendereco
     * 
     * Este metodo seleciona todos os enderecos cadastrados na tabela Contatos
     * conforme o cod_idioma definido no controllerBase
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function Buscaendereco() {
        try {
            //Executa a Query
            $query = Doctrine_Query::create()
                    ->select('co.*, cc.txt_cidade, cu.txt_uf, cu.cha_sigla')
                    ->from($this->table_alias)
                    ->innerJoin("co.CepCidades cc")
                    ->innerJoin("co.CepUf cu")
                    ->where("co.cod_idioma = ?", LANGUAGE)
                    ->execute()
                    ->toArray();

            //Retorna o resultado
            return $query[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectContatos
     * 
     * Este metodo seleciona todos os contatos cadastrados na tabela Contatos
     * conforme o cod_idioma definido no controllerBase
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function SelectContatos() {
        try {
            //Executa a Query
            $query = Doctrine_Query::create()
                    ->select('co.*, cc.txt_cidade, cu.txt_uf')
                    ->from($this->table_alias)
                    ->innerJoin("co.CepCidades cc")
                    ->innerJoin("co.CepUf cu")
                    ->where("co.cod_idioma = ?", LANGUAGE)
                    ->execute()
                    ->toArray();

            //Retorna o resultado
            return $query[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}