<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table faleconosco
 *
 * A tabela faleconosco foi gerada pelo doctrini para transforar
 * os dados do banco em objetos. Com isso podemos trabalhar os
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 *
 * @package admin\app\tables\faleconosco
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class faleconosco extends BaseFaleConosco
{
	/**
	 * Esta variavel e global e deve ser utilizada para referenciar
	 * a tabela faleconosco. Para isso utilize o elias fc.
	 *
	 * @var string $table_alias
	 */
	private $table_alias = "faleConosco fc";

	/**
	 * Metodo SelectFaleConosco
	 *
	 * Seleciona os dados da tabela faleconosco.
	 *
	 * @link http://www.doctrine-project.org/ ORM Doctrini
	 * @return string[]
	 */
	public function SelectFaleConosco()
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("fc.*, DATE_FORMAT(fc.dat_datahora, '%d/%m/%Y') data, DATE_FORMAT(fc.dat_datahora, '%H:%i:%s') hora")
			->from($this->table_alias)
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
	 * Metodo SelectFaleConosco
	 *
	 * Seleciona os dados da tabela faleconosco conforme o cod_id
	 * passado por parametro.
	 *
	 * @link http://www.doctrine-project.org/ ORM Doctrini
	 * @param integer $cod_id
	 * @return string[]
	 */
	public function SelectFaleConoscoId($cod_id)
	{
		try
		{
			$query = Doctrine_Query::create()
			->select("fc.num_ip, fc.cod_id, DATE_FORMAT(fc.dat_datahora, '%d/%m/%Y %H:%i:%s') datahora, fc.txt_nome, fc.txt_email, fc.txt_telefone, fc.txt_assunto, fc.txt_mensagem")
			->from($this->table_alias)
			->where('fc.cod_id = ?', $cod_id)
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
	 * Metodo SelectFaleconoscofiltro
	 *
	 * Seleciona os dados da tabela faleconosco conforme a data de inicio
         * e data de termino passadas por parametro.
	 *
	 * @link http://www.doctrine-project.org/ ORM Doctrini
	 * @param string $de
         * @param string $ate
	 * @return string[]
	 */
	public function SelectFaleconoscofiltro($de, $ate)
	{
		try
		{
			$de = implode("-",array_reverse(explode("/",$de)));
			$ate = implode("-",array_reverse(explode("/",$ate)));

			$query = Doctrine_Query::create()
			->select("fc.*, DATE_FORMAT(fc.dat_datahora, '%d/%m/%Y') data, DATE_FORMAT(fc.dat_datahora, '%H:%i:%s') hora")
			->from($this->table_alias)
			->where("DATE_FORMAT(fc.dat_datahora, '%Y-%m-%d') >= ?",$de)
			->andWhere("DATE_FORMAT(fc.dat_datahora, '%Y-%m-%d') <= ?",$ate)
			->orderBy("fc.dat_datahora DESC")
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
     * Metodo SelectFaleconoscoExportarFiltradoCsv
     * 
     * Este metodo seleciona os dados da tabela cadatro conforme a data de inicio
     * e a data de termino passadas por parametro para serem exportados.  
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string[] $data_de
     * @param string[] $data_ate 
     * @return string[]
     */
	public function SelectFaleconoscoExportarFiltradoCsv($data_de, $data_ate)
	{
		try
        {       
        	$de = implode("-",array_reverse(explode("-",$data_de)));
			$ate = implode("-",array_reverse(explode("-",$data_ate)));
			
			if($de != '' && $ate != '')
			{
				$query = Doctrine_Query::create()
				->select("fc.*, DATE_FORMAT(fc.dat_datahora, '%d/%m/%Y') data, DATE_FORMAT(fc.dat_datahora, '%H:%i:%s') hora")
				->from($this->table_alias)
				->where("DATE_FORMAT(fc.dat_datahora, '%Y-%m-%d') >= ?",$de)
				->andWhere("DATE_FORMAT(fc.dat_datahora, '%Y-%m-%d') <= ?",$ate)
				->orderBy('fc.dat_datahora ASC')
				->execute()
				->toArray();
			}
			elseif($de == '' && $ate == '')
			{
				$query = Doctrine_Query::create()
				->select("fc.*, DATE_FORMAT(fc.dat_datahora, '%d/%m/%Y') data, DATE_FORMAT(fc.dat_datahora, '%H:%i:%s') hora")
				->from($this->table_alias)
				->orderBy('fc.dat_datahora ASC')
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