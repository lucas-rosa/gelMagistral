<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteDownloads
 *
 * Esta classe e responsavel por todas as requisicoes ao ConcreteDownloads.
 * 
 * @package admin\app\controllers\Downloads\models\ConcreteDownloads
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteDownloads
{
    /**
     * Metodo SelectDownload
     * 
     * Seleciona todos os downloads cadastrados na tabela Downloads.
     * Faz uma requisicao a tabela Downloads chamando o metodo SelectDownload 
     * 
     * @return string[]
     * 
     */
    public function SelectDownload()
    {
        //Retorna os dados
        return TableFactory::getInstance('Downloads')->SelectDownload();
    }
    
     /**
     * Metodo IncluirDownload
     * 
     * Inclui download no banco de dados
     * Faz uma requisicao a tabela Downloads chamando o metodo IncluirDownload
     * passando os dados do formulário
     * 
     * @param string[] $parametros
     * 
     * @return string[]
     */
    public function IncluirDownload($parametros)
    {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia o componente de validação
        $ComponenteValidacao = getComponent('validacoes/downloads.validacao', 'ConteudoValidacao');

        //Executa a Validação
        $resultado_validacao = $ComponenteValidacao->validarIncluir($parametros);

        //Verifica o resultado da validação
        if(count($resultado_validacao) == 0)
        {
        	//Busca os textos
			$mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();
				
			//Trata os valores que vão ser incluidos no banco de dados
			$parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);
			
			//se tiver algo no arq_presskit
			if($_FILES['txt_arquivo']['name'] != '')
			{
				//Instancia o Helper
		        $Helper = HelperFactory::getInstance();
		
		        //CHAMA A FUNÇÃO HELPER
		        $arquivo_tratado_txt_arquivo = $Helper->RemoverAcentos($_FILES['txt_arquivo']['name']);
		        $arquivo_tratado_txt_arquivo = date("YmdHis") . $arquivo_tratado_txt_arquivo;
		        $parametros['txt_arquivo'] = $arquivo_tratado_txt_arquivo;
			}
			
        	if(TableFactory::getInstance('Downloads')->InserirDownload($parametros) === true)
			{
				//se tiver algo no arq_presskit
				if($_FILES['txt_arquivo']['name'] != '')
				{
					//envia o arquivo para o ftp
					$arquivo_temporario_txt_arquivo = $_FILES['txt_arquivo']['tmp_name'];
					
					$caminho = "web_files/arq_din/" . $arquivo_tratado_txt_arquivo;
					
					move_uploaded_file($arquivo_temporario_txt_arquivo, $caminho);
				}

				//Mensagem de confirmação
				$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[36], 'sucesso' => true);
	
				//Retorna true em caso de sucesso
				echo Zend_Json::encode(array("1" => 1));
			}
			else
			{
				//Mensagem de erro
    			$_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[64], 'erro' => true);
    	
    			//Retorna para o javascript
    			echo Zend_Json::encode(array("1" => 1));
			}
        }
        else
        {
            //Resposta do JSON
            echo Zend_Json::encode($resultado_validacao);
        }
    }
    
     /**
     * Metodo ExcluirDownloads
     * 
     * Exclui download do banco de dados conforme o cod_id
     * Faz uma requisicao a tabela Downloads chamando o metodo ExcluirDownloads
     * passando o cod_id por parametro.
     * 
     * @param string[] $parametros
     * 
     * @return string[]
     */
    public function ExcluirDownloads($parametros)
    {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //faz a exclusão
        $dados = TableFactory::getInstance('Downloads')->ExcluirDownloads($parametros['cod_id']);

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
            $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[93], 'erro' => true);

            echo Zend_Json::encode(array("1"));
        }
    }
}