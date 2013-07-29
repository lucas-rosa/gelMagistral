<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table WebsiteIdiomas
 *
 * A tabela WebsiteIdiomas foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\WebsiteIdiomas
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class WebsiteIdiomas extends BaseWebsiteIdiomas {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela WebsiteIdiomas. Para isso utilize o elias wi.
     * 
     * @var string $table_alias
     */
    private $table_alias = "websiteIdiomas wi";
    
    /**
     * Metodo getIdiomas
     * 
     * Seleciona todos os dados da tabela WebsiteIdiomas.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[] 
     */
    public function getIdiomas() {
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
     * Metodo ExcluirIdiomaId
     * 
     * Exclui os dados da tabela WebsiteIdiomas conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros 
     * @return boolean
     */
    public function ExcluirIdiomaId($parametros) {
        try {
            //Localiza o registro solicitado
            $tabela = $this->getTable($this->table_alias)->find($parametros['cod_id']);

            //Verifica se o registro foi encontrado
            if ($tabela) {
                //Remove o registro
                $tabela->delete();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'], 'X');

                //Retorna verdadeiro em caso de sucesso
                return true;
            } else {
                //Retorna falso, não foi encontrado
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectIdiomaId
     * 
     * Seleciona o Idioma da tabela WebsiteIdiomas conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros 
     * @return boolean
     */
    public function SelectIdiomaId($parametros) {
        try {
            $query = Doctrine_Query::create()
                    ->select('wi.*')
                    ->from($this->table_alias)
                    ->where('wi.cod_id = ?', $parametros['cod_id'])
                    ->limit(1)
                    ->execute()
                    ->toArray();

            return $query[0];
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo EditarIdiomaId
     * 
     * Edita o Idioma da tabela WebsiteIdiomas conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros 
     * @return boolean
     */
    public function EditarIdiomaId($parametros) {
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
    
    /**
     * Metodo incluirIdioma
     * 
     * Cadastra o Idioma na tabela WebsiteIdiomas conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros 
     * @return boolean
     */
    public function incluirIdioma($parametros) {
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

}