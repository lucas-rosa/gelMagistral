<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe SeoValidacao
 *
 * Classe para validacao do formulario de seo.
 * 
 * @package admin\app\controllers\Seo\models\validacoes\seo.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class SeoValidacao {

    /**
     * Metodo validar
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de seo. 
     * 
     * @param string[] $dados
     * 
     * @return string[]
     */
    public function validar($dados) {
        //Instancia a biblioteca de validaчуo
        $ValidationLib = LibFactory::getInstance('Validation', null, 'validation/Validation.class.php');

        //Busca os textos de idiomas
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        //Executa a validaчуo dos campos
        $ValidationLib->set($dados['url_caminho'], $erro[26], 'url_caminho', 'msg_url_caminho')->obrigatorio()
                ->set($dados['txt_title'], $erro[5], 'txt_title', 'msg_txt_title')->obrigatorio()
                ->set($dados['txt_keywords'], $erro[27], 'txt_keywords', 'msg_txt_keywords')->obrigatorio()
                ->set($dados['txt_description'], $erro[7], 'txt_description', 'msg_txt_description')->obrigatorio();

        //Retorna os erros de validaчуo
        return $ValidationLib->getErrors();
    }

}

?>