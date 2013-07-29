<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Downloads
 *
 * A tabela Downloads foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\Downloads
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class Downloads extends BaseDownloads
{
    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela Downloads. Para isso utilize o elias dw.
     * 
     * @var string $table_alias
     */
    private $table_alias = "downloads dw";
    
    /**
     * Metodo SelectDownload
     * 
     * Seleciona os dados da tabela Downloads 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelectDownload()
    {
        try
        {
            $query = Doctrine_Query::create()
                    ->select("dw.*, DATE_FORMAT(dw.dat_time, '%d/%m/%Y') dat_data, DATE_FORMAT(dw.dat_time, '%H:%i:%s') dat_hora, us.*")
                    ->from($this->table_alias)
                    ->innerJoin("dw.Usuarios us")
                    ->where("dw.txt_arquivo != NULL")
                    ->orWhere("dw.txt_arquivo != ''")
                    ->execute()
                    ->toArray();

            return $query;
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo InserirDownload
     * 
     * Insere um novo arquivo e dados para a tabela
     * 
     * @param array $parametros
     */
	public function InserirDownload($parametros)
	{
        try
        {
        	$this->cod_usuario = $_SESSION['UserId'];
        	$this->dat_time = date('Y-m-d H:i:s');
        	$this->txt_titulo = $parametros['txt_titulo'];
        	$this->txt_arquivo = $parametros['txt_arquivo'];
        	$this->save();

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
     * Metodo  ExcluirDownloads
     * 
     * Exclui os dados da tabela Downloads conforme o cod_id 
     * passado por parametro. 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $cod_id
     * @return boolean
     */   
    public function ExcluirDownloads($cod_id)
    {
        try
        {
            //Localiza o registro solicitado
            $tabela = $this->getTable($this->table_alias)->find($cod_id);

            //Verifica se o registro foi encontrado
            if ($tabela)
            {
            	//exclui o arquivo
                unlink('web_files/arq_din/' . $tabela['txt_arquivo']);
                
                //Remove o registro
                $tabela->delete();

                //Salva no log de alterações
                TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $cod_id, 'X');

                //Retorna verdadeiro em caso de sucesso
                return true;
            }
            else
            {
                //Retorna falso, não foi encontrado
                return false;
            }
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
        }
    }
}