<?

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table WebsitePages
 *
 * A tabela WebsitePages foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\WebsitePages
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class WebsitePages extends BaseWebsitePages {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela WebsitePages. Para isso utilize o elias wp.
     * 
     * @var string $table_alias
     */
    private $table_alias = "websitePages wp";
    
    /**
     * Metodo getPageInfo
     * 
     * Seleciona os dados da tabela WebsitePages conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $request 
     * @return string[]
     */
    public function getPageInfo($request) {
        try {
            //Retorna os dados da tabela
            return $this->getTable($this->table_alias)->findByurl_caminho($request);
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo getPageInfo
     * 
     * Seleciona todos os dados da tabela WebsitePages
      * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelectDados() {
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo ExcluirSeoId
     * 
     * Deleta os dados da tabela WebsitePages conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     */
    public function ExcluirSeoId($parametros) {
        try {
            //Localiza o registro
            $tabela = $this->getTable($table_alias)->find($parametros['cod_id']);

            //Verifica se o registro foi encontrado
            if ($tabela) {
                //Removendo o registro
                $tabela->delete();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'], 'X');

                //Retorna verdadeiro em caso de sucesso
                return true;
            } else {
                //Não foi possivel remover o registro então retorna falso
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectSeoId
     * 
     * Seleciona os dados da tabela WebsitePages conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     */
    public function SelectSeoId($parametros) {
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where("wp.cod_id = ?", $parametros['cod_id'])
                    ->limit(1);

            if ($query->count() > 0) {
                $query = $query->execute()->toArray();
                return $query[0];
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo InserirSeo
     * 
     * Salva na tabela WebsitePages conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return boolean
     */
    public function InserirSeo($parametros) {
        try {
            //Recebe os campos da tabela preenchidos
            $campos_tabela = $this->setValues($this, $parametros, INSERT);

            //Percorre os campos da tabela
            foreach ($campos_tabela as $chave => $valor) {
                //Atribui os valores resgatados para a tabela em questão
                $this->$chave = $campos_tabela->$chave;
            }

            //Salva o registro no banco de dados
            $this->save();

            //Salva no log de alterações
            TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

            //Returna true em caso de sucesso
            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo EditarSeo
     * 
     * Edita os dados da tabela WebsitePages conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return boolean
     */
    public function EditarSeo($parametros) {
        try {
            //Pesquisa o codigo
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