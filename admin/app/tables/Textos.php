<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Textos
 *
 * A tabela Textos foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\Textos
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class Textos extends BaseTextos {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela Textos. Para isso utilize o elias te.
     * 
     * @var string $table_alias
     */
    private $table_alias = 'textos te';
    
    /**
     * Metodo SelectTexto
     * 
     * Seleciona todos os dados da tabela Textos
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelectTexto() {
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where("te.cod_idioma = ?", LANGUAGE)
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectTextoId
     * 
     * Seleciona os dados da tabela Textos conforme o $cod_id passado por parametro
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_id
     * @return string[]
     */
    public function SelectTextoId($cod_id) {
        try {
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->where("te.cod_id = ?", $cod_id)
                    ->andWhere("te.cod_idioma = ?", LANGUAGE)
                    ->execute();

            //Verifica se houve resultado
            if ($query->count() > 0) {
                $dados = $query->toArray();
                return $dados[0];
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo getTexto
     * 
     * Seleciona os textos conforme os $ids passados por parametro
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $ids
     * @return string[]
     */
    public function getTexto($ids = null) {
        try {
            //Monta a Query
            $query = Doctrine_Query::create()
                    ->select('*')
                    ->from($this->table_alias)
                    ->andWhere('te.cod_idioma = ?', LANGUAGE);

            //Verifica se pelo menos um id foi especificado, caso contrário todos os textos serão resgatados
            if (!is_null($ids)) {

                //Filtra pelos ids informados
                $query->whereIn('te.cod_relacao_idioma', $ids);
            }

            //Executa a Query
            $recordset = $query->execute();

            //Armazena os textos em um array indexado pelo Id do texto
            $ArrayTextos = array();

            //Percorre os textos e atribui ao Array resultante
            foreach ($recordset as $dado) {
                //Atribui os dados ao Array
                $ArrayTextos[$dado['cod_relacao_idioma']] = array('txt_titulo' => $dado['txt_titulo'], 'texto' => $dado['txt_texto'], 'img' => $dado['img_texto']);
            }

            //Retorna o array de textos
            return $ArrayTextos;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo ExecuteEditaTexto
     * 
     * Edita o texto conforme os dados passados por parametro $parametros e $total 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @param integer $total
     * @return string[]
     */
    public function ExecuteEditaTexto($parametros, $total) {
        try {
            //Localiza o registro
            $tabela = $this->getTable($this->table_alias)->find($parametros['cod_id'.$total]);

            //Verifica se o registro foi encontrado
            if ($tabela) {
                $tabela->txt_titulo = $parametros['txt_titulo'.$total];
                $tabela->txt_texto = $parametros['txt_texto'.$total];

                //Atualiza o banco de dados
                $tabela->save();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id'.$total], 'A');

                //Retorna true em caso de sucesso
                return true;
            } else {
                $this->cod_idioma = $parametros['cod_idioma'.$total];
                $this->cod_relacao_idioma = $parametros['cod_relacao_idioma'.$total];
                $this->txt_titulo = $parametros['txt_titulo'.$total];
                $this->txt_texto = $parametros['txt_texto'.$total];
                $this->img_texto = $parametros['nome_img1'];
                $this->img_texto_cropado = $parametros['nome_img_cropada1'];
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
     * Seleciona os textos da tabela textos conforme o idioma
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function ExecuteBuscarTextos() {
        try {
            $query = Doctrine_Query::create()
                    ->select("*, wi.txt_idioma")
                    ->from($this->table_alias)
                    ->innerJoin("te.WebsiteIdiomas wi")
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
     * Seleciona os textos conforme o cod_relacao_idioma e o $cod_idioma passados
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_relacao_idioma
     * @param integer $cod_idioma
     * @return string[]
     */
    public function SelectTextoIdRelacaoEdicao($cod_relacao_idioma, $cod_idioma) {
        try {
            $query = Doctrine_Query::create()
                    ->select("te.*, wi.*")
                    ->from($this->table_alias)
                    ->innerJoin("te.WebsiteIdiomas wi")
                    ->where('te.cod_relacao_idioma = ?', $cod_relacao_idioma)
                    ->andWhere('te.cod_idioma = ?', $cod_idioma)
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
     * Metodo ExecutegetTexto
     * 
     * Seleciona os textos conforme o $cod_relacao_idioma passado
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $cod_relacao_idioma
     * @return string[]
     */
    public function ExecutegetTexto($cod_relacao_idioma) {
        try {
            $query = Doctrine_Query::create()
                    ->select('*, wi.txt_idioma')
                    ->from($this->table_alias)
                    ->innerJoin("te.WebsiteIdiomas wi")
                    ->where('te.cod_relacao_idioma = ?', $cod_relacao_idioma);

            //Verifica se houve resultado
            if ($query->count() > 0) {
                //Executa a query
                $dados = $query->execute()->toArray();

                //Retorna os dados resgatados
                return $dados;
            } else {
                return false;
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

   /**
     * Metodo DeletarImagemBanco
     * 
     * Deleta os dados cadastrados da tabela Noticias conforme o id passado 
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $imagem_original
     * @param string $imagem_cropada
     * @param integer $id
     * @return boolean
     * 
     */
    public function DeletarImagemBanco($imagem_original, $imagem_cropada, $id) {
        try {

            $query = Doctrine_Query::create()
                    ->select("te.*")
                    ->from($this->table_alias)
                    ->where('te.cod_id = ?', $id)
                    ->execute()
                    ->toArray();

            $query2 = Doctrine_Query::create()
                    ->select("te.*")
                    ->from($this->table_alias)
                    ->where('te.cod_relacao_idioma = ?', $query[0]['cod_relacao_idioma'])
                    ->execute()
                    ->toArray();

            for ($i = 0; $i < count($query2); $i++) {
                $tabela = $this->getTable($this->table_alias)->find($query2[$i]['cod_id']);

                if ($tabela) {
                    $tabela->img_texto = "";
                    $tabela->img_texto_cropado = "";

                    $tabela->save();

                    TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id, 'E');
                }
            }

            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo AlteraImagem
     * 
     * Edita os dados cadastrados da tabela Noticias conforme o id passado 
     * por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $imagem_original
     * @param string $imagem_cropada
     * @param integer $id
     * @return boolean
     * 
     */
    public function AlteraImagem($imagem_original, $imagem_cropada, $id) {
        try {
            $query = Doctrine_Query::create()
                    ->select("te.*")
                    ->from($this->table_alias)
                    ->where('te.cod_id = ?', $id)
                    ->execute()
                    ->toArray();

            $query2 = Doctrine_Query::create()
                    ->select("te.*")
                    ->from($this->table_alias)
                    ->where('te.cod_relacao_idioma = ?', $query[0]['cod_relacao_idioma'])
                    ->execute()
                    ->toArray();


            for ($i = 0; $i < count($query2); $i++) {
                $tabela = $this->getTable($this->table_alias)->find($query2[$i]['cod_id']);

                if ($tabela) {
                    $tabela->img_texto = $imagem_original;
                    $tabela->img_texto_cropado = $imagem_cropada;

                    $tabela->save();

                    TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id, 'E');
                }
            }

            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo recropar
     * 
     * Recropa a imagem cadastrada na tabela Noticias 
     * conforme $imagem_cropada_antiga e $nova_imagem_cropada passadas por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $imagem_cropada_antiga
     * @param string $nova_imagem_cropada
     * 
     */
    public function recropar($imagem_cropada_antiga, $nova_imagem_cropada) {
        try {
            $query = Doctrine_Query::create()
                    ->select("te.*")
                    ->from($this->table_alias)
                    ->where('te.img_texto_cropado = ?', $imagem_cropada_antiga)
                    ->execute()
                    ->toArray();


            for ($i = 0; $i < count($query); $i++) {
                $tabela = $this->getTable($this->table_alias)->find($query[$i]['cod_id']);

                if ($tabela) {
                    $tabela->img_texto_cropado = $nova_imagem_cropada;
                    $tabela->save();

                    TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id, 'E');
                }
            }
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //Fim dos métodos do plugin de imagem
}