<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe LoginValidacao
 *
 * Classe para validacao do formulario de Usuarios.
 * 
 * @package app\controllers\Login\models\validacoes\login.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class LoginValidacao {

    /**
     * Metodo ValidarFormulario
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de usuarios.
     * Primeiro Instancia a tabela de Textos Layout armazenando na variavel $textosLayout.
     * Depois faz o select para buscar o conteudo e armazena na variavel $erro.
     * Por fim valida todos os campos 
     * 
     * @param string[] $dados
     * 
     * @return string
     */
    public function ValidarFormulario($dados) {
        
        $Validation = LibFactory::getInstance('validation', null, 'validation/Validation.class.php');

        //Instanciando a tabela de TextosLayou
        $TabelaTextosLayou = TableFactory::getInstance('TextosLayout');

        //faz o select para buscar o conteúdo
        $erro = $TabelaTextosLayou->getLayoutTexts();

        $Validation->set($dados['txt_login'], $erro[25], 'txt_login', 'msg_erro_login')->obrigatorio()
                ->set($dados['txt_senha'], $erro[26], 'txt_senha', 'msg_erro_senha')->obrigatorio();

        //Retorna o array de erros
        return $Validation->getErrors();
    }

}

?>
