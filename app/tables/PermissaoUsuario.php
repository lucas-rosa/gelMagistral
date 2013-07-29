<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table PermissaoUsuario
 *
 * A tabela PermissaoUsuario foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\PermissaoUsuario
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class PermissaoUsuario extends BasePermissaoUsuario {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela PermissaoUsuario. Para isso utilize o elias pu.
     * 
     * @var string $table_alias
     */
    private $table_alias = 'permissaoUsuario pu';
    
     /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela PermissaoUsuario.
     * 
     * @var string $table_name
     */
    private $table_name = "permissaoUsuario";

    /**
     * Metodo getTableName
     * 
     * Retorna o nome da tabela armazenado em $table_name
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string
     */
    public function getTableName() {
        return $this->table_name;
    }
    
     /**
     * Metodo PermissaoConcebida
     * 
     * Seleciona a permissao concebida ao usuario conforme o id_permissao passado
     * por parametro.  
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param integer $id_permissao
     * @return string[]
     */
    public function PermissaoConcebida($id_permissao) {
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->leftjoin('pu.PermissaoGeral pg')
                    ->where('pu.cod_usuario = ?', $_SESSION['UserId'])
                    ->andWhere('pg.cod_id = ?', $id_permissao);

            //Verifica se houve resultado
            if ($query->count() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo getPermissoesUsuario
     * 
     * Seleciona as permissoes do usuario
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function getPermissoesUsuario() {
        try {
            $query = Doctrine_Query::create()
                    ->select('cod_permissaoGeral')
                    ->from($this->table_alias)
                    ->where('pu.cod_usuario = ?', $_SESSION['UserId']);

            //Resultado da Query
            return $query->execute();
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}