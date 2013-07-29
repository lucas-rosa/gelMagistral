<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table PermissaoGeral
 *
 * A tabela PermissaoGeral foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\PermissaoGeral
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class PermissaoGeral extends BasePermissaoGeral {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela PermissaoGeral. Para isso utilize o elias pg.
     * 
     * @var string $table_alias
     */
    private $table_alias = 'permissaoGeral pg';
    
    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela PermissaoGeral.
     * 
     * @var string $table_name
     */
    private $table_name = "permissaoGeral";
    
     /**
     * Metodo getTableName
     * 
     * Busca o nome da tabela em questao
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function getTableName() {
        return $this->table_name;
    }
    
     /**
     * Metodo getPermissaoId
     * 
     * Seleciona os dados da tabela PermissaoGeral conforme $ControllerId e $ActionId
     * passados por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $ControllerId
     * @param integer $ActionId
     * @return string[]
     * 
     */
    public function getPermissaoId($ControllerId, $ActionId) {
        try {
            $query = Doctrine_Query::create()
                    ->select('cod_id')
                    ->from($this->table_alias)
                    ->where('pg.cod_controller = ?', $ControllerId)
                    ->andWhere('pg.cod_acao = ?', $ActionId);

            $recordset = $query->execute();
            return $recordset[0]['cod_id'];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectControlerAcao
     * 
     * Seleciona os dados da tabela PermissaoGeral conforme $parametros
     * passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     * 
     */
    public function SelectControlerAcao($parametros) {
        try {
            $query = Doctrine_Query::create()
                    ->select('pg.*, pv.*, fc.*, fa.*')
                    ->from($this->table_alias)
                    ->innerJoin('pg.FrameworkControllers fc')
                    ->innerJoin('pg.FrameworkAcoes fa')
                    ->leftJoin('pg.PermissaoVinculo pv')
                    ->orderBy('fc.txt_nome_amigavel ASC, fa.txt_nome_amigavel ASC')
                    ->execute()
                    ->toArray();

            foreach ($query as $chave => $valor) {
                foreach ($valor['PermissaoVinculo'] as $chave2 => $valor2) {
                    if ($valor2['cod_perfil'] != $parametros['cod_perfil']) {
                        unset($query[$chave]['PermissaoVinculo'][$chave2]);
                    } else {
                        $query[$chave]['PermissaoVinculo'][0] = $query[$chave]['PermissaoVinculo'][$chave2];
                        if ($chave2 != 0) {
                            unset($query[$chave]['PermissaoVinculo'][$chave2]);
                        }
                    }
                }
            }
            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectControlerAcaoIncluir
     * 
     * Seleciona os dados da tabela PermissaoGeral, PermissaoVinculo, FrameworkControllers,
     * FrameworkAcoes, PermissaoGeralVinculo.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     * 
     */
    public function SelectControlerAcaoIncluir() {
        try {
            $query = Doctrine_Query::create()
                    ->select('pg.*, pv.*, fc.*, fa.*, pgv.*')
                    ->from($this->table_alias)
                    ->innerJoin('pg.FrameworkControllers fc')
                    ->innerJoin('pg.FrameworkAcoes fa')
                    ->leftJoin('pg.PermissaoVinculo pv')
                    ->leftJoin('pg.PermissaoGeralVinculo_2 pgv')
                    ->orderBy('fc.txt_nome_amigavel ASC, fa.txt_nome_amigavel ASC')
                    ->where('pgv.cod_id IS NULL')
                    ->execute()
                    ->toArray();

            

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo selectPermissoesGeral
     * 
     * Seleciona os dados da tabela PermissaoGeral conforme o $cod_id passado 
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_id
     * @return string[]
     * 
     */
    public function selectPermissoesGeral($cod_id, $cod_perfil) {
        try {
 
            $query = Doctrine_Query::create()
                    ->select('pg.*, pu.*, fc.*, fa.*, pgv.*, pv.*')
                    ->from($this->table_alias)
                    ->innerJoin('pg.FrameworkControllers fc')
                    ->innerJoin('pg.FrameworkAcoes fa')
                    ->innerJoin('pg.PermissaoVinculo pv')
                    ->leftJoin('pg.PermissaoUsuario pu')
                    ->leftJoin('pg.PermissaoGeralVinculo_2 pgv')
                    ->orderBy('fc.txt_nome_amigavel ASC, fa.txt_nome_amigavel ASC')
                    ->where('pgv.cod_id IS NULL')
                    ->andWhere('pv.cod_perfil = ?', $cod_perfil)
                    ->execute()
                    ->toArray();

            foreach ($query as $chave => $valor) {
                foreach ($valor['PermissaoUsuario'] as $chave2 => $valor2) {
                    if ($valor2['cod_usuario'] != $cod_id) {
                        unset($query[$chave]['PermissaoUsuario'][$chave2]);
                    } else {
                        $query[$chave]['PermissaoUsuario'][0] = $query[$chave]['PermissaoUsuario'][$chave2];
                        if ($chave2 != 0) {
                            unset($query[$chave]['PermissaoUsuario'][$chave2]);
                        }
                    }
                }
            }
            

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectControllerAcaoEditar
     * 
     * Seleciona o controller e a acao no editar conforme o $paramtros passado 
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     * 
     */
    public function SelectControllerAcaoEditar($parametros) {
        try {
            $query = Doctrine_Query::create()
                    ->select('pg.*, pv.*, fc.*, fa.*, pgv.*')
                    ->from($this->table_alias)
                    ->leftJoin('pg.PermissaoGeralVinculo_2 pgv')
                    ->innerJoin('pg.FrameworkControllers fc')
                    ->innerJoin('pg.FrameworkAcoes fa')
                    ->leftJoin('pg.PermissaoVinculo pv')
                    ->where('pgv.cod_id IS NULL')
                    ->orderBy('fc.txt_nome_amigavel ASC, fa.txt_nome_amigavel ASC')
                    ->execute()
                    ->toArray();

            foreach ($query as $chave => $valor) {
                foreach ($valor['PermissaoVinculo'] as $chave2 => $valor2) {
                    if ($valor2['cod_perfil'] != $parametros['cod_tipo']) {
                        unset($query[$chave]['PermissaoVinculo'][$chave2]);
                    } else {
                        $query[$chave]['PermissaoVinculo'][0] = $query[$chave]['PermissaoVinculo'][$chave2];
                        if ($chave2 != 0) {
                            unset($query[$chave]['PermissaoVinculo'][$chave2]);
                        }
                    }
                }
            }
            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}