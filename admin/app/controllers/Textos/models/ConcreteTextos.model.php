<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteTextos
 *
 * Esta classe e responsavel por todas as requisicoes a tabela Textos
 * 
    * @package admin\app\controllers\Textos\models\ConcreteTextos
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteTextos
{
	/*public function getIdiomas()
	 {
		//Retorna os dados dos banners
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
		}*/
    
                
        /**
         * Metodo BuscarEdicaoId
	 * 
	 * Busca o texto cadastrado na tabela Textos e edita conforme o Id passado por parametro.
         * Faz uma requisicao a tabela Textos chamando o metodo SelectTextoIdRelacaoEdicao
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

		foreach($dados_idioma as $key => $idioma)
		{
			//Retorna os dados
			$dados_buscas = TableFactory::getInstance('Textos')->SelectTextoIdRelacaoEdicao($parametros['cod_relacao_idioma'], $idioma['cod_id']);
				
			$array_buscas[$key]['txt_titulo'] = htmlentities($dados_buscas['txt_titulo'], ENT_QUOTES);
			$array_buscas[$key]['txt_texto'] = htmlentities($dados_buscas['txt_texto'], ENT_QUOTES);
			$array_buscas[$key]['cod_id'] = $dados_buscas['cod_id'];
			$array_buscas[$key]['cod_idioma'] = $idioma['cod_id'];
			$array_buscas[$key]['cod_relacao_idioma'] = $parametros['cod_relacao_idioma'];
			$array_buscas[$key]['txt_idioma'] = $idioma['txt_idioma'];
			$array_buscas[$key]['img_texto'] = $dados_buscas['img_texto'];
			$array_buscas[$key]['img_texto_cropado'] = $dados_buscas['img_texto_cropado'];
		}
		if(!empty($array_buscas[0]['txt_titulo']))
		{
			return $array_buscas;
		}
		else
		{
			return false;
		}
		
		
	}

	          
        /**
         * Metodo BuscarTextos
	 * 
	 * Busca todos os Textos cadastrado na tabela Textos.
         * Faz uma requisicao a tabela Textos chamando o metodo ExecuteBuscarTextos
         * 
         * @return string[]
         * 
	 */            
	public function BuscarTextos()
	{
		//Retorna os dados ao Controller
		return TableFactory::getInstance('Textos')->ExecuteBuscarTextos();
	}
        
        
                
        /**
         * Metodo BuscarDetalhes
	 * 
	 * Busca os textos conforme o idioma.
         * Faz uma requisicao a tabela Textos chamando o metodo ExecutegetTexto 
         * passando o cod_relacao_idioma por parametro.
         * 
         * @param string[] $parametros cod_relacao_idioma
         * 
         * @return string[]
         * 
	 */        
	public function BuscarDetalhes($parametros)
	{
		//Retorna os dados
		return TableFactory::getInstance('Textos')->ExecutegetTexto($parametros['cod_relacao_idioma']);
	}
        
         /**
         * Metodo BuscarDetalhes
	 * 
	 * Edita os textos.
         * Faz uma requisicao a tabela Textos chamando o metodo ExecuteEditaTexto.
         * 
         * @param string[] $parametros dados do formulario
         * 
         * @return string[]
         * 
	 */        
	public function editaTexto($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/textos.validacao','TextosValidacao');

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
				$parametros['txt_texto'.$i] = str_replace("<p>&nbsp;</p>", "", $parametros['txt_texto'.$i]);
				if(TableFactory::getInstance('Textos')->ExecuteEditaTexto($parametros, $i) === true)
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

	  /**
	 * Metodo salvarImagemOriginal
         * 
	 * Salva a imagem original no banco de dados
         * Instancia o helper imagem e armazena na variavel $imagemhelper,
         * chama o metodo setSetdados e setUploadImagemOriginal
         * 
	 * @param string[] $parametros
         *
	 */
	public function salvarImagemOriginal($parametros)
	{
		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setSetDados($parametros['diretorio'],  $parametros['tamanho_maximo']);
		$imagemHelper->setUploadImagemOriginal();
	}
	
         /**
	 * Metodo salvarCropadaEdt
         * 
	 * Edita imagem cropada
         * Instancia o helper imagem e armazena na variavel $imagemhelper,
         * chama o metodo setSetdados e setSalvarImagemCropadaEdicao
         * 
	 * @param string[] $parametros
         *
	 */
	public function salvarCropadaEdt($parametros)
	{
		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setSetDados($parametros['diretorio'], $parametros['tamanho_maximo']);
		$imagemHelper->setSalvarImagemCropadaEdicao();
	}
        
        /**
	 * Metodo deletimg
         * 
	 * Deleta imagem original e cropada
         * Faz uma requisicao a tabela Noticias chamando o metodo DeletarImagemBanco
         * passando a imagem original, imagem cropada e o Id por parametro.
         * 
	 * @param string[] $parametros
         *
	 */
	public function deletimg($parametros)
	{
		unlink(ARQ_DIN.$_POST['nome_imagem_original']);
		unlink(ARQ_DIN.$_POST['nome_imagem_cropada']);
		$exclusao = TableFactory::getInstance('Textos')->DeletarImagemBanco($_POST['nome_imagem_original'], $_POST['nome_imagem_cropada'], $_POST['id']);

		if($exclusao == true)
		{
			echo "Dados excluidos com sucesso do banco de dados";
		}
		else
		{
			echo "Ocorreu um erro na exclusao do banco de dados";
		}
	}
        
         /**
	 * Metodo incluirImagemBancoEdicao
         * 
	 * Altera a imagem original e cropada
         * Faz uma requisicao a tabela Noticias chamando o metodo AlteraImagem
         * passando a imagem original, imagem cropada e o Id por parametro.
         * 
	 */
	public function incluirImagemBancoEdicao()
	{
		unset($_SESSION['randomico']);
		$_SESSION['user_file_ext'] = "";
		$edicao_imagem = TableFactory::getInstance('Textos')->AlteraImagem($_POST['campo_imagem_original'], $_POST['campo_imagem_cropada'], $_POST['id']);
	}
        
         /**
	 * Metodo cancelarUpload
         * 
	 * Cancela o upload e evita o cadastro no banco
         * 
	 */
	public function cancelarUpload()
	{
		unlink(ARQ_DIN.$_POST['imagem_original']);
		unset($_SESSION['randomico']);
		$_SESSION['user_file_ext'] = "";
	}

        /**
	 * Metodo salvarRecropagem
         * 
	 * Recropa a imagem original 
         * Primeiro apaga a pasta da imagem cropada anterior(unlink).
         * Apos chama a tabela noticias e o metodo recropar passando imagem_cropada_banco e o nome_imagem_cropada
         * por parametro. 
         * Por ultimo Instancia o helper imagem e armazena na variavel $imagemhelper,
         * chama o metodo setSetdados e recroparImagem
         * 
	 * @param string[] $parametros
         *
	 */
	public function salvarRecropagem($parametros)
	{
		$explosao_imagem_original = explode(".", $_POST['imagem_original_banco']);
		$extensao = $explosao_imagem_original[1];

		$nome_imagem_cropada = "cropado_".date('d').date('m').date('Y').date('H').date('i').date('s').".".$extensao;
		unlink(ARQ_DIN.$_POST['imagem_cropada_banco']);

		TableFactory::getInstance('Textos')->recropar($_POST['imagem_cropada_banco'], $nome_imagem_cropada);

		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setSetDados($parametros['diretorio'], $parametros['tamanho_maximo']);
		$imagemHelper->recroparImagem($nome_imagem_cropada);
	}
	//Fim dos métodos do plugin de imagem
}
?>