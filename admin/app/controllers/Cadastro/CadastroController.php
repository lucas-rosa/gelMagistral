<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe CadastroController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do cadastro.
 * 
 * @package admin\app\controllers\Cadastro\CadastroController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class CadastroController extends ControllerBase
{
    /**
     * Metodo CadastroController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action -> Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     * 
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function CadastroController($controller, $action, $urlparams)
    {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em cadastro
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action($params = null)
    {
        //Solicita os dados dos textos
        $dados_cadastro = $this->Delegator('ConcreteCadastro', 'SelecionarCadastro');

        //Leva os dados para a view
        $this->View()->assign('dados_cadastro', $dados_cadastro);

        //Verifica se há dados extras a serem adicionados na view(via parametro)
        if (!is_null($params))
        {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $params);
        }
        //Verifica se há dados extras a serem adicionados na view(via SESSÃO)
        elseif (isset($_SESSION['view_data']))
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
     * O metodo detalhes faz uma chamada para o metodo getDadosCadastro passando o id 
     * e armazenando o resultado na variavel $dados_cadastro. 
     *
     */
    private function detalhes()
    {
        //Valida o id
        if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id')))
        {
            $dados_cadastro = $this->getDadosCadastro($this->getParam('cod_id'));

            //Envia os dados pra view
            $this->View()->assign('dados_cadastro', $dados_cadastro);
        }

        //Apresenta a view
        $this->View()->display('detalhes.php');
    }
    
    /**
     * Metodo editar
     *
     * O metodo editar envia os dados para o model ConcreteCadastro chamando o metodo
     * EditaCadastroId armazenando o resultado em $resultado. Logo apos chama o model 
     * ConcreteCadastro chamando o metodo BuscarDetalhesId e armazenando o resultado em 
     * $dados_cadastro. 
     *
     */
    private function editar()
    {
        //Verifica se o usuário postou o formulário
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Solicita o cadastramento do texto
            $resultado = $this->Delegator('ConcreteCadastro', 'EditaCadastroId', $this->getPost());
        }
        else
        {
            //Valida o id do texto
            if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id')))
            {
                //Busca o dado referente ao id da tabela Cadatro
                $dados_cadastro = $this->Delegator('ConcreteCadastro', 'BuscarDetalhesId', $this->getParam());

                $dados_cidade = $this->BuscaCidadesEditar($dados_cadastro['cod_estado']);
                $dados_cadastro['cidades'] = $dados_cidade;
                
                //Leva os dados para a view
                $this->View()->assign('dados_cadastro', $dados_cadastro);
                
                //Solicita os dados dos idiomas
		        $dados = $this->Delegator('ConcreteCadastro', 'getEstados');
		
		        //Associa os dados na view
		        $this->View()->assign('estados', $dados);
            }

            //Exibe a view
            $this->View()->display('editar.php');
        }
    }
    
    /**
     * Metodo carregaEndereco
     *
     * Apos selecionar o cep, verifica no banco se existe o cep digitado  
     * 
     */
    private function carregaEndereco()
    {
    	//Verifica se o formulário foi postado
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
			$this->Delegator('ConcreteCadastro' , 'carregaEndereco' , $this->getPost());
        }
    }
    
    /**
     * Metodo  buscaCidades
     *
     * Busca a cidade conforme o cep digitado
     * 
     */
	private function buscaCidades()
	{
		//Verifica o tipo de solicitação
		if(!is_null($cod_uf))
		{
			//Parametros da Requisição
			$parametros = array('data' => array('cod_uf' => $cod_uf));
		}
		else
		{
			//Parametros da Requisição
			$parametros = array('json_data' => true,'data' => (HelperFactory::getInstance()->isAjax() ? $this->getPost() : false));
		}

		//Verifica se os parametros foram informados corretamente
		if($parametros !== false)
		{			
			$this->Delegator('ConcreteCadastro', 'buscaCidades', $parametros);
		}
	}
    
	/**
     * Metodo buscaCidadesEditar
     *
     * O metodo buscaCidadesEditar envia os dados para o model ConcreteCadastro
     * chamando o metodo buscaCidades passando o cod_uf por um array
     *
     * @param string $cod_uf 
     */
    private function BuscaCidadesEditar($cod_uf)
    {
        //Delega a tarefa ao Model
        return $this->Delegator('ConcreteCadastro', 'BuscaCidades', array('data' => array('cod_uf' => $cod_uf)));
    }
    
    /**
     * Metodo excluir
     *
     * O metodo excluir envia os dados para o model ConcreteCadastro chamando o metodo
     * ExcluirCadastro
     *
     */
    private function excluir()
    {
        //Verifica se o usuário enviou uma requisição POST
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Exclui os dados
            $this->Delegator('ConcreteCadastro', 'ExcluirCadastro', $this->getParam());
        }
    }
    
     /**
     * Metodo imprimir
     *
     * O metodo imprimir envia os dados para o model ConcreteCadastro chamando o metodo
     * imprimir
     *
     */
    private function imprimir()
    {
        //valida o id
        if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id')))
        {
            //pega o id
            $cod_id = $this->getParam('cod_id');

            //Dados pessoais
            $dados_pessoais = $this->getDadosCadastro($cod_id);

            $this->Delegator('ConcreteCadastro', 'Imprimir', array("dados_pessoais" => $dados_pessoais));
        }
    }
    
    /**
     * Metodo getDadosCadastro
     *
     * O metodo getDadosCadastro envia os dados para o model ConcreteCadastro chamando o metodo
     * BuscarDetalhesId e passando o cod_id em um array
     *
     * @param integer $cod_id
     */
    private function getDadosCadastro($cod_id)
    {
        //Solicita os dados da tabela Cadastro
        return $this->Delegator('ConcreteCadastro', 'BuscarDetalhesId', array('cod_id' => $cod_id));
    }
    
    /**
     * Metodo exportar
     *
     * O metodo exportar envia os dados para o model ConcreteCadastro chamando o metodo
     * SelectCadastrofiltrado caso exista o getParam. Caso nao exista ele chama o model
     * ConcreteCadastro e o metodo SelectCadastro
     *
     */
    private function exportar()
    {    	
    	//seleciona tudo
		$dados_cadastro = $this->Delegator("ConcreteCadastro", "SelectCadastroExportar");
		
		//Leva o $dados_cadastro para a view
		$this->View()->assign('dados_cadastro', $dados_cadastro);
			
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
		$this->Delegator("ConcreteCadastro", "SelectCadastroExportarTudoCsv");
	}
	
	/**
	 * Metodo exportar_filtrado
	 * 
	 * Exporta os dados da tabela cadastro filtrados pela data de inicio e termino. O model
	 * ConcreteCadastro chama o metodo SelectCadastroExportarFiltradoCsv e la cria o csv
	 */
	private function exportar_filtrado()
	{
		//seleciona todos os dados da tabela Cadastro
		$this->Delegator("ConcreteCadastro", "SelectCadastroExportarFiltradoCsv", $this->getParam());
	}
    
    /**
     * Metodo exportar_filtro
     *
     * O metodo exportar_filtro envia os dados para o model ConcreteCadastro chamando o metodo
     * SelectCadastrofiltrar caso receba os dados via POST. Caso exista o getParam ConcreteCadastro e metodo
     * SelectCadastrofiltrado, Senao ConcreteCadastro e metodo SelectCadastroTodos
     *
     */
    private function exportar_filtro()
    {
    	if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//seleciona somente entre as datas filtradas
			$dados_cadastro = $this->Delegator("ConcreteCadastro", "SelectCadastroFiltrar", $this->getPost());
			
			//Leva o $dados_empresa para a view
			$this->View()->assign('dados_cadastro',$dados_cadastro);

			//Exibe a view
			$this->View()->display('filtro.php');
		}
    }
}