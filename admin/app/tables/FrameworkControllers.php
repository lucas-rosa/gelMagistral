<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table FrameworkControllers
 *
 * A tabela FrameworkControllers foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\FrameworkControllers
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class FrameworkControllers extends BaseFrameworkControllers {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela FrameworkControllers. Para isso utilize o elias fc.
     * 
     * @var string $table_alias
     */
    private $table_alias = 'frameworkControllers fc';
    
    /**
     * Metodo getController
     * 
     * Seleciona os dados da tabela FrameworkControllers conforme o controller
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $controller
     * @return string[]
     */
    public function getController($controller) {
        //Padroniza o nome do controller
        $controller = strtolower($controller);

        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where('fc.txt_nome = ?', $controller);

            $recordset = $query->execute();
            return $recordset[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}