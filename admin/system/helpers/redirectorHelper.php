<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe redirectorHelper
 * 
 * Plugin para Trabalhar com Redirecionamento de Pagina
 * 
 * @package admin\system\helpers\redirectorHelper
 * @author  Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 *
 */
class redirectorHelper {
    
    /**
     * cria um array
     * 
     * @var string[] $parameters
     */
    private $parameters = array();

     /**
     * Metodo go
     * 
     * Faz o redirecionamento das paginas
     * 
     * @param string $data 
     */
    protected function go($data) {

        //Instancia a tabela WebsiteInfo
        $TabelaWebSiteInfo = TableFactory::getInstance('WebsiteInfo');
        //Busca a URL Default
        $DadosSistema = $TabelaWebSiteInfo->getWebSiteInfo();
        //URL DEFAULT
        $URL_DEFAULT = $DadosSistema[0]['url_default_admin'];

        header("Location: " . $URL_DEFAULT . $data);
    }
    
     /**
     * Metodo setUrlParameter
     * 
     * Seta a url passada por parametro
     * 
     * @param string $name
     * @param string $value 
     * 
     * @return string  
     */
    public function setUrlParameter($name, $value) {
        $this->parameters[$name] = $value;
        return $this;
    }
    
     /**
     * Metodo getUrlParameters
     * 
     * Busca a url passada por parametro
     * 
     * @return string  
     */
    protected function getUrlParameters() {

        //Verifica o tamanho do Array de parâmetros e se o atributo realmente é um Array(por segurança)	
        if (count($this->parameters) > 0 && is_array($this->parameters)) {
            //Parametros adicionados
            $params = "";
            //Percorremos os parâmetros   		
            foreach ($this->parameters as $name => $value) {
                $params .= $name . '/' . $value . '/';
            }
            return $params;
        }
    }
    
     /**
     * Metodo goToController
     * 
     * Envia a url para o controller
     * 
     * @param string $controller
     * 
     */
    public function goToController($controller) {
        $this->go($controller . '/index/' . $this->getUrlParameters());
    }
    
    /**
     * Metodo goToAction
     * 
     * Envia a url para a action
     * 
     * @param string $action
     * 
     */
    public function goToAction($action) {
        $this->go($this->getCurrentController() . '/' . $action . '/' . $this->getUrlParameters());
    }
    
    /**
     * Metodo goToControllerAction
     * 
     * Envia a url para o controller e para a action
     * 
     * @param string $controller
     * @param string $action
     * 
     */
    public function goToControllerAction($controller, $action) {
        $this->go($controller . '/' . $action . '/' . $this->getUrlParameters());
    }
    
     /**
     * Metodo goToIndex
     * 
     * Envia a url para a index
     * 
     */
    public function goToIndex() {
        $this->go('index');
    }
    
      /**
     * Metodo goToUrl
     * 
     * Envia para a url
     * 
     * @param string $url 
     */
    public function goToUrl($url) {
        header("Location: " . $url);
    }

}

