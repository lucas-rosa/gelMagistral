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
 * Classe para validacao do formulario de Textos.
 * 
 * @package admin\app\controllers\Textos\models\validacoes\textos.validacao
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class TextosValidacao
{
	/**
	 * Metodo validar
         * 
	 * Validar os dados. Se eles forem vazios mostra uma mensagem de erro.
	 * 
         * @param string[] $dados
         * @param string[] $total
         * 
         * @return string[]
         */
	public function validar($dados, $total=null)
	{
		//Instancia a biblioteca de validação
		$ValidationLib = LibFactory::getInstance('Validation',null,'validation/Validation.class.php');
		
		//Busca os textos de idiomas
		$erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
		
		for($a = 1; $a<=$total; $a++)
		{
			//Executa a validação dos campos
			$ValidationLib->set($dados['txt_titulo'.$a],$erro[5],'txt_titulo'.$a, 'msg_txt_titulo'.$a)->obrigatorio()
						  ->set(str_replace("<p>&nbsp;</p>", "", $dados['txt_texto'.$a]),$erro[31],'txt_texto'.$a, 'msg_txt_texto'.$a)->obrigatorio(); 
		}		  
					  					  
		//Retorna os erros de validação
		return $ValidationLib->getErrors();
	}
}
?>