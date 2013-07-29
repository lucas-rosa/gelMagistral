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
class ConcreteCadastro
{
    /**
     * Metodo SelecionarCadastro
     * 
     * Retorna todos os dados cadastrados ate o momento na tabela cadastro.
     * Faz uma requisicao a tabela cadastro chamando o metodo SelectCadastro
     * 
     * @return string[]
     * 
     */
    public function SelecionarCadastro()
    {
        //Retorna os dados ao Controller
        return TableFactory::getInstance('Cadastro')->SelectCadastro();
    }

    /**
     * Metodo Imprimir
     * 
     * Cria um arquivo em pdf para poder ser impresso.
     * Estancia o helper mpdf e armazena na variavel $MpdfHelper
     * 
     * @param string[] $parametros
     * @link http://www.mpdf1.com/mpdf/index.php MPDF
     * 
     */
    public function Imprimir($parametros)
    {
        $nome = $parametros['dados_pessoais']['txt_nome'];
        $senha = ($parametros['dados_pessoais']['cod_sexo'] == 1 ? 'Masculino' : 'Feminino');
        $profissao = $parametros['dados_pessoais']['txt_profissao'];

        $MpdfHelper = HelperFactory::getInstance('mpdf');

        $MpdfHelper->setMPDF('c');
        $MpdfHelper->mirrorMargins = 1;  // Use different Odd/Even headers and footers and mirror margins

        $header = '
			<table width="100%" style="vertical-align: bottom;" height="200"><tr>
			<td width="100%" align="center" class="cabecalho">IMG</td>
			</tr></table>';

        $headerE = '
			<table width="100%" style="vertical-align: bottom;" height="200"><tr>
			<td width="100%" align="center" class="cabecalho">IMG2</td>
			</tr></table>';

        $footer = '<div align="center"><a href="http://www.nalineacom.com.br">www.nalineacom.com.br</a></div>';
        $footerE = '<div align="center"><a href="http://www.nalineacom.com.br">www.nalineacom.com.br</a></div>';

        $MpdfHelper->setSetHTMLHeader($header);
        $MpdfHelper->setSetHTMLHeader($headerE, 'E');
        $MpdfHelper->setSetHTMLFooter($footer);
        $MpdfHelper->setSetHTMLFooter($footerE, 'E');

        $html = "	
			   <div class='nome'>$nome</div>
			   <div class='titulo'>Dados gerais</div>
			   <table>
					<tr>
						<td width='15%' align='right'><strong>Sexo</strong></td>
						<td width='35%'>$senha</td>
						
						<td width='15%' align='right'><strong>Profissão</strong></td>
						<td width='35%'>$profissao</td>
					</tr>
				</table>
			   ";

        //$stylesheet = file_get_contents('web_files/css/pdf.css');
        //$MpdfHelper->setWriteHTML($stylesheet,1);
        $MpdfHelper->setWriteHTML(utf8_encode($html));
        $MpdfHelper->setOutput();
        exit;
    }

    /**
     * Metodo BuscarDetalhesId
     * 
     * Busca todos os detalhes do cadastro referentes ao Id passado por parametro.
     * Faz uma requisicao para a tabela Cadastro chamando o metodo SelectCadastroId  
     * 
     * @param string[] $parametros
     * 
     */
    public function BuscarDetalhesId($parametros)
    {
        //Retorna os dados
        return TableFactory::getInstance('Cadastro')->SelectCadastroId($parametros);
    }

    /**
     * Metodo EditaCadastroId
     * 
     * Edita o cadastro conforme o Id passado por parametro.
     * Chama o a tabela Cadastro e o metodo EditarCadastroId passando o Id por parametro. 
     * 
     * 
     * @param string[] $parametros
     * 
     */
    public function EditaCadastroId($parametros)
    {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia o componente de validação
        $ComponenteValidacao = getComponent('validacoes/cadastro.validacao', 'CadastroValidacao');

        //Executa a Validação
        $resultado_validacao = $ComponenteValidacao->validar($parametros);

        //Verifica o resultado da validação
        if (count($resultado_validacao) == 0)
        {
            //Trata os dados antes de gravar no banco de dados
            $parametros = HelperFactory::getInstance()->TrataValor($parametros, null, null, null, true);

            //Busca os textos
            $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

            //Formata os dados para gravar no banco
			$parametros['dat_nascimento'] = HelperFactory::getInstance()->FormataData($parametros['dat_nascimento'],'usa');
				
            //salva os dados atualizados
            if(TableFactory::getInstance('Cadastro')->EditarCadastroId($parametros) == true)
            {
                //Mensagem de confirmação
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35], 'sucesso' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
            }
            else
            {
                //Mensagem de confirmação
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[58], 'erro' => true);

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
     * Metodo carregaEndereco
     * 
     * Carrega os dados do cep digitado
     * Faz uma requisicao a tabela CepRuas chamando o metodo SelectCep passando o txt_cep 
     * por parametro. 
     * 
     * @param string[] $parametros array com o cep digitado
     * 
     * @return string[]
     */
    public function carregaEndereco($parametros)
    {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Busco o endereço pelo CEP
        $dados = TableFactory::getInstance('CepRuas')->SelectCep(str_replace("-", "", $parametros['txt_cep']));

        //Verifica se houve resultado
        if($dados !== false)
        {
            //Resposta do JSON
            echo Zend_Json::encode(array($dados['txt_rua'],
                $dados['CepBairros']['txt_bairro'],
                $dados['CepBairros']['CepCidades']['cod_id'],
                $dados['CepBairros']['CepCidades']['CepUf']['cod_id']));
        }
        else
        {
            //Não houve resultado, é enviado um array vazio
            echo Zend_Json::encode(array());
        }
    }
    
	/**
     * Metodo buscaCidades
     * 
     * Seleciona todos as cidades cadastradas na tabela CepCidades
     * Faz uma requisicao a tabela CepCidades chamando o metodo getCidades
     * passando o cod_uf por parametro.  
     * 
     * @param string[] $parametros
     * 
     * @return string[]
     */
    public function buscaCidades($parametros)
    {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Busco o endereço pelo CEP
        $recordset = TableFactory::getInstance('CepCidades')->getCidades($parametros['data']['cod_uf']);

        //Verifica se a requisição esta sendo feita via JSON
        if(isset($parametros['json_data']))
        {
            //Resposta do JSON
            echo Zend_Json::encode($recordset);
        }
        else
        {
            //Caso contrário então apenas retorna o resultado da consulta
            return $recordset;
        }
    }
    
    /**
     * Metodo ExcluirCadastro
     * 
     * Exclui o cadastro conforme o Id passado por parametro.
     * Chama a tabela Cadastro e o metodo ExcluirCadastroId passando
     * o Id por parametro 
     * 
     * @param string[] $parametros
     * 
     */
    public function ExcluirCadastro($parametros)
    {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //faz a exclusão
        $dados = TableFactory::getInstance('Cadastro')->ExcluirCadastroId($parametros);

        //Instancia a mensagem
        $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        //mensagem se a exclusão der certo
        if($dados === true)
        {
            $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34], 'sucesso' => true);

            echo Zend_Json::encode(array("1"));
        }
        //mensagem se a exclusão der errado
        else
        {
            $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[60], 'erro' => true);

            echo Zend_Json::encode(array("1"));
        }
    }
    
    /**
     * Metodo SelectCadastroFiltrar
     * 
     * Busca o cadastro de acordo com a data passada por parametro.
     * Faz uma requisicao para a tabela cadastro chamando o metodo SelectCadastrofiltro
     * passando a data de inicio e a data de termino por parametro.
     * 
     * @param string[] $parametros
     * 
     */
    public function SelectCadastroFiltrar($parametros)
    {
        return TableFactory::getInstance('Cadastro')->SelectCadastrofiltro($parametros['data_de'], $parametros['data_ate']);
    }
    
     /**
     * Metodo SelectCadastroExportarFiltradoCsv
     * 
     * Exporta os dados filtrados para o format csv conforme a data de inicio e termino.
     * 
     * Faz uma requisicao para a tabela cadastro chamando o metodo SelectCadastroExportarFiltradoCsv
     * passando a data de inicio e a data de termino por parametro.
     * Estancia o helper armazenando na variavel $helper.
     * Popula um array com os dados do filtro echama o helper exportaCsv 
     * 
     * @param string[] $parametros
     * 
     * @return string[] 
     */
    public function SelectCadastroExportarFiltradoCsv($parametros)
    {
        $resultados = TableFactory::getInstance('Cadastro')->SelectCadastroExportarFiltroCsv($parametros['data_de'], $parametros['data_ate']);
        
        $novo_array = array();

        foreach ($resultados as $key => $result)
        {
            $novo_array[$key]['dat_cadastro'] = $result['dat_cadastro'];
			$novo_array[$key]['txt_nome'] = $result['txt_nome'];
			$novo_array[$key]['cod_sexo'] = ($result['cod_sexo'] == 1 ? 'Masculino' : 'Feminino');
			$novo_array[$key]['txt_profissao'] = $result['txt_profissao'];
			$novo_array[$key]['dat_nascimento'] = $result['dat_nascimento'];
			$novo_array[$key]['txt_cep'] = $result['txt_cep'];
			$novo_array[$key]['txt_endereco'] = $result['txt_endereco'];
			$novo_array[$key]['cod_estado'] = $result['CepUf']['cha_sigla'];
			$novo_array[$key]['cod_cidade'] = $result['CepCidades']['txt_cidade'];
			$novo_array[$key]['txt_bairro'] = $result['txt_bairro'];
			$novo_array[$key]['txt_telefone'] = $result['txt_telefone'];
			$novo_array[$key]['txt_email'] = $result['txt_email'];
			$novo_array[$key]['txt_comentario'] = strip_tags(preg_replace('@[\n\r]@s', '', $result['txt_comentario']));
        }

        $helper = HelperFactory::getInstance();

		$campos = array('Data de cadastro', 'Nome', 'Sexo', 'Profissão', 'Data de Nascimento', 'CEP', 'Endereço', 'Estado', 'Cidade', 'Bairro', 'Telefone', 'E-mail', 'Comentário');

		$helper->exportaCsv($novo_array, $campos);
    }
    
     /**
     * Metodo SelectCadastroExportarTudoCsv
     * 
     * Exporta todos os dados cadastrados para o format csv.
     * 
     * Faz uma requisicao para a tabela cadastro chamando o metodo SelectCadastroExportar
     * Estancia o helper armazenando na variavel $helper.
     * Popula um array com os dados do filtro echama o helper exportaCsv 
     * 
     * @return string[]
     * 
     */
    public function SelectCadastroExportarTudoCsv()
    {
    	$resultados = TableFactory::getInstance('Cadastro')->SelectCadastro();
		
		$novo_array = array();
		
		foreach($resultados as $key=>$result)
		{
			$novo_array[$key]['dat_cadastro'] = $result['dat_cadastro'];
			$novo_array[$key]['txt_nome'] = $result['txt_nome'];
			$novo_array[$key]['cod_sexo'] = ($result['cod_sexo'] == 1 ? 'Masculino' : 'Feminino');
			$novo_array[$key]['txt_profissao'] = $result['txt_profissao'];
			$novo_array[$key]['dat_nascimento'] = $result['dat_nascimento'];
			$novo_array[$key]['txt_cep'] = $result['txt_cep'];
			$novo_array[$key]['txt_endereco'] = $result['txt_endereco'];
			$novo_array[$key]['cod_estado'] = $result['CepUf']['cha_sigla'];
			$novo_array[$key]['cod_cidade'] = $result['CepCidades']['txt_cidade'];
			$novo_array[$key]['txt_bairro'] = $result['txt_bairro'];
			$novo_array[$key]['txt_telefone'] = $result['txt_telefone'];
			$novo_array[$key]['txt_email'] = $result['txt_email'];
			$novo_array[$key]['txt_comentario'] = strip_tags(preg_replace('@[\n\r]@s', '', $result['txt_comentario']));
		}

		$helper = HelperFactory::getInstance();

		$campos = array('Data de cadastro', 'Nome', 'Sexo', 'Profissão', 'Data de Nascimento', 'CEP', 'Endereço', 'Estado', 'Cidade', 'Bairro', 'Telefone', 'E-mail', 'Comentário');

		$helper->exportaCsv($novo_array, $campos);
    }
    
    /**
     * Metodo SelectCadastroExportar
     * 
     * Seleciona todos os dados cadastrados ate o momento
     * 
     * Faz uma requisicao para a tabela cadastro chamando o metodo SelectCadastro
     * 
     * @return string[]
     * 
     */
    public function SelectCadastroExportar()
    {
        return TableFactory::getInstance('Cadastro')->SelectCadastro();
    }
    
    /**
     * Metodo getEstados
     * 
     * Seleciona todos os estados
     * 
     * @return string[]
     */
    public function getEstados()
    {
    	//Retorna os dados dos Contatoss
		return TableFactory::getInstance('CepUf')->getEstados();
    }
}
?>