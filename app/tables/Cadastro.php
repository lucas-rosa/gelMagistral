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
 * @package app\tables\Cadastro
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class Cadastro extends BaseCadastro {

    /**
     * Metodo ExecuteCadastrar
     * 
     * Este metodo faz o cadastro dos dados enviados pelo model na
     * tabela Cadastro utilizando o ORM Doctrini  
     * 
     * @param string[] $parametros
     * @link http://www.doctrine-project.org/ ORM Doctrini
     * @return boolean 
     */
    public function ExecuteCadastrar($parametros) {
        try {

            $this->setValues($this, $parametros, INSERT);
            $this->save();
            return true;
        } catch (Doctrine_Exception $e) {
            echo $e->getMessage();
        }
    }

}