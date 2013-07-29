<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ContatosController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Contatos.
 * 
 * @package admin\app\controllers\Contatos\ContatosController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ContatosController extends ControllerBase
{
    /**
     * Metodo ContatosController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action -> Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function ContatosController($controller, $action, $urlparams)
    {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    /**
     * Metodo detalhes
     *
     * O metodo detalhes envia os dados para o model ConcreteContatos e chama
     * o metodo SelectContatosDetalhes armazenando os dados na variavel $dados_contatos
     *
     * @param string $params - caso tenha alguma sessao esta variavel eh jogada na view
     */
    private function detalhes($params = null)
    {
        //Valida o cod_relacao_idioma
        if ($this->getParam('cod_relacao_idioma') !== false && is_numeric($this->getParam('cod_relacao_idioma')))
        {
            //Dados da tabela Contatos
            $dados_contatos = $this->Delegator('ConcreteContatos', 'SelectContatosDetalhes', $this->getParam());

            //joga o $dados na view
            $this->View()->assign('dados_contatos', $dados_contatos);

            if($dados_contatos !== false)
            {
	            foreach($dados_contatos as $key => $dad)
	            {
	                $mapa .= $dad['cod_latitude'] . "[;]" . $dad['cod_longitude'] . "|";
	            }

	            //jogar o total para a view
	            $this->View()->assign('mapa', $mapa);
            }

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
        }

        //mostra a view
        $this->View()->display('detalhes.php');
    }
    
    /**
     * Metodo editar
     *
     * O metodo editar verifica se os dados enviados pelo formulario vieram via
     * POST. Caso isso se confirme ele envia os dados para o model ConcreteContatos
     * chamando o metodo EditaConfiguracoes. Senao envia para o model ConcreteContatos
     * chamando o metodo SelectContatosEditar e armazena os dados na variavel $dados_contatos
     *
     */
    private function editar()
    {
        //Verifica se o formulário foi postado
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Solicita o cadastramento do Contato
            $resultado = $this->Delegator('ConcreteContatos', 'EditaContatos', $this->getPost());
        }
        else
        {
            //Localiza o Contato
            $dados_contatos = $this->Delegator('ConcreteContatos', 'SelectContatosEditar', $this->getParam());

            //Busca os estados
            $this->getEstados();

            foreach($dados_contatos as $key => $cidades)
            {
                $dados_cidade = $this->buscaCidadesEditar($cidades['cod_estado']);
                $dados_contatos[$key]['cidades'] = $dados_cidade;
            }

            //Dados do Contato
            $this->View()->assign('dados_contatos', $dados_contatos);

            //envia o cod_relacao_idioma para a view
            $this->View()->assign('cod_relacao_idioma', $this->getParam('cod_relacao_idioma'));

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
			$this->Delegator('ConcreteContatos' , 'carregaEndereco' , $this->getPost());
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
			$this->Delegator('ConcreteContatos', 'buscaCidades', $parametros);
		}
	}
    
     /**
     * Metodo buscaCidadesEditar
     *
     * O metodo buscaCidadesEditar envia os dados para o model ConcreteContatos
     * chamando o metodo buscaCidades passando o cod_uf por um array
     *
     * @param string $cod_uf 
     */
    private function buscaCidadesEditar($cod_uf)
    {
        //Delega a tarefa ao Model
        return $this->Delegator('ConcreteContatos', 'buscaCidades', array('data' => array('cod_uf' => $cod_uf)));
    }
    
    /**
     * Metodo buscaCidades
     *
     * O metodo buscaCidades envia os dados para o model ConcreteContatos 
     * chamando o metodo buscaCidades passando o cod_uf pela variavel $parametro
     *
     * @param string $cod_uf 
     */
    /*private function buscaCidades($cod_uf = null)
    {
        //Verifica o tipo de solicitação
        if (!is_null($cod_uf))
        {
            //Parametros da Requisição
            $parametros = array('data' => array('cod_uf' => $cod_uf));
        }
        else
        {
            //Parametros da Requisição
            $parametros = array('json_data' => true, 'data' => (HelperFactory::getInstance()->isAjax() ? $this->getPost() : false));
        }

        //Verifica se os parametros foram informados corretamente
        if($parametros !== false)
        {
            //Delega a tarefa ao Model
            $recordset = $this->Delegator('ConcreteContatos', 'buscaCidades', $parametros);

            //Verifica o tipo de retorno
            if(!isset($parametros['json_data']))
            {
                //Associa os dados a view
                $this->View()->assign('cidades', $recordset);
            }
        }
    }*/
    
     /**
     * Metodo getIdiomas
     *
     * O metodo getIdiomas envia os dados para o model ConcreteContatos 
     * chamando o metodo getIdiomas e armazenando os dados em $dados 
     *
     */
    /*private function getIdiomas()
    {
        //Solicita os dados dos idiomas
        $dados = $this->Delegator('ConcreteContatos', 'getIdiomas');

        //Associa os dados na view
        $this->View()->assign('idiomas', $dados);
    }*/
    
     /**
     * Metodo getEstados
     *
     * O metodo getEstados envia os dados para o model ConcreteContatos 
     * chamando o metodo getEstados e armazenando os dados em $dados 
     *
     */
    private function getEstados()
    {
        //Solicita os dados dos idiomas
        $dados = $this->Delegator('ConcreteContatos', 'getEstados');

        //Associa os dados na view
        $this->View()->assign('estados', $dados);
    }

}