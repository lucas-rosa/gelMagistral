<?php
/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/**
 * Classe sessionHelper
 * 
 * Plugin para Trabalhar com Sessoes
 * 
 * @package admin\system\helpers\sessionHelper
 * @author  Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 *
 */
class sessionHelper {

    /**
     * Metodo createSession
     * 
     * Cria a sessao para o name
     * 
     * @param string $name
     * @param string $value
     * 
     * @return string
     * 
     */
    public function createSession($name, $value) {
        $_SESSION[$name] = $value;
        return $this;
    }
    
     /**
     * Metodo selectSession
     * 
     * Seleciona a sessao do name
     * 
     * @param string $name
     * 
     * @return string
     * 
     */
    public function selectSession($name) {
        return $_SESSION[$name];
    }
    
     /**
     * Metodo removeKey
     * 
     * Remove a chave da sessao
     * 
     * @param string $name
     * 
     * @return string
     * 
     */
    public function removeKey($name) {

        unset($_SESSION[$name]);
        return $this;
    }
    
     /**
     * Metodo PutObjectOnSessionKey
     * 
     * Monta as chaves de permissaoes para a sesssao
     * 
     * @param string $object
     * @param string $keyName
     * @param string $SessionName
     * 
     * @return string
     * 
     */
    public function PutObjectOnSessionKey($object, $keyName, $SessionName) {

        //Coloca na sessão
        foreach ($object as $valor) {

            $_SESSION[$SessionName][$valor[$keyName]] = $valor[$keyName];
        }
        return $this;
    }
    
     /**
     * Metodo deleteSession
     * 
     * Destroi a sessao do usuario
     * 
     * @return string
     * 
     */
    public function deleteSession() {
        unset($_SESSION);
        session_destroy();
        return $this;
    }
    
     /**
     * Metodo checkSession
     * 
     * Verifica se a sessao foi criada
     *
     * @param string $name
     * 
     * @return string
     * 
     */
    public function checkSession($name) {
        return isset($_SESSION[$name]);
    }

}