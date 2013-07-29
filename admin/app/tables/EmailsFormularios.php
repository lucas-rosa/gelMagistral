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
 * @package admin\app\tables\EmailsFormularios
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class EmailsFormularios extends BaseEmailsFormularios {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela EmailsFormularios. Para isso utilize o elias ef.
     * 
     * @var string $table_alias
     */
    private $table_alias = "emailsFormularios ef";
    
    /**
     * Metodo SelectEmailFormularioId
     * 
     * Seleciona os dados da tabela EmailsFormularios conforme os dados 
     * passados por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     */
    public function SelectEmailFormularioId($parametros) {
        try {
            //Executa a Query
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where("ef.cod_id = ?", $parametros['cod_id'])
                    ->limit(1);

            if ($query->count() > 0) {
                $dados = $query->execute()->toArray();
                return $dados[0];
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectEmailFormularioId
     * 
     * Edita os dados da tabela EmailsFormularios conforme os dados 
     * passados por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return boolean
     */
    public function EditaEmailFormulario($parametros) {
        try {
            //Pesquisa o id
            $tabela = $this->getTable($this->table_alias)->find($parametros['cod_id']);

            //Verifica se o registro foi localizado
            if ($tabela) {
                $tabela->txt_email = $parametros['txt_email'];
                $tabela->txt_formulario = $parametros['txt_formulario'];
                $tabela->txt_conversao = $parametros['txt_conversao'];
                $tabela->save();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'], 'A');

                return true;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectEmailFormulario
     * 
     * Seleciona todos os dados da tabela EmailsFormularios
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelectEmailFormulario() {
        try {
            $query = Doctrine_Query::create()
                    ->select('ef.*')
                    ->from($this->table_alias)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}