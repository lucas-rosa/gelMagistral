<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Usuarios
 *
 * A tabela  Usuarios foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\Usuarios
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class Usuarios extends BaseUsuarios {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela Usuarios. Para isso utilize o elias us.
     * 
     * @var string $table_alias
     */
    private $table_alias = 'usuarios us';
    
    /**
     * Metodo SelectUsuario
     * 
     * Seleciona todos os dados da tabela Usuarios conforme o login e a senha
     * passadas por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $txt_login
     * @param string $txt_senha
     * @return string[]
     */
    public function SelectUsuario($txt_login, $txt_senha) {
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where("us.txt_login = ?", $txt_login)
                    ->andWhere("us.txt_senha = ?", md5($txt_senha))
                    ->andWhere('us.cod_status = ?', '2')
                    ->limit(1);

            //Verifica se o usuario tem acesso
            if ($query->count() > 0) {
                $recordset = $query->execute()->toArray();
                $SessionHelper = HelperFactory::getInstance('session');
                $SessionHelper->createSession("UserId", $recordset[0]['cod_id']);
                $SessionHelper->createSession("UserName", $recordset[0]['txt_nome']);
                $SessionHelper->createSession("UserPerfil", $recordset[0]['cod_perfil']);

                return $query->execute()->toArray();
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SalvaLogUsuario
     * 
     * Salva o log de acesso do usuario na tabela LogsLogin conforme os
     * dados passados por parametro $id_usuario, $data_hora e $ip_maquina 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $id_usuario
     * @param string $data_hora
     * @param integer $ip_maquina
     * @return boolean
     */
    public function SalvaLogUsuario($id_usuario, $data_hora, $ip_maquina) {
        //Instancia a tabela
        $TabelaLogsLogin = TableFactory::getInstance('LogsLogin');

        //Salva o log do usu�rio
        if ($TabelaLogsLogin->SalvaLog($id_usuario, $data_hora, $ip_maquina)) {
            //Retorna Verdadeiro em caso de Sucesso
            return true;
        } else {
            //Retorna falso em caso de erro
            return false;
        }
    }
    
     /**
     * Metodo SelectUsuarios
     * 
     * Seleciona todos os usuarios da tabela Usuarios.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelectUsuarios() {
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
     * Metodo SelectUsuarioLogin
     * 
     * Seleciona o usuario da tabela Usuarios conforme $user passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $user 
     * @return boolean
     */
    public function SelectUsuarioLogin($user) {
        try {
            $query = Doctrine_Query::create()
                    ->select('us.*')
                    ->from($this->table_alias)
                    ->where('txt_login = ?', $user);

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
     * Metodo SelectUsuarioLogin
     * 
     * Exclui o usuario conforme o $cod_id passado por parametro
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_id
     * @return boolean
     */
    public function ExcluirUsuario($cod_id) {
        try {
            //Localiza o registro solicitado
            $tabela = $this->getTable($this->table_alias)->find($cod_id);

            //Verifica se o registro foi encontrado
            if ($tabela) {
                //Remove o registro
                $tabela->delete();

                //Salva no log de altera��es
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $cod_id, 'X');

                //Retorna verdadeiro em caso de sucesso
                return true;
            } else {
                //Retorna falso, n�o foi encontrado
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectUsuarioId
     * 
     * Seleciona o usuario conforme o $cod_id passado por parametro
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_id
     * @return string[]
     */
    public function SelectUsuarioId($cod_id) {
        try {
            $query = Doctrine_Query::create()
                    ->select('us.*, pp.*, ust.*')
                    ->from($this->table_alias)
                    ->innerJoin('us.PermissaoPerfis pp')
                    ->innerJoin('us.UsuariosStatus ust')
                    ->where('cod_id =?', $cod_id)
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
     * Metodo EditarUsuarioId
     * 
     * Edita o usuario conforme os dados passados por parametro
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_id
     * @param string $txt_nome
     * @param string $txt_email
     * @param string $txt_login
     * @param integer $cod_status
     * @param string $txt_senha
     * @return string[]
     */
    public function EditarUsuarioId($parametros) {
        try {
            //Pesquisa o id
            $tabela = $this->getTable()->find($parametros['cod_id']);
            
            //Verifica se o registro foi localizado
            if ($tabela) {
                $tabela->txt_nome = $parametros['txt_nome'] ;
                $tabela->txt_email = $parametros['txt_email'];
                $tabela->txt_login = $parametros['txt_login'];
                $tabela->cod_status = $parametros['cod_status'];
                if(isset($parametros['txt_senha'])){
                    $tabela->txt_senha = $parametros['txt_senha'];
                }

                //Atualiza o banco de dados
                $tabela->save();

                //Salva no log de altera��es
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'], 'A');

                //Retorna true em caso de sucesso
                return true;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo EditarUsuarioId
     * 
     * Cadastra o usuario conforme os dados passados por parametro
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $parametros
     * @return string[]
     */
    public function cadastraUsuario($parametros) {
        try {
            $this->txt_nome = $parametros['txt_nome'];
            $this->txt_email = $parametros['txt_email'];
            $this->txt_login = $parametros['txt_login'];
            $this->txt_senha = $parametros['txt_senha'];
            $this->cod_status = $parametros['cod_status'];
            $this->cod_perfil = $parametros['cod_perfil'];
            $this->cod_referencia = $parametros['cod_referencia'];
            $this->save();

            $id_usuario = $this->getIncremented();
            TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

            return $id_usuario;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo selectUsuariosPerfil
     * 
     * Seleciona o usuario conforme o $cod_perfil passado por parametro
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_perfil
     * @return string[]
     */
    public function selectUsuariosPerfil($cod_perfil) {
        try {
            $query = Doctrine_Query::create()
                    ->select('us.*')
                    ->from($this->table_alias)
                    ->where('cod_perfil =?', $cod_perfil)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo EditarUsuarioId
     * 
     * Verifica se o login passado por parametro existe
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $parametros
     * @return boolean
     */
    public function VerificarLogin($parametros) {
        try {
            //se for inclus�o entra aqui
            if (!isset($parametros['cod_id_tipo'])) {
                $query = Doctrine_Query::create()
                        ->select('us.*')
                        ->from($this->table_alias)
                        ->where('us.txt_login = ?', $parametros['txt_login']);
            }

            //se for edi��o entra aqui
            else {
                $query = Doctrine_Query::create()
                        ->select('us.*')
                        ->from($this->table_alias)
                        ->where('us.txt_login = ?', $parametros['txt_login'])
                        ->andWhere('us.cod_id != ?', $parametros['cod_id_tipo']);
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
    
    	public function EditarUsuario($txt_senha, $cod_id) {
		try {
			//Pesquisa o id
			$tabela = $this->getTable()->find($cod_id);

			//Verifica se o registro foi localizado
			if ($tabela) {
				$tabela->txt_senha = $txt_senha;

				//Atualiza o banco de dados
				$tabela->save();

				//Salva no log de alterações
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'], 'A');

				//Retorna true em caso de sucesso
				return true;
			} else {
				return false;
			}
		} catch (Doctrine_Exception $e) {
			echo $e->getMessage();
		}
	}
        
        public function desbloquearUsuario($id_user){
            try{
                    $tabela = $this->getTable()->find($id_user);

                    //Verifica se o registro foi localizado
                    if($tabela)
                    {
                            //Bloqueia o usu�rio
                            $tabela->cod_status = 2;

                            //Atualiza o banco de dados
                            $tabela->save();

                            //Retorna true em caso de sucesso
                            return true;
                    }
                    else
                    {
                            return false;
                    }


            }catch(Doctrine_Exception $e){
                    echo $e->getMessage();
            }
        }
        

	public function getTableAlias(){
		return $this->table_alias ;
	}
	
	public function alterarSenha($id_usuario, $nova_senha){
		try{
			//Pesquisa o id
			$tabela = $this->getTable()->find($id_usuario);

			//Verifica se o registro foi localizado
			if ($tabela) {
				$tabela->txt_senha = md5($nova_senha);

				//Atualiza o banco de dados
				$tabela->save();

				//Salva no log de alterações
				TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'], 'A');

				//Retorna true em caso de sucesso
				return true;
			}
			
		}catch(Doctrine_Exception $e){
                    echo $e->getMessage();
        }
	}

}