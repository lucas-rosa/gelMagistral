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
 * A tabela Usuarios foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\Usuarios
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
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
     * Metodo getTableAlias
     * 
     * Retorna o nome da tabela armazenado em $table_alias
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string
     */
    public function getTableAlias() {
        //Retorna o alias da tabela
        return $this->table_alias;
    }

    /**
     * Metodo SelectUsuario
     * 
     * Seleciona o usuario conforme o loin e senha passados por parametro
     * 
     * @param string $txt_login
     * @param string $txt_senha
     * @return boolean
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
     * Metodo SelectUsuarioLogin
     * 
     * Seleciona o usuario conforme o login passado por parametro
     * 
     * @param string $txt_login
     * @return string[]
     */
    public function SelectUsuarioLogin($txt_login) {
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where("us.txt_login = ?", $txt_login)
                    ->andWhere('us.cod_status = ?', '2')
                    ->limit(1);

            //Verifica se o usuario tem acesso
            if ($query->count() > 0) {
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
     * Salva o Log do Usuario
     * 
     * @param Integer $id_usuario
     * @param String $data_hora
     * @param String $ip_maquina
     * @return boolean
     */
    public function SalvaLogUsuario($id_usuario, $data_hora, $ip_maquina) {
        //Instancia a tabela
        $TabelaLogsLogin = TableFactory::getInstance('LogsLogin');

        //Salva o log do usuário
        if ($TabelaLogsLogin->SalvaLog($id_usuario, $data_hora, $ip_maquina)) {
            //Retorna Verdadeiro em caso de Sucesso
            return true;
        } else {
            //Retorna falso em caso de erro
            return false;
        }
    }

    /**
     * Metodo EditarUsuario
     * 
     * Atualiza o registro de um Usuario no banco de dados
     * 
     * @param string[] $parametros
     * @return boolean
     */
    public function EditarUsuario($parametros) {
        try {
            $tabela_logs_alteeracoes = TableFactory::getInstance('LogsAlteracoes');
            $tabela_logs_alteeracoes->logAlteracoes('usuarios', $parametros['cod_id'], 'A');

            //Pega a instancia da tabela
            $tabela = $this->getTable($this->table_alias)->find($parametros['cod_id']);
            //Seta os campos da tabela
            $this->setValues($tabela, $parametros, UPDATE);

            //Salva as alterações
            $tabela->save();

            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}