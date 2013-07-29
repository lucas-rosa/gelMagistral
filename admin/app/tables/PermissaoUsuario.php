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
 * @package admin\app\tables\PermissaoUsuario
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
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
     * Metodo getTableName
     * 
     * Retorna o nome da tabela deste Model
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function getTableName() {
        return $this->table_name;
    }
    
    /**
     * Metodo PermissaoConcebida
     * 
     * Seleciona a permissao do usuario confome o id_permissao passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $id_permissao
     * @return boolean
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
     * Seleciona o cod_permissaogeral da tabela PermissoesUsuario conforme o
     * UserId passado por Sessao 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return boolean
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
    
     /**
     * Metodo inserirPermissao
     * 
     * Salva o codigo da permissao na tabela PermissoesUsuario conforme $cod_usuario e $cod_permissao passados
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_usuario
     * @param integer $cod_permissao
     * @return boolean
     */
    public function inserirPermissao($cod_usuario, $cod_permissao) {
        try {
            $this->cod_permissaoGeral = $cod_permissao;
            $this->cod_usuario = $cod_usuario;
            $this->save();

            TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

            return true;
        } catch (Doctrine_Exception $e) {
            $e->getMessage();
        }
    }
    
    /**
     * Metodo excluirPermissoes
     * 
     * Exclui as permissoes na tabela PermissoesUsuario conforme $cod_id passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $parametros
     * @return boolean
     */
    /*public function excluirPermissoes($parametros) {
        try {
            $parametros = $this->SelectControlerAcaoId($parametros['cod_id']);

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
            $e->getMessage();
        }
    }*/
    
    public function excluirPermissoes($id_usuario){
        try{
            $tabela = $this->getTable($this->table_alias)->findByDql('cod_usuario = ? ', array($id_usuario));
            if ($tabela) {
                //Removendo o registro
                $tabela->delete();

                //Salva no log de altera��es
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $par['cod_id'], 'X');
                return true ;
            }
        
        }catch(Doctrine_Exception $e){
            echo $e->getMessage();
        }
    
       
    }
    
     /**
     * Metodo selectPermissoesUsuario
     * 
     * Seleciona as permissoes do usuario na tabela PermissoesUsuario conforme $cod_id e $permissoes passados
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_id
     * @param string[] $permissoes
     */
    public function selectPermissoesUsuario($cod_id, $permissoes) {
        try {
            //Consulta as permiss�es que o usuario tem na tabela
            $query = Doctrine_Query::create()
                    ->select('pu.*')
                    ->from($this->table_alias)
                    ->where('pu.cod_usuario = ?', $cod_id)
                    ->execute()
                    ->toArray();

            //Percorre o array de resultados da consulta
            foreach ($query as $chave => $valor) {
                $flag = false;
                //para cada permiss�o no banco, ele verifica em todas as permiss�es que foram marcadas
                if ($permissoes != "") {
                    foreach ($permissoes as $chave2 => $valor2) {
                        //Se o valor que est� no banco, foi marcado no checkbox, a flag � true
                        if ($valor['cod_permissaoGeral'] == $valor2) {
                            $flag = true;
                        }
                    }
                }

                //Se a flag for false, ou seja, se a permiss�o que est� no banco n�o est� marcada, ent�o ela foi desmarcada, logo, ela deve ser excluida do banco
                if ($flag == false) {
                    $tabela = $this->getTable($this->table_alias)->find($valor['cod_id']);

                    if ($tabela) {
                        $tabela->delete();

                        //Salva no log de altera��es
                        TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $cod_id, 'X');
                    }
                }
            }

            if ($permissoes != "") {
                foreach ($permissoes as $chave => $valor) {
                    $flag = false;
                    foreach ($query as $chave2 => $valor2) {
                        if ($valor == $valor2['cod_permissaoGeral']) {
                            $flag = true;
                        }
                    }

                    if ($flag == false) {
                        $usuario = new PermissaoUsuario;

                        $usuario->cod_usuario = $cod_id;
                        $usuario->cod_permissaoGeral = $permissoes[$chave];

                        $usuario->save();
                    }
                }
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectControlerAcaoId
     * 
     * Seleciona as permissoes do usuario na tabela PermissoesUsuario conforme $cod_id passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_id
     * @return string[] 
     */
    public function SelectControlerAcaoId($cod_id) {
        try {
            $query = Doctrine_Query::create()
                    ->select('pu.*, pg.*, fa.*, fc.*, pgv.*')
                    ->from($this->table_alias)
                    ->innerJoin('pu.PermissaoGeral pg')
                    ->innerJoin('pg.FrameworkAcoes fa')
                    ->innerJoin('pg.FrameworkControllers fc')
                    ->leftJoin('pg.PermissaoGeralVinculo_2 pgv')
                    ->orderBy('fc.txt_nome_amigavel ASC, fa.txt_nome_amigavel ASC')
                    ->where('pu.cod_usuario = ?', $cod_id)
                    ->andWhere('pgv.cod_id IS NULL')
                    ->execute()
                    ->toArray();

            //Resultado da Query
            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}