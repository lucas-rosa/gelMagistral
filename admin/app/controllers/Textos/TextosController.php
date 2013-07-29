<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe TextosController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Texto.
 * 
 * @package admin\app\controllers\Texto\TextoController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class TextosController extends ControllerBase
{    
     /**
     * global $altura_crop
     * 
     * @var integer $altura_crop
     */
    private $altura_crop = 200;
    /**
     * global $largura_crop
     * 
     * @var integer $largura_crop
     */
    private $largura_crop = 200;
     /**
     * global $diretorio
     * 
     * @var string $diretorio
     */
    private $diretorio = "../web_files/arq_din/";
    /**
     * global $tamanho_maximo
     * 
     * @var integer $tamanho_maximo
     */
    private $tamanho_maximo = 1;
     /**
     * global $altura_cropada
     * 
     * @var integer $altura_cropada
     */
    private $altura_cropada = 200;
    /**
     * global $largura_cropada
     * 
     * @var integer $largura_cropada
     */
    private $largura_cropada = 200;
    
    /**
     * Metodo TextosController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     * 
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */

    public function TextosController($controller, $action, $urlparams)
    {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Textos. 
     * Faz uma chamada para o model ConcreteTextos e o metodo BuscarTextos armazenando
     * os dados em $dados_textos.
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action($params = null)
    {
        //Solicita os dados dos textos
        $dados_textos = $this->Delegator('ConcreteTextos', 'BuscarTextos');

        //Leva os dados para a view
        $this->View()->assign('dados_textos', $dados_textos);

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
     * Metodo detalhes
     * 
     * O metodo detalhes chama o model ConcreteTextos chamando o metodo BuscarDetalhes e armazena
     * o resultado na variavel $recordset.
     * 
     */
    private function detalhes()
    {
        //Valida o id
        if ($this->getParam('cod_relacao_idioma') !== false && is_numeric($this->getParam('cod_relacao_idioma')))
        {
            //Solicita os dados da Vaga
            $dados_texto = $this->Delegator('ConcreteTextos', 'BuscarDetalhes', $this->getParam());

            //Coloca os dados da vaga na View
            $this->View()->assign('dados_texto', $dados_texto);

            //Apresenta a view
            $this->View()->display('detalhes.php');
        }
    }
    
    /**
     * Metodo editar
     * 
     * O metodo editar verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita o cadastro do registro mandando para o model ConcreteTextos chamando
     * o metodo EditaTexto. Caso os dados nao sejam enviados por POST chama o model
     * ConcreteTextos e o metodo BuscarEdicaoId passando o id por parametro e armazena 
     * o resultado na variavel $dados_texto. 
     * 
     * @return array
     */
    private function editar()
    {
        //Verifica se o usuário postou o formulário
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Solicita o cadastramento do texto
            $resultado = $this->Delegator('ConcreteTextos', 'EditaTexto', $this->getPost());
        }
        else
        {
            //Valida o id do texto
            if($this->getParam('cod_relacao_idioma') !== false && is_numeric($this->getParam('cod_relacao_idioma')))
            {
            
                //Busca os dados do texto
                $dados_texto = $this->Delegator('ConcreteTextos', 'BuscarEdicaoId', $this->getParam());

                //Leva os dados para a view
                $this->View()->assign('dados_texto', $dados_texto);
            }

            //Exibe a view
            $this->View()->assign('altura_crop', $this->altura_crop);
            $this->View()->assign('largura_crop', $this->largura_crop);
            $this->View()->assign('altura_cropada', $this->altura_cropada);
            $this->View()->assign('largura_cropada', $this->largura_cropada);

            $this->View()->display('editar.php');
        }
    }
    
    /**
     * Metodo imagemEdicao
     * 
     * Faz upload de imagem no formulario de edicao
     * 
     * Caso seja setado o campo $_POST['save_thumb_edt'] chama o model ConcreteTextos e o metodo  
     * salvarCropadaEdt passando o diretorio e o tamanho maximo em um array.
     * 
     * Caso seja setado o campo $_POST['inclusao_banco'] chama o model ConcreteTextos e o metodo
     * incluirImagemBancoEdicao.
     * 
     * Caso seja setado o campo $_POST['deletar'] chama o model ConcreteTextos e o metodo
     * deletimg.
     * 
     * Caso seja setado o campo $_POST['cancelar_upload'] chama o model ConcreteTextos e o metodo
     * cancelarUpload.
     * 
     * Caso seja setado o campo $_POST['salvar_recropagem'] chama o model ConcreteTextos e o metodo
     * salvarRecropagem.
     *
     * Caso seja setado o campo $_POST['reiniciar'] e seja setado o campo $_SESSION['user_file_ext'] ou
     * $_SESSION['randomico']. $_SESSION['user_file_ext'] recebe vazio e acaba com a $_SESSION['randomico']. 
     * 
     * Caso nao se aplique nenhuma das questoes acima evia para o model ConcreteTextos chamando o metodo
     * salvarImagemOriginal passando o diretorio e o tamanho maximo em um array. 
     *  
     */
    public function imagemEdicao()
    {
        if (isset($_POST['save_thumb_edt']))
        {
            $this->Delegator('ConcreteTextos', 'salvarCropadaEdt', array('diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo));
        }
        elseif (isset($_POST['inclusao_banco']))
        {
            $this->Delegator('ConcreteTextos', 'incluirImagemBancoEdicao');
        }
        elseif (isset($_POST['deletar']))
        {
            $this->Delegator('ConcreteTextos', 'deletimg');
        }
        elseif (isset($_POST['cancelar_upload']))
        {
            $this->Delegator('ConcreteTextos', 'cancelarUpload');
        }
        elseif (isset($_POST['salvar_recropagem']))
        {
            $this->Delegator('ConcreteTextos', 'salvarRecropagem', array('diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo));
        }
        elseif (isset($_POST['reiniciar']))
        {
            if (isset($_SESSION['user_file_ext']) || isset($_SESSION['randomico']))
            {
                $_SESSION['user_file_ext'] = "";
                unset($_SESSION['randomico']);
            }
        }
        else
        {
            $this->Delegator('ConcreteTextos', 'salvarImagemOriginal', array('diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo));
        }
    }

}