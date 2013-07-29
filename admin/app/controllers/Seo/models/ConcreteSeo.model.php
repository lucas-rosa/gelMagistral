<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteSeo
 *
 * Esta classe e responsavel por todas as requisicoes a tabela WebsitePages
 * 
 * @package admin\app\controllers\Seo\models\ConcreteSeo
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteSeo {

    /**
     * Metodo SelectDados
     * 
     * Seleciona todos os dados cadastrados na tabela WebsitePages.
     * Faz uma requisicao a tabela WebsitePages chamando o metodo SelectDados
     * 
     * @return string[]
     * 
     */
    public function SelectDados() {
        //Retorna os dados
        return TableFactory::getInstance('WebsitePages')->SelectDados();
    }
    
    /**
     * Metodo ExcluirSeo
     * 
     * Exclui o Seo conforme os dados passados por parametro.
     * Faz uma requisicao a tabela WebsitePages chamando o metodo ExcluirSeoId
     * passando true ou false por parametro. 
     * 
     * @param string $parametros  
     * 
     * @return string[]
     * 
     */
    public function ExcluirSeo($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia a mensagem
        $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        if (TableFactory::getInstance('WebsitePages')->ExcluirSeoId($parametros) === true) {
            $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34], 'sucesso' => true);

            echo Zend_Json::encode(array("1"));
        } else {
            $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[60], 'erro' => true);

            echo Zend_Json::encode(array("1"));
        }
    }
    
    /**
     * Metodo IncluiSeo
     * 
     * Cadastra os dados na tabela WebsitePages.
     * Faz uma requisicao a tabela WebsitePages chamando o metodo InserirSeo passando 
     * true ou false por parametro. 
     * 
     * @param string $parametros 
     * 
     * @return string[]
     * 
     */
    public function IncluiSeo($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia o componente de validaчуo
        $ComponenteValidacao = getComponent('validacoes/seo.validacao', 'SeoValidacao');

        //Executa a Validaчуo
        $resultado_validacao = $ComponenteValidacao->validar($parametros);

        //Verifica o resultado da validaчуo
        if (count($resultado_validacao) == 0) {
            //Trata os dados antes de gravar no banco de dados
            $parametros = HelperFactory::getInstance()->TrataValor($parametros, null, null, null, true);

            if (TableFactory::getInstance('WebsitePages')->InserirSeo($parametros) === true) {
                //Instanciando a tabela de TextosLayouAdmin
                $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

                //Mensagem de confirmaчуo
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[36], 'sucesso' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
            }
        } else {
            echo Zend_Json::encode($resultado_validacao);
        }
    }
    
    /**
     * Metodo SelectSeoId
     * 
     * Seleciona os dados da tabela WebsitePages conforme o Id passado por parametro
     * Faz uma requisicao a tabela WebsitePages chamando o metodo SelectSeoId.
     * 
     * @param string $parametros 
     * 
     * @return string[]
     * 
     */
    public function SelectSeoId($parametros) {
        //Detalhes do ID enviado
        return TableFactory::getInstance('WebsitePages')->SelectSeoId($parametros);
    }
    
    /**
     * Metodo EditarSeo
     * 
     * Edita os dados da tabela WebsitePages conforme o Id passado por parametro
     * Faz uma requisicao a tabela WebsitePages chamando o metodo EditarSeo.
     * 
     * @param string $parametros 
     * 
     * @return string[]
     * 
     */
    public function EditarSeo($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia o componente de validaчуo
        $ComponenteValidacao = getComponent('validacoes/seo.validacao', 'SeoValidacao');

        //Executa a Validaчуo
        $resultado_validacao = $ComponenteValidacao->validar($parametros);

        //Verifica o resultado da validaчуo
        if (count($resultado_validacao) == 0) {
            //Trata os dados antes de gravar no banco de dados
            $parametros = HelperFactory::getInstance()->TrataValor($parametros, null, null, null, true);

            //Instanciando a tabela de TextosLayouAdmin
            $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

            if (TableFactory::getInstance('WebsitePages')->EditarSeo($parametros) === true) {
                //Mensagem de confirmaчуo
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35], 'sucesso' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
            } else {
                //Mensagem de confirmaчуo
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[58], 'erro' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
            }
        } else {
            echo Zend_Json::encode($resultado_validacao);
        }
    }

}

?>