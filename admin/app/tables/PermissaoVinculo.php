<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table PermissaoVinculo
 *
 * A tabela PermissaoVinculo foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\PermissaoVinculo
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class PermissaoVinculo extends BasePermissaoVinculo {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela PermissaoVinculo. Para isso utilize o elias pv.
     * 
     * @var string $table_alias
     */
    private $table_alias = "permissaoVinculo pv";
    
    /**
     * Metodo IncluirPermissaoVinculo
     * 
     * Salva os dados passados por parametro na tabela PermissaoVinculo
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $ca
     * @param integer $cod_perfil
     * @return boolean
     */
    public function IncluirPermissaoVinculo($ca, $cod_perfil) {
        try {
            $this->cod_perfil = $cod_perfil;
            $this->cod_permissaoGeral = $ca;
            $this->save();

            //Salva no log de altera��es
            TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectPermissaoVinculoId
     * 
     * Seleciona os dados da tabela PermissaoVinculo, PermissaoGeral, PermissaoGeralVinculo,
     * PermissaoPerfis, FrameworkAcoes, FrameworkControllers conforme o $cod_perfil
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_perfil
     * @return string[]
     */
    public function SelectPermissaoVinculoId($cod_perfil) {
        try {
            $query = Doctrine_Query::create()
                    ->select('pv.*, pg.*, pgv.*, pp.*, fa.*, fc.*')
                    ->from($this->table_alias)
                    ->innerJoin('pv.PermissaoGeral pg')
                    ->leftJoin('pg.PermissaoGeralVinculo_2 pgv')
                    ->innerJoin('pv.PermissaoPerfis pp')
                    ->innerJoin('pg.FrameworkAcoes fa')
                    ->innerJoin('pg.FrameworkControllers fc')
                    ->orderBy('fc.txt_nome_amigavel ASC')
                    ->where('pv.cod_perfil = ?', $cod_perfil)
                    ->andWhere('pgv.cod_id IS NULL');

            if ($query->count() > 0) {
                $dado = $query->execute()->toArray();
                return $dado;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo IncluirPermissaoVinculo
     * 
     * Edita o cod_perfil e o cod_permissaoGeral passados por parametro na tabela PermissaoVinculo
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_permissaoGeral
     * @param integer $cod_perfil
     * @return boolean
     */
    public function EditarControlerAcao($cod_permissaoGeral, $cod_perfil) {
        try {
            $this->cod_perfil = $cod_perfil;
            $this->cod_permissaoGeral = $cod_permissaoGeral;
            $this->save();

            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectPermissaoVinculoCodPerfil
     * 
     * Seleciona os dados da tabela PermissaoVinculo conforme o $cod_perfil
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_perfil
     * @return string[]
     */
    public function SelectPermissaoVinculoCodPerfil($cod_perfil) {
        try {
            $query = Doctrine_Query::create()
                    ->select('pv.*')
                    ->from($this->table_alias)
                    ->where('pv.cod_perfil = ?', $cod_perfil)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectPermissaoVinculoCodPerfil
     * 
     * Exclui as permissoes da tabela PermissaoVinculo conforme o cod_id
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return boolean
     */
    
    public function DeleteControlerAcao($parametros) {
        try {
            $parametros = $this->SelectPermissaoVinculoCodPerfil($parametros['cod_tipo']);

            foreach ($parametros as $par) {
                $tabela = $this->getTable($table_alias)->find($par['cod_id']);

                //Verifica se o registro foi encontrado
                if ($tabela) {
                    //Removendo o registro
                    $tabela->delete();

                    //Salva no log de altera��es
                    TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $par['cod_id'], 'X');
                }
            }
            //Retorna verdadeiro em caso de sucesso
            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}