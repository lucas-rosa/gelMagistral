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
 * por todas as acoes dentro do Faleconosco.
 * 
 * @package app\controllers\Faleconosco\FaleconoscoController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class FaleconoscoController extends ControllerBase
{
    /**
     * Metodo FaleconoscoController
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
     * O metodo index_action faz as chamadas iniciais ao entrar em Faleconosco.
     * 
     * @param string $params
     */
    private function index_action($params = null)
    {
        //Solicita os dados da Vaga
        $resultados = $this->Delegator('ConcreteFaleconosco', 'SelectContatos');

        //joga o $dados na view
        $this->View()->assign('dados_contatos', $resultados);

        //verifica se foi post
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $this->enviar();
        }

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

        //mostra a view
        $this->View()->display('index.php');
    }

    /**
     * Metodo enviar
     * 
     * Envia os dados que vieram do formulario para o ConcreteFaleconosco 
     * chamando o metodo InsertFaleconosco
     * 
     */
    private function enviar()
    {
        //verifica se foi post
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //envia os dados
            $resultado_validacao = $this->Delegator("ConcreteFaleconosco", "InsertFaleconosco", $this->getPost());
        }
    }

    /**
     * Metodo gerarCaptcha
     * 
     * Envia os dados para o ConcreteFaleconosco 
     * chamando o metodo Captcha para gerar o Captcha  
     * 
     */
    private function gerarCaptcha()
    {
        //envia os dados para o ConcreteFaleconosco
        return $this->Delegator("ConcreteFaleconosco", "Captcha");
    }
}
?>