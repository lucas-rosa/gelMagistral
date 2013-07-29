<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConfiguracoesValidacao
 *
 * Classe para validacao do formulario Newsletter.
 * 
 * @package admin\app\controllers\Configuracoes\models\validacoes\configuracoes.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConfiguracoesValidacao {

    /**
     * Metodo Validar
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de Newsletter. 
     * 
     * @param string[] $dado
     * 
     * @return string[]
     */
    public function Validar($dado) {
        $Validation = LibFactory::getInstance('validation', null, 'validation/Validation.class.php');

        //Instanciando a tabela de TextosLayou
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        $Validation->set($dado['txt_default_title'], $erro[5], 'txt_default_title', 'msg_txt_default_title')->obrigatorio()
                ->set($dado['cod_idioma_default'], $erro[32], 'cod_idioma_default', 'msg_cod_idioma_default')->obrigatorio()
                ->set($dado['txt_default_key'], $erro[6], 'txt_default_key', 'msg_txt_default_key')->obrigatorio()
                ->set($dado['txt_default_desc'], $erro[7], 'txt_default_desc', 'msg_txt_default_desc')->obrigatorio()
                ->set($dado['txt_email_webmaster'], $erro[8], 'txt_email_webmaster', 'msg_txt_email_webmaster')->obrigatorio();

        //Retorna o array de erros
        return $Validation->getErrors();
    }

}

?>
