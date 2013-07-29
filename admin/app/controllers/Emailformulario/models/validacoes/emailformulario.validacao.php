<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe EmailValidacao
 *
 * Classe para validacao do formulario de Email.
 * 
 * @package admin\app\controllers\Emailformulario\models\validacoes\emailformulario.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class EmailValidacao {

    /**
     * Metodo ValidarFormulario
     *
     * O metodo ValidarFormulario e responsavel por fazer a validacao dos campos do formulario
     * de Emails. 
     * 
     * @param string[] $dados
     * 
     * @return string[]
     */
    public function ValidarFormulario($dados) {
        //Instancia a biblioteca de validaчуo
        $Validation = LibFactory::getInstance('Validation', null, 'validation/Validation.class.php');

        //Instanciando a tabela de TextosLayouAdmin
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        //Executa a validaчуo dos campos
        $Validation->set($dados['txt_email'], $erro[57], 'txt_email', 'msg_txt_email')->obrigatorio()
                ->set($dados['txt_email'], $erro[13], 'txt_email', 'msg_txt_email')->email()
                ->set($dados['txt_formulario'], $erro[67], 'txt_formulario', 'msg_txt_formulario')->obrigatorio();

        //Retorna os erros de validaчуo
        return $Validation->getErrors();
    }

}

?>