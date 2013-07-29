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
class AlterarsenhaValidacao
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
		
        //Seta as mensagens de erro
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        //Executa a validaчуo dos campos
        $ValidationLib->set($dados['txt_senha'], $erro[14], 'txt_senha', 'msg_txt_senha')->obrigatorio()
                    ->set($dados['txt_senha_confirmacao'], $erro[15], 'txt_senha_confirmacao', 'msg_txt_senha_confirmacao')->obrigatorio()
                    ->set($dados['txt_senha_confirmacao'], $erro[16], 'txt_senha_confirmacao', 'msg_txt_senha_confirmacao')->CompararSenha($dados['txt_senha'], $dados['txt_senha_confirmacao']);
        //Retorna os erros de validaчуo
        return $ValidationLib->getErrors();
    }
}
?>