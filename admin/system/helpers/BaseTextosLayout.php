<?php

/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 */

/** 
 * Classe BaseTextosLayout
 * 
 * Esta classe extende a Doctrine_Record sendo responsavel por transformar os
 * dados vindos da tabela BaseTextosLayout em um objeto sendo assim possivel
 * trata-lo com tal.
 *
 * 
 * @package admin\system\helpers\BaseTextosLayout
 * @author  Linea Comunicacao <atendimento@agencialinea.com.br>
 * @link    http://www.agencialinea.com.br
 * 
 */
abstract class BaseTextosLayout extends Doctrine_Record
{
   /** 
    * Metodo setTableDefinition
    * 
    * No metodo set abaixo cada campo da tabela textoLayout e definido e 
    * configurado com seus respectivos parametros. 
    * Em caso de duvidas consultar site http://www.doctrine-project.org/   
    * 
    * @return object
    */
    public function setTableDefinition()
    {
        $this->setTableName('textosLayout');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('id_texto', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('id_idioma', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('texto', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }
    
    /** 
    * Metodo setUp
    * 
    * No metodo set abaixo cada campo da tabela WebsiteIdiomas e definido e 
    * configurado com seus respectivos parametros. 
    * Em caso de duvidas consultar site http://www.doctrine-project.org/   
    * 
    * @return object
    */
    
    public function setUp()
    {
        parent::setUp();
        $this->hasOne('WebsiteIdiomas', array(
             'local' => 'id_idioma',
             'foreign' => 'cod_id'));
    }
}