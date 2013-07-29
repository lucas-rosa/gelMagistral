<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table Cadastro
 *
 * A tabela cadastro foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package admin\app\tables\Cadastro
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class Cadastro extends BaseCadastro {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela Cadastro. Para isso utilize o elias cad.
     * 
     * @var string $table_alias
     */
    private $table_alias = "cadastro cad";
    
    /**
     * Metodo SelectCadastro
     * 
     * Este metodo seleciona os dados cadastrados na tabela cadatro 
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return string[]
     */
    public function SelectCadastro() {
        try {
            $query = Doctrine_Query::create()
                    ->select("cad.*, DATE_FORMAT(cad.dat_cadastro, '%d/%m/%Y') dat_cadastro, DATE_FORMAT(cad.dat_cadastro, '%H:%i:%s') hora_cadastro, DATE_FORMAT(cad.dat_nascimento, '%d/%m/%Y') dat_nascimento, cu.*, cc.*")
                    ->from($this->table_alias)
                    ->innerJoin("cad.CepUf cu")
                    ->innerJoin("cad.CepCidades cc")
                    ->execute()
                    ->toArray();

            return $query;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Metodo SelectCadastroId
     * 
     * Este metodo seleciona os dados cadastrados na tabela cadatro conforme o cod_id 
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return string[]
     */
    public function SelectCadastroId($parametros)
    {
        try
        {
            $query = Doctrine_Query::create()
                    ->select("cad.*, DATE_FORMAT(cad.dat_cadastro, '%d/%m/%Y %H:%i:%s') dat_cadastro, DATE_FORMAT(cad.dat_nascimento, '%d/%m/%Y') dat_nascimento, cu.*, cc.*")
                    ->from($this->table_alias)
                    ->innerJoin("cad.CepUf cu")
                    ->innerJoin("cad.CepCidades cc")
                    ->where('cad.cod_id = ?', $parametros['cod_id'])
                    ->limit(1);

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
     * Metodo EditarCadastroId
     * 
     * Este metodo edita os dados ja cadastrados na tabela cadatro conforme o cod_id 
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return boolean
     */
    public function EditarCadastroId($parametros) {
        try {
            //Pesquisa o id
            $tabela = $this->getTable($this->table_alias)->find($parametros['cod_id']);

            //Verifica se o registro foi localizado
            if ($tabela) {
                $tabela->txt_nome = $parametros['txt_nome'];
                $tabela->cod_sexo = $parametros['cod_sexo'];
                $tabela->txt_profissao = $parametros['txt_profissao'];
                $tabela->dat_nascimento = $parametros['dat_nascimento'];
                $tabela->txt_cep = $parametros['txt_cep'];
                $tabela->cod_estado = $parametros['cod_estado'];
                $tabela->cod_cidade = $parametros['cod_cidade'];
                $tabela->txt_bairro = $parametros['txt_bairro'];
                $tabela->txt_endereco = $parametros['txt_endereco'];
                $tabela->txt_telefone = $parametros['txt_telefone'];
                $tabela->txt_email = $parametros['txt_email'];
                $tabela->txt_comentario = $parametros['txt_comentario'];
                $tabela->cod_chk_newsletter = $parametros['cod_chk_newsletter'];

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
     * Metodo ExcluirCadastroId
     * 
     * Este metodo exclui os dados na tabela cadatro conforme o cod_id 
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $parametros
     * @return boolean
     */
    public function ExcluirCadastroId($parametros) {
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
     * Metodo SelectCadastrofiltro
     * 
     * Este metodo seleciona os dados da tabela cadatro conforme a data de inicio
     * e a data de termino passadas por parametro.  
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $de
     * @param string[] $ate 
     * @return string[]
     */
    public function SelectCadastrofiltro($de, $ate)
    {
        try
        {
            $de = implode("-", array_reverse(explode("/", $de)));
            $ate = implode("-", array_reverse(explode("/", $ate)));

            $query = Doctrine_Query::create()
                    ->select("cad.*, DATE_FORMAT(cad.dat_cadastro, '%d/%m/%Y') dat_cadastro, DATE_FORMAT(cad.dat_cadastro, '%H:%i:%s') hora_cadastro")
                    ->from($this->table_alias)
                    ->where("DATE_FORMAT(cad.dat_cadastro, '%Y-%m-%d') >= ?", $de)
                    ->andWhere("DATE_FORMAT(cad.dat_cadastro, '%Y-%m-%d') <= ?", $ate)
                    ->orderBy("cad.dat_cadastro DESC")
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
     * Metodo SelectCadastroExportarFiltroCsv
     * 
     * Este metodo seleciona os dados da tabela cadatro conforme a data de inicio
     * e a data de termino passadas por parametro para serem exportados.  
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $data_de
     * @param string[] $data_ate
     * @return string[]
     */
    public function SelectCadastroExportarFiltroCsv($data_de, $data_ate)
    {
        try
        {       
        	$de = implode("-",array_reverse(explode("-",$data_de)));
			$ate = implode("-",array_reverse(explode("-",$data_ate)));
			
			if($de != '' && $ate != '')
			{
				$query = Doctrine_Query::create()
				->select("cad.*, DATE_FORMAT(cad.dat_cadastro, '%d/%m/%Y') dat_cadastro, DATE_FORMAT(cad.dat_nascimento, '%d/%m/%Y') dat_nascimento, cu.*, cc.*")
				->from($this->table_alias)
				->innerJoin("cad.CepUf cu")
                ->innerJoin("cad.CepCidades cc")
				->where("DATE_FORMAT(cad.dat_cadastro, '%Y-%m-%d') >= ?",$de)
				->andWhere("DATE_FORMAT(cad.dat_cadastro, '%Y-%m-%d') <= ?",$ate)
				->orderBy('cad.txt_nome ASC')
				->execute()
				->toArray();
			}
			elseif($de == '' && $ate == '')
			{
				$query = Doctrine_Query::create()
				->select("cad.*, DATE_FORMAT(cad.dat_cadastro, '%d/%m/%Y') dat_cadastro, DATE_FORMAT(cad.dat_nascimento, '%d/%m/%Y') dat_nascimento, cu.*, cc.*")
				->from($this->table_alias)
				->innerJoin("cad.CepUf cu")
                ->innerJoin("cad.CepCidades cc")
				->orderBy('cad.txt_nome ASC')
				->execute()
				->toArray();
			}

			return $query;
        }
        catch (Doctrine_Exception $e)
        {
            echo $e->getMessage();
        }
    }
}