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
 * @package app\tables\PermissaoGeral
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class PermissaoGeral extends BasePermissaoGeral {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela permissaoGeral. Para isso utilize o elias pg.
     * 
     * @var string $table_alias
     */
    private $table_alias = 'permissaoGeral pg';
    
     /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela permissaoGeral.
     * 
     * @var string $table_name
     */
    private $table_name = "permissaoGeral";

    /**
     * Metodo getTableName
     * 
     * Retorna o nome da tabela armazenado em $table_name
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
     * Seleciona a permissao conforme as variaveis ControllerId e a ActionId passadas 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param string $ControllerId 
     * @param string $ActionId 
     * @return string[]
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
     * Seleciona a PermissaoGeral conforme FrameworkControllers, FrameworkAcoes, PermissaoVinculo
     * e ordena de forma ascendente por fc.txt_nome_amigavel e fa.txt_nome_amigavel
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function SelectControlerAcao() {
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
                print_r($valor);
                echo "<br><br>";
            }

            exit();
            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectControlerAcao
     * 
     * Seleciona a PermissaoGeral conforme o cod_id passado por parametro
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param integer $cod_id
     * @return string[]
     */
    public function selectPermissoesGeral($cod_id) {
        try {
            $query = Doctrine_Query::create()
                    ->select('pg.*, pu.*, fc.*, fa.*')
                    ->from($this->table_alias)
                    ->innerJoin('pg.FrameworkControllers fc')
                    ->innerJoin('pg.FrameworkAcoes fa')
                    ->leftJoin('pg.PermissaoUsuario pu')
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

}