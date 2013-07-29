<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteIndex
 *
 * Esta classe extende a tabela Usuarios, sendo responsavel por todos as requisicaoes 
 * ao banco de dados.
 * 
 * @package admin\app\controllers\Index\models\ConcreteIndex
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteIndex extends Usuarios 
{
     /**
     * Metodo Login
     *
     * Metodo responsavel por enviar o login e a senha para o authHelper e fazer
     * todas as verificacoes necessarias para o usuario se logar ao painel de controle.
     * 
     * Estancia o auth e armazena na variavel $helper. Envia o login e senha
     * digitados para os metodos setUser e setPass apos chama o metodo login.
     *  
     * @param string[] $parametros 
     */  
    public function Login($parametros) {
        $helper = HelperFactory::getInstance('auth');

        //manda o login para o authHelper
        $helper->setUser($parametros['txt_login']);

        //manda a senha para o authHelper
        $helper->setPass($parametros['txt_senha']);

        //chama o metodo login
        $helper->login();
    }

}

?>