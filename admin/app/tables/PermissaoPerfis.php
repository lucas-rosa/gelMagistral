<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table PermissaoPerfis
 *
 * A tabela PermissaoPerfis foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\PermissaoPerfis
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class PermissaoPerfis extends BasePermissaoPerfis {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela PermissaoPerfis. Para isso utilize o elias pp.
     * 
     * @var string $table_alias
     */
    private $table_alias = "permissaoPerfis pp";

     /**
     * Metodo MontaComboPerfisUsuarios
     * 
     * Seleciona todos os dados da tabela PermissaoPerfis.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     * 
     */
    public function MontaComboPerfisUsuarios() {
        try {
            return $this->getTable($this->table_alias)->findAll();
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo getPerfilById
     * 
     * Seleciona os dados da tabela PermissaoPerfis conforme o $id passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $id
     * @return string[]
     * 
     */
    public function getPerfilById($id) {
        //Retorna os dados do perfil
        return $this->getTable($this->table_alias)->find($id);
    }
    
    /**
     * Metodo IncluirPermissaoPerfil
     * 
     * Salva o txt_perfil passado por parametro na tabela PermissaoPerfis
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     * 
     */
    public function IncluirPermissaoPerfil($parametros) {
        try {
            $this->txt_perfil = $parametros['txt_perfil'];
            $this->save();

            TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

            return $this->getIncremented();
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectPermissaoPerfil
     * 
     * Seleciona todos os dados da tabela PermissaoPerfis.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     * 
     */
    public function SelectPermissaoPerfil() {
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo selectNome
     * 
     * Seleciona todos os dados da tabela PermissaoPerfis conforme o $parametros
     * passado por parametros .
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     * 
     */
    public function selectNome($parametros) {
        try {
            $query = Doctrine_Query::create()
                    ->select('pp.*')
                    ->from($this->table_alias)
                    ->where('pp.cod_tipo = ?', $parametros['cod_perfil'])
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo EditaPermissaoPerfil
     * 
     * Edita o txt_perfil cadastrado na tabela conforme o $parametros 
     * passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return boolean
     * 
     */
    public function EditaPermissaoPerfil($parametros) {
        try {
            $tabela = $this->getTable($this->table_alias)->find($parametros['cod_tipo']);

            if ($tabela) {
                $tabela->txt_perfil = utf8_decode($parametros['txt_perfil']);
                $tabela->save();

                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_tipo'], 'A');

                return true;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo excluirPerfis
     * 
     * Deleta os dados da tabela PermissaoPerfis conforme o cod_tipo passado
     * por parametro 
     * passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return boolean
     * 
     */
    public function excluirPerfis($parametros) {
        try {
            $tabela = $this->getTable($this->table_alias)->find($parametros['cod_tipo']);

            if ($tabela) {
                $tabela->delete();

                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_tipo'], 'X');
                return true;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectPermissaoPerfilTipo
     * 
     * Seleciona os tipos de perfis no editar conforme o cod_tipo passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_tipo
     * @return string[]
     * 
     */
    public function SelectPermissaoPerfilTipo($cod_tipo) {
        try {
            $query = Doctrine_Query::create()
                    ->select('pp.*')
                    ->from($this->table_alias)
                    ->where('pp.cod_tipo = ?', $cod_tipo)
                    ->limit(1)
                    ->execute()
                    ->toArray();

            return $query[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo VerificarLogin
     * 
     * Seleciona os dados da tabela PermissaoPerfis conforme o $parametros passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     * 
     */
    public function VerificarLogin($parametros) {
        try {
            //se for inclusão entra aqui
            if (!isset($parametros['cod_id_tipo'])) {
                $query = Doctrine_Query::create()
                        ->select('pp.*')
                        ->from($this->table_alias)
                        ->where('pp.txt_perfil = ?', $parametros['txt_perfil']);
            }

            //se for edição entra aqui
            else {
                $query = Doctrine_Query::create()
                        ->select('pp.*')
                        ->from($this->table_alias)
                        ->where('pp.txt_perfil = ?', $parametros['txt_perfil'])
                        ->andWhere('pp.cod_tipo != ?', $parametros['cod_id_tipo']);
            }

            if ($query->count() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}