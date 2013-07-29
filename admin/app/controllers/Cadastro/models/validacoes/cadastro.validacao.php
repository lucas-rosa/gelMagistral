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
class CadastroValidacao
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
        $ValidationLib->set($dados['txt_nome'], $erro[10], 'txt_nome', 'msg_txt_nome')->obrigatorio()
                ->set($dados['cod_sexo'], $erro[54], 'cod_sexo', 'msg_cod_sexo')->obrigatorio()
                ->set($dados['txt_profissao'], $erro[55], 'txt_profissao', 'msg_txt_profissao')->obrigatorio()
                ->set($dados['dat_nascimento'], $erro[56], 'dat_nascimento', 'msg_dat_nascimento')->obrigatorio()
                ->set($dados['txt_cep'], $erro[19], 'txt_cep', 'msg_txt_cep')->obrigatorio()
                ->set($dados['txt_bairro'], $erro[20], 'txt_bairro', 'msg_txt_bairro')->obrigatorio()
                ->set($dados['txt_endereco'], $erro[17], 'txt_endereco', 'msg_txt_endereco')->obrigatorio()
                ->set($dados['txt_telefone'], $erro[23], 'txt_telefone', 'msg_txt_telefone')->obrigatorio()
                ->set($dados['txt_email'], $erro[57], 'txt_email', 'msg_txt_email')->obrigatorio();

        $ValidationLib->set(strip_tags($dados['txt_comentario']), $erro[59], 'txt_comentario', 'msg_txt_comentario')->obrigatorio();

        //Retorna os erros de validaчуo
        return $ValidationLib->getErrors();
    }
}
?>