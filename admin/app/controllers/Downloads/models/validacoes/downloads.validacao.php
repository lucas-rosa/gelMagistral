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
 * Classe para validacao do formulario de downloads.
 * 
 * @package admin\app\controllers\Downloads\models\validacoes\downloads.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConteudoValidacao
{   
    /**
     * Metodo validarIncluir
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de downloads. 
     * 
     * @param string[] $dados
     * 
     * @return string[]
     */
    public function validarIncluir($dados)
    {
        //Instancia a biblioteca de validaчуo
        $ValidationLib = LibFactory::getInstance('Validation', null, 'validation/Validation.class.php');

        //Busca os textos de idiomas
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        //Executa a validaчуo dos campos
        $ValidationLib	->set($dados['txt_titulo'], $erro[5], 'txt_titulo', 'msg_txt_titulo')->obrigatorio()
        				->set($_FILES['txt_arquivo']['name'], $erro[68],'txt_arquivo', 'msg_txt_arquivo')->obrigatorio();

        //Retorna os erros de validaчуo
        return $ValidationLib->getErrors();
    }

}

?>