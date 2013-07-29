<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteLogado
 *
 * Esta e responsavel por todas as requisicoes a tabela WebsiteStats
 * 
 * @package admin\app\controllers\Logado\models\ConcreteLogado
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteLogado {

    /**
     * Metodo SelectWebsiteStatus
     * 
     * Seleciona todos os dados cadastrados na tabela WebsiteStats.
     * Faz uma requisicao a tabela WebsiteStats chamando o metodo SelecionaTudo
     * 
     * @return string[]
     * 
     */
    public function SelectWebsiteStatus() {
        return TableFactory::getInstance('WebsiteStats')->SelecionaTudo();
    }

}

?>