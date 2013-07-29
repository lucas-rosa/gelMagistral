<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe FaleconoscoController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Faleconosco
 * 
 * @package admin\app\controllers\Faleconosco\FaleconoscoController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class FaleconoscoController extends ControllerBase
{
    /**
     * Metodo FaleconoscoController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function FaleconoscoController($controller, $action, $urlparams) 
    {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Faleconosco
     * mandando para o model ConcreteFaleconosco chamando o metodo BuscarFaleConosco
     * e armazenando o resultado na variavel $dados
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action($params = null)
    {
        //Solicita os dados dos textos
        $dados_fale_conosco = $this->Delegator('ConcreteFaleconosco', 'BuscarFaleConosco');

        //Leva os dados para a view
        $this->View()->assign('dados_fale_conosco', $dados_fale_conosco);

        //Verifica se há dados extras a serem adicionados na view(via parametro)
        if (!is_null($params))
        {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $params);
        }
        //Verifica se há dados extras a serem adicionados na view(via SESSÃO)
        elseif(isset($_SESSION['view_data']))
        {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $_SESSION['view_data']);
            //Elimina a sessão
            unset($_SESSION['view_data']);
        }
        //Exibe a view
        $this->View()->display('index.php');
    }
    
    /**
     * Metodo detalhes
     *
     * O metodo detalhes envia os dados para o model ConcreteFaleconosco e chama
     * o metodo BuscarDetalhesFaleConosco armazenando os dados na variavel $dados_faleConosco
     *
     * @return array
     */
    private function detalhes()
    {
        //Valida o id
        if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id')))
        {
            //Solicita os dados da Vaga
            $dados_faleConosco = $this->Delegator('ConcreteFaleconosco', 'BuscarDetalhesFaleConosco', $this->getParam());

            //Coloca os dados da vaga na View
            $this->View()->assign('dados_faleConosco', $dados_faleConosco);

            //Apresenta a view
            $this->View()->display('detalhes.php');
        }
    }
    
     /**
     * Metodo editar
     * 
     * O metodo editar verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita o cadastro do texto mandando para o model ConcreteTextos chamando
     * o metodo editaTexto e armazenando o resultado na variavel $resultado. 
     * Caso os dados nao sejam enviados por POST chama o metodo getTextoById
     * 
     * @return array
     */
    private function editar()
    {
        //Verifica se o usuário postou o formulário
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Solicita o cadastramento do texto
            $resultado = $this->Delegator('ConcreteTextos', 'editaTexto', $this->getPost());
        }
        else
        {
            //Localiza o texto pelo id
            $this->getTextoById();
            //Exibe a view
            $this->View()->display('editar.php');
        }
    }
    
     /**
     * Metodo getTextoById
     * 
     * O metodo getTextoById busca o texto de acordo com o id. Para isso ele 
     * chama o model ConcreteTextos e o metodo getTextos passando o cod_texto em
     * um array  armazena o resultado na variavel $recordset. Caso nao retorne 
     * nada mata a execucao e mostra uma mensagem     
     * 
     * @return array
     */
    private function getTextoById()
    {
        //Valida o id do texto
        if($this->getParam('id_rel_idioma') !== false && is_numeric($this->getParam('id_rel_idioma')))
        {
            //Busca os dados do texto
            $recordset = $this->Delegator('ConcreteTextos', 'getTextos', array("cod_texto" => $this->getParam('id_rel_idioma')));

            //Verifica o resultado da consulta
            if($recordset !== false)
            {
                //Leva os dados para a view
                $this->View()->assign('dados_texto', $recordset);
            }
            else
            {
                die("Ocorreu um erro ao tentar localizar o registro solicitado");
            }
        }
    }
    
     /**
     * Metodo exportar
     * 
     * O metodo exportar verififca se os dados foram enviados por POST. Caso isso 
     * se confirme chama o model ConcreteFaleconosco e o metodo SelectFaleconoscofiltrado 
     * passando os dados enviados por post e armazenando o resultado na variavel $resultado.
     * Caso os dados sejam filtrados por uma data chama o model ConcreteFaleconosco 
     * e o metodo SelectFaleconoscofiltrado passando a data em um array  armazenando o resultado
     * na variavel $resultado. Caso nenhuma das possibilidades acima se confirme chama o 
     * model ConcreteFaleconosco e o metodo SelectFaleconoscoExportar e armazena na variavel
     * $resultado   
     * 
     * @link http://php.net/manual/en/function.str-replace.php str_replace
     *  
     * @return array
     */
    private function exportar()
    {
    	//seleciona tudo
		$dados_fale_conosco = $this->Delegator("ConcreteFaleconosco", "SelectFaleconoscoExportar");
		
		//Leva o $dados_cadastro para a view
		$this->View()->assign('dados_fale_conosco', $dados_fale_conosco);
			
		//exibe a view
		$this->View()->display('exportar.php');
    }
    
	/**
     * Metodo exportar_todos
     * 
     * Este metodo serve para exportar todos os registros da tabela cadastro. O model ConcreteCadastro
     * chamando o metodo SelectCadastroExportarTudoCsv e la cria o csv
     */
	private function exportar_todos()
	{
		//seleciona todos os dados da tabela Cadastro
		$this->Delegator("ConcreteFaleconosco", "SelectFaleconoscoExportarTudoCsv");
	}
	
	/**
	 * Metodo exportar_filtrado
	 * 
	 * Exporta os dados da tabela cadastro filtrados pela data de inicio e termino. O model
	 * ConcreteCadastro chama o metodo SelectCadastroExportarFiltradoCsv e la cria o csv
	 */
	private function exportar_filtrado()
	{
		//seleciona todos os dados da tabela FaleConosco
		$this->Delegator("ConcreteFaleconosco", "SelectFaleconoscoExportarFiltradoCsv", $this->getParam());
	}
    
     /**
     * Metodo exportar_filtro
     *
     * O metodo exportar_filtro envia os dados para o model ConcreteFaleconosco chamando o metodo
     * SelectFaleconoscoFiltrar exportando tudo para CSV
     *
     */
    private function exportar_filtro()
    {
    	if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//seleciona somente entre as datas filtradas
			$dados_fale_conosco = $this->Delegator("ConcreteFaleconosco", "SelectFaleconoscoFiltrar", $this->getPost());
			
			//Leva o $dados_empresa para a view
			$this->View()->assign('dados_fale_conosco',$dados_fale_conosco);

			//Exibe a view
			$this->View()->display('filtro.php');
		}
    }
}