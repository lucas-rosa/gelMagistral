<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table TextosLayoutAdmin
 *
 * A tabela TextosLayoutAdmin foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\TextosLayoutAdmin
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class TextosLayoutAdmin extends BaseTextosLayoutAdmin {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela TextosLayoutAdmin. Para isso utilize o elias tl.
     * 
     * @var string $table_alias
     */
    private $table_alias = "textosLayoutAdmin tl";

     /**
     * Metodo getLayoutTexts
     * 
     * Seleciona todos os dados da tabela TextosLayoutAdmin
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function getLayoutTexts() {
        try {
            //Query a ser executada
            $Query = Doctrine_Query::CREATE();
            $Query->select('tl.txt_texto,tl.cod_id')
                    ->from($this->table_alias);

            //Executa a query
            $recordset = $Query->execute();

            //Cria um array para os resultados
            $array_textos_layout = array();

            //Atribui os textos resgatados ao array resultante
            foreach ($recordset as $valor) {
                $array_textos_layout[$valor['cod_id']] = $valor['txt_texto'];
            }

            //Executa a Query
            return $array_textos_layout;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}