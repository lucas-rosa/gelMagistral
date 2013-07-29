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
 * @package app\controllers\Cadastro\CadastroController
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
     * O metodo index_action faz as chamadas iniciais ao entrar em cadastro.
     * Neste caso ele chama o getEstados
     * 
     * @param string $params
     * @return array
     */
    private function index_action($params = null)
    {
        $this->getEstados();
        
    	//Verifica se há dados extras a serem adicionados na view(via parametro)
        if (!is_null($params))
        {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $params);
        }
        //Verifica se há dados extras a serem adicionados na view(via SESSÃO)
        else if (isset($_SESSION['view_data']))
        {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $_SESSION['view_data']);
            //Elimina a sessão
            unset($_SESSION['view_data']);
        }

        //Apresenta a view
        $this->View()->display('index.php');
    }
    
   /**
     * Metodo cadastrar
     *
     * O metodo cadastrar faz uma chamada para o model ConcreteCadastro chamando 
     * o metodo cadastrar. 
     *
     */
    private function cadastrar()
    {
        /**
         * Verifica se o formulario enviou via POST
         */
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //Solicita o cadastro dos dados
            $this->Delegator('ConcreteCadastro', 'cadastrar', $this->getPost());
        }
    }
    
     /**
     * Metodo carregaEndereco
     *
     * O metodo carregaEndereco faz uma chamada para o model ConcreteCadastro chamando 
     * o metodo carregaEndereco. Apos tratar os dados ele retorna um array json. 
     *
     * @return array[]
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
     * Metodo gerarCaptcha
     *
     * O metodo gerarCaptcha faz uma chamada para o model ConcreteCadastro chamando 
     * o metodo gerarCaptcha. Apos tratar os dados ele retorna um array json. 
     *
     * @return array[]
     */
    private function gerarCaptcha()
    {
        //envia os dados para o ConcreteFaleconosco
        return $this->Delegator("ConcreteCadastro", "Captcha");
    }

     /**
     * Metodo getEstados
     *
     * O metodo getEstados faz uma chamada para o model ConcreteCadastro chamando 
     * o metodo getEstados. Apos receber os dados do model armazena a resposta
     * na variavel recordset e envia para a view armazenando reordset em estados. 
     *
     * @return array[]
     */
    private function getEstados()
    {
        //Solicita os dados dos idiomas
        $recordset = $this->Delegator('ConcreteCadastro', 'getEstados');

        //Associa os dados na view
        $this->View()->assign('estados', $recordset);
    }

     /**
     * Metodo buscaCidades
     *
     * O metodo buscaCidades recebe o codigo do estado enviado e direciona
     * a requisicao para o model ConcreteCadastro chamando o metodo buscaCidades.
     * Apos receber os dados do model armazena a resposta na variavel recordset 
     * e envia para a view armazenando reordset em cidades.   
     *
     * @param string $cod_uf parametro responsavel por receber o codigo do estado enviado.
     * @return array[]
     */
    private function buscaCidades($cod_uf = null)
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
            $this->Delegator('ConcreteCadastro', 'buscaCidades', $parametros);
        }
    }
}