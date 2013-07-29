<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteCadastro
 *
 * Esta classe e responsavel por todas as requisicoes a tabela Cadastro da base de dados.
 * 
 * @package admin\app\controllers\Cadastro\models\ConcreteCadastro
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteArquivo
{
    public function Incluir($parametros)
    {
    	//Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');
        
        //instтncia a validaчуo 
        $ComponenteValidacao = getComponent('validacoes/arquivo.validacao', 'ArquivoValidacao');
        
    	//Executa a Validaчуo
        $resultado_validacao = $ComponenteValidacao->validar($parametros);

        //Verifica o resultado da validaчуo
        if(count($resultado_validacao) == 0)
        {
        	$parametros['txt_arquivo'] = $_FILES['afile']['name'];
        	
        	//Trata os dados antes de gravar no banco de dados
            $parametros = HelperFactory::getInstance()->TrataValor($parametros, null, null, null, true);
            
        	if(TableFactory::getInstance('Downloads')->InserirNovoDownload($parametros) === true)
        	{
	        	$fileName = $_FILES['afile']['name'];
				$fileTemp = $_FILES['afile']['tmp_name'];
				
				$pathAndName = "web_files/arq_din/" . $fileName;
				
				$moveResult = move_uploaded_file($fileTemp, $pathAndName);
				
		        if ($moveResult == true)
				{
					echo Zend_Json::encode(array("1" => 1));
				}
        	}
        }
        else
        {
        	//retorno de erro
        	echo Zend_Json::encode($resultado_validacao);
        }
    }
}
?>