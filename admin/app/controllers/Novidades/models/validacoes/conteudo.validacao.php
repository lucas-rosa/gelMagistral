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
    public function validar($dados, $total_idiomas = null) {
        //Instancia a biblioteca de validação
        $ValidationLib = LibFactory::getInstance('validation', null, 'validation/Validation.class.php');

        //Busca os textos de idiomas
        $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        for ($a = 1; $a <= $total_idiomas; $a++) {
            //Executa a validação dos campos
            $ValidationLib->set($dados['dat_inicio_publicacao' . $a], $erro[28], 'dat_inicio_publicacao' . $a, 'msg_dat_inicio_publicacao' . $a)->obrigatorio()->datahoraminutosegundo()
                    ->set($dados['dat_termino_publicacao' . $a], $erro[29], 'dat_termino_publicacao' . $a, 'msg_dat_termino_publicacao' . $a)->obrigatorio()->datahoraminutosegundo()
                    ->set($dados['dat_data' . $a], $erro[30], 'dat_data' . $a, 'msg_dat_data' . $a)->obrigatorio()
                    ->set($dados['txt_titulo' . $a], $erro[5], 'txt_titulo' . $a, 'msg_txt_titulo' . $a)->obrigatorio()
                    ->set(str_replace("<p>&nbsp;</p>", "", $dados['txt_texto' . $a]), $erro[31], 'txt_texto' . $a, 'msg_txt_texto' . $a)->obrigatorio();
        }

        //Retorna os erros de validação
        return $ValidationLib->getErrors();
    }

}

?>