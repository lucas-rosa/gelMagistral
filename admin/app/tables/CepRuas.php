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
 * @package admin\app\tables\CepRuas
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class CepRuas extends BaseCepRuas {

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
     * Este metodo seleciona os dados cadastrados na tabela cepRuas conforme o valor_cep
     * passado por parametro.
     * 
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @param string $valor_cep
     * @return string[]
     */
    public function SelectCep($valor_cep) {
        try {
            $query = Doctrine_Query::create()
                    ->select("cepU.cha_sigla, cepU.txt_uf, cepC.txt_cidade, cr.cod_cep, cr.txt_rua, cepB.txt_bairro")
                    ->from($this->table_alias)
                    ->leftJoin('cr.CepBairros cepB')
                    ->leftJoin('cepB.CepCidades cepC')
                    ->leftJoin('cepC.CepUf cepU')
                    ->where('cr.cod_cep = ?', $valor_cep)
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

}