<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Noticias
 *
 * A tabela Noticias foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\Noticias
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class Noticias extends BaseNoticias {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela Noticias. Para isso utilize o elias no.
     * 
     * @var string $table_alias
     */
    private $table_alias = "noticias no";
    
    /**
     * Metodo SelectNoticias
     * 
     * Este metodo seleciona todas os dados cadastradas na tabela noticias
     * conforme o cod_idioma, cod_publicado, data_inicio_publicacao e data_termino_publicacao
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function SelectNovidades($parametros) {
        try {
            
            if($parametros['page'] == 1 || $parametros['page'] == "" ) {
                $offset = 0;
            }    
            else{
                $offset = $parametros['page'];
            }
            
            //Executa a Query
            $query = Doctrine_Query::create()
                    ->select("no.*, DATE_FORMAT(no.dat_data, '%d/%m/%Y') dat_data")
                    ->from($this->table_alias)
                    ->where("no.cod_idioma = ?", LANGUAGE)
                    ->andWhere("no.cod_publicado = 1")
                    ->orderBy("no.dat_data DESC")
                    ->offset($offset)
                    ->limit($parametros['qtd'])
                    ->execute()
                    ->toArray();

            //Retorna o resultado
            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectNovidades
     * 
     * Retorna o total de dados cadastrados na tabela noticias.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function CountNovidades() {
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
    
    /**
     * Metodo SelectNovidadesId
     * 
     * Seleciona os dados cadastrados na tabela noticias conforme o cod_id.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param $parametros
     * @return string[]
     */
    public function SelectNovidadesId($parametros) {
        try {
            
            $query = Doctrine_Query::create()
                    ->select("no.*, DATE_FORMAT(no.dat_data, '%d/%m/%Y') dat_data")
                    ->from($this->table_alias)
                    ->where("no.cod_idioma = ?", LANGUAGE)
                    ->andWhere("no.cod_relacao_idioma = ?", $parametros['cod_relacao_idioma'])
                    ->execute()
                    ->toArray();

            return $query[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectOutrasNovidades
     * 
     * Seleciona os dados cadastrados na tabela noticias diferetes do cod_id 
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param $parametros
     * @return string[]
     */
    public function SelectOutrasNovidades($parametros) {
        try {
            
            $query = Doctrine_Query::create()
                    ->select("no.*, DATE_FORMAT(no.dat_data, '%d/%m/%Y') dat_data")
                    ->from($this->table_alias)
                    ->where("no.cod_idioma = ?", LANGUAGE)
                    ->andWhere("no.cod_relacao_idioma NOT IN ($parametros[cod_relacao_idioma])")
                    ->limit(2)
                    ->orderBy("no.dat_data DESC")
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectMaisNoticias
     * 
     * Este metodo seleciona as 5 ultimas noticias
     * conforme o cod_relacao_idioma, cod_idioma, cod_publicado, data_inicio_publicacao e data_termino_publicacao
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param string[] $parametros
     * @return string[]
     */
    public function SelectMaisNoticias($parametros) {
        try {
            $query = Doctrine_Query::create()
                    ->select("no.*, DATE_FORMAT(no.dat_data, '%d/%m/%Y') dat_data")
                    ->from($this->table_alias)
                    ->where("no.cod_relacao_idioma != ?", $parametros['cod_relacao_idioma'])
                    ->andWhere("no.cod_idioma = ?", LANGUAGE)
                    ->andWhere("no.cod_publicado = 1")
                    ->andWhere("no.dat_inicio_publicacao <= NOW()")
                    ->andWhere("no.dat_termino_publicacao >= NOW()")
                    ->orderBy("no.dat_data DESC")
                    ->limit(5);

            //Verifica se houve resultado
            if ($query->count() > 0) {
                $dados = $query->execute()->toArray();
                return $dados;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}