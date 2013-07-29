<?

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteIdiomas
 *
 * Esta classe e responsavel por todas as requisicoes a tabela WebsiteIdiomas.
 * 
 * @package admin\app\controllers\Idiomas\models\ConcreteIdiomas
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteIdiomas {

    /**
     * Metodo SelecionaIdioma
     * 
     * Seleciona todos os dados cadastrados na tabela WebsiteIdiomas.
     * Faz uma requisicao a tabela WebsiteIdiomas chamando o metodo getIdiomas
     * 
     * @return string[]
     * 
     */
    public function SelecionaIdioma() {
        //Retorna os dados
        return TableFactory::getInstance('WebsiteIdiomas')->getIdiomas();
    }
    
    /**
     * Metodo ExcluirIdioma
     * 
     * Eclui o idioma na tabela WebsiteIdiomas conforme o Id.
     * Faz uma requisicao a tabela WebsiteIdiomas chamando o metodo ExcluirIdiomaId
     * 
     * @param string[] $parametros
     * 
     * @return string[]
     * 
     */
    public function ExcluirIdioma($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instancia a mensagem
        $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

        //seleciona o id padrão da tabela websiteInfo
        $id_idioma_padrao = TableFactory::getInstance('WebsiteInfo')->getWebSiteInfo();

        if ($id_idioma_padrao[0]['cod_idioma_default'] != $parametros['cod_id']) {
            //faz a exclusão
            if (TableFactory::getInstance('WebsiteIdiomas')->ExcluirIdiomaId($parametros) === true) {
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[34], 'sucesso' => true);

                echo Zend_Json::encode(array("1"));
            }
            //mensagem se a exclusão der errado
            else {
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[60], 'erro' => true);

                echo Zend_Json::encode(array("1"));
            }
        } else {
            //Resposta do JSON
            $_SESSION['view_data'] = array('mensagem_confirmacao' => 'O idioma padrão não pode ser excluído', 'erro' => true);

            echo Zend_Json::encode(array("1"));
        }
    }
    
     /**
     * Metodo SelecionaIdiomaId
     * 
     * Seleciona todos os dados cadastrados na tabela WebsiteIdiomas conforme o Id.
     * Faz uma requisicao a tabela WebsiteIdiomas chamando o metodo getIdiomasId passando
     * o Id por parametro 
     * 
     * @param string[] $parametros 
     * 
     * @return string[]
     * 
     */
    public function SelectIdiomaId($parametros) {
        //Retorna os dados
        return TableFactory::getInstance('WebsiteIdiomas')->SelectIdiomaId($parametros);
    }
    
    /**
     * Metodo EditarIdioma
     * 
     * Edita os dados cadastrados na tabela WebsiteIdiomas conforme o Id.
     * Faz uma requisicao a tabela WebsiteIdiomas chamando o metodo EditarIdiomaId passando
     * o Id por parametro 
     * 
     * @param string[] $parametros 
     * 
     * @return string[]
     * 
     */
    public function EditarIdioma($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instanciamos o componente de validação
        $ComponenteValidacao = getComponent('validacoes/idiomas.validacao', 'ValidacaoIdiomas');

        //Executamos a validação dos dados
        $resultado_validacao = $ComponenteValidacao->Validar($parametros);

        //Verifica o resultado da validacao
        if (count($resultado_validacao) == 0) {
            //Trata os dados antes de gravar no banco de dados
            $parametros = HelperFactory::getInstance()->TrataValor($parametros, null, null, null, true);

            //Instanciando a tabela de TextosLayouAdmin
            $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

            //Edita o registro no banco de dados
            if (TableFactory::getInstance('WebsiteIdiomas')->EditarIdiomaId($parametros) === true) {
                //Mensagem de confirmação
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[35], 'sucesso' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
            } else {
                //Mensagem de confirmação
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[58], 'erro' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
            }
        } else {
            //Resposta do JSON
            echo Zend_Json::encode($resultado_validacao);
        }
    }
    
     /**
     * Metodo Incluir
     * 
     * Inclui dados na tabela WebsiteIdiomas.
     * Faz uma requisicao a tabela WebsiteIdiomas chamando o metodo incluirIdioma passando
     * os dados a serem cadastrados por parametro.
     * 
     * @param string[] $parametros 
     * 
     * @return string[]
     * 
     */
    public function Incluir($parametros) {
        //Inclui a biblioteca do JSON
        LibFactory::getInstance(null, null, 'Zend/Json.php');

        //Instanciamos o componente de validação
        $ComponenteValidacao = getComponent('validacoes/idiomas.validacao', 'ValidacaoIdiomas');

        //Executamos a validação dos dados
        $resultado_validacao = $ComponenteValidacao->Validar($parametros);

        //Verifica o resultado da validacao
        if (count($resultado_validacao) == 0) {
            //Trata os dados antes de gravar no banco de dados
            $parametros = HelperFactory::getInstance()->TrataValor($parametros, null, null, null, true);

            //Inclui o registro no banco de dados
            if (TableFactory::getInstance('WebsiteIdiomas')->incluirIdioma($parametros) === true) {
                //Instanciando a tabela de TextosLayouAdmin
                $mensagem = TableFactory::getInstance('TextosLayoutAdmin')->getLayoutTexts();

                //Mensagem de confirmação
                $_SESSION['view_data'] = array('mensagem_confirmacao' => $mensagem[36], 'sucesso' => true);

                //Retorna para o javascript
                echo Zend_Json::encode(array("1"));
            }
        } else {
            //Retorna os erros da validação
            echo Zend_Json::encode($resultado_validacao);
        }
    }

}