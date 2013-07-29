<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Dicas
 *
 * A tabela Dicas foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\Dicas
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class Dicas extends BaseDicas
{
    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela Dicas. Para isso utilize o elias di.
     * 
     * @var string $table_alias
     */
    private $table_alias = 'dicas di';

    /**
     * Metodo SelectDicas
     * 
     * Seleciona todos os dados cadastrados na tabela Dicas.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function SelectDicas() {
        try {
            
            $query = Doctrine_Query::create()
                    ->select("di.*, DATE_FORMAT(di.dat_date, '%d/%m/%Y') dat_data")
                    ->from($this->table_alias)
                    ->orderBy('di.dat_date')
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
     /**
     * Metodo ExcluirDicaId
     * 
     * Deleta os dados da tabela Dicas conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     */
    public function ExcluirDicaId($parametros) {
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
     * Metodo SelectDicasRelacaoId
     * 
     * Seleciona os dados da tabela dicas conforme os dados enviados 
     * por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     */
    public function SelectDicasRelacaoId($parametros) {
        try {
            $query = Doctrine_Query::create()
                    ->select("di.*, DATE_FORMAT(di.dat_date, '%d/%m/%Y') dat_data, wi.txt_idioma txt_idioma")
                    ->from($this->table_alias)
                    ->innerJoin('di.WebsiteIdiomas wi')
                    ->where("di.cod_id = ?", $parametros['cod_id'])
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
     * Metodo IncluirDica
     * 
     * Salva dados na tabela Dicas conforme o $parametros
     * passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return boolean
     * 
     */
    public function IncluirDica($parametros)
    {
        try
        {

            $this->cod_idioma = $parametros['cod_idioma'];
            $this->dat_date = $parametros['dat_data'];
            $this->txt_titulo = stripslashes($parametros['txt_titulo']);
            $this->txt_texto = stripslashes($parametros['txt_texto']);
            $this->img_original = $parametros['nome_img1'];
            $this->img_cropada = $parametros['nome_img_cropada1'];

            //Salva o registro no banco de dados
            $this->save();

            ################ GERANDO PERMALINK ###################
            //Instancia o Helper
            $Helper = HelperFactory::getInstance();

            //Instancia o registro inserido anteriormente
            $registro = $this->getTable()->find($this->getIncremented());

            //Gera o permalink
            $parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_titulo'], $registro->cod_id);

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
     * Metodo SelectDicasIdRelacaoEdicao
     * 
     * Seleciona os dados da tabela Dicas conforme o cod_id
     * passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param integer $cod_id
     * @return string[]
     * 
     */
    public function SelectDicasIdRelacaoEdicao($parametros)
    {
        try
        {
            $query = Doctrine_Query::create()
                    ->select("di.*, DATE_FORMAT(di.dat_date, '%d/%m/%Y') dat_data, wi.*")
                    ->from($this->table_alias)
                    ->innerJoin("di.WebsiteIdiomas wi")
                    ->where("di.cod_id =?", $parametros['cod_id'])
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
     * Metodo EditaDica
     * 
     * Edita os dados da tabela Dicas conforme os $parametros 
     * passados por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return boolean
     * 
     */
    public function EditaDica($parametros)
    {
        try
        {   
            //Pesquisa o id
            $tabela = $this->getTable($this->table_alias)->find($parametros['cod_id1']);

            //Verifica se o registro foi localizado
            if($tabela)
            {
                $tabela->cod_idioma = $parametros['cod_idioma'];
                $tabela->dat_date = $parametros['dat_data'];
                $tabela->txt_titulo = $parametros['txt_titulo'];
                $tabela->txt_texto = $parametros['txt_texto'];
                $tabela->img_original = $parametros['nome_img1'];
                 $tabela->img_cropada = $parametros['nome_img_cropada1'];
                $tabela->save();

                ################ GERANDO PERMALINK ###################
                //Instancia o Helper
                $Helper = HelperFactory::getInstance();

                //Instancia o registro inserido anteriormente
                $registro = $this->getTable()->find($parametros['cod_id1']);

                //Gera o permalink
                $parametros['txt_permalink'] = $Helper->createPermalink($parametros['txt_titulo'], $registro->cod_id);

                //Atribui o permalink gerado
                $registro->txt_permalink = $parametros['txt_permalink'];

                //Salva o registro no banco de dados
                $registro->save();
                #######################################################
                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $parametros['cod_id1'], 'A');

                //Retorna true em caso de sucesso
                return true;
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
     * Metodo DeletarImagemBanco
     * 
     * Deleta os dados cadastrados da tabela Dicas conforme o id passado 
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
     * Edita os dados cadastrados da tabela Dicas conforme o id passado 
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
     * Recropa a imagem cadastrada na tabela Dicas 
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