<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe DicasdesaudeController
 *
 * Esta classe extende ao ControllerBase sendo responsavel
 * por todas as acoes dentro do Dicasdesaude.
 * 
 * @package app\controllers\Listacomum\ListacomumController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class DicasdesaudeController extends ControllerBase {
    
    //quantidade limite da paginacao
    private $qtd = 10;
    
    /**
     * Metodo ListacomumController
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
    public function DicasdesaudeController($controller, $action, $urlparams) {
        //Inicializa os parâmetros da SuperClasse
        parent::ControllerBase($controller, $action, $urlparams);
        //Envia o Controller para a action solicitada
        $this->$action();
    }

    /**
     * Metodo index_action
     * 
     * Acoes Iniciais ao Entrar na Index deste Controller
     *
     */

    private function index_action() {
        
        //Solicita os dados
        $dados_textos = $this->Delegator('ConcreteDicasdesaude', 'SelectTextos');
        
        //Solicita os dados das dicas de saude
        $dados_dicas = $this->Delegator('ConcreteDicasdesaude', 'SelectDicas', array('qtd' => $this->qtd));
            
        //Coloca o Helper na View
        $this->View()->assign('Helper', HelperFactory::getInstance());

        //Leva os textos para a view
        $this->View()->assign('dados_textos', $dados_textos);
        
        //Leva as dicas para a view
        $this->View()->assign('dados_dicas', $dados_dicas);
        
        //envia os videos para a view
        $this->videos();
        
        if($this->getParam('page') != false){
            $this->htmlPaginacao($this->getParam('page'));
            
        }else{
            $this->htmlPaginacao(1);
            
        }
        
        //Exibe a view
        $this->View()->display('index.php');
    }
    
     /**
     * Metodo paginacao
     * 
     * Acoes Iniciais de paginacao ao entrar na Index deste Controller
     *
     */

    private function paginacao() {
        
        $page = ($this->getParam('page') * $this->qtd) - $this->qtd;
        
        //Solicita os dados das dicas de saude
        $dados_dicas = $this->Delegator('ConcreteDicasdesaude', 'SelectDicas', array('page' => $page, 'qtd' => $this->qtd));
        
        //Coloca o Helper na View
        $this->View()->assign('Helper', HelperFactory::getInstance());
        
        //Leva as dicas para a view
        $this->View()->assign('dados_dicas', $dados_dicas);
        
         //envia os videos para a view
        $this->videos();
        
        if($this->getParam('page') != false){
            $this->htmlPaginacao($this->getParam('page'));
            
        }else{
            $this->htmlPaginacao(1);
            
        }
        
        //Exibe a view
        $this->View()->display('index.php');
    }
    
     /**
     * Metodo htmlPaginacao
     * 
     * Monta o html da paginacao
     * @param int $pagina
     */
    public function htmlPaginacao($pagina){
       
       $result = $this->Delegator('ConcreteDicasdesaude', 'TotalDicas');
       
       $total = $result[0]['total'];
      
       
       $total_links = ceil($total/$this->qtd); 
       
       for ($i = 1; $i <= $total_links; $i++) {
            if ($i == $pagina) {
               $paginacao[] = $i;
            } else {
               $paginacao[] = "<a href = '".DEFAULT_URL."dicasdesaude/paginacao/page/$i'> $i </a>";
            }
        }
        
         //Leva os dados para a view
        $this->View()->assign('paginacao', $paginacao);   
       
    }
    
     /**
     * Metodo videos
     * 
     * Acoes iniciais da galeria de videos ao entrar na index deste Controller
     *
     */
    private function videos(){
        
        //Solicita os dados das dicas de saude
        $dados_videos = $this->Delegator('ConcreteDicasdesaude', 'SelectVideos');
        
        //Leva as dicas para a view
        $this->View()->assign('dados_videos', $dados_videos);
        
        //print_r($dados_videos);exit;
        
    }
    
    /**
     * Metodo detalhes_action
     * 
     * Acoes Iniciais ao Entrar na Index deste Controller
     *
     */
    private function detalhes() {
        
         //instancia o helper
         $helper = HelperFactory::getInstance();
         
         $cod_id = $helper->getPermalink();
         
        //Solicita os dados
        $dados_dicas = $this->Delegator('ConcreteDicasdesaude', 'SelectDicasId', array('cod_id' => $cod_id));
        
         //Solicita os dados
        $dados_outras_dicas = $this->Delegator('ConcreteDicasdesaude', 'SelectOutrasDicas', array('cod_id' => $cod_id));

        //Coloca o Helper na View
        $this->View()->assign('Helper', HelperFactory::getInstance());

        //Leva os dados para a view
        $this->View()->assign('dados_dicas', $dados_dicas);
        
         //Leva os dados para a view
        $this->View()->assign('dados_outras_dicas', $dados_outras_dicas);
        
        //Exibe a view
        $this->View()->display('detalhes.php');
    }
    
   

}