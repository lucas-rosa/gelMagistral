<?php

/**
 *  phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Table FaleConosco
 *
 * A tabela FaleConosco foi gerada pelo doctrini para transforar   
 * os dados do banco em objetos. Com isso podemos trabalhar os 
 * dados como se fossem objetos. Aqui devemos fazer os selects, inserts e updates
 * tudo relacionado ao banco.
 * 
 * @package app\tables\FaleConosco
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 * 
 */
class FaleConosco extends BaseFaleConosco {

    /**
     * Esta variavel e global e deve ser utilizada para referenciar
     * a tabela FaleConosco. Para isso utilize o elias fc.
     * 
     * @var string $table_alias
     */
    private $table_alias = "faleConosco fc";
    
    /**
     * Metodo incluirFaleConosco
     * 
     * Este metodo inseri na tabela Faleconosco os dados enviados por parametro
     * 
     * @param string[] $parametros 
     * @link http://www.doctrine-project.org/ ORM Doctrini 
     * @return boolean
     */
    public function incluirFaleConosco($parametros) {
        try {
            //Recebe os campos da tabela preenchidos
            $campos_tabela = $this->setValues($this, $parametros, INSERT);

            //Percorre os campos da tabela
            foreach ($campos_tabela as $chave => $valor) {
                //Atribui os valores resgatados para a tabela em questão
                $this->$chave = $campos_tabela->$chave;
            }

            $this->cod_idioma = LANGUAGE;
            $this->dat_datahora = date("Y-m-d H-i-s");
            $this->num_ip = $_SERVER['REMOTE_ADDR'];

            //Salva o registro no banco de dados
            $this->save();

            //Salva no log de alterações
            TableFactory::getInstance('LogsAlteracoes')->logAlteracoes($this->getTable()->getTableName(), $this->getIncremented(), 'I');

            //Returna true em caso de sucesso
            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}