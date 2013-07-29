<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table LogsTentativas
 *
 * A tabela LogsTentativas foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\LogsTentativas
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class LogsTentativas extends BaseLogsTentativas {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela LogsTentativas. Para isso utilize o elias lt.
     * 
     * @var string $table_alias
     */
    private $table_alias = "LogsTentativas as lt";
    
     /**
     * Metodo LocalizarIp
     * 
     * Seleciona os dados da tabela LogsTentativas conforme o ip_usuario 
     * e o txt_login passados por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $ip_usuario
     * @param string $txt_login
     * @return string[]
     */
    public function LocalizarIp($ip_usuario, $txt_login) {
        try {
            //Executa a Query
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where('lt.num_ip = ?', $ip_usuario)
                    ->andWhere('lt.txt_usuario = ?', $txt_login)
                    ->andWhere("lt.dat_tentativa = CURDATE()")
                    ->limit('1')
                    ->execute();

            //Verifica o numero de linhas da Query
            if ($query->count() > 0) {
                //Retorna o resultado
                return $query[0];
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo IncrementarTentativa
     * 
     * Salva os dados na tabela LogsTentativas incrementando +1 tentativa
     * conforme o id passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $id
     * @return integer
     */
    public function IncrementarTentativa($id) {
        try {
            //Instancia a tabela
            $tabela = $this->getTable($this->table_alias)->find($id);
            //Incrementa a tentativa
            $tabela->num_tentativa += 1;
            //Salva o registro
            $tabela->save();

            //Retorna o numero de tentativas atualizado
            return $tabela->num_tentativa;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo ZerarTentativas
     * 
     * Salva os dados na tabela LogsTentativas zerando o numero de tentativas
     * conforme o txt_login passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $txt_login
     * @return boolean
     */
    public function ZerarTentativas($id_login) {
        try {

        	$user = TableFactory::getInstance('Usuarios')->SelectUsuarioId($id_login);
        	
            //Executa a Query
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where('lt.txt_usuario = ?', $user['txt_login'])
                    ->limit('1')
                    ->execute()
                    ->toArray();
            //Zera as tentativas
            $tabela_logs_tentativas = $this->getTable($this->table_alias)->find($query[0]['cod_id']);
            $tabela_logs_tentativas->delete();

            //Retorna true em caso de sucesso
            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo ExcluiTentativaAnterior
     * 
     * Exclui os dados da tabela LogsTentativas conforme
     * o usuario passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $usuario
     */
    public function ExcluiTentativaAnterior($usuario) {
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where('lt.txt_usuario = ?', $usuario)
                    ->andWhere('dat_tentativa != CURDATE()')
                    ->limit('1')
                    ->execute();

            if ($query->count() > 0) {
                $dados = $query->toArray();

                //Localiza o registro solicitado
                $tabela = $this->getTable($this->table_alias)->find($dados[0]['cod_id']);

                //Verifica se o registro foi encontrado
                if ($tabela) {
                    //Remove o registro
                    $tabela->delete();
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo RegistrarTentativaInicial
     * 
     * Cadastra a primeira tentativa do usuario na tabela LogsTentativas conforme
     * o usuario e o ip_usuario passados por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $usuario
     * @param string $ip_usuario
     * @return boolean
     */
    public function RegistrarTentativaInicial($usuario, $ip_usuario) {
        try {
            //Recebe os dados do usu�rio
            $this->txt_usuario = $usuario;
            $this->num_ip = $ip_usuario;
            $this->num_tentativa = 1;
            $this->dat_tentativa = date('Y-m-d');

            //Salva no banco de dados
            $this->save();
            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo getDadosUsuario
     * 
     * Seleciona os dados do usuario. Para isso instancia a tabela Uusuarios e 
     * armazena na variavel $UsuariosTable. Apos faz o select conforme 
     * os dados passados por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $field
     * @param string $value
     * @return string[]
     */
    public function getDadosUsuario($field, $value) {
        try {
            //Instancia a tabela de Usuarios
            $UsuariosTable = TableFactory::getInstance('Usuarios');

            //Executa a Query
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($UsuariosTable->getTableAlias())
                    ->where('us.' . $field . ' = ?', $value)
                    ->limit('1')
                    ->execute()
                    ->toArray();

            return $query[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo BloquearUsuario
     * 
     * Instancia a tabela Uusuarios e armazena na variavel $UsuariosTable. 
     * Apos faz o select conforme os dados passados por parametro e grava na
     * tabela o usuario a ser bloqueado conforme o cod_id.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $login_banco
     * @return string[]
     */
    public function BloquearUsuario($login_banco) {
        try {
            //Instancia a tabela de Usuarios
            $UsuariosTable = TableFactory::getInstance('Usuarios');

            //Executa a Query
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($UsuariosTable->getTableAlias())
                    ->where('us.txt_login = ?', $login_banco)
                    ->limit('1')
                    ->execute();

            //Verifica se houve resultado na query
            if ($query->count() > 0) {
                //Bloqueia o usuario
                $UsuariosTable = $UsuariosTable->getTable($this->table_alias)->find($query[0]['cod_id']);
                $UsuariosTable->cod_status = 3;
                $UsuariosTable->save();

                //Retorna true em caso de sucesso
                return true;
            } else {
                //Retorna false caso nenhum registro seja encontrado na Query
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}