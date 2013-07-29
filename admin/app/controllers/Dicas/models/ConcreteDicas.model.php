<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteDicas
 *
 * Esta classe e responsavel por todas as requisicoes a tabela Dicas
 *
 * @package admin\app\controllers\Dicas\models\ConcreteDicas
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteDicas
{
	/**
	 * Metodo getIdiomas
	 *
	 * Seleciona quantos idiomas tem na tabela websiteIdiomas.
	 * Faz uma requisicao a tabela WebsiteIdiomas chamando o metodo getIdiomas
	 *
	 * @return string[]
	 *
	 */
	public function getIdiomas()
	{
		//Retorna os dados dos Conteudos
		return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	}

	/**
	 * Metodo SelectConteudo
	 *
	 * Seleciona todas as dicas da tabela dicas.
	 * Faz uma requisicao a tabela Dicas chamando o metodo SelectDicas
	 *
	 * @return string[]
	 */
	public function SelectConteudo()
	{
		return TableFactory::getInstance('Dicas')->SelectDicas();
	}

	/**
	 * Metodo SelectDicaRelacaoIdEditar
	 *
	 * Seleciona a dica selecionada conforme o cod_id e passado por parametro
	 * Faz uma requisicao a tabela Dicas chamando o metodo SelectDicasIdRelacaoEdicao
	 *
	 * @param string[] $parametros cod_relacao_idioma
	 *
	 * @return string[]
	 */
	public function SelectDicaRelacaoIdEditar($parametros)
	{
              //Retorna os dados
              return TableFactory::getInstance('Dicas')->SelectDicasIdRelacaoEdicao($parametros);
			      
	}

	/**
	 * Metodo SelectDicaRelacaoId
	 *
	 * Em detalhes mostra os dados da dica selecionada
	 * Faz uma requisicao a tabela Dicas chamando o metodo SelectDicaRelacaoId
	 * passando o Id por parametro.
	 *
	 * @param string[] $parametros cod_id
	 *
	 * @return string[]
	 */
	public function SelectDicaRelacaoId($parametros)
	{
		//Retorna os dados
		return TableFactory::getInstance('Dicas')->SelectDicasRelacaoId($parametros);
	}

	/**
	 * Metodo IncluirDica
	 *
	 * Inclui uma nova dica.
	 * Faz uma requisicao a tabela Dicas chamando o metodo IncluirDica
	 * passando os dados por parametro.
	 *
	 * @param string[] $parametros todos os dados vindos do formulario
	 *
	 * @return string[]
	 */
	public function IncluirDica($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o Helper
		$Helper = HelperFactory::getInstance();

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/conteudo.validacao','ConteudoValidacao');

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//Trata os valores que vão ser incluidos no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
				
			//Formata os dados para gravar no banco
			$parametros['dat_data'] = HelperFactory::getInstance()->FormataData($parametros['dat_data'],'usa');
			
			TableFactory::getInstance('Dicas')->IncluirDica($parametros);
				
			//Busca os textos de erro
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

			//Mensagem de confirmação via SESSION(usar sempre o indice view_data)
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[36], 'sucesso' => true);

			//Retorna true em caso de sucesso
			echo Zend_Json::encode(array('1'));
		}
		else
		{
			//Resposta do JSON
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	/**
	 * Metodo EditaDica
	 *
	 * Edita a noticia selecionada.
	 * Faz uma requisicao a tabela Dicas chamando o metodo EditaDica
	 * passando os dados por parametro.
	 *
	 * @param string[] $parametros dados vindos do formulario
	 *
	 * @return string[]
	 */
	public function EditaDica($parametros)
	{
               
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/conteudo.validacao','ConteudoValidacao');

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//Instanciando a tabela de TextosLayouAdmin
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
			//Trata os valores
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
				
                        //Formata os dados para gravar no banco
			$parametros['dat_data'] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_data'],'usa');
					
			if(TableFactory::getInstance('Dicas')->EditaDica($parametros) === true)
			{
				//Mensagem de confirmação
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35], 'sucesso' => true);
					
				//Retorna para o javascript
				echo Zend_Json::encode(array("1"));
			}
			else
			{
				//Mensagem de erro
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[58], 'erro' => true);

				//Retorna para o javascript
				echo Zend_Json::encode(array("1"));
			}
		}
		else
		{
			//Retorna falso em caso de erro
			echo Zend_Json::encode($resultado_validacao);
		}
	}

	/**
	 * Metodo ExcluirDica
	 *
	 * Excluir a noticia selecionada.
	 * Faz uma requisicao a tabela Dicas chamando o metodo ExcluirDica
	 * passando o id e o cod_relacao_idioma por parametro.
	 *
	 * @param string[] $parametros cod_relacao_idioma
	 *
	 * @return string[]
	 */
	public function ExcluirDica($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//faz a exclusão
		$dados = TableFactory::getInstance('Dicas')->ExcluirDicaId($parametros['cod_id']);

		//Instancia a mensagem
		$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

		//mensagem se a exclusão der certo
		if($dados === true)
		{
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34], 'sucesso' => true);
				
			echo Zend_Json::encode(array("1"));
		}
		//mensagem se a exclusão der errado
		elseif($dados === false)
		{
			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[60], 'erro' => true);
				
			echo Zend_Json::encode(array("1"));
		}
	}

	//Métodos utilizados pelo plugin de upload de imagens

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
		$imagemHelper->setSetDados($parametros['diretorio'], $parametros['tamanho_maximo']);
		$imagemHelper->setUploadImagemOriginal();
	}

	/**
	 * Metodo salvarCropadaInc
	 *
	 * Salva a imagem cropada no banco de dados
	 * Instancia o helper imagem e armazena na variavel $imagemhelper,
	 * chama o metodo setSetdados e setSalvarImagemCropadaInclusao
	 *
	 * @param string[] $parametros
	 *
	 */
	public function salvarCropadaInc($parametros)
	{
		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setSetDados($parametros['diretorio'], $parametros['tamanho_maximo']);
		$imagemHelper->setSalvarImagemCropadaInclusao();
	}

	/**
	 * Metodo deletarImagemInc
	 *
	 * Deleta a imagem do banco de dados
	 * Instancia o helper imagem e armazena na variavel $imagemhelper,
	 * chama o metodo setSetdados e setDeletarImagemInc
	 *
	 * @param string[] $parametros
	 *
	 */
	public function deletarImagemInc($parametros)
	{
		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setSetDados($parametros['diretorio'], $parametros['tamanho_maximo']);
		$imagemHelper->setDeletarImagemInc();
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
	 * Faz uma requisicao a tabela Dicas chamando o metodo DeletarImagemBanco
	 * passando a imagem original, imagem cropada e o Id por parametro.
	 *
	 * @param string[] $parametros
	 *
	 */
	public function deletimg($parametros)
	{
		unlink(ARQ_DIN.$_POST['nome_imagem_original']);
		unlink(ARQ_DIN.$_POST['nome_imagem_cropada']);
		$exclusao = TableFactory::getInstance('Dicas')->DeletarImagemBanco($_POST['nome_imagem_original'], $_POST['nome_imagem_cropada'], $_POST['id']);

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
	 * Faz uma requisicao a tabela Dicas chamando o metodo AlteraImagem
	 * passando a imagem original, imagem cropada e o Id por parametro.
	 *
	 */
	public function incluirImagemBancoEdicao()
	{
		unset($_SESSION['randomico']);
		$_SESSION['user_file_ext'] = "";
		$edicao_imagem = TableFactory::getInstance('Dicas')->AlteraImagem($_POST['campo_imagem_original'], $_POST['campo_imagem_cropada'], $_POST['id']);
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

		TableFactory::getInstance('Dicas')->recropar($_POST['imagem_cropada_banco'], $nome_imagem_cropada);

		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setSetDados($parametros['diretorio'], $parametros['tamanho_maximo']);
		$imagemHelper->recroparImagem($nome_imagem_cropada);
	}
	//Fim dos métodos do plugin de imagem
}