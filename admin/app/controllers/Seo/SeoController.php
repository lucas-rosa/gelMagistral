<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe SeoController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Seo.
 * 
 * @package admin\app\controllers\Seo\SeoController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class SeoController extends ControllerBase {

    /**
     * Metodo SeoController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action -> Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     * 
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function SeoController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Seo. 
     * Faz uma chamada para o model ConcreteSeo e o metodo SelectDados armazenando
     * os dados em $dados.
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action($params = null) {
        //Seleciona os dados
        $dados = $this->Delegator('ConcreteSeo', 'SelectDados');

        //Coloca os dados na view
        $this->View()->assign('dados_seo', $dados);

        //Verifica se há dados extras a serem adicionados na view(via parametro)
        if (!is_null($params)) {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $params);
        }

        //Verifica se há dados extras a serem adicionados na view(via SESSÃO)
        else if (isset($_SESSION['view_data'])) {
            //Adiciona os dados extras na view
            $this->View()->assign('params', $_SESSION['view_data']);
            //Elimina a sessão
            unset($_SESSION['view_data']);
        }

        //Apresenta a view
        $this->View()->display('index.php');
    }
    
    /**
     * Metodo excluir
     * 
     * O metodo excluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita a exclusao do registro mandando para o model ConcreteSeo chamando
     * o metodo ExcluirSeo.
     * 
     */
    private function excluir() {
        //Verifica se o usuário enviou uma requisição POST
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Exclui os dados
            $this->Delegator('ConcreteSeo', 'ExcluirSeo', $this->getParam());
        }
    }
    
     /**
     * Metodo detalhes
     * 
     * O metodo detalhes chama o model ConcreteSeo chamando o metodo SelectSeoId.
     * 
     */
    private function detalhes() {
        //Valida o id
        if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id'))) {
            //Solicita os dados
            $dados_seo = $this->Delegator('ConcreteSeo', 'SelectSeoId', $this->getParam());

            //Coloca os dados na View
            $this->View()->assign('dados_seo', $dados_seo);

            //Apresenta a view
            $this->View()->display('detalhes.php');
        }
    }
    
    /**
     * Metodo incluir
     * 
     * O metodo incluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita a inclusao chamando o model ConcreteSeo e o
     * metodo IncluiSeo passando os dados enviados via POST e armazenando o resultado na 
     * variavel  $resultado. Caso contrario exibe a view.
     * 
     */
    private function incluir() {
        //Verifica se o formulário foi postado
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Solicita o cadastramento do banner
            $resultado = $this->Delegator('ConcreteSeo', 'IncluiSeo', $this->getPost());
        } else {
            //Exibe a view
            $this->View()->display('incluir.php');
        }
    }
    
    /**
     * Metodo editar
     * 
     * O metodo editar verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita o cadastro do registro mandando para o model ConcreteSeo chamando
     * o metodo EditarSeo. Caso os dados nao sejam enviados por POST chama o model
     * ConcreteSeo e o metodo SelectSeoId passando o id por parametro e armazena 
     * o resultado na variavel $dados_seo. 
     * 
     * @return array
     */
    private function editar() {
        //Verifica se o formulário foi postado
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //Solicita o cadastramento do banner
            $resultado = $this->Delegator('ConcreteSeo', 'EditarSeo', $this->getPost());
        } else {
            //Valida o id do seo
            if ($this->getParam('cod_id') !== false && is_numeric($this->getParam('cod_id'))) {
                //Seleciona os dados da tabela websitePages
                $dados_seo = $this->Delegator('ConcreteSeo', 'SelectSeoId', $this->getParam());

                //Dados do seo
                $this->View()->assign('dados_seo', $dados_seo);

                //Exibe a view
                $this->View()->display('editar.php');
            }
        }
    }

}