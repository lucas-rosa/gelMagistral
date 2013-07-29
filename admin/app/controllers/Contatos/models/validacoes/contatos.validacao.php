<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ValidacaoCadastro
 *
 * Classe para validacao do formulario de cadastro.
 * 
 * @package admin\app\controllers\Contatos\models\validacoes\contatos.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ContatosValidacao {

    /**
     * Metodo ValidarFormulario
     *
     * O metodo ValidarFormulario e responsavel por fazer a validacao dos campos do formulario
     * de contato. 
     * Primeiro Instancia a tabela de TextosLayoutAdmin armazenando na variavel $erro.
     * Por fim valida todos os campos 
     * 
     * @param string[] $dado
     * @param string[] $total_idiomas
     * @link http://php.net/manual/pt_BR/function.strip-tags.php strip_tags
     * 
     * @return string[]
     */
    public function ValidarFormulario($dado, $total_idiomas = null) {
        //Instancia a biblioteca de validação
        $Validation = LibFactory::getInstance('validation', null, 'validation/Validation.class.php');

        //Instanciando a tabela de TextosLayouAdmin
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        for ($a = 1; $a <= $total_idiomas; $a++) {
            $Validation->set($dado['txt_endereco' . $a], $erro[17], 'txt_endereco.$a', 'msg_erro_txt_endereco' . $a)->obrigatorio()
                    ->set($dado['txt_numero' . $a], $erro[18], 'txt_numero' . $a, 'msg_erro_txt_numero' . $a)->obrigatorio()
                    ->set($dado['txt_cep' . $a], $erro[19], 'txt_cep' . $a, 'msg_erro_txt_cep' . $a)->obrigatorio()
                    ->set($dado['txt_bairro' . $a], $erro[20], 'txt_bairro' . $a, 'msg_erro_txt_bairro' . $a)->obrigatorio()
                    ->set($dado['cod_estado' . $a], $erro[21], 'cod_estado' . $a, 'msg_erro_cod_txt_estado' . $a)->obrigatorio()
                    ->set($dado['cod_cidade' . $a], $erro[22], 'cod_cidade' . $a, 'msg_erro_cod_txt_cidade' . $a)->obrigatorio()
                    ->set($dado['txt_telefone' . $a], $erro[23], 'txt_telefone' . $a, 'msg_erro_txt_telefone' . $a)->obrigatorio()
                    ->set($dado['txt_pais' . $a], $erro[99], 'txt_pais' . $a, 'msg_erro_txt_pais' . $a)->obrigatorio()
                    ->set($dado['cod_latitude' . $a], $erro[24], 'cod_latitude' . $a, 'msg_erro_latitude' . $a)->obrigatorio()
                    ->set($dado['cod_longitude' . $a], $erro[25], 'cod_longitude' . $a, 'msg_erro_longitude' . $a)->obrigatorio();
        }

        //Retorna o array de erros
        return $Validation->getErrors();
    }

}

?>
