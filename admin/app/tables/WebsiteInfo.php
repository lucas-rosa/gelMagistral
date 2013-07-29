<?

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table WebsiteInfo
 *
 * A tabela WebsiteInfo foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\WebsiteInfo
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class WebsiteInfo extends BaseWebsiteInfo {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela WebsiteInfo. Para isso utilize o elias wi.
     * 
     * @var string $table_alias
     */
    private $table_alias = "websiteInfo wi";
    
    /**
     * Metodo getWebSiteInfo
     * 
     * Retorna as informacoes do Sistema.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[] 
     */
    public function getWebSiteInfo() {
        try {
            //Retorna os dados da tabela
            return $this->getTable($this->table_alias)->findAll();
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectConfiguracoes
     * 
     * Seleciona os dados da tabela WebsiteInfo conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros 
     * @return string[]
     */
    public function SelectConfiguracoes($parametros) {
        try {
            //Prepara a query
            $query = Doctrine_Query::create()
                    ->select("wi.*, wid.*")
                    ->from($this->table_alias)
                    ->innerJoin("wi.WebsiteIdiomas wid")
                    ->where("wi.cod_id = ?", $parametros['cod_id'])
                    ->limit('1');

            if ($query->count() > 0) {
                $dados = $query->execute()->toArray();
                return $dados[0];
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo ExecuteEditaConfiguracoes
     * 
     * Edita os dados da tabela WebsiteInfo conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros 
     * @return string[]
     */
    public function ExecuteEditaConfiguracoes($parametros) {
        try {
            //Pesquisa o id
            $tabela = $this->getTable()->find($parametros['cod_id']);

            //Verifica se o registro foi localizado
            if ($tabela) {
                //Recebe os campos da tabela preenchidos
                $campos_tabela = $this->setValues($tabela, $parametros, UPDATE);

                //Percorre os campos da tabela
                foreach ($campos_tabela as $chave => $valor) {
                    //Atribui os valores resgatados para a tabela em questão
                    $this->$chave = $campos_tabela->$chave;
                }

                //Atualiza o banco de dados
                $tabela->save();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'], 'A');

                //Retorna true em caso de sucesso
                return true;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}