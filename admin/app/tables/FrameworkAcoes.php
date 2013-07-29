<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table FrameworkAcoes
 *
 * A tabela FrameworkAcoes foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\FrameworkAcoes
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class FrameworkAcoes extends BaseFrameworkAcoes {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela FrameworkAcoes. Para isso utilize o elias fa.
     * 
     * @var string $table_alias
     */
    private $table_alias = 'frameworkAcoes fa';
    
     /**
     * Metodo getAction
     * 
     * Seleciona os dados da tabela FrameworkAcoes conforme a action 
     * passada por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $action 
     * @return string[]
     */
    public function getAction($action) {
        //Padroniza o nome da action
        $action = strtolower($action);
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where('fa.txt_nome = ?', $action);

            $recordset = $query->execute();
            return $recordset[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}