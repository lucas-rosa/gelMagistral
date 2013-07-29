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
 * @package app\tables\TextosLayout
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class TextosLayout extends BaseTextosLayout {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela textosLayout. Para isso utilize o elias tl.
     * 
     * @var string $table_alias
     */
    private $table_alias = "textosLayout as tl";
    
    /**
     * Metodo getLayoutTexts
     * 
     * Seleciona os dados da tabela textosLayout conforme o cod_idioma definido 
     * na constante LANGUAGE localizada no controllerBase.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function getLayoutTexts() {

        try {

            //Query a ser executada
            $Query = Doctrine_Query::CREATE();
            $Query->select('tl.txt_texto,tl.cod_relacao_idioma')
                    ->from($this->table_alias)
                    ->where('tl.cod_idioma = ?', LANGUAGE);

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
     * Seleciona os dados da tabela textosLayout conforme o cod_id passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param integer $cod_id
     * @return string[]
     */
    public function ExecutegetTexto($cod_id) {

        try {

            //Monta a Query
            $query = Doctrine_Query::create()
                    ->select('*,idioma.*')
                    ->innerJoin('tl.WebsiteIdiomas as idioma')
                    ->from($this->table_alias)
                    ->where('id = ?', $cod_id)
                    ->limit('1');

            //Verifica se houve resultado		 
            if ($query->count() > 0) {

                //Executa a query
                $recordset = $query->execute();
                //Retorna os dados resgatados
                return $recordset[0];
            } else {

                return false;
            }
        } catch (Doctrine_Exception $e) {

            echo $e->getMessage();
        }
    }

    /**
     * Metodo ExecuteEditaTexto
     * 
     * Salva os dados da atualizacao do texto no banco de dados
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @param string[] $parametros
     * @return boolean
     */
    public function ExecuteEditaTexto($parametros) {

        try {

            //Localiza o registro
            $tabela = $this->getTable()->find($parametros['id']);

            //Verifica se o registro foi encontrado
            if ($tabela) {

                //Recebe os campos da tabela com seus respectivos valores
                $campos_tabela = $this->setValues($tabela, $parametros, UPDATE);

                //Percorre os campos da tabela
                foreach ($campos_tabela as $chave => $valor) {

                    //Atribui o valor ao campo da tabela em questão
                    $tabela->$chave = $campos_tabela->$chave;
                }

                //Atualiza as informações do registro no banco de dados
                $tabela->save();

                //Retorna true em caso de sucesso
                return true;
            } else {

                //Retorn falso em caso de erro
                return false;
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
     * @param string[] $cod_idioma
     * @param string[] $termo_busca
     * @return string[]
     */
    public function ExecuteBuscarTextos($cod_idioma = null, $termo_busca = null) {

        try {
            //Instancia o objeto da Query
            $query = Doctrine_Query::create()
                    ->select('*,idioma.*')
                    ->from($this->table_alias)
                    ->leftJoin('tl.WebsiteIdiomas as idioma');

            //Verifica se um idioma foi informado
            if (!is_null($cod_idioma) && strlen(trim($cod_idioma)) > 0) {

                //Adiciona o filtro por Idioma
                $query->where('tl.cod_idioma = ?', $cod_idioma);
            }

            //Verifica a condição do termo de busca
            if (!is_null($termo_busca) && strlen(trim($termo_busca)) > 0) {

                //Adiciona o filtro por termo de busca
                $query->andWhere('tl.txt_texto like ?', '%' . $termo_busca . '%');
            }

            //Verifica o resultado da Query		 
            if ($query->count() > 0) {

                return $query->execute()->toArray();
            } else {

                return false;
            }
        } catch (Doctrine_Exception $e) {

            echo $e->getMessage();
        }
    }

}