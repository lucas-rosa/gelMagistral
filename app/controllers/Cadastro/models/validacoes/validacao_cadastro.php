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
 * Classe para validacao do formulario de cadastro de candidatos.
 * 
 * @package app\controllers\Cadastro\models\validacoes\validacao_cadastro
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ValidacaoCadastro
{
    /**
     * Metodo Validar
     *
     * O metodo validar e responsavel por fazer a validacao dos campos do formulario
     * de cadastro de candidatos.
     * Primeiro Instancia a tabela de Textos Layout armazenando na variavel $textosLayout.
     * Depois Pega os textos de acordo com o idioma selecionado e armazena na variavel $erro.
     * Por fim valida todos os campos 
     * 
     * @param string[] $PostData
     * 
     * @return string
     */
    public function Validar($PostData)
    {
        //Instanciou a classe de validaчуo genщrica
        $ClasseValidacao = LibFactory::getInstance('Validation', null, 'validation/Validation.class.php');

        //Instancia a tabela de Textos Layout
        $textosLayout = TableFactory::getInstance('TextosLayout');
        //Pega os textos de acordo com o idioma selecionado
        $erro = $textosLayout->getLayoutTexts();

        //Validamos os campos
        $ClasseValidacao
        	->set($PostData['txt_nome'], $erro[4], 'txt_nome', 'msg_txt_nome')->obrigatorio()
            ->set($PostData['txt_email'], $erro[13], 'txt_email', 'msg_txt_email')->email()//primeiro ->email e depois ->obrigatorio
            ->set($PostData['txt_email'], $erro[5], 'txt_email', 'msg_txt_email')->obrigatorio()
            ->set($PostData['dat_nascimento'], $erro[33], 'dat_nascimento', 'msg_dat_nascimento')->data()
            ->set($PostData['dat_nascimento'], $erro[32], 'dat_nascimento', 'msg_dat_nascimento')->obrigatorio()
            ->set($PostData['txt_profissao'], $erro[35], 'txt_profissao', 'msg_txt_profissao')->obrigatorio()
            ->set($PostData['txt_cep'], $erro[34], 'txt_cep', 'msg_txt_cep')->obrigatorio()
            ->set($PostData['txt_endereco'], $erro[36], 'txt_endereco', 'msg_txt_endereco')->obrigatorio()
            ->set($PostData['txt_bairro'], $erro[37], 'txt_bairro', 'msg_txt_bairro')->obrigatorio()
            ->set($PostData['cod_estado'], $erro[38], 'cod_estado', 'msg_cod_estado')->obrigatorio()
            ->set($PostData['cod_cidade'], $erro[39], 'cod_cidade', 'msg_cod_cidade')->obrigatorio()
            ->set($PostData['txt_telefone'], $erro[40], 'txt_telefone', 'msg_txt_telefone')->obrigatorio()
            ->set($PostData['txt_comentario'], $erro[41], 'txt_comentario', 'msg_txt_comentario')->obrigatorio()
            ->set($PostData['captcha'], $erro[8], 'captcha', 'msg_captcha')->obrigatorio()
            ->set($PostData['captcha'], $erro[14], 'captcha', 'msg_captcha')->captcha($_SESSION['captcha']);

        //Retorna o array de erros
        return $ClasseValidacao->getErrors();
    }
}
?>