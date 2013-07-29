<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table TextosLayout
 *
 * A tabela TextosLayout foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\TextosLayout
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class TextosLayout extends BaseTextosLayout {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela TextosLayout. Para isso utilize o elias tl.
     * 
     * @var string $table_alias
     */
    private $table_alias = "textosLayout tl";

   /**
     * Metodo getLayoutTexts
     * 
     * Seleciona todos os dados da tabela TextosLayout
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function getLayoutTexts() {
        try {
            //Query a ser executada
            $Query = Doctrine_Query::CREATE();
            $Query->select('tl.txt_texto,tl.cod_relacao_idioma')
                    ->from($this->table_alias);

            //Executa a query
            $recordset = $Query->execute();

            //Cria um array para os resultados
            $array_textos_layout = array();

            //Atribui os textos resgatados ao array resultante
            foreach ($recordset as $valor) {
                $array_textos_layout[$valor['cod_relacao_idioma']] = $valor['txt_texto'];
            }

            //Executa a Query
            return $array_textos_layout;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo ExecutegetTexto
     * 
     * Busca os dados dos textos
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param Integer $cod_relacao_idioma
     * @return string[]
     */
    public function ExecutegetTexto($cod_relacao_idioma) {
        try {
            //Monta a Query
            $query = Doctrine_Query::create()
                    ->select('tl.*, idioma.*')
                    ->from($this->table_alias)
                    ->innerJoin('tl.WebsiteIdiomas idioma')
                    ->where('tl.cod_relacao_idioma = ?', $cod_relacao_idioma)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectTextoIdRelacaoEdicao
     * 
     * Seleciona os dados da tabela TextosLayout e WebsiteIdiomas conforme
     * o $cod_relacao_idioma e o $cod_idioma. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param Integer $cod_relacao_idioma
     * @param Integer $cod_idioma 
     * @return string[]
     */
    public function SelectTextoIdRelacaoEdicao($cod_relacao_idioma, $cod_idioma) {
        try {
            $query = Doctrine_Query::create()
                    ->select("tl.*, wi.*")
                    ->from($this->table_alias)
                    ->innerJoin("tl.WebsiteIdiomas wi")
                    ->where('tl.cod_relacao_idioma = ?', $cod_relacao_idioma)
                    ->andWhere('tl.cod_idioma = ?', $cod_idioma)
                    ->limit(1);

            //Verifica se houve resultado
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
     * Metodo SelectTextoIdRelacaoEdicao
     * 
     * Edita os dados da tabela TextosLayout conforme
     * $parametros e $total pasados por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @param Integer $total
     * @return string[]
     */
    public function EditaTextoLayout($parametros, $total) {
        try {
            //Localiza o registro
            $tabela = $this->getTable($this->table_alias)->find($parametros['cod_id' . $total]);

            //Verifica se o registro foi encontrado
            if ($tabela) {
                $tabela->txt_texto = stripslashes($parametros['txt_texto' . $total]);

                //Atualiza o banco de dados
                $tabela->save();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id' . $total], 'A');

                //Retorna true em caso de sucesso
                return true;
            } else {
                $this->cod_idioma = $parametros['cod_idioma' . $total];
                $this->cod_relacao_idioma = $parametros['cod_relacao_idioma' . $total];
                $this->txt_texto = stripslashes($parametros['txt_texto' . $total]);
                $this->save();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'A');

                return true;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
      /**
     * Metodo ExecuteBuscarTextos
     * 
     * Busca textos na base de dados com base nos parametros informados
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function ExecuteBuscarTextos() {
        try {
            //Instancia o objeto da Query
            $query = Doctrine_Query::create()
                    ->select('*,idioma.*')
                    ->from($this->table_alias)
                    ->leftJoin('tl.WebsiteIdiomas idioma')
                    ->execute()
                    ->toArray();

            return $query; {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}