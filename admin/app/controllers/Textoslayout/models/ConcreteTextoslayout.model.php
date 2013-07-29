<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteTextoslayout
 *
 * Esta classe e responsavel por todas as requisicoes a tabela TextosLayout
 * 
 * @package admin\app\controllers\TextosLayout\models\ConcreteTextosLayout
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteTextoslayout
{
                
        /**
         * Metodo getIdiomas
	 * 
	 * Retorna os dados dos idiomas.
         * Faz uma requisicao a tabela WebsiteIdiomas chamando o metodo getIdiomas
         * 
         * @return string[]
         * 
	 */            
	public function getIdiomas()
	{
		//Retorna os dados dos banners
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}
	
	/**
         * Metodo BuscarTextos
	 * 
	 * Busca todos os Textos cadastrado na tabela Textos.
         * Faz uma requisicao a tabela Textos chamando o metodo ExecuteBuscarTextos
         * 
         * @param string[] $parametros
         * 
         * @return string[]
         * 
	 */          
	public function BuscarTextos($parametros=null)
	{
		//Retorna os dados ao Controller
		//return TableFactory::getInstance('TextosLayout')->ExecuteBuscarTextos($parametros['idioma'],$parametros['termo']);
		return TableFactory::getInstance('TextosLayout')->ExecuteBuscarTextos();
	}
        
          /**
         * Metodo BuscarEdicaoId
	 * 
	 * Busca o texto cadastrado na tabela TextosLayout e edita conforme o Id passado por parametro.
         * Faz uma requisicao a tabela TextosLayout chamando o metodo SelectTextoIdRelacaoEdicao passando
         * o cod_relacao_idioma por parametro. 
         * 
         * @param string[] $parametros
         * 
         * @return string[]
         * 
	 */            
	public function BuscarEdicaoId($parametros)
	{
		$array_buscas = array();
		
		$dados_idioma = TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
		
                $flag = false;
                
		foreach($dados_idioma as $key => $idioma)
		{
			//Retorna os dados
			$dados_buscas = TableFactory::getInstance('TextosLayout')->SelectTextoIdRelacaoEdicao($parametros['cod_relacao_idioma'], $idioma['cod_id']);
				
                        if($dados_buscas != false)
                        {
                            $flag = true;
                            
			$array_buscas[$key]['txt_texto'] = $dados_buscas['txt_texto'];
			$array_buscas[$key]['cod_id'] = $dados_buscas['cod_id'];
			$array_buscas[$key]['cod_idioma'] = $idioma['cod_id'];
			$array_buscas[$key]['cod_relacao_idioma'] = $parametros['cod_relacao_idioma'];
			$array_buscas[$key]['txt_idioma'] = $idioma['txt_idioma'];
                        }
		}
                if($flag == true)
                {
                    return $array_buscas;
                }    
                else 
                {
                    return false;
                }
		
		//Retorna o resultado da consulta
	}
        
         /**
         * Metodo EditaTexto
	 * 
	 * Edita os textos.
         * Faz uma requisicao a tabela TextosLayout chamando o metodo EditaTextoLayout.
         * 
         * @param string[] $parametros dados do formulario
         * 
         * @return string[]
         * 
	 */        
	public function EditaTexto($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/textoslayout.validacao','TextoslayoutValidacao');

		//total de idiomas 
		$total = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());
		
		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros, $total);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//Instanciando a tabela de TextosLayouAdmin
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			$contar = 0;
			
			//Trata os dados antes de gravar no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			for($i = 1; $i <= $total; $i++)
			{
				if(TableFactory::getInstance('TextosLayout')->EditaTextoLayout($parametros, $i) === true)
				{
					$contar++;
				}
			}
			
			if($contar == $total)
			{
				//Mensagem de confirmação
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35], 'sucesso' => true);
					
				//Retorna para o javascript
				echo Zend_Json::encode(array("1"));	
			}
			else
			{
				//Mensagem de erro
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[90], 'erro' => true);
				
				//Retorna para o javascript
				echo Zend_Json::encode(array("1"));	
			}
		}
		else
		{		
			//Retorna os erros da validação
			echo Zend_Json::encode($resultado_validacao);
		}
	}
}
?>