<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe LoginController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do LoginController.
 * 
 * @package app\controllers\Login\LoginController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class LoginController extends ControllerBase {

    /**
     * Metodo LoginController
     * 
     * Metodo Construtor do Controller(Obrigatorio Conter em Todos os Controllers)
     * Params String Action -> Acao a ser Executada Pelo Controller
     * Atencao Demais Metodos do Controller Devem ser Privados
     * 
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     * 
     */
    public function LoginController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }

    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar no LoginController.
     * 
     */
    private function index_action() {
        //Exibe a tela de login
        $this->View()->display('index.php');
    }
    
    /**
     * Metodo logado
     * 
     * Encaminha para o ConcreteLogin e solicita a acao Logado pasando
     * e armazena o resultado na variavel $login
     * 
     * @return array
     */
    private function logado() {
        //Verifica se o usuário enviou o formulário
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $login = $this->Delegator('ConcreteLogin', 'Logado', $this->getPost());
        }
    }
    
     /**
     * Metodo esqueceu
     * 
     * Encaminha para o ConcreteLogin e solicita a acao esqueceuSenha 
     * 
     */
    private function esqueceu() {
        $this->Delegator('ConcreteLogin', 'esqueceuSenha', $this->getPost());
    }

}