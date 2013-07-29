<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Equipe
 *
 * A tabela Equipe foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\Equipe
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class Equipe extends BaseEquipe {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela equipe. Para isso utilize o elias eq.
     * 
     * @var string $table_alias
     */
    private $table_alias = "equipe eq";
    
    /**
     * Metodo TodasEquipe
     * 
     * Seleciona os dados da tabela Equipe.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function TodasEquipe() {
        try {
            $query = Doctrine_Query::create()
                    ->select('eq.cod_id, eq.cod_idioma, eq.txt_colaborador, eq.txt_curriculo, eq.img_foto')
                    ->from($this->table_alias)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo ExecutegetFaleConosco
     * 
     * Seleciona os dados da tabela EmailsFormularios conforme o cod_id 
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $cod_id
     * @return string[]
     */
    public function ExecutegetFaleConosco($cod_id) {
        try {
            $query = Doctrine_Query::create()
                    ->select('*, wi.txt_idioma')
                    ->from($this->table_alias)
                    ->innerJoin("eq.websiteIdiomas wi")
                    ->where('eq.cod_id = ?', $cod_id)
                    ->execute()
                    ->toArray();

            return $query[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}