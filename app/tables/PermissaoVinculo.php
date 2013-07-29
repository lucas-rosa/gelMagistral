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
 * @package app\tables\PermissaoVinculo
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class PermissaoVinculo extends BasePermissaoVinculo {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela permissaoVinculo. Para isso utilize o elias pv.
     * 
     * @var string $table_alias
     */
    private $table_alias = "permissaoVinculo pv";
    
    /**
     * Metodo IncluirPermissaoVinculo
     * 
     * Salva na tabela permissaoVinculo os dados pasados por parametro
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param string $ca
     * @param integer $cod_perfil
     */
    public function IncluirPermissaoVinculo($ca, $cod_perfil) {
        try {
            $this->cod_perfil = $cod_perfil;
            $this->cod_permissaoGeral = $ca;
            $this->save();
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectPermissaoVinculoId
     * 
     * Seleciona os dados da tabela permissaoVinculo conforme o cod_perfil 
     * passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param integer $cod_perfil
     * @return string[] 
     */
    public function SelectPermissaoVinculoId($cod_perfil) {
        try {
            $query = Doctrine_Query::create()
                    ->select('pv.*, pg.*, fa.*, fc.*, pp.*')
                    ->from($this->table_alias)
                    ->innerJoin('pv.PermissaoGeral pg')
                    ->innerJoin('pg.FrameworkAcoes fa')
                    ->innerJoin('pg.FrameworkControllers fc')
                    ->innerJoin('pv.PermissaoPerfis pp')
                    ->where('pv.cod_perfil = ?', $cod_perfil)
                    ->execute()
                    ->toArray();


            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo EditarControlerAcao
     * 
     * Salva na tabela permissaoVinculo o $cod_permissaoGeral e o $cod_perfil 
     * passados por parametro.  
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
     * seleciona os dados da tabela permissaoVinculo conforme o cod_perfil
     * passados por parametro.  
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
     * Metodo DeleteControlerAcao
     * 
     * deleta da tabela permissaoVinculo conforme o cod_perfil
     * passados por parametro.  
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param integer $cod_perfil
     * @return boolean
     */
    public function DeleteControlerAcao($cod_perfil) {
        try {
            $parametros = $this->SelectPermissaoVinculoCodPerfil($cod_perfil);

            foreach ($parametros as $par) {
                $tabela = $this->getTable($table_alias)->find($par['cod_id']);

                //Verifica se o registro foi encontrado
                if ($tabela) {
                    //Removendo o registro
                    $tabela->delete();

                    //Salva no log de alterações
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