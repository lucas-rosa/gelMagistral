<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteFaleconosco
 *
 * Esta classe e responsavel por todas as requisicoes a tabela FaleConosco.
 *
 * @package admin\app\controllers\FaleConosco\models\ConcreteFaleconosco
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteFaleconosco
{
	/*
	 public function getIdiomas()
	 {
	 //Retorna os dados dos banners
	 return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
	 }

	 public function getTextos($parametros)
	 {
	 //Retorna o resultado da consulta
	 return TableFactory::getInstance('Textos')->ExecutegetTexto($parametros['cod_texto']);
	 }
	 */

	/**
	 * Metodo BuscarFaleConosco
	 *
	 * Seleciona todos os dados cadastrados na tabela FaleConosco.
	 * Faz uma requisicao a tabela FaleConosco chamando o metodo SelectFaleConosco
	 *
	 * @return string[]
	 *
	 */
	public function BuscarFaleConosco()
	{
		//Retorna os dados ao Controller
		return TableFactory::getInstance('FaleConosco')->SelectFaleConosco();
	}

	/**
	 * Metodo BuscarDetalhesFaleConosco
	 *
	 * Mostra os detalhes do cod_id especifico
	 * Faz uma requisicao a tabela FaleConosco chamando o metodo SelectFaleConoscoId
	 * passando o cod_id por parametro.
	 *
	 * @param string[] $parametros cod_id dentro do array
	 *
	 * @return string[]
	 *
	 */
	public function BuscarDetalhesFaleConosco($parametros)
	{
		//Retorna os dados
		return TableFactory::getInstance('FaleConosco')->SelectFaleConoscoId($parametros['cod_id']);
	}

	/*
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
	 //Trata os dados antes de gravar no banco de dados
	 $parametros = HelperFactory::getInstance()->TrataValor($parametros,null,null,null,true);

	 for($i = 1; $i <= $total; $i++)
	 {
	 //salva os dados atualizados
	 TableFactory::getInstance('Textos')->ExecuteEditaTexto($parametros, $i);
	 }

	 //Busca os textos de erro
	 $erro = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

	 //Mensagem de confirmação via SESSION(usar sempre o indice view_data)
	 $_SESSION['view_data'] = array('mensagem_confirmacao' => $erro[35]);

	 //Retorna o resultado da atualização do texto
	 echo Zend_Json::encode(array("1"));
	 }
	 else
	 {
	 //Retorna os erros da validação
	 echo Zend_Json::encode($resultado_validacao);
	 }
	 }*/
        
        /**
	 * Metodo SelectFaleconoscoFiltrar
	 *
	 * Faz uma requisicao para a tabela Faleconosco chamando o metodo SelectFaleconoscofiltro
         * passando a data de inicio e a data de termino
	 *
         * @param string[] $parametros
	 * @return string[]
	 *
	 */
	public function SelectFaleconoscoFiltrar($parametros)
	{
		return  TableFactory::getInstance('FaleConosco')->SelectFaleconoscofiltro($parametros['data_de'], $parametros['data_ate']);
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
	public function SelectFaleconoscoExportarTudoCsv()
	{
		$resultados = TableFactory::getInstance('FaleConosco')->SelectFaleConosco();

		$novo_array = array();

		foreach($resultados as $key=>$result)
		{
			$novo_array[$key]['num_ip'] = $result['num_ip'];
			$novo_array[$key]['data'] = $result['data'];
			$novo_array[$key]['hora'] = $result['hora'];
			$novo_array[$key]['txt_nome'] = $result['txt_nome'];
			$novo_array[$key]['txt_email'] = $result['txt_email'];
			$novo_array[$key]['txt_telefone'] = $result['txt_telefone'];
			$novo_array[$key]['txt_assunto'] = $result['txt_assunto'];
			$novo_array[$key]['txt_mensagem'] = strip_tags(preg_replace('@[\n\r]@s', '', $result['txt_mensagem']));
		}

		$helper = HelperFactory::getInstance();

		$campos = array('IP', 'Data', 'Hora', 'Nome', 'E-mail', 'Telefone', 'Assunto', 'Mensagem');

		$helper->exportaCsv($novo_array, $campos);
	}

	/**
	 * Metodo SelectFaleconoscoExportarFiltradoCsv
	 *
	 * Exporta os dados filtrados para o format csv conforme a data de inicio e termino.
	 *
	 * Faz uma requisicao para a tabela cadastro chamando o metodo SelectFaleconoscoExportarFiltradoCsv
	 * passando a data de inicio e a data de termino por parametro.
	 * Estancia o helper armazenando na variavel $helper.
	 * Popula um array com os dados do filtro echama o helper exportaCsv
	 *
	 * @param string[] $parametros
	 *
	 * @return string[]
	 */
	public function SelectFaleconoscoExportarFiltradoCsv($parametros)
	{
		$resultados = TableFactory::getInstance('FaleConosco')->SelectFaleconoscoExportarFiltradoCsv($parametros['data_de'], $parametros['data_ate']);

		$novo_array = array();
		
		foreach($resultados as $key=>$result)
		{
			$novo_array[$key]['num_ip'] = $result['num_ip'];
			$novo_array[$key]['data'] = $result['data'];
			$novo_array[$key]['hora'] = $result['hora'];
			$novo_array[$key]['txt_nome'] = $result['txt_nome'];
			$novo_array[$key]['txt_email'] = $result['txt_email'];
			$novo_array[$key]['txt_telefone'] = $result['txt_telefone'];
			$novo_array[$key]['txt_assunto'] = $result['txt_assunto'];
			$novo_array[$key]['txt_mensagem'] = strip_tags(preg_replace('@[\n\r]@s', '', $result['txt_mensagem']));
		}
		
		$helper = HelperFactory::getInstance();
		
		$campos = array('IP', 'Data', 'Hora', 'Nome', 'E-mail', 'Telefone', 'Assunto', 'Mensagem');
		
		$helper->exportaCsv($novo_array, $campos);
	}

	/*
	 public function SelectFaleConosco()
	 {
	 $resultados = TableFactory::getInstance('FaleConosco')->SelectFaleconoscoExportar();

	 $novo_array = array();

	 foreach($resultados as $key=>$result)
	 {
	 $novo_array[$key]['cod_id'] = $result['cod_id'];
	 $novo_array[$key]['cod_idioma'] = $result['WebsiteIdiomas']['txt_idioma'];
	 $novo_array[$key]['num_ip'] = $result['num_ip'];
	 $novo_array[$key]['dat_datahora'] = $result['dat_datahora'];
	 $novo_array[$key]['txt_nome'] = $result['txt_nome'];
	 $novo_array[$key]['txt_email'] = $result['txt_email'];
	 $novo_array[$key]['txt_telefone'] = $result['txt_telefone'];
	 $novo_array[$key]['txt_assunto'] = $result['txt_assunto'];
	 $novo_array[$key]['txt_mensagem'] = $result['txt_mensagem'];
	 }

	 $helper = HelperFactory::getInstance();

	 $campos = array('Id', 'Idioma', 'Ip', 'Data', 'Nome', 'E-mail', 'Telefone', 'Assunto', 'Mensagem');

	 $valores = $helper->exportaCsv($novo_array, $campos);
	 }
	 */


	/**
	 * Metodo SelectFaleconoscoExportar
	 *
	 * Seleciona todos os dados cadastrados ate o momento
	 * Faz uma requisicao para a tabela cadastro chamando o metodo SelectFaleConosco
	 *
	 * @return string[]
	 *
	 */
	public function SelectFaleconoscoExportar()
	{
		return TableFactory::getInstance('FaleConosco')->SelectFaleConosco();
	}
}

?>