<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe ConcreteNovidades
 *
 * Esta classe e responsavel por todas as requisicoes a tabela 
 * Noticias da base de dados.
 * 
 * @package app\controllers\Novidades\models\ConcreteNovidades
 * @author  Linea Comunicacao
 * @link    http://www.agencialinea.com.br
 */
class ConcreteNovidades {

    /**
     * Metodo SelectNovidades
     *
     * Metodo responsavel por selecionar todos as noticias da tabela noticias.
     * Faz uma requisicao a tabela Textos chamando o metodo SelectTexto   
     * 
     * @param string[] $parametros 
     * @return object
     */
    public function SelectNovidades($parametros) {
        return TableFactory::getInstance('Noticias')->SelectNovidades($parametros);
    }
    
     /**
     * Metodo TotalNoticias
     * 
     * Retorna o total de registros na tabela dicas
     */
    public function TotalNovidades(){
        return TableFactory::getInstance('Noticias')->CountNovidades();
    }
    
    /**
     * Metodo SelectDicasId
     *
     * Metodo responsavel por selecionar as noticias da tabela noticias.
     * Faz uma requisicao a tabela Noticias chamando o metodo SelectNovidadesId  
     * 
     * @param string[] $parametros 
     * @return object
     */
    public function SelectNovidadesId($parametros) {
        
        return TableFactory::getInstance('Noticias')->SelectNovidadesId($parametros);
    }
    
    /**
     * Metodo SelectOutrasNovidades
     *
     * Metodo responsavel por selecionar noticias da tabela noticias.
     * Faz uma requisicao a tabela Noticias chamando o metodo SelectOutrasNovidades  
     * 
     * @param string[] $parametros 
     * @return object
     */
    public function SelectOutrasNovidades($parametros) {
        
        return TableFactory::getInstance('Noticias')->SelectOutrasNovidades($parametros);
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