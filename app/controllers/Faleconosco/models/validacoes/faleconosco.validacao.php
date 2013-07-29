<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe FaleconoscoValidacao
 *
 * Classe para validacao do formulario de contato.
 * 
 * @package app\controllers\Faleconosco\models\validacoes\faleconosco.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class FaleconoscoValidacao {

    /**
     * Metodo ValidarFormulario
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de contato.
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

        //Instanciando a tabela de TextosLayout
        $TabelaTextosLayou = TableFactory::getInstance('TextosLayout');

        //faz o select para buscar o conteúdo
        $erro = $TabelaTextosLayou->getLayoutTexts();

        $Validation->set($dados['txt_nome'], $erro[4], 'txt_nome', 'msg_txt_nome')->obrigatorio()
                ->set($dados['txt_email'], $erro[13], 'txt_email', 'msg_txt_email')->email()
                ->set($dados['txt_email'], $erro[5], 'txt_email', 'msg_txt_email')->obrigatorio()
                ->set($dados['txt_telefone'], $erro[11], 'txt_telefone', 'msg_txt_telefone')->obrigatorio()
                ->set($dados['txt_assunto'], $erro[6], 'txt_assunto', 'msg_txt_assunto')->obrigatorio()
                ->set($dados['txt_mensagem'], $erro[7], 'txt_mensagem', 'msg_txt_mensagem')->obrigatorio()
                ->set($dados['captcha'], $erro[8], 'captcha', 'msg_captcha')->obrigatorio()
                ->set($dados['captcha'], $erro[14], 'captcha', 'msg_captcha')->captcha($_SESSION['captcha']);

        //Retorna o array de erros
        return $Validation->getErrors();
    }

}

?>