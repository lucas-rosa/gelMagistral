<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe PerfisController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Perfis
 * 
 * @package admin\app\controllers\Perfis\PerfisController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class PerfisController extends ControllerBase
{
    /**
     * Metodo PerfisController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function PerfisController($controller, $action, $urlparams)
    {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }

     /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Perfis
     * mandando para o model ConcretePerfis chamando o metodo SelectPermissaoPerfil
     * e armazenando o resultado na variavel $dados_perfis.
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action($params = null)
    {
        //Select das permisões
        $dados_perfis = $this->Delegator('ConcretePerfis', 'SelectPermissaoPerfil');

        //Leva $dados para a view
        $this->View()->assign('dados_perfis', $dados_perfis);

        //Verifica se hï¿½ dados extras a serem adicionados na view(via parametro)
        if(!is_null($params))
        {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $params);
        }
        //Verifica se há dados extras a serem adicionados na view(via SESSï¿½O)
        elseif(isset($_SESSION['view_data']))
        {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $_SESSION['view_data']);
            //Elimina a sessões
            unset($_SESSION['view_data']);
        }
        //Exibe a index
        $this->View()->display('index.php');
    }

    /**
     * Metodo excluir
     * 
     * O metodo excluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita a exclusao do registro mandando para o model ConcretePerfis chamando
     * o metodo ExcluirPerfil.
     * 
     */
    private function excluir()
    {
        //Verifica se o usuário enviou uma requisição POST
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $this->Delegator('ConcretePerfis', 'ExcluirPerfil', $this->getParam());
        }
    }

    /**
     * Metodo editar
     * 
     * O metodo editar verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita o cadastro do registro mandando para o model ConcretePerfis chamando
     * o metodo EditarControlerAcao. Caso os dados nao sejam enviados por POST chama o model
     * ConcreteNoticias e o metodo SelectControllerAcaoEditar passando o id por parametro e armazena 
     * o resultado na variavel $dados_noticia. 
     * 
     * @return array
     */
    private function editar()
    {
        //Verifica se o formulário foi postado
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Solicita o cadastramento do Servico
            $resultado = $this->Delegator('ConcretePerfis', 'EditarControlerAcao', $this->getPost());
        }
        else
        {
            if($this->getParam('cod_tipo') !== false && is_numeric($this->getParam('cod_tipo')))
            {
                //Select controller e ação
                $controller_acao = $this->Delegator('ConcretePerfis', 'SelectControllerAcaoEditar', $this->getParam());

                $array = array();
                $valor = null;
                $contagem = 0;
                $html = "";

                foreach ($controller_acao as $key => $dados)
                {
                    if ($dados['FrameworkControllers']['txt_nome_amigavel'] != $valor)
                    {
                        $html .= "<br/><strong>" . $dados['FrameworkControllers']['txt_nome_amigavel'] . "</strong><br/>";
                        $valor = $dados['FrameworkControllers']['txt_nome_amigavel'];
                    }

                    if (isset($dados['PermissaoVinculo'][0]))
                    {
                        $html .= "<input type='checkbox' checked='checked' name='controller_acao[]' id='controller_acao' value='$dados[cod_id]' />" . $dados['FrameworkAcoes']['txt_nome_amigavel'] . "<br/>";
                    }
                    else
                    {
                        $html .= "<input type='checkbox' name='controller_acao[]' id='controller_acao' value='$dados[cod_id]' />" . $dados['FrameworkAcoes']['txt_nome_amigavel'] . "<br/>";
                    }
                }

                //Leva a $cont_cao para a view
                $this->View()->assign('html', $html);

                //seleciona o nome o nome do perfil da tabela permissaoPerfis
                $nome_perfil = $this->Delegator('ConcretePerfis', 'SelectPermissaoPerfilTipo', $this->getParam());

                //Leva a $nome_perfil para a view
                $this->View()->assign('nome_perfil', $nome_perfil['txt_perfil']);

                //jogar o id para o hidden
                $this->View()->assign('cod_tipo', $this->getParam('cod_tipo'));

                //Exibe a view
                $this->View()->display('editar.php');
            }
        }
    }

   /**
     * Metodo incluir
     * 
     * O metodo incluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita a inclusao chamando o model ConcretePerfis e o
     * metodo CadastraControlerAcao passando os dados enviados via POST e armazenando o resultado na 
     * variavel  $resultado. Caso os dados nao sejam enviados por POST 
     * chama o metodo SelectControllerAcaoIncluir e envia os dados necessarios para a view
     * 
     */
    private function incluir()
    {
        //Verifica se o formulário foi postado
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Solicita o cadastramento do Servico
            $resultado = $this->Delegator('ConcretePerfis', 'CadastraControlerAcao', $this->getPost());
        }
        else
        {
            //Select controller e ação
            $controller_acao = $this->Delegator('ConcretePerfis', 'SelectControllerAcaoIncluir');

            $array = array();
            $valor = null;
            $contagem = 0;
            $html = "";

            foreach ($controller_acao as $key => $dados)
            {

                if($dados['FrameworkControllers']['txt_nome_amigavel'] != $valor)
                {
                    $html .= "<br/><strong>" . $dados['FrameworkControllers']['txt_nome_amigavel'] . "</strong><br/>";
                    $valor = $dados['FrameworkControllers']['txt_nome_amigavel'];
                }

                $html .= "<input type='checkbox' name='controller_acao[]' id='controller_acao' value='$dados[cod_id]' />" . $dados['FrameworkAcoes']['txt_nome_amigavel'] . "<br/>";
            }
            

            //Leva a $cont_cao para a view
            $this->View()->assign('html', $html);

            //Exibe a view
            $this->View()->display('incluir.php');
        }
    }

    /**
     * Metodo detalhes
     * 
     * O metodo detalhes chama o model ConcretePerfis chamando o metodo SelectPermissaoVinculoId.
     * 
     */
    private function detalhes()
    {
        //Valida o cod_id
        if($this->getParam('cod_tipo') !== false && is_numeric($this->getParam('cod_tipo')))
        {
            //Select controller e ação
            $controller_acao = $this->Delegator('ConcretePerfis', 'SelectPermissaoVinculoId', array("cod_perfil" => $this->getParam('cod_tipo')));
            if(!empty($controller_acao)){
	            $array = array();
	            $valor = null;
	            $contagem = 0;
	            $html = "";
	
	            foreach ($controller_acao as $key => $dados)
	            {
	                if($dados['PermissaoGeral']['FrameworkControllers']['txt_nome_amigavel'] != $valor)
	                {
	                    $html .= "<br/><strong>" . $dados['PermissaoGeral']['FrameworkControllers']['txt_nome_amigavel'] . "</strong><br/>";
	                    $valor = $dados['PermissaoGeral']['FrameworkControllers']['txt_nome_amigavel'];
	                }
	
	                $html .= $dados['PermissaoGeral']['FrameworkAcoes']['txt_nome_amigavel'] . "<br/>";
	            }
	
	            //Leva a $cont_cao para a view
	            $this->View()->assign('html', $html);
            }else{
            	$this->View()->assign('html', '<strong>Não há permissões para esse perfil.</strong>');
            	
            }
            $this->View()->assign('cod_tipo', $this->getParam('cod_tipo'));

            //Exibe a view
            $this->View()->display('detalhes.php');
        }
    }

    /**
     * Metodo verificaLogin
     * 
     * O metodo verificaLogin chama o model ConcretePerfis chamando o metodo VerificaLogin.
     * 
     */
    private function verificaLogin()
    {
        $this->Delegator('ConcretePerfis', 'VerificaLogin', $this->getPost());
    }
}