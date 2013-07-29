<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConteudoValidacao
 *
 * Classe para validacao do formulario de conteudo.
 * 
 * @package admin\app\controllers\Noticias\models\validacoes\conteudo.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConteudoValidacao {

    /**
     * Metodo validar
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de conteudo. 
     * 
     * @param string[] $dados
     * @param string[] $total_idiomas
     * 
     * @return string[]
     */
    public function validar($dados) {
        //Instancia a biblioteca de validação
        $ValidationLib = LibFactory::getInstance('validation', null, 'validation/Validation.class.php');

        //Busca os textos de idiomas
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();


        //Executa a validação dos campos
        $ValidationLib->set($dados['cod_idioma'], $erro[32], 'cod_idioma', 'msg_cod_idioma')->obrigatorio()
                      ->set($dados['dat_data'], $erro[30], 'dat_data', 'msg_dat_data')->obrigatorio()
                      ->set($dados['txt_titulo'], $erro[5], 'txt_titulo', 'msg_txt_titulo')->obrigatorio()
                      ->set(str_replace("<p>&nbsp;</p>", "", $dados['txt_texto']), $erro[31], 'txt_texto', 'msg_txt_texto')->obrigatorio();


        //Retorna os erros de validação
        return $ValidationLib->getErrors();
    }

}

?>