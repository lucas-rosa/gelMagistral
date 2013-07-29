<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteDicasdesaude
 *
 * Esta classe e responsavel por todas as requisicoes a tabela 
 * Dicasdesaude da base de dados.
 * 
 * @package app\controllers\Dicasdesaude\models\ConcreteDicasdesaude
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteDicasdesaude {
    
    /**
     * Metodo SelectDicas
     *
     * Metodo responsavel por selecionar todos as dicas da tabela dicas.
     * Faz uma requisicao a tabela Dicas chamando o metodo SelectDicas  
     * 
     * @return object
     */
    public function SelectDicas($parametros) {
        
        return TableFactory::getInstance('Dicas')->SelectDicas($parametros);
    }
    
    /**
     * Metodo SelectDicasId
     *
     * Metodo responsavel por selecionar determinada dica da tabela dicas.
     * Faz uma requisicao a tabela Dicas chamando o metodo SelectDicasId  
     * 
     * @return object
     */
    public function SelectDicasId($parametros) {
        
        return TableFactory::getInstance('Dicas')->SelectDicasId($parametros);
    }
    
     /**
     * Metodo SelectOutrasDicas
     *
     * Metodo responsavel por selecionar dicas da tabela dicas.
     * Faz uma requisicao a tabela Dicas chamando o metodo SelectOutrasDicas  
     * 
     * @return object
     */
    public function SelectOutrasDicas($parametros) {
        
        return TableFactory::getInstance('Dicas')->SelectOutrasDicas($parametros);
    }
    
    
    /**
     * Metodo TotalDicas
     * 
     * Retorna o total de registros na tabela dicas
     */
    public function TotalDicas(){
        return TableFactory::getInstance('Dicas')->CountDicas();
    }
    
    /**
     * Metodo SelectVideos
     *
     * Metodo responsavel por selecionar todos os videos da tabela videos.
     * Faz uma requisicao a tabela Videos chamando o metodo SelectVideos  
     * 
     * @return object
     */
    public function SelectVideos() {
        
        return TableFactory::getInstance('Videos')->SelectVideos();
    }
    
    
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