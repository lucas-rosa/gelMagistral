<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe NoticiasController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Noticias
 * 
 * @package admin\app\controllers\Downloads\DownloadsController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class DownloadsController extends ControllerBase
{
    /**
     * Metodo DownloadsController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function DownloadsController($controller, $action, $urlparams)
    {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
     /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Downloads
     * mandando para o model ConcreteDownloads chamando o metodo SelectDownload
     * e armazenando o resultado na variavel $dados_download.
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action($params = null)
    {
        //Solicita os dados da tabela Dicas
        $dados_download = $this->Delegator('ConcreteDownloads', 'SelectDownload');

        //Leva os dados para a view
        $this->View()->assign('dados_download', $dados_download);

        //Verifica se há dados extras a serem adicionados na view(via parametro)
        if(!is_null($params))
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
     * Metodo incluir
     * 
     * O metodo incluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * selecionao ultimo download chamando o model ConcreteDownloads e o
     * metodo SelectUltimoDownload passando os dados enviados via POST e armazenando o resultado na 
     * variavel $ultimo. Apos ele edita a imagem chamando o model ConcreteDownloads e o metodo IncluirEditarDownload passando os
     * parametros em um arrray.
     * Caso os dados nao venham via post envia data e hora atual para view.
     * 
     * @link http://php.net/manual/en/function.date.php date
     * 
     */
    private function incluir()
    {
        //Verifica se o formulário foi postado
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Incluir os dados
            $this->Delegator('ConcreteDownloads', 'IncluirDownload', $this->getPost());
        }
        else
        {
            //Leva a data/hora atual para a view
            $this->View()->assign('data_hora_atual', date("d/m/Y H:i:s"));

            //Exibe a view
            $this->View()->display('incluir.php');
        }
    }
    
    /**
     * Metodo excluir
     * 
     * O metodo excluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita a exclusao do registro mandando para o model ConcreteDownloads chamando
     * o metodo ExcluirDownloads.
     * 
     */
    private function excluir()
    {
        //Verifica se o usuário enviou uma requisição POST
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Exclui os dados
            $this->Delegator('ConcreteDownloads', 'ExcluirDownloads', $this->getParam());
        }
    }

    /**
     * Metodo downloadArq
     * 
     * O metodo downloadArq cria o cabecalho do arquivo e efetiva o download.
     * 
     */
    private function downloadArq()
    {
        $arquivo = $this->getParam('arquivo');
        $diretorio = 'web_files/arq_din/';

        header("Content-type: application/save");
        // Pré define o nome do arquivo
        header("Content-Disposition: attachment; filename=$arquivo");
        header("Expires: 0");
        header("Pragma: no-cache");

        // Lê o arquivo para download
        readfile($diretorio . $arquivo);
    }
}