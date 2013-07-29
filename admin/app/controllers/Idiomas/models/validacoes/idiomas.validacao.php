<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ValidacaoIdiomas
 *
 * Classe para validacao do formulario de Idiomas.
 * 
 * @package admin\app\controllers\Idiomas\models\validacoes\idiomas.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ValidacaoIdiomas {

    /**
     * Metodo validar
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de Idiomas. 
     * 
     * @param string[] $dados
     * 
     * @return string[]
     */
    public function Validar($dados) {
        //Instancia a biblioteca de validaчуo
        $ValidationLib = LibFactory::getInstance('Validation', null, 'validation/Validation.class.php');

        //Busca os textos de erro
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        //Executa a validaчуo dos campos
        $ValidationLib->set($dados['txt_idioma'], $erro[32], 'txt_idioma', 'msg_txt_idioma')->obrigatorio()
                ->set($dados['txt_meta'], $erro[33], 'txt_meta', 'msg_txt_meta')->obrigatorio();

        //Retorna os erros de validaчуo
        return $ValidationLib->getErrors();
    }

}

?>