<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ValidacaoPerfis
 *
 * Classe para validacao do formulario de perfis.
 * 
 * @package admin\app\controllers\Perfis\models\validacoes\perfis.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ValidacaoPerfis {

    /**
     * Metodo validar
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de perfis. 
     * 
     * @param string[] $dados
     * 
     * @return string[]
     */
    public function Validar($dados) {
        $Validation = LibFactory::getInstance('validation', null, 'validation/Validation.class.php');

        //Instanciando a tabela de TextosLayou
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        $Validation->set($dados['txt_perfil'], $erro[37], 'txt_perfil', 'msg_txt_perfil')->obrigatorio();

        //Retorna o array de erros
        return $Validation->getErrors();
    }

}

?>