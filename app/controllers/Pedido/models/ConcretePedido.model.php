<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcretePedido
 *
 * Esta classe e responsavel por todas as requisicoes a tabela 
 * Pedido da base de dados.
 * 
 * @package app\controllers\Pedido\models\ConcretePedido
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcretePedido {

    /**
     * Metodo SelectTextos
     *
     * Metodo responsavel por selecionar todos os textos da tabela textos.
     * Faz uma requisicao a tabela Textos chamando o metodo SelectTexto   
     * 
     * @return object
     */
    public function SelectTextos() {
        return TableFactory::getInstance('Textos')->SelectTexto();
    }
    
     /**
     * Metodo SelectTextosId
     *
     * Metodo responsavel por selecionar os textos da tabela textos correspondentes 
     * a determinado Id passado por parametro.
     * Faz uma requisicao a tabela Textos chamando o metodo SelectTextoId e passando 
     * o Id por parametro.    
     * 
     * @param string[] $parametros 
     * @return object
     */
    public function SelectTextosId($parametros) {
        return TableFactory::getInstance('Textos')->SelectTextoId($parametros);
    }

}

?>