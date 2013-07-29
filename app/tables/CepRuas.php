<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table CepRuas
 *
 * A tabela CepRuas foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\CepRuas
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class CepRuas extends BaseCepRuas
{
    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela cepRuas. Para isso utilize o elias cr.
     * 
     * @var string $table_alias
     */
    private $table_alias = "cepRuas cr";
    
    /**
     * Metodo SelectCep
     * 
     * Este metodo faz um select utilizando tres tabelas diferente. 
     * Pega dados da tabela CepRuas, CepCidades e CepUf apartir do cep passado por parametro.
     * 
     * @param string[] $campo_cep 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return string[]
     */
    public function SelectCep($campo_cep)
    {
        try
        {
            $query = Doctrine_Query::create()
                    ->select("cepU.cha_sigla, cepU.txt_uf, cepC.txt_cidade, cr.cod_cep, cr.txt_rua, cepB.txt_bairro")
                    ->from($this->table_alias)
                    ->leftJoin('cr.CepBairros as cepB')
                    ->leftJoin('cepB.CepCidades as cepC')
                    ->leftJoin('cepC.CepUf as cepU')
                    ->where('cr.cod_cep = ?', $campo_cep)
                    ->limit(1);

            //Verifica se houve resultado
            if ($query->count() > 0)
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

}