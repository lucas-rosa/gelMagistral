<?php
/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Noticias
 *
 * A tabela Noticias foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\Noticias
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class Noticias extends BaseNoticias
{
    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela Noticias. Para isso utilize o elias n.
     * 
     * @var string $table_alias
     */
    private $table_alias = "noticias n";
    
     /**
     * Metodo SelectNoticias
     * 
     * Seleciona os dados da tabela Noticias 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelectNoticias()
    {
        try
        {   
            //Executa a Query
            $query = Doctrine_Query::create()
            ->select("n.*, DATE_FORMAT(n.dat_data, '%d/%m/%Y') dat_data, wi.*")
            ->from($this->table_alias)
            ->innerJoin("n.WebsiteIdiomas wi")
            ->execute()
            ->toArray();

            //Retorna o resultado
            return $query;
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo ExcluirNoticiaId
     * 
     * Exclui os dados da tabela Noticias conforme o cod_relacao_idioma
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_relacao_idioma
     * @return string[]
     * 
     */
    public function ExcluirNoticiaId($cod_relacao_idioma)
    {
        try
        {
            //Localiza o registroaq
            $tabela = $this->getTable($table_alias)->findBy("cod_relacao_idioma", $cod_relacao_idioma);

            //exclui as imagens
            foreach ($tabela as $campos)
            {
            	if($campos['img_original'] != "" || $campos['img_cropada'] != "" )
            	{
	                unlink(ARQ_DIN.$campos['img_original']);
	                unlink(ARQ_DIN.$campos['img_cropada']);
            	}
            }

            //Verifica se o registro foi encontrado
            if($tabela)
            {
                //Removendo o registro
                $tabela->delete();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $cod_relacao_idioma, 'X');

                //Retorna verdadeiro em caso de sucesso
                return true;
            }
            else
            {
                //Não foi possivel remover o registro então retorna falso
                return false;
            }
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo SelectNoticiaRelacaoId
     * 
     * Seleciona os dados da tabela Noticias conforme o cod_relacao_idioma 
     * passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     * 
     */
    public function SelectNoticiaRelacaoId($parametros)
    {
        try
        {
            $query = Doctrine_Query::create()
                    ->select("n.*, DATE_FORMAT(n.dat_data, '%d/%m/%Y') dat_data, wi.*")
                    ->from($this->table_alias)
                    ->innerJoin("n.WebsiteIdiomas wi")
                    ->where("n.cod_relacao_idioma =?", $parametros['cod_relacao_idioma']);

            //Verifica se houve resultado
            if($query->count() > 0)
            {
                $dados = $query->execute()->toArray();

                return $dados;
            }
            else
            {
                return false;
            }
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectNoticiasIdRelacaoEdicao
     * 
     * Seleciona os dados da tabela Noticias conforme o cod_relacao_idioma e o $cod_idioma 
     * passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_relacao_idioma
     * @param integer $cod_idioma
     * @return string[]
     * 
     */
    public function SelectNoticiasIdRelacaoEdicao($cod_relacao_idioma, $cod_idioma)
    {
        try
        {
            $query = Doctrine_Query::create()
                    ->select("n.*, DATE_FORMAT(n.dat_data, '%d/%m/%Y') dat_data, DATE_FORMAT(n.dat_inicio_publicacao, '%d/%m/%Y %H:%i:%s') dat_inicio_publicacao, DATE_FORMAT(n.dat_termino_publicacao, '%d/%m/%Y %H:%i:%s') dat_termino_publicacao, wi.*")
                    ->from($this->table_alias)
                    ->innerJoin("n.WebsiteIdiomas wi")
                    ->where("n.cod_relacao_idioma =?", $cod_relacao_idioma)
                    ->andWhere('n.cod_idioma = ?', $cod_idioma)
                    ->limit(1);

            //Verifica se houve resultado
            if($query->count() > 0)
            {
                $dados = $query->execute()->toArray();
                return $dados[0];
            }
            else
            {
                return false;
            }
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo EditaNoticia
     * 
     * Edita os dados da tabela Noticias conforme o $parametros e o $total 
     * passados por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @param integer $total
     * @return boolean
     * 
     */
    public function EditaNoticia($parametros, $total)
    {
        try
        {
            //Pesquisa o id
            $tabela = $this->getTable($this->table_alias)->find($parametros['cod_id' . $total]);

            //Verifica se o registro foi localizado
            if($tabela)
            {
                $tabela->cod_publicado = $parametros['cod_publicado' . $total];
                $tabela->dat_inicio_publicacao = $parametros['dat_inicio_publicacao' . $total];
                $tabela->dat_termino_publicacao = $parametros['dat_termino_publicacao' . $total];
                $tabela->dat_data = $parametros['dat_data' . $total];
                $tabela->txt_titulo = $parametros['txt_titulo' . $total];
                $tabela->txt_texto = $parametros['txt_texto' . $total];
                $tabela->save();

                ################ GERANDO PERMALINK ###################
                //Instancia o Helper
                $Helper = HelperFactory::getInstance();

                //Instancia o registro inserido anteriormente
                $registro = $this->getTable()->find($parametros['cod_id' . $total]);

                //Gera o permalink
                $parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_titulo' . $total], $parametros['cod_relacao_idioma']);

                //Atribui o permalink gerado
                $registro->txt_permalink = $parametros['txt_permalink'];

                //Salva o registro no banco de dados
                $registro->save();
                #######################################################
                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id' . $total], 'A');

                //Retorna true em caso de sucesso
                return true;
            }
            else
            {
                $this->cod_idioma = $parametros['cod_idioma' . $total];
                $this->cod_relacao_idioma = $parametros['cod_relacao_idioma' . $total];
                $this->cod_publicado = $parametros['cod_publicado' . $total];
                $this->dat_inicio_publicacao = $parametros['dat_inicio_publicacao' . $total];
                $this->dat_termino_publicacao = $parametros['dat_termino_publicacao' . $total];
                $this->dat_data = $parametros['dat_data' . $total];
                $this->txt_titulo = $parametros['txt_titulo' . $total];
                $this->txt_texto = $parametros['txt_texto' . $total];
                $this->save();

                ################ GERANDO PERMALINK ###################
                //Instancia o Helper
                $Helper = HelperFactory::getInstance();

                //Instancia o registro inserido anteriormente
                $registro = $this->getTable()->find($this->getIncremented());

                //Gera o permalink
                $parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_titulo' . $total], $parametros['cod_relacao_idioma']);

                //Atribui o permalink gerado
                $registro->txt_permalink = $parametros['txt_permalink'];

                //Salva o registro no banco de dados
                $registro->save();
                #######################################################
                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'A');

                return true;
            }
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo IncluirNoticia
     * 
     * Salva dados na tabela Noticias conforme o $parametros e o $total 
     * passados por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @param integer $total
     * @return boolean
     * 
     */
    public function IncluirNoticia($parametros, $total)
    {
        try
        {
            $query = Doctrine_Query::create()
                    ->select("n.*")
                    ->from($this->table_alias)
                    ->orderBy('n.cod_relacao_idioma ASC')
                    ->execute()
                    ->toArray();

            $numero_resultados = count($query);

            $this->cod_idioma = $parametros['cod_idioma' . $total];
            $this->cod_relacao_idioma = $parametros['cod_relacao_idioma'];
            $this->cod_publicado = $parametros['cod_publicado' . $total];
            $this->dat_inicio_publicacao = $parametros['dat_inicio_publicacao' . $total];
            $this->dat_termino_publicacao = $parametros['dat_termino_publicacao' . $total];
            $this->dat_data = $parametros['dat_data' . $total];
            $this->txt_titulo = stripslashes($parametros['txt_titulo' . $total]);
            $this->txt_texto = stripslashes($parametros['txt_texto' . $total]);
            $this->img_original = $parametros['nome_img' . $total];
            $this->img_cropada = $parametros['nome_img_cropada' . $total];

            //Salva o registro no banco de dados
            $this->save();

            ################ GERANDO PERMALINK ###################
            //Instancia o Helper
            $Helper = HelperFactory::getInstance();

            //Instancia o registro inserido anteriormente
            $registro = $this->getTable()->find($this->getIncremented());

            //Gera o permalink
            $parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_titulo' . $total], $parametros['cod_relacao_idioma']);

            //Atribui o permalink gerado
            $registro->txt_permalink = $parametros['txt_permalink'];

            //Salva o registro no banco de dados
            $registro->save();
            #######################################################
            //Salva no log de alterações
            TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

            //Returna true em caso de sucesso
            return true;
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectUltimoRelacionamentoIdioma
     * 
     * Seleciona os dados cadastrado na tabela Noticias ordenando por 
     * cod_relacao_idioma decrescente
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     * 
     */
    public function SelectUltimoRelacionamentoIdioma()
    {
        try
        {
            $query = Doctrine_Query::create()
                    ->select("*")
                    ->from($this->table_alias)
                    ->orderBy("cod_relacao_idioma DESC")
                    ->limit(1)
                    ->execute()
                    ->toArray();

            return $query[0];
        }
        catch (Doctrine_Exception $e)
        {
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
    public function DeletarImagemBanco($imagem_original, $imagem_cropada, $id)
    {
        try
        {
            $tabela = $this->getTable($this->table_alias)->find($id);

            if($tabela)
            {
                $tabela->img_original = "";
                $tabela->img_cropada = "";
                $tabela->save();

                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id, 'X');
                return true;
            }
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
            return false;
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
    public function AlteraImagem($imagem_original, $imagem_cropada, $id)
    {
        try
        {
            $tabela = $this->getTable($this->table_alias)->find($id);

            if($tabela)
            {
                $tabela->img_original = $imagem_original;
                $tabela->img_cropada = $imagem_cropada;
                $tabela->save();

                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id, 'A');
            }
            return true;
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
            return false;
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
    public function recropar($imagem_cropada_antiga, $nova_imagem_cropada)
    {
        try
        {
            $query = Doctrine_Query::create()
                    ->select("n.*")
                    ->from($this->table_alias)
                    ->where('n.img_cropada = ?', $imagem_cropada_antiga)
                    ->execute()
                    ->toArray();

            $tabela = $this->getTable($this->table_alias)->find($query[0]['cod_id']);

            if($tabela)
            {
                $tabela->img_cropada = $nova_imagem_cropada;
                $tabela->save();

                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $id, 'A');
            }
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
            
            return false;
        }
    }
}