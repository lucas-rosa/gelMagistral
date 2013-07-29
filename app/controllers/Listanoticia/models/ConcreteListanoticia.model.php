<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteListanoticia
 *
 * Esta classe e responsavel por todas as requisicoes a tabela 
 * Listanoticia da base de dados.
 * 
 * @package app\controllers\Listanoticia\models\ConcreteListanoticia
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteListanoticia {

    /**
     * Metodo SelectNoticias
     *
     * Metodo responsavel por selecionar todos as noticias da tabela Noticias.
     * Faz uma requisicao a tabela Noticias chamando o metodo SelectNoticias
     * 
     * @return object
     */
    public function SelectNoticias() {
        return TableFactory::getInstance('Noticias')->SelectNoticias();
    }

     /**
     * Metodo SelectNoticiasId
     *
     * Metodo responsavel por selecionar todos as noticias da tabela Noticias 
     * correspondentes a determinado Id.
     * Faz uma requisicao a tabela Noticias chamando o metodo SelectNoticiasId
     * 
     * @param string[] $parametros 
     *  
     * @return object
     */
    public function SelectNoticiasId($parametros) {
        return TableFactory::getInstance('Noticias')->SelectNoticiasId($parametros);
    }
    
    /**
     * Metodo SelectMaisNoticias
     *
     * Metodo responsavel por selecionar noticias aleatorias para exibicao na view
     * Faz uma requisicao a tabela Noticias chamando o metodo SelectMaisNoticias
     * 
     * @param string[] $parametros 
     * 
     * @return object
     */
    public function SelectMaisNoticias($parametros) {
        return TableFactory::getInstance('Noticias')->SelectMaisNoticias($parametros);
    }

}

?>