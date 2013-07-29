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
 * por todas as acoes dentro do Novidades.
 * 
 * @package app\controllers\Listacomum\ListacomumController
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class NovidadesController extends ControllerBase {
    
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
    public function NovidadesController($controller, $action, $urlparams) {
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
        
        if($this->getParam('page') != false)
        {    
            $page = ($this->getParam('page') * $this->qtd) - $this->qtd;
        }
        //Solicita os dados
        $dados_novidades = $this->Delegator('ConcreteNovidades', 'SelectNovidades', array('page' => $page, 'qtd' => $this->qtd));

        //Coloca o Helper na View
        $this->View()->assign('Helper', HelperFactory::getInstance());

        //Leva os dados para a view
        $this->View()->assign('dados_novidades', $dados_novidades);
        
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
       
       $result = $this->Delegator('ConcreteNovidades', 'TotalNovidades');
       
       $total = $result[0]['total'];
      
       
       $total_links = ceil($total/$this->qtd); 
       
       for ($i = 1; $i <= $total_links; $i++) {
            if ($i == $pagina) {
               $paginacao[] = $i;
            } else {
               $paginacao[] = "<a href = '".DEFAULT_URL."novidades/index/page/$i'> $i </a>";
            }
        }
        
         //Leva os dados para a view
        $this->View()->assign('paginacao', $paginacao);   
       
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
         
         $cod_relacao_idioma = $helper->getPermalink();

        //Solicita os dados
        $dados_novidades = $this->Delegator('ConcreteNovidades', 'SelectNovidadesId', array('cod_relacao_idioma' => $cod_relacao_idioma));
        
         //Solicita os dados
        $dados_outras_novidades = $this->Delegator('ConcreteNovidades', 'SelectOutrasNovidades', array('cod_relacao_idioma' => $cod_relacao_idioma));
        
        //Coloca o Helper na View
        $this->View()->assign('Helper', HelperFactory::getInstance());

        //Leva os dados para a view
        $this->View()->assign('dados_novidades', $dados_novidades);
        
        //Leva os dados para a view
        $this->View()->assign('dados_outras_novidades', $dados_outras_novidades);

        //Exibe a view
        $this->View()->display('detalhes.php');
    }

}