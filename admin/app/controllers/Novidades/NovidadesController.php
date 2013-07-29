<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe NovidadesController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Novidades
 * 
 * @package admin\app\controllers\Novidades\NovidadesController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class NovidadesController extends ControllerBase
{
    /**
     * global $altura_crop
     * 
     * @var integer $altura_crop
     */
    private $altura_crop = 300;
    /**
     * global $largura_crop
     * 
     * @var integer $largura_crop
     */
    private $largura_crop = 655;
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
    private $altura_cropada = 300;
    /**
     * global $largura_cropada
     * 
     * @var integer $largura_cropada
     */
    private $largura_cropada = 655;

    /**
     * Metodo NovidadesController
     *
     * Metodo Construtor do Controller (Obrigatorio Conter em Todos os Controllers)
     * Params String Action Acao a ser Executada Pelo Controller	 	
     * Atencao Demais Metodos do Controller Devem ser Privados 
     *
     * @param string $controller parametro responsavel por receber o controller.
     * @param string $action parametro responsavel por receber a action.
     * @param string $urlparams parametro responsavel por receber a url e seus parametros
     */
    public function NovidadesController($controller, $action, $urlparams)
    {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }
    
    /**
     * Metodo index_action
     * 
     * O metodo index_action faz as chamadas iniciais ao entrar em Novidades
     * mandando para o model ConcreteNovidades chamando o metodo SelectConteudos
     * e armazenando o resultado na variavel $dados_noticias.
     * 
     * @param string $params
     * 
     * @return array
     */
    private function index_action()
    {
        //Solicita os dados das notícias
        $dados_novidades = $this->Delegator('ConcreteNovidades', 'SelectConteudos');
        
        //Leva os dados para a view
        $this->View()->assign('dados_novidades', $dados_novidades);

        //Verifica se há dados extras a serem adicionados na view(via SESSÃO)
        if(isset($_SESSION['view_data']))
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
     * solicita a inclusao chamando o model ConcreteNovidades e o
     * metodo Incluir passando os dados enviados via POST e armazenando o resultado na 
     * variavel  $resultado. Caso os dados nao sejam enviados por POST 
     * chama o metodo getIdiomas e envia os dados necessarios para a view
     * 
     */
    private function incluir()
    {
        //Verfica se o formulário foi postado
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Solicita o cadastramento do Servico
            $resultado = $this->Delegator('ConcreteNovidades', 'IncluirNovidade', $this->getPost());
        }
        else
        {
            //Busca os idiomas
            $this->getIdiomas();

            //Leva a data/hora atual para a view
            $this->View()->assign('data_hora_atual', date("d/m/Y H:i:s"));

            //Leva a data/hora atual + 10 anos para a view
            $this->View()->assign('data_hora_termino', date("d/m/Y", mktime(0, 0, 0, date('m'), date('d'), date('Y') + 10)) . " " . date("H:i:s"));

            $this->View()->assign('altura_crop', $this->altura_crop);
            $this->View()->assign('largura_crop', $this->largura_crop);
            $this->View()->assign('altura_cropada', $this->altura_cropada);
            $this->View()->assign('largura_cropada', $this->largura_cropada);
            //Exibe a view
            $this->View()->display('incluir.php');
        }
    }
    
     /**
     * Metodo editar
     * 
     * O metodo editar verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita o cadastro do registro mandando para o model ConcreteNovidades chamando
     * o metodo EditaNovidade. Caso os dados nao sejam enviados por POST chama o model
     * ConcreteNovidades e o metodo SelectNovidadeRelacaoIdEditar passando o id por parametro e armazena 
     * o resultado na variavel $dados_noticia. 
     * 
     * @return array
     */
    private function editar()
    {
        //Verifica se o formulário foi postado
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Solicita o cadastramento do Conteudo
            $this->Delegator('ConcreteNovidades', 'EditaNovidade', $this->getPost());
        }
        else
        {
            //Valida o id do Conteudo
            if ($this->getParam('cod_relacao_idioma') !== false && is_numeric($this->getParam('cod_relacao_idioma')))
            {
                //Localiza o Conteudo
                $dados_novidade = $this->Delegator('ConcreteNovidades', 'SelectNovidadeRelacaoIdEditar', $this->getParam());
                
                //Dados do Conteudo
                $this->View()->assign('dados_novidade', $dados_novidade);
                $this->View()->assign('altura_crop', $this->altura_crop);
                $this->View()->assign('largura_crop', $this->largura_crop);
                $this->View()->assign('altura_cropada', $this->altura_cropada);
                $this->View()->assign('largura_cropada', $this->largura_cropada);
            }

            //Exibe a view
            $this->View()->display('editar.php');
        }
    }
    
    /**
     * Metodo excluir
     * 
     * O metodo excluir verififca se os dados foram enviados por POST. Caso isso se confirme
     * solicita a exclusao do registro mandando para o model ConcreteNovidades chamando
     * o metodo ExcluirNovidade.
     * 
     */
    private function excluir()
    {
        //Verifica se o usuário enviou uma requisição POST
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            //Exclui os dados
            $this->Delegator('ConcreteNovidades', 'ExcluirNovidade', $this->getParam());
        }
    }
    
    /**
     * Metodo detalhes
     * 
     * O metodo detalhes chama o model ConcreteNovidades chamando o metodo SelectNovidadeRelacaoId.
     * Estancia o Helper e armazena na variavel $helper e envia para a view.
     * 
     */
    private function detalhes()
    {
        //Valida o id
        if($this->getParam('cod_relacao_idioma') !== false && is_numeric($this->getParam('cod_relacao_idioma')))
        {
            //Solicita os dados da Vaga
            $dados_novidade = $this->Delegator('ConcreteNovidades', 'SelectNovidadeRelacaoId', $this->getParam());

            //instancia o helper
            $helper = HelperFactory::getInstance();

            //Envia o Helper para a view afim de auxiliar na formatação dos dados
            $this->View()->assign('Helper', $helper);

            //Coloca os dados da vaga na View
            $this->View()->assign('dados_novidade', $dados_novidade);

            //Apresenta a view
            $this->View()->display('detalhes.php');
        }
    }
    
   /**
     * Metodo getIdiomas
     * 
     * O metodo getIdiomas chama o model ConcreteNovidades chamando o metodo getIdiomas.
     * 
     */
    private function getIdiomas()
    {
        //Solicita os dados dos idiomas
        $dados = $this->Delegator('ConcreteNovidades', 'getIdiomas');

        //Associa os dados na view
        $this->View()->assign('idiomas', $dados);
    }
    
     /**
     * Metodo imagem
     * 
     * Faz upload de imagem no formulario de inclusao.
     * Caso seja setado o campo $_POST['save_thumb_inc'] chama o model ConcreteNovidades e o metodo  
     * salvarCropadaInc passando o diretorio e o tamanho maximo em um array.
      * 
     * Caso seja setado o campo $_POST['a'] chama o model ConcreteNovidades e o metodo
     * deletarImagemInc passando a altura e a largura do crop em um array.
      * 
     * Caso seja setado o campo $_POST['flag'] ele cria a sessao user_file_ext, apaga a sessao randomico
     * e apaga os arquivos dentro da pasta.
      * 
     * Caso seja setado o campo $_POST['reiniciar'] e seja setado o campo $_SESSION['user_file_ext'] ou
     * $_SESSION['randomico']. $_SESSION['user_file_ext'] recebe vazio e acaba com a $_SESSION['randomico'].
      *  
     * Caso nao se aplique nenhuma das questoes acima evia para o model ConcreteNovidades chamando o metodo
     * salvarImagemOriginal passando o diretorio e o tamanho maximo em um array.  
     * 
     */
    public function imagem()
    {
        if(isset($_POST['save_thumb_inc']))
        {
            //Salva a imagem cropada na view de inclusao
            $this->Delegator('ConcreteNovidades', 'salvarCropadaInc', array('diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo));
        }
        elseif(isset($_POST['a']))
        {
            //Deleta a imagem na inclusao
            $this->Delegator('ConcreteNovidades', 'deletarImagemInc', array('altura_crop' => $this->altura_crop, 'largura_crop' => $this->largura_crop, 'diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo, 'largura_maxima' => $this->largura_maxima));
        }
        elseif(isset($_POST['flag']))
        {
            $_SESSION['user_file_ext'] = "";
            unset($_SESSION['randomico']);
            unlink(ARQ_DIN . $_POST['campo']);
        }
        elseif(isset($_POST['reiniciar']))
        {
            if(isset($_SESSION['user_file_ext']) || isset($_SESSION['randomico']))
            {
                $_SESSION['user_file_ext'] = "";
                unset($_SESSION['randomico']);
            }
        }
        else
        {
            //Salva a imagem original 
            $this->Delegator('ConcreteNovidades', 'salvarImagemOriginal', array('diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo));
        }
    }
    
     /**
     * Metodo imagemEdicao
     * 
     * Faz upload de imagem no formulario de edicao
     * 
     * Caso seja setado o campo $_POST['save_thumb_edt'] chama o model ConcreteNovidades e o metodo  
     * salvarCropadaEdt passando o diretorio e o tamanho maximo em um array.
     * 
     * Caso seja setado o campo $_POST['inclusao_banco'] chama o model ConcreteNovidades e o metodo
     * incluirImagemBancoEdicao.
     * 
     * Caso seja setado o campo $_POST['deletar'] chama o model ConcreteNovidades e o metodo
     * deletimg.
     * 
     * Caso seja setado o campo $_POST['cancelar_upload'] chama o model ConcreteNovidades e o metodo
     * cancelarUpload.
     * 
     * Caso seja setado o campo $_POST['salvar_recropagem'] chama o model ConcreteNovidades e o metodo
     * salvarRecropagem.
     *
     * Caso seja setado o campo $_POST['reiniciar'] e seja setado o campo $_SESSION['user_file_ext'] ou
     * $_SESSION['randomico']. $_SESSION['user_file_ext'] recebe vazio e acaba com a $_SESSION['randomico']. 
     * 
     * Caso nao se aplique nenhuma das questoes acima evia para o model ConcreteNovidades chamando o metodo
     * salvarImagemOriginal passando o diretorio e o tamanho maximo em um array. 
     *  
     */
 
    public function imagemEdicao()
    {
        if (isset($_POST['save_thumb_edt']))
        {
            $this->Delegator('ConcreteNovidades', 'salvarCropadaEdt', array('diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo));
        }
        elseif(isset($_POST['inclusao_banco']))
        {
            $this->Delegator('ConcreteNovidades', 'incluirImagemBancoEdicao');
        }elseif(isset($_POST['deletar']))
        {
            $this->Delegator('ConcreteNovidades', 'deletimg');
        }
        elseif(isset($_POST['cancelar_upload']))
        {
            $this->Delegator('ConcreteNovidades', 'cancelarUpload');
        }elseif(isset($_POST['salvar_recropagem']))
        {
            $this->Delegator('ConcreteNovidades', 'salvarRecropagem', array('diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo));
        }elseif(isset($_POST['reiniciar']))
        {
            if(isset($_SESSION['user_file_ext']) || isset($_SESSION['randomico']))
            {
                $_SESSION['user_file_ext'] = "";
                unset($_SESSION['randomico']);
            }
        }
        else
        {
            $this->Delegator('ConcreteNovidades', 'salvarImagemOriginal', array('diretorio' => $this->diretorio, 'tamanho_maximo' => $this->tamanho_maximo));
        }
    }
}