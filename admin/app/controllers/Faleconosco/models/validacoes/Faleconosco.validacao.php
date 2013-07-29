<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe TextosValidacao
 *
 * Classe para validacao do formulario Faleconosco.
 * 
 * @package admin\app\controllers\Faleconosco\models\validacoes\Faleconosco.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class TextosValidacao {

    /**
     * Metodo validar
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de Faleconosco. 
     * 
     * @param string[] $dados
     * @param string[] $total
     * 
     * @return string[]
     */
    public function validar($dados, $total = null) {
        //Instancia a biblioteca de validação
        $ValidationLib = LibFactory::getInstance('Validation', null, 'validation/Validation.class.php');

        //Busca os textos de idiomas
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        for ($a = 1; $a <= $total; $a++) {
            //Executa a validação dos campos
            $ValidationLib->set($dados['txt_titulo' . $a], $erro[5], 'txt_titulo' . $a, 'msg_txt_titulo' . $a)->obrigatorio()
                    ->set($dados['txt_texto' . $a], $erro[31], 'txt_texto' . $a, 'msg_txt_texto' . $a)->obrigatorio();
        }

        //Retorna os erros de validação
        return $ValidationLib->getErrors();
    }

}

?>