<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteNovidades
 *
 * Esta classe e responsavel por todas as requisicoes a tabela Novidades
 *
 * @package admin\app\controllers\Novidades\models\ConcreteNovidades
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteNovidades
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
	 * Metodo SelectConteudos
	 *
	 * Seleciona todas as noticias da tabela noticias.
	 * Faz uma requisicao a tabela Novidades chamando o metodo SelectNovidades
	 *
	 * @return string[]
	 */
	public function SelectConteudos()
	{
		return TableFactory::getInstance('Noticias')->SelectNoticias();
	}

	/**
	 * Metodo SelectNovidadeRelacaoIdEditar
	 *
	 * Seleciona a noticia selecionada conforme o cod_id e o cod_relacao_idioma passados por parametro
	 * Faz uma requisicao a tabela Novidades chamando o metodo SelectNovidadesIdRelacaoEdicao
	 *
	 * @param string[] $parametros cod_relacao_idioma
	 *
	 * @return string[]
	 */
	public function SelectNovidadeRelacaoIdEditar($parametros)
	{
		$array_noticias = array();

		$dados_idioma = TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
                
                 $flag = false;
                
		foreach($dados_idioma as $key => $idioma)
		{
			//Retorna os dados
			$dados_noticias = TableFactory::getInstance('Noticias')->SelectNoticiasIdRelacaoEdicao($parametros['cod_relacao_idioma'], $idioma['cod_id']);
			
                         if($dados_noticias != false)
                         {
                            $flag = true;
                            
                            $array_noticias[$key]['cod_publicado'] = $dados_noticias['cod_publicado'];
                            $array_noticias[$key]['dat_inicio_publicacao'] = ($dados_noticias['dat_inicio_publicacao'] != '' ? $dados_noticias['dat_inicio_publicacao'] : date("d/m/Y H:i:s"));
                            $array_noticias[$key]['dat_termino_publicacao'] = ($dados_noticias['dat_termino_publicacao'] != '' ? $dados_noticias['dat_termino_publicacao'] : date("d/m/Y H:i:s"));
                            $array_noticias[$key]['img_original'] = $dados_noticias['img_original'];
                            $array_noticias[$key]['img_cropada'] = $dados_noticias['img_cropada'];
                            $array_noticias[$key]['dat_data'] = $dados_noticias['dat_data'];
                            $array_noticias[$key]['txt_titulo'] = $dados_noticias['txt_titulo'];
                            $array_noticias[$key]['txt_texto'] = $dados_noticias['txt_texto'];
                            $array_noticias[$key]['cod_id'] = $dados_noticias['cod_id'];

                            $array_noticias[$key]['cod_idioma'] = $idioma['cod_id'];
                            $array_noticias[$key]['cod_relacao_idioma'] = $parametros['cod_relacao_idioma'];
                            $array_noticias[$key]['txt_idioma'] = $idioma['txt_idioma'];
                            
                         }
		}
                if($flag == true)
                {
                    return $array_noticias;
                }    
                else 
                {
                    return false;
                }
	}

	/**
	 * Metodo SelectNovidadeRelacaoId
	 *
	 * Em detalhes mostra os dados da noticia selecionada
	 * Faz uma requisicao a tabela Novidades chamando o metodo SelectNovidadeRelacaoId
	 * passando o Id por parametro.
	 *
	 * @param string[] $parametros cod_relacao_idioma
	 *
	 * @return string[]
	 */
	public function SelectNovidadeRelacaoId($parametros)
	{
		//Retorna os dados
		return TableFactory::getInstance('Noticias')->SelectNoticiaRelacaoId($parametros);
	}

	/**
	 * Metodo IncluirNovidade
	 *
	 * Inclui uma nova noticia.
	 * Faz uma requisicao a tabela Novidades chamando o metodo IncluirNovidade
	 * passando os dados por parametro.
	 *
	 * @param string[] $parametros todos os dados vindos do formulario
	 *
	 * @return string[]
	 */
	public function IncluirNovidade($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o Helper
		$Helper = HelperFactory::getInstance();

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/conteudo.validacao','ConteudoValidacao');

		//total de idiomas
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros, $total_idiomas);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//seleciona o último valor do campo cod_relacao_idioma da tabela noticias
			$cod_relacao_idioma = TableFactory::getInstance('Noticias')->SelectUltimoRelacionamentoIdioma();
			$parametros['cod_relacao_idioma'] = $cod_relacao_idioma['cod_relacao_idioma']+1;
				
			//Trata os valores que vão ser incluidos no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
				
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				//Formata os dados para gravar no banco
				$parametros['dat_data'.$i] = HelperFactory::getInstance()->FormataData($parametros['dat_data'.$i],'usa');
				$parametros['dat_inicio_publicacao'.$i] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_inicio_publicacao'.$i],'usa');
				$parametros['dat_termino_publicacao'.$i] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_termino_publicacao'.$i],'usa');

				TableFactory::getInstance('Noticias')->IncluirNoticia($parametros, $i);
			}
				
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
	 * Metodo EditaNovidade
	 *
	 * Edita a noticia selecionada.
	 * Faz uma requisicao a tabela Novidades chamando o metodo EditaNovidade
	 * passando os dados por parametro.
	 *
	 * @param string[] $parametros dados vindos do formulario
	 *
	 * @return string[]
	 */
	public function EditaNovidade($parametros)
	{
               
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//Instancia o componente de validação
		$ComponenteValidacao = getComponent('validacoes/conteudo.validacao','ConteudoValidacao');

		//total de idiomas
		$total_idiomas = count(TableFactory::getInstance('WebsiteIdiomas')->getIdiomas());

		//Executa a Validação
		$resultado_validacao = $ComponenteValidacao->validar($parametros, $total_idiomas);

		//Verifica o resultado da validação
		if(count($resultado_validacao) == 0)
		{
			//Instanciando a tabela de TextosLayouAdmin
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
			$contar = 0;
				
			//Trata os valores
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
				
			for($i = 1; $i <= $total_idiomas; $i++)
			{
				//Formata os dados para gravar no banco
				$parametros['dat_data'.$i] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_data'.$i],'usa');
				$parametros['dat_inicio_publicacao'.$i] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_inicio_publicacao'.$i],'usa');
				$parametros['dat_termino_publicacao'.$i] = HelperFactory::getInstance()->FormataDataHora($parametros['dat_termino_publicacao'.$i],'usa');

				if(TableFactory::getInstance('Noticias')->EditaNoticia($parametros, $i) === true)
				{
					$contar++;
				}
			}
				
			if($contar == $total_idiomas)
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
	 * Metodo ExcluirNovidade
	 *
	 * Excluir a noticia selecionada.
	 * Faz uma requisicao a tabela Novidades chamando o metodo ExcluirNovidade
	 * passando o id e o cod_relacao_idioma por parametro.
	 *
	 * @param string[] $parametros cod_relacao_idioma
	 *
	 * @return string[]
	 */
	public function ExcluirNovidade($parametros)
	{
		//Inclui a biblioteca do JSON
		LibFactory::getInstance(null,null,'Zend/Json.php');

		//faz a exclusão
		$dados = TableFactory::getInstance('Noticias')->ExcluirNoticiaId($parametros['cod_relacao_idioma']);

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
	 * Faz uma requisicao a tabela Novidades chamando o metodo DeletarImagemBanco
	 * passando a imagem original, imagem cropada e o Id por parametro.
	 *
	 * @param string[] $parametros
	 *
	 */
	public function deletimg($parametros)
	{
		unlink(ARQ_DIN.$_POST['nome_imagem_original']);
		unlink(ARQ_DIN.$_POST['nome_imagem_cropada']);
		$exclusao = TableFactory::getInstance('Noticias')->DeletarImagemBanco($_POST['nome_imagem_original'], $_POST['nome_imagem_cropada'], $_POST['id']);

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
	 * Faz uma requisicao a tabela Novidades chamando o metodo AlteraImagem
	 * passando a imagem original, imagem cropada e o Id por parametro.
	 *
	 */
	public function incluirImagemBancoEdicao()
	{
		unset($_SESSION['randomico']);
		$_SESSION['user_file_ext'] = "";
		$edicao_imagem = TableFactory::getInstance('Noticias')->AlteraImagem($_POST['campo_imagem_original'], $_POST['campo_imagem_cropada'], $_POST['id']);
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

		TableFactory::getInstance('Noticias')->recropar($_POST['imagem_cropada_banco'], $nome_imagem_cropada);

		$imagemHelper = HelperFactory::getInstance('imagem');
		$imagemHelper->setSetDados($parametros['diretorio'], $parametros['tamanho_maximo']);
		$imagemHelper->recroparImagem($nome_imagem_cropada);
	}
	//Fim dos métodos do plugin de imagem
}