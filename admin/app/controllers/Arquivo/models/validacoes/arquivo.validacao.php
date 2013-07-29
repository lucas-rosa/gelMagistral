<?php

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
 * @package admin\app\controllers\Cadastro\models\validacoes\cadastro.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ArquivoValidacao
{
    /**
     * Metodo Validar
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de cadastro. 
     * Primeiro Instancia a tabela de TextosLayoutAdmin armazenando na variavel $erro.
     * Por fim valida todos os campos 
     * 
     * @param string[] $dados
     * @link http://php.net/manual/pt_BR/function.strip-tags.php strip_tags
     * 
     * @return string[]
     */
    public function validar($dados)
    {
        //Instancia a biblioteca de validaчуo
        $ValidationLib = LibFactory::getInstance('Validation', null, 'validation/Validation.class.php');

        //Busca os textos de idiomas
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        //Executa a validaчуo dos campos
        $ValidationLib	->set($dados['txt_titulo'], 'Informe o titulo', 'txt_titulo', 'msg_txt_titulo')->obrigatorio()
        				->set($_FILES['afile']['name'], 'Extensуo incorreta', 'afile', 'msg_afile')->arquivo("jpeg ,tiff, bmp ,png, gif")
        				->set($_FILES['afile']['name'], 'Inclua um arquivo', 'afile', 'msg_afile')->obrigatorio();
        				
        //Retorna os erros de validaчуo
        return $ValidationLib->getErrors();
    }
}
?>