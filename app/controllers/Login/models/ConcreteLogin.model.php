<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteLogin
 *
 * Esta classe extende a Usuarios sendo responsavel
 * por todas as requisicoes a tabela Usuarios da base de dados.
 * 
 * @package app\controllers\Login\models\ConcreteLogin
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteLogin extends Usuarios {
    
    /**
     * Metodo Logado
     *
     * Metodo responsavel por enviar o login e a senha para o authHelper e fazer
     * todas as verificacoes necessarias para o usuario se logar ao painel de controle.
     * 
     * Estancia o auth e armazena na variavel $helper. Envia o login e senha
     * digitados para os metodos setUser e setPass apos chama o metodo login.
     * 
     * @param string[] $parametros 
     * 
     */
    public function Logado($parametros) {
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